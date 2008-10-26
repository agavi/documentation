<?php

/**
 * The base view from which all Admin module views inherit.
 */
class BlogAdminBaseView extends BlogBaseView
{
  public function setupHtml(AgaviRequestDataHolder $rd, $layoutName = 'admin')
  {
    parent::setupHtml($rd, $layoutName);
  }
}

?>