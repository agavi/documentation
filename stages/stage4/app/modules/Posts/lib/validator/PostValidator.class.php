<?php

class Posts_PostValidator extends AgaviValidator
{
	/**
	 * Validates the input
	 * 
	 * @return     bool The input is valid number according to given parameters.
	 */
	protected function validate()
	{
		$parameterName = $this->getArgument();
		$postId = $this->getData($parameterName);
		
		$manager = $this->getContext()->getModel('PostManager', 'Posts');
		$post = $manager->retrieveById($postId);
		
		if (null == $post)
		{
			$this->throwError();
			return false;
		}
		
		$this->export($post);
		return true;
	}
}

?>