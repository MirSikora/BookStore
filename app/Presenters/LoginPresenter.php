<?php

declare(strict_types=1);

namespace App\Presenters;
use BasePresenter;
use Nette;


final class LoginPresenter extends BasePresenter
{

            public function createComponentLoginForm(): Nette\Application\UI\Form {
                $form = new Nette\Application\UI\Form();
                $form->addText('nickname', '')->setHtmlAttribute('placeholder', 'Přihlašovací jméno');
                $form->addPassword('password', '')->setHtmlAttribute('placeholder', 'Heslo');
                $form->addSubmit('send', 'Přihlásit');
                $form->onSuccess[] = [$this, 'loginItemInsert'];        
                return $form;        
            }

            public function loginItemInsert(Nette\Application\UI\Form $form){
                $values = $form->getValues();
                try{
                    $this->getUser()->login($values->nickname, $values->password);
                    $this->redirect('User:'); 
                }catch (Nette\Security\AuthenticationException $e){
                    $this->flashMessage($e->getMessage(),'danger');
                }
                                               
            }

            public function actionOut()
          {
              $this->getUser()->logout(true);
              $this->flashMessage('Odhlášení bylo úspěšné.');
              $this->redirect('default');
              exit();
          }

        

}
