<?php

class PostRoutingCallback extends AgaviRoutingCallback
{
	/**
	 * Gets executed when the route of this callback is about to be reverse 
	 * generated into an URL.
	 *
	 * @param      array The default parameters stored in the route.
	 * @param      array The parameters the user supplied to AgaviRouting::gen().
	 * @param      array The options the user supplied to AgaviRouting::gen().
	 *
	 * @return     bool  Whether this route part should be generated.
	 */
	public function onGenerate(array $defaultParameters, array &$userParameters, array &$userOptions)
	{
		$post = $userParameters['post']->getValue();
		
		$routing = $this->getContext()->getRouting();
		
		$userParameters['post'] = $routing->createValue($post->getId());
		$userParameters['title'] = $routing->createValue(preg_replace('/\W/', '-', $post->getTitle()));
		
		return true;
	}
}

?>