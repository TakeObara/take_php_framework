<?php 

require_once ROOT.'/lib/Request.php';

abstract class ControllerBase{
	protected $systemRoot;
	protected $controller = 'index';
	protected $action = 'index';
	protected $request;
	protected $templatePath;

	public function __construct(){
		$this->request = new Request();
	}

	public function setSystemRoot($path){
		$this->systemRoot = $path;
	}

	public function setControllerAction($controller,$action){
		$this->controller = $controller;
		$this->action = $action;
	}

	public function run(){
		try{
			require ROOT.'/app/views/header.php';
			$this->preAction();
			$methodName = sprintf('%sAction',$this->action);
			$this->$methodName();
			require ROOT.'/app/views/footer.php';
		}catch(Exception $e){
			die("Error:".$e);
		}
	}
	// 共通処理
	protected function preAction(){}
}