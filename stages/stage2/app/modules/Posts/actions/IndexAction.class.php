<?php

class Posts_IndexAction extends BlogPostsBaseAction
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
				'url' => null
			),
			2 => array(
				'id' => 2,
				'title' => 'Second post',
				'posted' => '2008-07-14 00:01:07',
				'category_name' => 'Agavi',
				'author_name' => 'Admin',
				'url' => null
			)
		);

		$this->setAttribute('posts', $posts);

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