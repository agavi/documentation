<?php

class Public_CommentsModel extends BlogPublicBaseModel
{
  /**
   * Locate recent comments for this post
   *
   * Look up the most recent comments made on this post. Comments are
   * sorted by their timestamp in the descending order
   **/
  public function getRecentCommentsForPost($post_id, $count = 20)
  {
    $pdo = $this->getPdo();
    $sql = "SELECT name, email, content, posted FROM comments WHERE post_id = ? ORDER BY posted DESC LIMIT " . (int) $count;

    $sth = $pdo->prepare($sql);
    $sth->execute(array($post_id));
    
    while ($row = $sth->fetch(PDO::FETCH_ASSOC))
      $results[] = $row;

    return $results;
  }

  /**
   * Save a comment
   *
   * Save a comment to the database, attaching it to specified post
   * ID. The comment will be timestamped automatically.
   * 
   * @param integer $post_id ID of the parent post for this comment
   * @param string $name Name of the submitter
   * @param string $email E-mail address of the submitter
   * @param string $body Contents of the post
   */
  public function saveComment($post_id, $name, $email, $body)
  {
    $sql = "INSERT INTO comments SET post_id = ?, name = ?, email = ?, content = ?, posted = NOW()";
    
    $pdo = $this->getPdo();
    $sth = $pdo->prepare($sql);
    $sth->execute(array($post_id, $name, $email, $body));

    return true;
  }
}

?>