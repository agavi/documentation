<?php

class Posts_Post_ShowErrorView extends BlogPostsBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		return $this->createForwardContainer(AgaviConfig::get('actions.error404_module'), AgaviConfig::get('actions.error404_action'));
	}
}

?>