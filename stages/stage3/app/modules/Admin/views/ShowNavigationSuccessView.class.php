<?php

class Admin_ShowNavigationSuccessView extends BlogAdminBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    $this->setupHtml($rd, 'slot');
  }
}

?>