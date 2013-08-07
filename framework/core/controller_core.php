<?php
class controller_core{
	private $templateViewPath = '';
	private $templateLayoutPath = '';
	public $db;
	public function __construct($helpers = array()){
		$this->templateViewPath  = APP_PATH.'views'.DS;
		$this->templateLayoutPath =  APP_PATH.'views'.DS.'layouts'.DS;
		$this->db = $helpers['db'];
		date_default_timezone_set("Africa/Cairo");
	}
	public function render($view, $params = array() ,$layout = 'default'){
		foreach($params as $varKey=>$varValue){
			$$varKey = $varValue;
		}

		$renderdView = $this->templateViewPath.$view;
		$ViewFile = $renderdView.'.php';
		$layoutFile = $this->templateLayoutPath.$layout.'.php';

		if(!file_exists($layoutFile)){
			throw new Exception("Missing Layout File @".$layoutFile, 1);			
			exit;
		}
		if(!file_exists($ViewFile)){
			throw new Exception("Missing View File @".$ViewFile, 1);			
			exit;
		}

		include $layoutFile;

	}
}