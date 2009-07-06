<?php
// alias the post, to make access shorter
$post = $t['post'];
?>
<span class="author">by <?php echo htmlspecialchars($post['author_name']); ?></span>
<span class="category">in <?php echo htmlspecialchars($post['category_name']); ?></span>
<span class="posted"><?php htmlspecialchars($post['posted']); ?></span>
<div class="content"><?php echo $post['content']; ?></div>