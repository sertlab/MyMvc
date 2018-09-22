<?php


require 'config.php';

spl_autoload_register(function($class){

	$root = dirname(__DIR__).'/serdelab'; //parent directory

	$file = $root . '/' . str_replace('\\','/',$class) . '.php';

	if(is_readable($file)){
		require $root .'/'. str_replace('\\','/', $class). '.php';
	}

});

use Core\Bootstrap;

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();



if($controller){
	$controller->executeAction();
}