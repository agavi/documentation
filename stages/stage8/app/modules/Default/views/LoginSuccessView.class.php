<?php

class Default_LoginSuccessView extends BlogDefaultBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$user = $this->getContext()->getUser();
		$res = $this->getResponse();
		
		// set the autologon cookie if requested
		if($rd->hasParameter('remember')) {
			$res->setCookie('autologon[username]', $rd->getParameter('username'), '+1 week');
			$res->setCookie('autologon[password]', $user->getCurrentUser()->getPassword(), '+1 week');
		}
		
		if($user->hasAttribute('redirect', 'org.agavi.bloggie.login')) {
			$this->getResponse()->setRedirect($user->removeAttribute('redirect', 'org.agavi.bloggie.login'));
			return;
		} else {
			$this->getResponse()->setRedirect($this->getContext()->getRouting()->gen('index'));
		}
		
		$this->setupHtml($rd);
		$this->setAttribute('_title', 'Login');
	}
}

?>