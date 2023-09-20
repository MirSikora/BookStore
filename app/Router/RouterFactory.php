<?php

declare(strict_types=1);

namespace App\Router;

use Nette;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$router = new RouteList;
		$router->addRoute('', 'Home:default');
		$router->addRoute('cart', 'Cart:default');
		$router->addRoute('login', 'Login:default');
		$router->addRoute('out', 'Login:out');
		$router->addRoute('user', 'User:default');
		$router->addRoute('registration', 'Registration:default');
		$router->addRoute('search', 'Search:default');
		$router->addRoute('result', 'Search:result');
		$router->addRoute('header', 'Header:default');		
		return $router;
	}
}
