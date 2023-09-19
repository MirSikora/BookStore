<?php declare(strict_types=1);

use Nette\Security\IIdentity;

class Authenticator implements \Nette\Security\Authenticator { 

    public function __construct(
        private UserService $userService,
        private Nette\Security\Passwords $passwords
    ){}

    public function authenticate(string $nickname, string $password): IIdentity {
        $user = $this->userService->findUser($nickname);
        
        if($user === null)
            throw new \Nette\Security\AuthenticationException('Uživatel nenalezen.');

        if($this->passwords->verify($password, $user->password) === false)
        throw new \Nette\Security\AuthenticationException('Špatné heslo.');

        return new \Nette\Security\SimpleIdentity ($user->id, $user->role, ['nickname' => $nickname]);

    }
}