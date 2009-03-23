<?php

class Posts_Post_ShowSuccessView extends BlogPostsBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);
		
		$p = $this->getAttribute('post');
		$post = $p->toArray();
		$post['url'] = $this->getContext()->getRouting()->gen('posts.post.show', array('post' => $p->getId()));
		
		$this->setAttribute('post', $post);
		
		$isList = $this->getContainer()->getParameter('is_slot', false);
		
		if($isList) {
			$headlineSize = 2;
			$linkHeadline = true;
			$displayComments = false;
		} else {
			$headlineSize = 1;
			$linkHeadline = false;
			$displayComments = true;
		}
		
		$this->setAttribute('headline_size', $headlineSize);
		$this->setAttribute('link_headline', $linkHeadline);
		$this->setAttribute('display_comments', $displayComments);
		
		$this->setAttribute('_title', $post['title']);
	}
}
?>