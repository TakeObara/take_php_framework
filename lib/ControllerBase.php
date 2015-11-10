<?php 

require_once ROOT.'/lib/Request.php';

abstract class ControllerBase{
	protected $systemRoot;
	protected $controller = CTRL;
	protected $action = ACTION;
	protected $request;
	protected $templatePath;
	protected $model;

	public function __construct(){
		$this->request = new Request();
	}

	public function setSystemRoot($path){
		$this->systemRoot = $path;
	}

	public function setControllerAction($controller,$action){
		$this->controller = $controller;
		$this->action     = $action;
	}

	public function run(){
		try{
			$model = ucfirst($this -> controller) . 'Model';
			if(file_exists(ROOT.sprintf('/app/models/%s.php', $model))){
				require_once ROOT.sprintf('/app/models/%s.php', $model);
				$this->model = new $model();
			}
			require ROOT.'/app/views/elements/header.php';
			$this->preAction();
			$methodName = sprintf('%sAction', $this->action);
			$this->$methodName();
			require ROOT.'/app/views/elements/footer.php';
		}catch(Exception $e){
			die("Error:" . $e);
		}
	}

	protected function preAction(){}
}