<h1>Edit the post</h1>
<p>Type the post and press "Save"</p>

<form method="POST" action="<?php print $ro->gen(null); ?>" id="post">
   <h3>Category:</h3>

   <select name="category_id">
   <?php foreach ($template['categories'] as $category): ?>
   <option value="<?php print $category['id']; ?>"><?php print htmlentities($category['name']); ?></option>
   <?php endforeach; ?>
   </select>

   <h3>Title:</h3>
   <input name="title" style="width: 100%; border: thin black solid;"/>
   <h3>Content:</h3>
   <textarea name="content" style="width: 100%; border: thin black solid; height: 10em;"></textarea>
   <input type="submit" value="Save" style="margin-top: 1em; padding-left: 1em; padding-right: 1em; font-weight: bold;"/>
</form>
