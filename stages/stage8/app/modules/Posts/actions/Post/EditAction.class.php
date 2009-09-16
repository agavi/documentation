<?php

class Posts_Post_EditAction extends BlogPostsBaseAction
{
	/**
	 * Serves Write (POST) requests.
	 * 
	 * @param      AgaviRequestDataHolder the incoming request data
	 * 
	 * @return     mixed <ul>
	 *                     <li>A string containing the view name associated
	 *                     with this action; or</li>
	 *                     <li>An array with two indices: the parent module
	 *                     of the view to be executed and the view to be
	 *                     executed.</li>
	 *                   </ul>
	 */
	public function executeWrite(AgaviRequestDataHolder $rd)
	{
		$post = $rd->getParameter('post');
		
		$post->setTitle($rd->getParameter('title'));
		$post->setCategoryId($rd->getParameter('category'));
		$post->setContent($rd->getParameter('content'));
		
		$postManager = $this->getContext()->getModel('PostManager', 'Posts');
		$postManager->storeEdit($post);
		
		return 'Success';
	}
	
	public function executeRead(AgaviRequestDataHolder $rd)
	{
		return 'Input';
	}
	
	public function isSecure()
	{
		return true;
	}
}

?>