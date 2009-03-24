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
	
	public function executeRss(AgaviRequestDataHolder $rd)
	{
		$ro = $this->getContext()->getRouting();
		$entries = array();
		
		$data = array(
			'title'       => 'Latest Posts', //required
			'lastUpdate'  => null, // optional
			'link'        => $ro->gen(null, array(), array('relative' => false)), //required
			'charset'     => 'UTF-8', // required
			'published'   => time(), //optional
			'description' => 'The latest posts from the agavi tutorial blog application', //optional
			'author'      => null, //optional
			'language'    => 'en', // optional
			'entries'     => $entries
		);
		
		foreach($this->getAttribute('posts') as $p)
		{
			$entries[] = array(
				'title'       => $p->getTitle(), //required
				'lastUpdate'  => $p->getPosted(), // optional
				'link'        => $ro->gen('posts.post.show', array('post' => $p), array('relative' => false)), //required
				'charset'     => 'UTF-8', // required
				'published'   => $p->getPosted(), //optional
				'description' => $p->getContents(), //optional
				'author'      => $p->getAuthorName(), //optional
				'language'    => 'en', // optional
			);
		}
		 
		require 'Zend/Feed.php';
		$feed = Zend_Feed::importArray($data, 'rss');
		
		return $feed->saveXml();
	}
}

?>