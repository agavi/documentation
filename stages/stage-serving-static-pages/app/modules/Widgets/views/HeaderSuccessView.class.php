<?php

class Widgets_HeaderSuccessView extends BlogWidgetsBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$this->setAttribute('_title', 'Header');
	}
}

?>