<?php

class Public_IndexSuccessView extends BlogPublicBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    // Load the rendering configuration. 
    $this->setupHtml($rd);

    // Obtain the Posts model from this module
    $m = $this->context->getModel('Posts', 'Public');

    // Obtain the list of most recent posts from the model and export
    // it so that templates can access it
    $this->setAttribute('posts', $m->findFrontpagePosts());

    // Set the page title
    $this->setAttribute('title', 'A Bloggie blog!');
  }
}

?>