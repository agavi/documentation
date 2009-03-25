<?php

class Posts_AddErrorView extends BlogPostsBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$ro = $this->getContext()->getRouting();
		
		$this->setAttribute('target_url', $ro->gen('posts.create'));
		$this->setAttribute('_title', 'Add a new Post - Error');
	}
}

?>