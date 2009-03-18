<?php

class Posts_IndexSuccessView extends BlogPostsBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$ro = $this->getContext()->getRouting();
		
		$posts = array();
		
		foreach($this->getAttribute('posts') as $p)
		{
			$post = $p->toArray();
			$post['url'] = $ro->gen('posts.post.show', array('post' => $p->getId()));
			$posts[] = $post;
		}
		
		$this->setAttribute('posts', $posts);
		
		$this->setAttribute('_title', 'Latest Posts');
	}
}

?>