<?php

class Default_LoginInputView extends BlogDefaultBaseView
{
	public function executeHtml(AgaviRequestDataHolder $rd)
	{
		$user = $this->getContext()->getUser();
		if($this->getContainer()->hasAttributeNamespace('org.agavi.controller.forwards.login')) {
			// we were redirected to the login form by the controller because the requested action required security
			// so store the input URL in the session for a redirect after login
			$user->setAttribute('redirect', $this->getContext()->getRequest()->getUrl(), 'org.agavi.bloggie.login');
		} else {
			// clear the redirect URL just to be sure
			// but only if request method is "read", i.e. if the login form is served via GET!
			$user->removeAttribute('redirect', 'org.agavi.bloggie.login');
		}
		
		$this->setupHtml($rd);
		$this->setAttribute('_title', 'Login');
	}
}

?>