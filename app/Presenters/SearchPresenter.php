<?php

declare(strict_types=1);

namespace App\Presenters;

use BasePresenter;
use Nette;
use App\Model\SearchManager;
use \Nette\Application\UI\Form;

final class SearchPresenter extends BasePresenter{
    /**
	 * @var \App\Model\SearchManager
	 */
	private $searchManager;

	function __construct(SearchManager $searchManager){
		$this->searchManager = $searchManager;
		parent::__construct();
	}

    public function renderDefault($query){
				
		if(!($this->template->searchBooks = $this->searchManager->getSearchBooks($query))){
			$this->flashMessage('Nebyla nalezena žádná kniha.');
		}		
	}
	public function createComponentCartForm(): Form{

		$form = new Form();
		$form->addHidden('cartId');			
	    $form->addSubmit('toCart');
		$form->onSuccess[] = [$this, 'sendToCart'];        
		return $form;
       
	}
    
		public function sendToCart(Form $form, $values) {
            
            $values = $form->getValues();
			$idUser= $this->user->getIdentity()->getId(); 
           $idCart = intval($values['cartId']);
		   $this->searchManager->getToCart($idCart, $idUser);
		   $this->flashMessage('Zboží přidáno do košíku.'); 
		   
		
	}
	
}
