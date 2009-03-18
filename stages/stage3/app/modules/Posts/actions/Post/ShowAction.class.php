<?php

class Posts_Post_ShowAction extends BlogPostsBaseAction
{
	public function executeRead(AgaviRequestDataHolder $rd)
	{

		$posts = array(
			1 => array(
				'id' => 1,
				'title' => 'First post',
				'posted' => '2008-07-14 00:01:07',
				'category_name' => 'No category',
				'author_name' => 'Admin',
				'url' => null,
				'content' => '<p>Terrific! This is our first post!</p><p>This is just a first post. It has no actual contents. If you are reading this, things must be working.</p>',
			),
			2 => array(
				'id' => 2,
				'title' => 'Second post',
				'posted' => '2008-07-14 00:01:07',
				'category_name' => 'Agavi',
				'author_name' => 'Admin',
				'url' => null,
				'content' => '<p>It looks like our blog application is working, yay!</p>', 
			)
		);

		$postId = $rd->getParameter('post');
		$post = $posts[$postId];
		
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
		return 'Success';
	}
}

?>