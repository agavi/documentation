<?php

class Public_PostCommentsErrorView extends BlogPublicBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    // This is a normal View. Nothing special is done here.
    $this->setupHtml($rd);
  }
}

?>