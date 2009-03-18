<?php
foreach ($t['posts'] as $post)
{
?>
<div class="post">

	<div class="post_title"><h2><a href="<?php echo $post['url']; ?>"><?php echo htmlspecialchars($post['title']); ?></a></h2></div>
	<div class="post_date">Posted on <?php echo $post['posted']; ?> by <a href="#"><?php echo htmlspecialchars($post['author_name']); ?></a></div>
	
	<div class="post_body">
		<?php echo $post['content']; ?>
	</div>
	
	<div class="post_meta">
		<a href="#">5 comments</a> | Tagged: <?php echo htmlspecialchars($post['category_name']); ?>
	</div>

</div>
<?php
}
?>
