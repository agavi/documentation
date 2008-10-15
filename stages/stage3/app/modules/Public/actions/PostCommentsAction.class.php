<?php

class Public_PostCommentsAction extends BlogPublicBaseAction
{
  // The "read" method of the Action retrieves the comments for the
  // given post. 

  public function executeRead(AgaviRequestDataHolder $rd)
  {
    $pm = $this->context->getModel('Comments', 'Public');

    // Load the comments for the given post ID
    $this->setAttribute('comments',
			$pm->getRecentCommentsForPost($rd->getParameter('post_id'), 20));

    return 'Success';
  }

  // The "write" method, on the other hand, is responsible for saving
  // a comment into the database. 

  public function executeWrite(AgaviRequestDataHolder $rd)
  {
    $pm = $this->context->getModel('Comments', 'Public');

    if ($pm->saveComment(
			 $rd->getParameter('post_id'),
			 $rd->getParameter('author_name'),
			 $rd->getParameter('email'),
			 $rd->getParameter('body')))
      
      // If saving was successful, forward the browser to the post
      // page
      return 'ForwardToPost';
    else
      // There was a problem with saving the comment. Show an error
      // screen. 
      return 'Error';
  }
}

?>