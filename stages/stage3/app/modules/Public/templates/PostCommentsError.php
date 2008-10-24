<h1>Error</h1>
<p>Error(s) while saving your comment:</p>
<?php 
foreach ($template['errors'] as $field => $e)
foreach ($e['messages'] as $error)
print "<li>In field <strong>$field</strong>: $error</li>";
?>
