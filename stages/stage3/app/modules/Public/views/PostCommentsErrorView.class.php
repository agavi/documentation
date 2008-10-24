<?php

class Public_PostCommentsErrorView extends BlogPublicBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    $this->setupHtml($rd);

    $vm = $this->container->getValidationManager();
    $errors = $vm->getErrors();
    print '<pre>'; var_dump($errors);die;
    $this->setAttribute('errors', $errors);
  }
}

?>