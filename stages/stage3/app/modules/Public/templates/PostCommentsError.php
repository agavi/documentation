<h1>There is a problem with your comment</h1>
<p>Please go back and correct the following problems:</p>
<?php 
foreach ($template['errors'] as $field => $e)
foreach ($e['messages'] as $error)
print "<li>In field <strong>$field</strong>: $error</li>";
?>
<br/>
<div>
<p>By the way, this is not how Agavi form validation errors are usually displayed. The Form Population Filter is capable of parsing the validation errors and inserting corresponding error messages and CSS classes into the failed form's HTML, along with the submitted values. There's really no need for a separate page and clicking the back button of your browser.</p>
</div>