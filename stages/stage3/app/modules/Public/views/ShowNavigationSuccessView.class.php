<?php

class Public_ShowNavigationSuccessView extends BlogPublicBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    $this->loadLayout('slot');
  }
}

?>