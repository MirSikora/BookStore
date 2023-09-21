<?php

declare(strict_types=1);

namespace App\Presenters;
use BasePresenter;
use Nette\Application\UI\Form;
use App\Model\CartManager;
use Nette;


final class CartPresenter extends BasePresenter
{
     /**
	 * @var \App\Model\CartManager
	 */
	private $cartManager;

	function __construct(CartManager $cartManager){
		$this->cartManager = $cartManager;
		parent::__construct();
	}

    public function renderDefault(){
        if($this->user->isLoggedIn()){
        	$userId= $this->user->getIdentity()->getId(); 		
			$this->template->cartItems = $this->cartManager->getCartItems($userId);
        	$this->template->sumCartItems = $this->cartManager->getCartAllItems($userId); 
    	}     		
	}
	public function createComponentSendForm(): Form{
		
		$form = new Form();		
	    $form->addSubmit('send');
		$form->onSuccess[] = [$this, 'sendFormSucceeded'];     
		return $form;
	}
    
	public function sendFormSucceeded(Form $form, $values) {
            
        $values = $form->getValues();
        $deliveryId= $this->user->getIdentity()->getId(); 
		$this->cartManager->sendDelivery($deliveryId);
		$this->flashMessage('Objednávka byla úspěšně odeslána.'); 			
		
	}
	public function handleDeleteCart($id){        
        $this->cartManager->returnBack($id);
        $this->flashMessage('Položka odebrána.');
        $this->redirect('Cart:');        
    }
}	