<!-- Display the post itself -->
<?php
$post = $template['post']; 
?>

<h1><?php print $post['title']; ?><sub >by <?php print $post['author_name']; ?></sub></h1>
<h4>in <?php print $post['category_name']; ?>
<h5><?php print $post['posted']; ?></h5>
<div>
  <?php print $post['content']; ?>
</div>

<!-- Display the comments slot -->
<h2>Comments</h2>
<div>
  <?php print $slots['comments']; ?>
</div>