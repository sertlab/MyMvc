<?php

namespace Core;

abstract class View {

	public static function render($view, $args = []) {

		extract($args, EXTR_SKIP);

		// var_dump(extract($args,EXTR_SKIP));

		if(is_readable($view)){
			require $view;
		}else {
			echo "View not found";
		}
	}


	public static function renderTemplate($template, $args = []){

		static $twig = NULL;

		if ($twig === NULL)
		{
			$loader = new \Twig_Loader_Filesystem('App/Views');
			$twig = new \Twig_Environment($loader);
		}

		echo $twig->render($template,$args);
	}

}