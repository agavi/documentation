<div>
<h1>Administrator login</h1>
<div>
<form action="<?php print $ro->gen('admin.login'); ?>" method="POST">
<ul>
   <li>Username: <input name="username"/></li>
   <li>Password: <input name="password" type="password"/></li>
   <li><input type="submit"/></li>
</form>
</div>