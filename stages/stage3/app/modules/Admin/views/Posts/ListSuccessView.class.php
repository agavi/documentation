<?php

class Admin_Posts_ListSuccessView extends BlogAdminBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$this->setAttribute('title', 'Posts.List');
	}
}

?>