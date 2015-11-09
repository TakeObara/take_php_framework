<?php 

require_once ROOT.'/lib/Post.php';
require_once ROOT.'/lib/QueryString.php';

class Request
{
	private $post;
	private $query;

	public function __construct(){
		$this->post = new Post();
		$this->query = new QueryString();
	}

	public function getPost($key = null){
		if(null === $key){
			return $this->post->get();
		}
		if(!$this->post->has($key)){
			return null;
		}
		return $this->post->get();
	}

	public function getQuery($key = null){
		if(null === $key){
			return $this->query->get();
		}
		if(!$this->query->has($key)){
			return null;
		}
		return $this->query->get();	
	}
}