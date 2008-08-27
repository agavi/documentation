 <h1>Latest posts</h1>
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
