<?php
class AddPostController extends Controller{
	public $postObject;
	public function defaultTask(){
		$this->postObject = new Post();
		$this->set('task', 'add');
	}
	public function add(){
			$this->postObject = new Post();
			$data = array('title'=>$_POST['post_title'],'content'=>$_POST['post_content'],'date'=>$_POST['post_date'],
		'categoryID'=>$_POST['post_categoryID']);
			$result = $this->postObject->addPost($data);
			$this->set('message', $result);
	}
	public function edit($pID){
			$this->postObject = new Post();
			$post = $this->postObject->getPost($pID);
			$this->set('pID', $post['pID']);
			$this->set('title', $post['title']);
			$this->set('content', $post['content']);
			$this->set('date', $post['date']);
			$this->set('uID', $post['uID']);
			$this->set('categoryID', $post['categoryID']);
			$this->set('task', 'update');
	}
	public function update(){
		$this->postObject = new Post();
		$data = array('title'=>$_POST['post_title'],'content'=>$_POST['post_content'],'date'=>$_POST['post_date'],
	'categoryID'=>$_POST['post_categoryID']);
		$result = $this->postObject->updatePost($data);
		$this->set('message', $result);
	}
	public function updateTask(){
		$this->postObject = new Post();
		$this->set('task', 'update');
	}
}
