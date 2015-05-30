<?php

namespace App;

use App\Api\Routers\RestRoute;
use Nette,
	Nette\Application\Routers\RouteList,
	Nette\Application\Routers\Route;


class RouterFactory
{

	/**
	 * @return Nette\Application\IRouter
	 */
	public function create()
	{
		$router = new RouteList();
		$router[] = $api = new RouteList('Api');
		$api[] = new RestRoute('/api/shows[.<format=json>]', 'Shows:');

		$router[] = $front = new RouteList('Front');
		$front[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');

		return $router;
	}

}
