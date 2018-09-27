<?php

namespace Core;

use Core\View;


class Bootstrap {

	private $controller;
	private $action;
	private $request;


	public function __construct($request) {
		$this->request = $request;

		/* Controller dispatcher */
		if($this->request['controller'] == ''){
			$this->controller = 'home';
		}else{
			$this->controller = $this->request['controller'];
		}

		/* Action Dispatcher */

		if($this->request['action'] == ''){
			$this->action = 'index';
		}else{
			$this->action = $this->request['action'];
		}

	}


	public function createController(){
		// Check Class
		$controller = "App\Controllers\\$this->controller";

		if(class_exists($controller)){
	

			$controller_object = new $controller($this->action);


			if(method_exists($controller_object, $this->action)){
				return new $controller_object($this->action);
			}else{
				View::renderTemplate('404.php');
				return;
			}

		} else {
			View::renderTemplate('404.php');
			return;
		}


	}


}