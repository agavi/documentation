<div>
<h1>Post your opinion!</h1>
<form method="POST" action="<?php print $ro->gen('submit_comment', array('post_id' => $rd->getParameter('post_id'))); ?>">
   <ul>
   <li>E-mail: <input type="text" name="email"/></li>
   <li>Name: <input type="text" name="author_name" value="Anonymous"/></li>
   <li>Your comment: <textarea name="body"></textarea></li>
   <li><input type="submit" value="Post your comment"/></li>
   </ul>
</form>
</div>
<div>
<h1>Latest comments</h1>
   <?php if ($template['comments']) foreach ($template['comments'] as $item): ?>
<div>
<div>From: <?php print $item['name']; ?> @ <?php print $item['posted']; ?></div>
<div><?php print $item['content']; ?></div>
</div>
   <?php endforeach; ?>				     