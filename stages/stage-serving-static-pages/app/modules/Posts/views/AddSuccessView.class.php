<?php

class Posts_AddSuccessView extends BlogPostsBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$url = $this->getContext()->getRouting()->gen('posts.post.show', array('post' => $this->getAttribute('post')));
		
		$this->getResponse()->setRedirect($url);
	}
}

?>