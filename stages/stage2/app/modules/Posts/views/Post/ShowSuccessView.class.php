<?php

class Posts_Post_ShowSuccessView extends BlogPostsBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);
		
		$post = array(
			'id' => 1,
			'title' => 'First post',
			'posted' => '2008-07-14 00:01:07',
			'category_name' => 'No category',
			'author_name' => 'Admin',
			'url' => null,
			'content' => '<p>Terrific! This is our first post!</p><p>This is just a first post. It has no actual contents. If you are reading this, things must be working.</p>'
		);

		$this->setAttribute('post', $post);
		
		$this->setAttribute('_title', $post['title']);
	}
}

?>