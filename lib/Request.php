<?php 

require_once ROOT.'/lib/Post.php';
require_once ROOT.'/lib/QueryString.php';

class Request
{
	private $_post;
	private $_query;

	public function __construct(){
		$this->_post = new Post();
		$this->_query = new QueryString();
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
}