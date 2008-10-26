<h1>Blog posts</h1>
<p>Click on a post's title to edit that post</p>
<table>
<tr>
 <th>Title</th>
 <th>Date</th>
 <th>Author</th>
</tr>
<?php if ($template['posts']) foreach ($template['posts'] as $post): ?>

<tr>
<td><a href="<?php print $ro->gen('admin.posts.edit', array('post_id' => $post['author_id'])); ?>"><?php print htmlentities($post['title']); ?></a></td>
<td><?php print $post['posted']; ?></td>
<td><?php print $post['author_name']; ?></td>
</tr>

<?php endforeach; ?>
</table>