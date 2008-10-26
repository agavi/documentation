<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<meta name="description" content="description"/>
<meta name="keywords" content="keywords"/> 
<meta name="author" content="author"/> 
<link rel="stylesheet" type="text/css" href="/public/default.css" media="screen"/>
<base href="<?php print $ro->getBaseHref(); ?>"/>
<title><?php print $template['title'];?></title>
</head>
<body>
<div class="container">
	<div class="title">
   <h1 id="title"><a href="<?php print $ro->gen('home'); ?>">Agavi Demo Blog</a></h1>
   <?php if ($template['title']): ?><h2><?php print $template['title'];?></h2><?php endif;?>
	</div>

	<div class="navigation">
                <?php print $slots['navigation']; ?>
		<div class="clearer"><span></span></div>
	</div>

	<div class="holder_top"></div>
	<div class="holder">
   <?php

   /* Print whatever is in the layer above this - typically an Action's output */
   print $inner; 
   
   ?>
	</div>
	<div class="holder_bottom"></div>

	<div class="holder_top"></div>
	<div class="holder">
		<div class="footer">&#169; 2008 <a href="index.html">bloggie.dev</a>. Valid <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> &amp; <a href="http://validator.w3.org/check?uri=referer">XHTML</a>. Template design by <a href="http://arcsin.se">Arcsin</a>
		</div>
	</div>
	<div class="holder_bottom"></div>
</div>
</body>
</html>