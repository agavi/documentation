<?php

class Admin_Posts_EditFormView extends BlogAdminBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$this->setAttribute('title', 'Posts.Edit');
	}
}

?>