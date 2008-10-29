<?php

  // This View redirects the browser back to the post from which the
  // comment was submitted, this refreshing the page

class Public_PostCommentsSuccessView extends BlogPublicBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    // The post ID was passed to us from the comment submission form
    $post_id = $rd->getParameter('post_id');

    // Generate the URL to ShowPost action
    $url = $this->context->getRouting()->gen('ShowPost', array('post_id' => $post_id));
    
    // Tell Agavi to redirect there
    $this->getResponse()->setRedirect($url);
  }
}

?>