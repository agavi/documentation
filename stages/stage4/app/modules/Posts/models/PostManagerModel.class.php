<?php

class Posts_PostManagerModel extends BlogPostsBaseModel
{
	private $posts = array(
		1 => array(
			'id' => 1,
			'title' => 'First post',
			'posted' => '2008-07-14 00:01:07',
			'category_name' => 'No category',
			'author_name' => 'Admin',
			'content' => '<p>Terrific! This is our first post!</p><p>This is just a first post. It has no actual contents. If you are reading this, things must be working.</p>',
		),
		2 => array(
			'id' => 2,
			'title' => 'Second post',
			'posted' => '2008-07-14 00:01:07',
			'category_name' => 'Agavi',
			'author_name' => 'Admin',
			'content' => '<p>It looks like our blog application is working, yay!</p>',
		)
	);

	public function retrieveById($id)
	{
		if (isset($this->posts[$id]))
		{
			return $this->getContext()->getModel('Post', 'Posts', array($this->posts[$id]));
		}
		
		return null;
	}
	
	public function retrieveLatest($limit = 5)
	{
		$cnt = 0;
		reset($this->posts);
		
		$posts = array();
		
		foreach($this->posts as $post) {
			$posts[] = $this->getContext()->getModel('Post', 'Posts', array($post));
			$cnt++;
			if($cnt >= $limit) {
				break;
			}
		}
		
		return $posts;
	}
	
}

?>