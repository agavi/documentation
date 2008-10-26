<!-- Display the post itself -->
<?php
$post = $template['post']; 
?>

<h1><?php print $post['title']; ?></h1>
<div>
  Posted by <strong><?php print $post['author_name']; ?></strong> at <?php print $post['posted']; ?> (<?php print $post['category_name']; ?>)
</div>

<div style="padding: 2em; background: #ffd; font-size: 10pt">
  <?php print $post['content']; ?>
</div>

<!-- Display the comments slot -->
<div style="background: #eee; padding: 1em;">
  <?php print $slots['comments']; ?>
</div>