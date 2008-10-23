<?php

class Public_ShowPostSuccessView extends BlogPublicBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    // Load the rendering configuration. This is the same as calling loadLayout()
    $this->setupHtml($rd);

    // Obtain the requested post from the model
    $m = $this->context->getModel('Posts', 'Public');
    $post = $m->findPostById($rd->getParameter('post_id'));

    // Export the post contents to the template, for rendering
    $this->setAttribute('post', $post);

    // Set up a slot for the comments. Notice that PostComments action
    // needs parameter "post_id" to operate. This parameter was
    // already given to ShowPost and so it's available in $rd, which
    // is implicitly passed to the slotted Action unless you tell it otherwise.

    $layer = $this->getLayer('content');
    $layer->setSlot('comments', $this->createSlotContainer('Public', 'PostComments'));
  }
}

?>