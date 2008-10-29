<?php

class Admin_LoginSuccessView extends BlogAdminBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    /* Redirect to the admin index page */

    $url = $this->context->getRouting()->gen('admin', array(), array('relative' => false));
    $this->container->getResponse()->setRedirect($url);

    return null;
  }
}

?>