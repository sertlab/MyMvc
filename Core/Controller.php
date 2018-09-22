<?php

namespace Core;

abstract class Controller {

	// protected $request;
	protected $action;


	public function __construct($action){
		$this->action = $action;
		// $this->request = $request;
	}


	public function executeAction(){

		return $this->{$this->action}();
	}

	protected function returnView($view,$fullview) {
		$view = 'App/Views'. get_class($this). '/' . $this->action. '.php';
	}
}