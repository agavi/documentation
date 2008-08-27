<!-- Note the full HTML. We haven't dressed the application yet, so it's still ugly and every page has its own HTML layout -->
<html>
<head>
 <title>Our blog's front page</title>
</head>
<body>
 <h1>Our blog</h1>
 
 <!-- Loop over the posts exported by the View -->
 <?php if (! empty($template['posts'])) foreach($template['posts'] as $post):?>
 <hr/>
 <h3>
   <!-- Generate a link to the post, using its title as the caption -->
   <a href="<?php print $ro->gen('ShowPost', array('post_id' => $post['id'])); ?>"><?php print $post['title']; ?></a>
 </h3>
   <!-- the summary line with author name, posting date and category name -->
by <?php print $post['author_name']; ?> @ <?php print $post['posted']; ?> in <strong><?php print $post['category_name']; ?></strong>

 <?php endforeach; ?>
</body>
</html>