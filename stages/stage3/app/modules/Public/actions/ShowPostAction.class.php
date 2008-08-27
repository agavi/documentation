<?php

class Public_ShowPostAction extends BlogPublicBaseAction
{
  // Just to demonstrate how an execute() method looks, we'll define
  // executeRead() which corresponds to HTTP GET.

  /**
   * Returns just the View name to be executed next 
   */

  public function executeRead(AgaviRequestDataHolder $rd)
  {
    return 'Success';
  }

  // Note that getDefaultViewName() is missing. Calling this action
  // with any HTTP verb other than GET will cause an error because
  // Agavi wouldn't be able to determine the View and so wouldn't be
  // able to create an HTTP response.
}

?>