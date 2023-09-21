<?php

declare(strict_types=1);

namespace App\Presenters;

use BasePresenter;
use Nette;
use App\Model\HomeManager;
use \Nette\Application\UI\Form;

final class HomePresenter extends BasePresenter{
    /**
	 * @var \App\Model\HomeManager
	 */
	private $homeManager;

	function __construct(HomeManager $homeManager){
		$this->homeManager = $homeManager;
		parent::__construct();
	}

    public function renderDefault(){		
		$this->template->bookItems = $this->homeManager->getBookItems();		
	}

	public function createComponentCartForm(): Form{
		
		$form = new Form();
		$form->addHidden('cartId');			
		$form->addSubmit('toCart');
		$form->onSuccess[] = [$this, 'sendToCart'];        
		return $form;       
	}
    
	public function sendToCart(Form $form, $values) {
        if($this->user->isLoggedIn()){   
           	$values = $form->getValues();
			$idUser= $this->user->getIdentity()->getId(); 
          	$idCart = intval($values['cartId']);
		   	$this->homeManager->getToCart($idCart, $idUser);
		   	$this->flashMessage('Zboží přidáno do košíku.'); 
		 }else{
			$this->flashMessage('Nakupovat mohou jen přihlášení uživatelé.');			 
		}  		
	}
}
