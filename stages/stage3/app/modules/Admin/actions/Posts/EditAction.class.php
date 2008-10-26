<?php

class Admin_Posts_EditAction extends BlogAdminBaseAction
{
  public function executeRead(AgaviRequestDataHolder $rd)
  {
    $pm = $this->context->getModel('Posts', 'Admin');
    $post_id = $rd->getParameter('post_id');

    // Look up the post and make it available to the view & template
    if ($post_id)
      {
	if ($post = $pm->getPost($rd->getParameter('post_id')))
	  {
	    $this->setAttribute('post', $post);
	    return 'Form';
	  }
	else
	  // The post with this ID wasn't found
	  return 'Error'; 
      }

    // The ID wasn't supplied, so the form is blank - we're editing a new post
    return 'Form';
  }

  public function executeWrite(AgaviRequestDataHolder $rd)
  {
    $post = $rd->getParameters();

    $pm = $this->context->getModel('Posts', 'Admin');

    $us = $this->context->getUser();
    // The author_id attribute is set by the login procedure
    $pm->savePost($post, $us->getAttribute('author_id'));

    return 'RedirectToList';
  }

  public function getDefaultViewName()
  {
    return 'Form';
  }

  public function isSecure()
  {
    return true;
  }
}

?>