<?php
class Switcher{
	public $controller = '';
	public $action = '';
	public $beforeHandler = '';
	public $afterHandler = '';
	public $helpers = array();

	public function __construct($helpers = array()){
		$this->helpers = $helpers;
	}

	public function load($loader){

		$target = explode('#',$loader['target']);
		$controller = $this->controller = $target[0];
		$action = $this->action = $target[1];

		if(class_exists($controller)){

			$handler_instance = new $controller($this->helpers);

			if(method_exists($handler_instance, $action)){

                $reflection = new ReflectionMethod($handler_instance, $action);
                if ($reflection->isPublic()) {
                	
                    $this->fire('before_handler');
                    call_user_func_array(array($handler_instance, $action), $loader['params']);
                    $this->fire('after_handler');

                }else{  die('404'); }                        

            } else{  die('404'); }    

		}else{ die('404'); }

	}


	public function fire(){

	}

}