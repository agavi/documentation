<?php

class Public_PostCommentsErrorView extends BlogPublicBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$this->setAttribute('title', 'PostComments');
	}
}

?>