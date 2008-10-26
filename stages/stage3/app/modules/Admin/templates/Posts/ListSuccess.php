<h1>Blog posts</h1>
<p>Click on a post's title to edit that post</p>
<p>To create a new post, click <a href="<?php print $ro->gen('admin.posts.create'); ?>">here &raquo;</a>
<table>
<tr>
 <th>Title</th>
 <th>Date</th>
 <th>Category</th>
 <th>Author</th>
</tr>
<?php if ($template['posts']) foreach ($template['posts'] as $post): ?>
<tr>
<td><a href="<?php print $ro->gen('admin.posts.edit', array('post_id' => $post['id'])); ?>"><?php print htmlentities($post['title']); ?></a></td>
<td><?php print $post['posted']; ?></td>
<td><?php print $post['category_name']; ?></td>
<td><?php print $post['author_name']; ?></td>
</tr>

<?php endforeach; ?>
</table>