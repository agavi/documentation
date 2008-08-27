<?php

/**
 * The base model from which all project models inherit.
 */
class BlogBaseModel extends AgaviModel
{
  /**
   * Return the PDO resource needed to access the blog database
   * @return PDO
   */
  protected function getPdo()
  {
    return $this->context->getDatabaseManager()->getDatabase()->getConnection('blog');
  }
}

?>