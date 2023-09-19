<?php
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;

abstract class BasePresenter extends Presenter
{
    public function createComponentSearchForm(): Form{

		$form = new Form();
		$form->addText('search');	
	    $form->addSubmit('send');
		$form->onSuccess[] = [$this, 'searchFormSucceeded'];        
		return $form;
       
	}
    
		public function searchFormSucceeded(Form $form, $values) {
            
            $values = $form->getValues();
            $query= $values['search'];
		
		$this->redirect('Search:default',$query);
		
	}
}