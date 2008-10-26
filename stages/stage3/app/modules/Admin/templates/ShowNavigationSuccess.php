<?php if ($us->isAuthenticated()): ?>
<strong><a href="<?php print $ro->gen('admin.posts.create'); ?>">Create post</a></strong>
<strong><a href="<?php print $ro->gen('admin.posts.list'); ?>">Post management</a></strong>
<?php endif; ?>
