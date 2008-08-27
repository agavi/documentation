<?php

 // For convenience, import the post contents into a local variable
 $post = $template['post']; 
?>

 <h1><?php print $post['title']; ?><sub >by <?php print $post['author_name']; ?></sub></h1>
 <h4>in <?php print $post['category_name']; ?>
 <h5><?php print $post['posted']; ?></h5>
 <div>
  <?php print $post['content']; ?>
 </div>
