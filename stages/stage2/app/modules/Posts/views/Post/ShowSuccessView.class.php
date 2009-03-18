<?php

class Posts_Post_ShowSuccessView extends BlogPostsBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);
		
		$post = $this->getAttribute('post');
		$this->setAttribute('_title', $post['title']);
	}
}

?>