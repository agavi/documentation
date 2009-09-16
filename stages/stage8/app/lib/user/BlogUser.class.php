<?php

class BlogUser extends AgaviRbacSecurityUser
{
	protected $user;

	public function startup()
	{
		// call parent
		parent::startup();

		$reqData = $this->getContext()->getRequest()->getRequestData();

		if(!$this->isAuthenticated() && $reqData->hasCookie('autologon')) {
			$login = $reqData->getCookie('autologon');
	
			try {
				$this->login($login['username'], $login['password'], true);
			} catch(AgaviSecurityException $e) {
				$response = $this->getContext()->getController()->getGlobalResponse();

				// Unset the the login cookie since it didn't work
				$response->setCookie('autologon[username]', false);
				$response->setCookie('autologon[password]', false);
			}
		}
	}
	
	public function login($username, $password, $isPasswordHashed = false)
	{
		$userManager = $this->getContext()->getModel('UserManager');
		$user = $userManager->retrieveById($username);

		if(!$user->getId()) {
			throw new AgaviSecurityException('username error');
		}

		if(!$isPasswordHashed) {
			$password = sha1($password . $user->getSalt());
		}

		if($password != $user->getPassword()) {
			throw new AgaviSecurityException('password error');
		}
	
		$this->setAttribute('id', $user->getId(), 'org.bloggie.user');

		$this->setAuthenticated(true);
		$this->grantRoles($user->getRoles());

		$this->user = $user;

		return true;
	}

	public function logout()
	{
		$this->clearCredentials();
		$this->setAuthenticated(false);
	}

	public function getCurrentUser()
	{
		if ($this->isAuthenticated()) {
			return $this->user;
		}
	}
}

?>