<?php 
class Dispatcher {
	private $sysRoot = '';

	public function setSystemRoot($path){
		$this->sysRoot = rtrim($path,'/');
	}

	public function dispatch(){
		$param = ereg_replace('/?$', '', $_SERVER['REQUEST_URI']);
		$params = array();
		 if ('' != $param) {
            $params = explode('/', $param);
        }

		$controller = 'index';
		if(1 < count($params)){
			$controller = $params[1];
		}
		if(!$controller){
			header('404 not found');
			exit;
		}
		$controllerInstance = $this->getControllerInstance($controller);

		$action = 'index';
		if(2 < count($params)){
			$action = $params[2];
		}
		if(!method_exists($controllerInstance,$action.'Action')){
			header('404 not found');
			exit ;
		}
		$controllerInstance->setSystemRoot($this->sysRoot);
		$controllerInstance->setControllerAction($controller,$action);
		$controllerInstance->run();
	}

	private function getControllerInstance($controller){
		$controllerName = ucfirst(strtolower($controller).'Controller');
		$controllerFileName = sprintf('%s/app/controllers/%s.php',$this->sysRoot,$controllerName);
		if(!file_exists($controllerFileName)){
			return null;
		}
		require_once ROOT.'/lib/ControllerBase.php';
		require_once $controllerFileName;
		$controllerInstance = new $controllerName();
		return $controllerInstance;
	}
}