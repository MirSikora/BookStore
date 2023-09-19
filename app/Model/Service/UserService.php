<?php declare(strict_types=1);

class UserService{

    public function __construct(
        private Nette\Database\Explorer $database        
    ){}

    // data for Authenticator
    public function findUser(string $nickname): ?User{

        return User::create($this->database->table('users')->where('nickname',$nickname)->fetch());
    }

    // data for UserPresenter
    public function getUserInfo (int $id): ?User{

        return User::create($this->database->table('users')->where('id',$id)->fetch());
    }

    
}