<?php declare(strict_types=1);

class User{

    public function __construct(
        public int $id,
        public string $name,
        public string $surname,
        public string $email, 
        public string $address,
        public string $city,
        public string $nickname,
        public string $role,
        public string $password
    ){}

    public static function create(?\Nette\Database\Table\ActiveRow $activeRow): ?self{
        if($activeRow===null)
            return null;

        return new User(...$activeRow->toArray());
    }

}