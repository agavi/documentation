<?php

class Admin_LoginForwardToMainView extends BlogAdminBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    $url = $this->context->getRouting()->gen('admin', array(), array('relative' => false));
    $this->container->getResponse()->setRedirect($url);

    return null;
  }
}

?>