<?php

class Admin_IndexAction extends BlogAdminBaseAction
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