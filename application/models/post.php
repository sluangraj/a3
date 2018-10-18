
<?php
class Post extends Model{
	//get post function
	function getPost($pID){
		$sql =  'SELECT pID, title, content, date, uID, categoryID FROM posts WHERE pID = ?';

		$results = $this->db->getRow($sql, array($pID));
		$post = $results;
		return $post;
	}


	public function getAllPosts($limit = 0){
		if($limit > 0){
			$numposts = ' LIMIT '.$limit;
		}
		$sql =  'SELECT pID, title, content, date, uID, categoryID FROM posts'. $numposts;

		$results = $this->db->execute($sql);
		while ($row=$results->fetchrow()) {
			$posts[] = $row;
		}
		return $posts;
	}


	public function addPost($data){
		$sql = 'INSERT INTO posts (title, content, date, categoryID) VALUES (?,?,?,?)';
		$this->db->execute($sql,$data);
		$message = 'Post added.';
		return $message;
	}


	public function updatePost($data){
		$sql = 'UPDATE posts SET title=?, content=?, date=?, categoryID = ?, where pID=?';
		$this->db->execute($sql, $data);
		$message = 'Post updated';
		return $message;
	}
}
