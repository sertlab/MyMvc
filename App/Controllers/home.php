<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\User;
use Core\View;

class Home extends Controller {

	protected function index() {
		

		View::renderTemplate('Home/index.php');
	}


}