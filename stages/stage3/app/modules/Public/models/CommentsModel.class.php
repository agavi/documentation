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
  }
}

?>