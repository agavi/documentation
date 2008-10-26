<!-- The PostComments Action is meant to display the new comment form and any comments 
associated with a given blog post -->

<div>
  <h2>Post your opinion!</h2>
  <form method="POST" action="<?php print $ro->gen('submit_comment', array('post_id' => $rd->getParameter('post_id'))); ?>">
  <table>
    <tr>
      <th>
	<h3>Name:</h3>
      </th>
      <th></th>
      <th>
	<h3>E-mail:</h3>
      </th>
    </tr>
    <tr>
      <td>
	<input type="text" name="author_name" value="Anonymous" style="width: 100%; border: thin black solid;"/>
      </td>
      <td width="33%" style="text-align: center">Please be nice!</td>
      <td>
	<input type="text" name="email" style="width: 100%; border: thin black solid;"/>
      </td>
    </tr>
  </table>
  <h3>Your comment:</h3>
  <textarea name="body" style="width: 100%; border: thin black solid;"></textarea>
  <input type="submit" value="Post your comment" style="margin-top: 1em"/>
  </form>
</div>
<div>
  <h3>Latest comments</h3>
  <!-- Iterate over the comments and draw them -->
  <?php if ($template['comments']) foreach ($template['comments'] as $item): ?>
  <hr/>				      
<div class="post-comment">
<div><strong>By: <?php print $item['name']; ?></strong> @ <?php print $item['posted']; ?></div>
<br/>
<div><?php print $item['content']; ?></div>
</div>
<?php endforeach; ?>				     
</div>