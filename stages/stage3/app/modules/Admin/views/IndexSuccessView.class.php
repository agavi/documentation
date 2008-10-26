<?php

class Admin_IndexSuccessView extends BlogAdminBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$this->setAttribute('title', 'Index');
	}
}

?>