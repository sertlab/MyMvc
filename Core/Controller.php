<?php

namespace Core;

abstract class Controller {

	protected $action;


	public function __construct($action){
		$this->action = $action;
	}


	public function executeAction(){

		return $this->{$this->action}();
	}


}