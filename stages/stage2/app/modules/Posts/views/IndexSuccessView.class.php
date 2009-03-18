<?php

class Posts_IndexSuccessView extends BlogPostsBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$ro = $this->getContext()->getRouting();
		
		$posts = array();
		foreach($this->getAttribute('posts') as $p) {
			$p['url'] = $ro->gen('posts.post.show', array('post' => $p['id']));
			$posts[] = $p;
		}
		
		$this->setAttribute('posts', $posts);
		
		$this->setAttribute('_title', 'Latest Posts');
	}
}

?>