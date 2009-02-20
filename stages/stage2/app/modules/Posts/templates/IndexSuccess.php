<ul>
<?php
foreach ($t['posts'] as $post)
{
?>
	<li>
		<a href="<?php echo $post['url']; ?>"><?php echo htmlspecialchars($post['title']); ?></a>
		by <?php echo htmlspecialchars($post['author_name']); ?> @ <?php echo $post['posted']; ?> 
		in <?php echo htmlspecialchars($post['category_name']); ?>
	</li>
<?php
}
?>
</ul>