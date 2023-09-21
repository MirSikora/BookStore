<?php

declare(strict_types=1);

namespace App\Presenters;
use BasePresenter;
use \UserService;
use Nette;


final class UserPresenter extends BasePresenter
{
    public function __construct(
        private UserService $userService        
    ){}
    
    public function renderDefault(): void{
        $id= $this->user->getIdentity()->getId();    
        $this->template->userInfo = $this->userService->getUserInfo($id);        
    }
       
}