<?php

class Admin_ShowNavigationAction extends BlogAdminBaseAction
{
  public function getDefaultViewName()
  {
    return 'Success';
  }

  public function isSecure()
  {
    return false;
  }
}

?>