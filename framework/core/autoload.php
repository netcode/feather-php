<?php
class ActionAutoloader
{

    public $controllerPath;
	public $corePath;

    public function setPath($corePath,$controllerPath) {
        $this->corePath= $corePath; $this->controllerPath = $controllerPath ;
    }


    function __autoload($className) {	   
		if(substr($className,-5) == '_core'){
			//core file
			$path = $this->corePath.DS.strtolower($className).'.php';
		}else{
			$path = $this->controllerPath.DS.strtolower($className).'.php';;
		}
        if (file_exists($path)) {
             require_once($path);
        } else {
            //throw new Exception('Can\'t find a Lib "'.$className.'" at "' . $path . '".');
        }
    }
}
?>