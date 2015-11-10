<?php 
class IndexController extends ControllerBase{
	public function indexAction(){
		$this->model->show("users");
	}
}