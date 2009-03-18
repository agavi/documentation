<?php

class Default_IndexSuccessView extends BlogDefaultBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$this->setAttribute('_title', 'Index');
	}
}

?>