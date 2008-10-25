<?php

class Public_PostCommentsErrorView extends BlogPublicBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    $this->setupHtml($rd);

    // Ask the validation manager to supply us with a list of errors
    // and export it

    $vm = $this->container->getValidationManager();
    $errors = $vm->getErrors();
    $this->setAttribute('errors', $errors);
  }
}

?>