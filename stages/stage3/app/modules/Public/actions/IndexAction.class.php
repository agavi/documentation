<?php

  /**
   * This Action doesn't change anything in the application state, so
   * it has no execute() methods. 
   */

class Public_IndexAction extends BlogPublicBaseAction
{
  /**
   * Returns the default view name which is used by Agavi to find the
   * View as a last resort (e.g. Public_IndexSuccessView)
   */

  public function getDefaultViewName()
  {
    return 'Success';
  }
}

?>