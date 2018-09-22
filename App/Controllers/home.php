<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\User;


class Home extends Controller {

	protected function index() {
		
		$user = new User;
		// var_dump(get_class($user);
		// die();
		$results = $user->getAll();
		print_r($results);
	}


}