<?php
namespace App\Model;

use Nette\Application\UI\Form;
use \Tracy\Debugger;

class CartManager{
	/** @var \Nette\Database\Context */
	protected $database;

	public function __construct(\Nette\Database\Context $database){
        	$this->database = $database;
  	}

      public function getCartItems($userId){
		$database = $this->database;
		$database->beginTransaction();		
		$rows = $database->query('SELECT b.name, b.author_name, b.author_surname, b.price, d.pieces, d.id FROM books b JOIN delivery d ON d.books_id = b.id WHERE d.users_id = ? AND d.date=CURRENT_DATE() AND d.finish=0 ', $userId)->fetchAll();
		$database->commit();
		Debugger::barDump($rows); 
		return $rows; 
	}

	public function getCartAllItems($userId){
		$database = $this->database;
		$database->beginTransaction();		
		$rows = $database->query('SELECT SUM(b.price) AS sumPrice, SUM(d.pieces) AS sumPieces FROM books b JOIN delivery d ON d.books_id = b.id WHERE d.users_id = ? AND d.date=CURRENT_DATE() AND d.finish=0', $userId)->fetchAll();
		$database->commit();
		Debugger::barDump($rows); 
		return $rows; 
	}

	public function sendDelivery($deliveryId){
		$database = $this->database;
        $database->beginTransaction();
        try{
			$database->query('UPDATE delivery SET finish = 1 WHERE users_id = ?',$deliveryId);
          	$database->commit();
        } catch (\Exception $e){
          	$database->rollback();
          throw $e;
        }
	}
	public function returnBack($id){
		$database = $this->database;
        $database->beginTransaction();
        try{
        $database->query('UPDATE books SET pieces = pieces + 1 WHERE id IN (SELECT books_id FROM delivery WHERE id = ?)',$id);
       	$database->query('DELETE FROM delivery WHERE id=?', $id);        			  
          $database->commit();
        } catch (\Exception $e){
          	$database->rollback();
          throw $e;
        }
	}
	
}	