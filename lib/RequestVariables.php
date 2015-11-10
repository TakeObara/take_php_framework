<?php 

abstract class RequestVariables{
	private $_values;

	public function __construct(){
		$this->setValues();
	}

	abstract protected function setValues();

	public function get($key = null){
		$ret = null;
		if(null === $key){
			$ret = $this->_values;
		}
		return $ret;
	}

	public function has($key){
		if(!array_key_exists($key,$this->_values)){
			return false;
		}
		return true;
	}
}