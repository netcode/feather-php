<?php

//load user prefernces
$config = include 'app/configurations.php';



//init the framework
include 'framework/init.php';
$autoloader = new ActionAutoloader();
$autoloader->setPath('framework/core','app/controllers');
spl_autoload_register(array($autoloader, '__autoload'));

include 'app/router.php';

$match = $router->match();
//print_r($match);
if($match){
	$switcher->load($match);
}else{	
	$switcher->load('404');
}

// echo 'add';
// print_r($match);
// echo 'kjh ';

?>