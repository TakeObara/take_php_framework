<?php 

require_once ROOT.'/lib/Post.php';
require_once ROOT.'/lib/QueryString.php';
require_once ROOT.'/lib/UrlParameter.php';

class Request
{
	private $_post;
	private $_query;
	private $_param;

	public function __construct(){
		$this->_post = new Post();
		$this->_query = new QueryString();
		$this->_param = new UrlParameter();
	}

	public function getPost($key = null){
		if(null === $key){
			return $this->_post->get();
		}
		if(!$this->post->has($key)){
			return null;
		}
		return $this->_post->get();
	}

	public function getQuery($key = null){
		if(null === $key){
			return $this->_query->get();
		}
		if(!$this->_query->has($key)){
			return null;
		}
		return $this->_query->get();	
	}

	public function getParam($key = null){
		if(null === $key){
			return $this->_param->get();
		}
		if(!$this->_param->has($key)){
			return null;
		}
		return $this->_param->get();	
	}
}