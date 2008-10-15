<?php

class Public_PostCommentsSuccessView extends BlogPublicBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    $this->loadLayout('slot');
  }
}

?>