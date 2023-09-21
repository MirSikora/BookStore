<?php
namespace App\Model;

use Nette\Application\UI\Form;
use \Tracy\Debugger;

class HomeManager{
	/** @var \Nette\Database\Context */
	protected $database;

	public function __construct(\Nette\Database\Context $database){
        	$this->database = $database;
  	}

      public function getBookItems(){
		$database = $this->database;
		$database->beginTransaction();		
		$rows = $database->query('SELECT id, name, author_name, author_surname, year, publisher, text, img, language, pieces, price FROM books WHERE pieces>0')->fetchAll();
		$database->commit();
		Debugger::barDump($rows); 
		return $rows; 
	}

	public function getToCart(int $idCart, int $idUser){
		$database = $this->database;
        $database->beginTransaction();
        try{		
            $database->query('INSERT INTO delivery (date,	users_id, books_id,	pieces	) VALUES (now(), ?, ?, 1)', $idUser, $idCart);
			$database->query('UPDATE books SET pieces = pieces - 1 WHERE id = ?',$idCart);
          	$database->commit();
        } catch (\Exception $e){
          	$database->rollback();
          	throw $e;
        }
	}
}