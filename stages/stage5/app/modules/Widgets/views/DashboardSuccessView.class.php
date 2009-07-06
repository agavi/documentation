<?php

class Widgets_DashboardSuccessView extends BlogWidgetsBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$this->setupHtml($rd);

		$this->setAttribute('_title', 'Dashboard');
	}
}

?>