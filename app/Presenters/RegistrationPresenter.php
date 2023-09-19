<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use BasePresenter;
use App\Model\RegistrationManager;
use \Nette\Application\UI\Form;

final class RegistrationPresenter extends BasePresenter{
    /**
	 * @var \App\Model\RegistrationManager
	 */
	private $registrationManager;
	
	function __construct(RegistrationManager $registrationManager){
		$this->registrationManager = $registrationManager;
		parent::__construct();
	}

    public function createComponentRegistrationForm(){
        $form = new Form();
        $form->addText('name', '')->setHtmlAttribute('placeholder', 'Jméno')->setRequired('Zadejte prosím jméno');
        $form->addText('surname', '')->setHtmlAttribute('placeholder', 'Příjmení')->setRequired('Zadejte prosím příjmení');
        $form->addEmail('email', '')->setHtmlAttribute('placeholder', 'Email')->setRequired('Zadejte prosím email');
        $form->addText('address', '')->setHtmlAttribute('placeholder', 'Adresa');
        $form->addText('city', '')->setHtmlAttribute('placeholder', 'Město');
        $form->addText('nickname', '')->setHtmlAttribute('placeholder', 'Přihlašovací jméno')->setRequired('Zadejte prosím přihlašovací jméno');
        $form->addPassword('password', '')->setHtmlAttribute('placeholder', 'Heslo')->setRequired('Zadejte prosím heslo');
        $form->addPassword('passwordVerify', '')->setHtmlAttribute('placeholder', 'Heslo znovu')
	->setRequired('Zadejte prosím heslo ještě jednou pro kontrolu')
	->addRule($form::Equal, 'Hesla se neshodují', $form['password'])
	->setOmitted();
        $form->addSubmit('insert', 'Registrovat');
        $form->onSuccess[] = [$this, 'registrationItemInsert'];        
        return $form;        
    }

    public function registrationItemInsert(Form $form, $values){
        $values = $form->getValues();        
        $values['role']='guest'; 
        $oldPassword= $values['password'];              
        $values['password']=password_hash($values['password'], PASSWORD_DEFAULT);                       
        $this->registrationManager->saveRegistrationItems($values['name'],$values['surname'], $values['email'],$values['address'],$values['city'],$values['nickname'],$values['role'],$values['password']);
        $this->flashMessage('Úspěšná registrace'); 
        $this->getUser()->login($values->nickname, $oldPassword);        
        $this->redirect('User:'); 	    
    }

    
}