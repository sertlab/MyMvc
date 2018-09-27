<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\User;
use Core\View;

class SignUp extends Controller {

	public function index(){

		View::renderTemplate('Signup/index.php');
	}

	public function create(){


		$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

		$user = new User([ 'username' => $_POST['username'],
						   'email' => $_POST['email'],
						   'password' => $hashedPassword

								]);

		$user->validate($_POST);


		if(empty($user->errors)) {
			$user->save();

			header('Location: http://'. $_SERVER['HTTP_HOST'].'/' .ROOT_FOLDER.'/signup/success',true,303);
			exit;
		}else {
			View::renderTemplate('Signup/index.php',['user' => $user]);
		}
		
	}


	public function success()
	{
	    View::renderTemplate('Signup/registersuccess.php');
	}

}