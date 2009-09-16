<?php

class Default_LoginAction extends BlogDefaultBaseAction
{
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
	
	public function executeWrite(AgaviRequestDataHolder $rd)
	{
		try {
			$user = $this->getContext()->getUser();
			$user->login($rd->getParameter('username'), $rd->getParameter('password'));
			return 'Success';
		} catch (AgaviSecurityException $e) {
			return 'Error';
		}
	}
}

?>