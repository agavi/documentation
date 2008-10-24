<?php

class Public_CategoriesModel extends BlogPublicBaseModel
{
  public function getCategoriesForNavigation()
  {
    $conn = $this->getPdo();
    return $conn->query('SELECT * FROM categories ORDER BY name DESC limit 5')->fetchAll();
  }
}

?>