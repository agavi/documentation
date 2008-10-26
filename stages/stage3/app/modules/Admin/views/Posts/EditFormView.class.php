<?php

class Admin_Posts_EditFormView extends BlogAdminBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    $this->setupHtml($rd);

    // Load the categories

    $categories = $this->context->getModel('Categories', 'Admin')->getCategories();
    $this->setAttribute('categories', $categories);

    if ($post = $this->getAttribute('post'))
      {
	$rq = $this->context->getRequest();
	$rq->setAttribute('populate', array('post' => new AgaviParameterHolder($post)), 'org.agavi.filter.FormPopulationFilter');

	$this->setAttribute('title', 'Edit a blog post');
      }
    else
      $this->setAttribute('title', 'New blog post');
  }
}

?>