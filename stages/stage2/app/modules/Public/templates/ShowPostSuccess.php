<!-- Note the full HTML. We haven't dressed the application yet, so it's still ugly and every page has its own HTML layout -->

<?php

 // For convenience, import the post contents into a local variable
 $post = $template['post']; 
?>
<html>
<head>
<title><?php print $post['title']; ?></title>
</head>
<body>
 <h1><?php print $post['title']; ?><sub >by <?php print $post['author_name']; ?></sub></h1>
 <h4>in <?php print $post['category_name']; ?>
 <h5><?php print $post['posted']; ?></h5>
 <div>
  <?php print $post['content']; ?>
 </div>
</body>
</html>