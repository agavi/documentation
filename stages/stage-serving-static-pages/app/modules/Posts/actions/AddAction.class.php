<?php

class Posts_AddAction extends BlogPostsBaseAction
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
		$ctx = $this->getContext();
		
		$data = array(
			'title' => $rd->getParameter('title'),
			'content' => $rd->getParameter('content'),
			'category_id' => $rd->getParameter('category'),
			'author_id' => 1, // let's bind that to a fixed value for the moment
		);
		
		$post = $ctx->getModel('Post', 'Posts', array($data));
		$postManager = $ctx->getModel('PostManager', 'Posts');
		
		$postId = $postManager->storeNew($post);
		
		// we need a post with at least and id and a title to create an url
		// so we reload the post from the database
		
		$post = $postManager->retrieveById($postId);
		
		$this->setAttribute('post', $post);
		
		return 'Success';
	}
	
	/**
	 * Returns the default view if the action does not serve the request
	 * method used.
	 *
	 * @return     mixed <ul>
	 *                     <li>A string containing the view name associated
	 *                     with this action; or</li>
	 *                     <li>An array with two indices: the parent module
	 *                     of the view to be executed and the view to be
	 *                     executed.</li>
	 *                   </ul>
	 */
	public function getDefaultViewName()
	{
		return 'Input';
	}
}

?>