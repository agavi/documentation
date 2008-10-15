<div>
<h1>Post your opinion!</h1>
<form method="POST" action="<?php print $ro->gen('submit_comment', array('post_id' => $rd->getParameter('post_id'))); ?>">
   <ul>
   <li>E-mail: <input type="text" name="email"/></li>
   <li>Name: <input type="text" name="author_name" value="Anonymous"/></li>
   <li>Your comment: <textarea name="body"></textarea></li>
   </ul>
</div>