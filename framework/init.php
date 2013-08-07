<?php
	define ('DS', DIRECTORY_SEPARATOR);

	/* site absolute path */	
	$sitepath = realpath(dirname(__FILE__) . DS . '..' . DS) . DS;	
	define ('SITE_PATH', $sitepath);
	define ('FRAMEWORK_PATH',realpath(dirname(__FILE__) . DS) . DS);
	define ('APP_PATH',$sitepath.'app'. DS);

	// echo SITE_PATH;
	// exit;
	include_once FRAMEWORK_PATH."core/autoload.php"; //auto loader
	include_once FRAMEWORK_PATH."libs/AltoRouter.php"; //router
	include_once FRAMEWORK_PATH."libs/switch.php"; //router switch
	include_once FRAMEWORK_PATH."libs/NotORM.php"; //notORM

	if($config['DB']['use']){
		$pdo = new PDO("mysql:dbname=".$config['DB']['Name'],$config['DB']['Username'],$config['DB']['Password']);
		$pdo->query("SET NAMES utf8");
		$db = new NotORM($pdo);
	}else{
		$db = null;
	}

	


	$router = new AltoRouter();
	$switcher = new Switcher(array('db'=>$db));
	$router->setBasePath($config['livePath']);
	/*
	include_once FRAMEWORK_PATH."router/toro.php"; //router
	//notORM
	include_once FRAMEWORK_PATH."data/NotORM.php";
	//Mustache
	include_once FRAMEWORK_PATH."template/Mustache/Autoloader.php";
	Mustache_Autoloader::register();
	*/	
?>