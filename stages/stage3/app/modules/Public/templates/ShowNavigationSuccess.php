<?php foreach ($template['categories'] as $category): ?>
<a href="<?php print $ro->gen('show_category', array('category_id' => $category['id'])); ?>"><?php print $category['name']; ?></a>
<?php endforeach; ?>