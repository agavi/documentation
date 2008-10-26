<?php

class Admin_PostsModel extends BlogAdminBaseModel
{
  /**
   * Obtain a list of posts for visualization
   */

  public function getPostList()
  {
    $sql = "SELECT p.id, p.title, p.category_id, p.posted, p.author_id,
c.name AS category_name, au.screen_name AS author_name 
FROM posts p, categories c, admin_users au
WHERE p.author_id = au.id AND p.category_id = c.id
ORDER BY posted DESC";

    return $this->getPdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  }
  
  /**
   * Obtain a blog post record
   *
   * @param integer $id ID of the target post
   * @return array Fields of the post
   */

  public function getPost($id)
  {
    $stmt = $this->getPdo()->prepare('SELECT * FROM posts WHERE id = ? LIMIT 1');
    $stmt->execute(array($id));
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  /**
   * Save a blog post record
   *
   * Insert or update a record in the posts table. If the ID of the
   * post is specified, that record is updated. Otherwise, a new
   * record is created.
   *
   * @param array $post Array of the post's properties. 
   * @param integer $author_id ID of the author of the post. Ignored when updating an existing post.
   */

  public function savePost($post, $author_id = null)
  {
    // Filter out everything that doesn't belong to the post body. If
    // the binding list isn't the same as the query requires, PDO will
    // whine.  This code would be five times shorter if we used an
    // ORM.

    $fields = array('title', 'category_id', 'post_id', 'content');
    $post = array_intersect_key($post, array_flip($fields));

    if ($post['post_id'])
      {
	$sql = "UPDATE posts SET title = :title, content = :content, category_id = :category_id, posted = NOW() WHERE id = :post_id";
      }
    else
      {
	$post['author_id'] = $author_id;
	$sql = "INSERT INTO posts SET title = :title, content = :content, category_id = :category_id, posted = NOW(), author_id = :author_id;";
      }

    $stmt = $this->getPdo()->prepare($sql);
    $stmt->execute($post);
  }
}

?>