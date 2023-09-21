<?php
namespace App\Model;

class RegistrationManager{
	/** @var \Nette\Database\Context */
	protected $database;

	public function __construct(\Nette\Database\Context $database){
        	$this->database = $database;
  	}

	  public function saveRegistrationItems($name, $surname, $email, $address, $city, $nickname, $role, $password){
        $database = $this->database;
        $database->beginTransaction();
        try{		
            $database->query('INSERT INTO users (name, surname, email, address, city, nickname, role, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)', $name, $surname, $email, $address, $city, $nickname, $role, $password);
            $database->commit();
        } catch (\Exception $e){
            $database->rollback();
            throw $e;
        }
            
      }
}