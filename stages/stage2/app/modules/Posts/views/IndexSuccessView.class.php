<?php

class Posts_IndexSuccessView extends BlogPostsBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$this->setAttribute('_title', 'Latest Posts');
		
		$posts = array(
			array(
				'id' => 1,
				'title' => 'First post',
				'posted' => '2008-07-14 00:01:07',
				'category_name' => 'No category',
				'author_name' => 'Admin',
				'url' => null
			),
			array(
				'id' => 2,
				'title' => 'Second post',
				'posted' => '2008-07-14 00:01:07',
				'category_name' => 'Agavi',
				'author_name' => 'Admin',
				'url' => null
			)
		);
		
		$this->setAttribute('posts', $posts);
	}
}

?>