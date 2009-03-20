<?php
// alias the post, to make access shorter
$post = $t['post'];

$headline = htmlspecialchars($post['title']);

if($t['link_headline']) {
	$headline = sprintf(
		'<a href="%1$s">%2$s</a>',
		$post['url'],
		$headline
	);
}

$headline = sprintf(
	'<h%1$s>%2$s</h%1$s>',
	$t['headline_size'],
	$headline
);

?>
<div class="post">

	<div class="post_title"><?php echo $headline; ?></div>
	<div class="post_date">Posted on <?php htmlspecialchars($post['posted']); ?> by <a href="#"><?php echo htmlspecialchars($post['author_name']); ?></a></div>
	
	<div class="post_body">
		<?php echo $post['content']; ?>
	</div>
	
	<div class="post_meta">
		<?php
	if(!$t['display_comments']) {
		?>
		<a href="#">5 comments</a> | 
		<?php
	}
		?>
		Tagged: <a href="#"><?php echo htmlspecialchars($post['category_name']); ?></a>
	</div>

</div>