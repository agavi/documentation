<?php
// alias the post, to make access shorter
$post = $t['post'];
?>
<div class="post">

	<div class="post_title"><h1><?php echo htmlspecialchars($post['title']); ?></h1></div>
	<div class="post_date">Posted on <?php htmlspecialchars($post['posted']); ?> by <a href="#"><?php echo htmlspecialchars($post['author_name']); ?></a></div>
	
	<div class="post_body">
		<?php echo $post['content']; ?>
	</div>
	
	<div class="post_meta">
		Tagged: <a href="#"><?php echo htmlspecialchars($post['category_name']); ?></a>
	</div>

</div>