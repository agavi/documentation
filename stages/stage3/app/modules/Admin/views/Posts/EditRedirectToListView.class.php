<?php

class Admin_Posts_EditRedirectToListView extends BlogAdminBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    $url = $this->context->getRouting()->gen('admin.posts.list', array(), array('relative' => false));
    $this->container->getResponse()->setRedirect($url);
  }
}

?>