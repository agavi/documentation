<?php

/**
 * The base action from which all Widgets module actions inherit.
 */
class BlogWidgetsBaseAction extends BlogBaseAction
{

	/**
	 * Whether or not this action is "simple", i.e. doesn't use validation etc.
	 *
	 * @return     bool true, if this action should act in simple mode, or false.
	 */
	public function isSimple()
	{
		return false;
	}
	
}

?>