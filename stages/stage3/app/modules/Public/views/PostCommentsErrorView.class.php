<?php

class Public_PostCommentsErrorView extends BlogPublicBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    $this->setupHtml($rd);

    $vm = $this->container->getValidationManager();
    $errors = $vm->getErrors();
    $this->setAttribute('errors', $errors);
  }
}

?>