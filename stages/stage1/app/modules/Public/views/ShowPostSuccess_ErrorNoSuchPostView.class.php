<?php

class Public_ShowPostSuccess_ErrorNoSuchPostView extends BlogPublicBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$this->setAttribute('title', 'ShowPost');
	}
}

?>