<?php

class Admin_LoginAction extends BlogAdminBaseAction
{
  public function executeWrite(AgaviRequestDataHolder $rd)
  {
    $um = $this->context->getModel('Users', 'Admin');

    // Attempt to authenticate
    if ($urec = $um->authenticateAccount($rd->getParameter('username'), $rd->getParameter('password')))
    {
      // We found the user record, let's start the session
      $us = $this->context->getUser();
      $us->setAuthenticated(true);
      $us->clearCredentials();

      // This is the identity of the user. It persists in the
      // session. We use it in some other places, for example, when
      // creating a new post.

      $us->setAttribute('author_id', $urec['id']);

      // Now that we're authenticated, perform a redirect to admin
      // home page

      return 'Success';
    }
    
    // No such user in the database, complain
    return 'Error';
  }

  public function getDefaultViewName()
  {
    // Show the login form
    return 'RequireLogin';
  }
}

?>