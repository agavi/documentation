<?php

class Admin_Posts_ListSuccessView extends BlogAdminBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    $this->setupHtml($rd);

    $pm = $this->context->getModel('Posts', 'Admin');

    $this->setAttribute('posts', $pm->getPostList());
    $this->setAttribute('title', 'Post manager');
  }
}

?>