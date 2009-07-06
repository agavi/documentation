<?php

class Widgets_FooterSuccessView extends BlogWidgetsBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$this->setAttribute('_title', 'Footer');
	}
}

?>