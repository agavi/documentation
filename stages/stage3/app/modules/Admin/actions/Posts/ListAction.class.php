<?php

class Admin_Posts_ListAction extends BlogAdminBaseAction
{
  public function getDefaultViewName()
  {
    return 'Success';
  }

  public function isSecure()
  {
    return true;
  }
}

?>