<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta name="description" content="Agavi Demo Blog Application"/>
<meta name="keywords" content="agavi, demo, win, god"/> 
<meta name="author" content="Agavi Development Team"/> 
<link rel="stylesheet" type="text/css" href="/public/default.css" media="screen"/>
<base href="<?php print $ro->getBaseHref(); ?>"/>
<title><?php print $template['title'];?></title>
</head>
<body>
<div class="container">
<div class="title" style="background: url(/agavi.png) no-repeat; padding-left: 64px; "/>
  <h1 id="title"><a href="<?php print $ro->gen('home'); ?>">Agavi Demo Blog</a></h1>
  <?php if ($template['title']): ?><h2><?php print $template['title'];?></h2><?php endif;?>
</div>

<div class="navigation">
  
  <?php

  /* Print a slot. The layout configuration specifies which Action
  goes into this slot - the default layout loads ShowNavigation. Admin
  module has its own ShowNavigation, and the base View class for the
  Admin module is instructed to load the admin layout by default, in
  which the Public ShowNavigation is overridden with Admin
  ShowNavigation */

  print $slots['navigation'];

  ?>
<div class="clearer"><span></span></div>
</div>

<div class="holder_top"></div>
<div class="holder">
  <?php

  /* Print whatever is in the layer above this - normally an Action's output */
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