<!-- The PostComments Action is meant to display the new comment form and any comments 
associated with a given blog post -->

<div>
<h3>Post your opinion!</h3>
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