<?php

class Posts_IndexSuccessView extends BlogPostsBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);
		
		$contentLayer = $this->getLayer('content');

		$ro = $this->getContext()->getRouting();
		
		$posts = array();
		
		foreach($this->getAttribute('posts') as $p)
		{
			/* register one slot per post */
			$contentLayer->setSlot('post'.$p->getId(), $this->createSlotContainer('Posts', 'Post.Show', array('post' => $p)));
		}
		
		$this->setAttribute('_title', 'Latest Posts');
	}
}

?>