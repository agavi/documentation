<?php

class Admin_LoginAction extends BlogAdminBaseAction
{
  public function executeWrite(AgaviRequestDataHolder $rd)
  {
    $um = $this->context->getModel('Users', 'Admin');

    if ($urec = $um->authenticateAccount($rd->getParameter('username'), $rd->getParameter('password')))
    {
      $us = $this->context->getUser();
      $us->setAuthenticated(true);
      $us->clearCredentials();

      // This is used when saving blog posts
      $us->setAttribute('author_id', $urec['id']);

      return 'ForwardToMain';
    }
    
    return 'Error';
  }

  public function getDefaultViewName()
  {
    return 'Success';
  }
}

?>