<?php

  /**
   * This Model is used to retrieve posts and their contents
   */

class Public_PostsModel extends BlogBaseModel
{
  /**
   * Return the list of posts that should be on the front page
   *
   * Selects the post summary, category name and author's screen name
   * @return array Array of posts (id, title, posted, author_name, category_name)
   */

  public function findFrontPagePosts()
  {
    // Obtain the connection identifier from our base class
    // This works out to $this->context->getDatabaseManager()->getConnection()

    $conn = $this->getPdo();

    $sql = 'SELECT p.id, p.title, p.posted , a.screen_name AS author_name, c.name AS category_name
           FROM posts p
           LEFT JOIN admin_users a ON p.author_id = a.id
           LEFT JOIN categories c ON p.category_id = c.id
           ORDER BY posted DESC LIMIT 20';
    
    return $conn->query($sql)->fetchAll();
  }

  /**
   * Fetch a post by ID
   *
   * Retrieve a post record by given ID
   * @param integer $id ID of the requested post
   * @return array Post contents (all post fields, category_name, author_name)
   */

  public function findPostById($id)
  {
    $conn = $this->getPdo();
    
    $sth = $conn->prepare('SELECT p.*, a.screen_name AS author_name, c.name AS category_name
           FROM posts p
           LEFT JOIN admin_users a ON p.author_id = a.id
           LEFT JOIN categories c ON p.category_id = c.id
           WHERE p.id = ? LIMIT 1');
    $sth->execute(array($id));
    
    return $sth->fetch(PDO::FETCH_ASSOC);
  }
  
}

?>