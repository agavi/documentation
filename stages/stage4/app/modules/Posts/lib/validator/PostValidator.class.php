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
		$data = $this->getData($parameterName);
		
		if($data instanceof Posts_PostModel) {
			$post = $data;
		} else {
			$manager = $this->getContext()->getModel('PostManager', 'Posts');
			$post = $manager->retrieveById($data);

			if (null == $post)
			{
				$this->throwError();
				return false;
			}
		}
		
		$this->export($post);
		return true;
	}
}

?>