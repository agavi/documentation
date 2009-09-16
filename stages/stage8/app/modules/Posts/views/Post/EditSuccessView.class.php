<?php

class Posts_Post_EditSuccessView extends BlogPostsBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$url = $this->getContext()->getRouting()->gen('index');
		
		$this->getResponse()->setRedirect($url);
	}
}

?>