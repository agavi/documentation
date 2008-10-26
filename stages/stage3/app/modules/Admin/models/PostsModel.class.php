<?php

class Admin_PostsModel extends BlogAdminBaseModel
{
  public function getPostList()
  {
    $sql = "SELECT p.title, p.category_id, p.posted, p.author_id,
c.name AS category_name, au.screen_name AS author_name 
FROM posts p, categories c, admin_users au
WHERE p.author_id = au.id AND p.category_id = c.id
ORDER BY posted DESC";

    return $this->getPdo()->query($sql)->fetchAll();
		
  }
}

?>