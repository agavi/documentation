<?php

class Public_PostCommentsSuccessView extends BlogPublicBaseView
{
  public function executeHtml(AgaviRequestDataHolder $rd)
  {
    // This Action is meant to be executed in a slot, so it just loads
    // the slot layout. If we wanted this action to be able to execute
    // it normally, we'd have a check here that'd load the normal layout

    $this->loadLayout('slot');
  }
}

?>