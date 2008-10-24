<?php

class Public_ShowNavigationAction extends BlogPublicBaseAction
{
  public function execute(AgaviRequestDataHolder $rd)
  {
    $this->setAttribute('categories', $this->context->getModel('Categories', 'Public')->getCategoriesForNavigation());

    return 'Success';
  }

  public function getDefaultViewName()
  {
    return 'Success';
  }
}

?>