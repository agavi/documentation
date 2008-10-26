<?php

class Admin_CategoriesModel extends BlogAdminBaseModel
{
  public function getCategories()
  {
    return $this->getPdo()->query('SELECT id, name FROM categories ORDER BY name ASC')->fetchAll(PDO::FETCH_ASSOC);
  }
}

?>