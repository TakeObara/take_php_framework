<?php 
require_once ROOT.'/lib/RequestVariables.php';
class UrlParameter extends RequestVariables{
	protected function setValues(){
		$param = ereg_replace('/?$', '', $_GET['param']);
		$params = array();
		if('' !== $param){
			$params = explode('/', $param);
		}
		$i = 0;
		if(IS_WEBROOT + 2 < count($params)){
			for ($i=0; $i < count($params); $i++) { 
				$this->_values[$i] = $params[$i + 2];				
			}
		}
	}
}