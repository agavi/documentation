<?php

  // This View redirects the browser back to the post from which the
  // comment was submitted, this refreshing the page

class Public_PostCommentsForwardToPostView extends BlogPublicBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    $post_id = $rd->getParameter('post_id');

    $url = $this->context->getRouting()->gen('ShowPost', array('post_id' => $post_id));
    
    $this->getResponse()->setRedirect($url);
  }
}

?>