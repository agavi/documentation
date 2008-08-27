<?php

class Public_ShowPostSuccessView extends BlogPublicBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    // Load the rendering configuration 
    $this->setupHtml($rd);

    // Obtain the requested post from the model
    $m = $this->context->getModel('Posts', 'Public');

    $post = $m->findPostById($rd->getParameter('post_id'));
    $this->setAttribute('post', $post);
  }
}

?>