<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<base href="<?php echo $ro->getBaseHref(); ?>" />
		<title><?php if(isset($t['_title'])) echo htmlspecialchars($t['_title']) . ' - '; echo AgaviConfig::get('core.app_name'); ?></title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
	<div id="header">
		<div class="center_wrapper">

			<div id="toplinks">
				<div id="toplinks_inner">
					<a href="#">Sitemap</a> | <a href="#">Privacy Policy</a> | <a href="#">FAQ</a>
				</div>
			</div>
			<div class="clearer">&nbsp;</div>

			<div id="site_title">
				<h1><a href="#">Bloggie</a></h1>
				<p>A demo blog application built on agavi</p>
			</div>

		</div>
	</div>

	<div id="navigation">
		<div class="center_wrapper">

			<ul>
				<li class="current_page_item"><a href="index.html">Home</a></li>
				<li><a href="blog_post.html">Blog Post</a></li>
				<li><a href="style_demo.html">Style Demo</a></li>
				<li><a href="archives.html">Archives</a></li>
				<li><a href="empty_page.html">Empty Page</a></li>
			</ul>

			<div class="clearer">&nbsp;</div>

		</div>
	</div>
	
	<div id="main_wrapper_outer">
		<div id="main_wrapper_inner">
			<div class="center_wrapper">

				<div class="left" id="main">
					<div id="main_content">
						
						<!-- this is where the main content will be placed -->
						<?php echo $inner; ?>
						
					</div>
				</div>

				<div class="right" id="sidebar">

					<div id="sidebar_content">

						<div class="box">

							<div class="box_title">About</div>

							<div class="box_content">
								Aenean sit amet dui at felis lobortis dignissim. Pellentesque risus nibh, feugiat in, convallis id, congue ac, sem. Sed tempor neque in quam.
							</div>

						</div>

						<div class="box">

							<div class="box_title">Categories</div>

							<div class="box_content">
								<ul>
									<li><a href="http://templates.arcsin.se/category/website-templates/">Website Templates</a></li>
									<li><a href="http://templates.arcsin.se/category/wordpress-themes/">Wordpress Themes</a></li>
									<li><a href="http://templates.arcsin.se/professional-templates/">Professional Templates</a></li>
									<li><a href="http://templates.arcsin.se/category/blogger-templates/">Blogger Templates</a></li>
									<li><a href="http://templates.arcsin.se/category/joomla-templates/">Joomla Templates</a></li>
								</ul>
							</div>

						</div>

						<div class="box">

							<div class="box_title">Resources</div>

							<div class="box_content">
								<ul>
									<li><a href="http://templates.arcsin.se/">Arcsin Web Templates</a></li>
									<li><a href="http://www.google.com/">Google</a> - Web Search</li>
									<li><a href="http://www.w3schools.com/">W3Schools</a> - Online Web Tutorials</li>
									<li><a href="http://www.wordpress.org/">WordPress</a> - Blog Platform</li>
									<li><a href="http://cakephp.org/">CakePHP</a> - PHP Framework</li>
								</ul>
							</div>

						</div>

						<div class="box">

							<div class="box_title">Gallery</div>

							<div class="box_content">

								<div class="thumbnails">

									<a href="#" class="thumb"><img src="sample-thumbnail.jpg" width="75" height="75" alt="" /></a>
									<a href="#" class="thumb"><img src="sample-thumbnail.jpg" width="75" height="75" alt="" /></a>
									<a href="#" class="thumb"><img src="sample-thumbnail.jpg" width="75" height="75" alt="" /></a>
									<a href="#" class="thumb"><img src="sample-thumbnail.jpg" width="75" height="75" alt="" /></a>
									<a href="#" class="thumb"><img src="sample-thumbnail.jpg" width="75" height="75" alt="" /></a>
									<a href="#" class="thumb"><img src="sample-thumbnail.jpg" width="75" height="75" alt="" /></a>

									<div class="clearer">&nbsp;</div>

								</div>

							</div>

						</div>

					</div>

				</div>

				<div class="clearer">&nbsp;</div>

			</div>
		</div>
	</div>

	<div id="dashboard">
		<div id="dashboard_content">
			<div class="center_wrapper">

				<div class="col3 left">
					<div class="col3_content">

						<h4>Tincidunt</h4>
						<ul>
							<li><a href="#">Consequat molestie</a></li>
							<li><a href="#">Sem justo</a></li>
							<li><a href="#">Semper eros</a></li>
							<li><a href="#">Magna sed purus</a></li>
							<li><a href="#">Tincidunt morbi</a></li>
						</ul>

					</div>
				</div>

				<div class="col3mid left">
					<div class="col3_content">

						<h4>Fermentum</h4>
						<ul>
							<li><a href="#">Semper fermentum</a></li>
							<li><a href="#">Sem justo</a></li>
							<li><a href="#">Magna sed purus</a></li>
							<li><a href="#">Tincidunt nisl</a></li>						
							<li><a href="#">Consequat molestie</a></li>
						</ul>

					</div>
				</div>

				<div class="col3 right">
					<div class="col3_content">

						<h4>Praesent</h4>
						<ul>
							<li><a href="#">Semper lobortis</a></li>
							<li><a href="#">Consequat molestie</a></li>				
							<li><a href="#">Magna sed purus</a></li>
							<li><a href="#">Sem morbi</a></li>
							<li><a href="#">Tincidunt sed</a></li>
						</ul>

					</div>
				</div>

				<div class="clearer">&nbsp;</div>

			</div>
		</div>
	</div>

	<div id="footer">
		<div class="center_wrapper">

			<div class="left">
				&copy; 2008 Website.com - Your Website Slogan
			</div>
			<div class="right">
				<a href="http://templates.arcsin.se/">Website template</a> by <a href="http://arcsin.se/">Arcsin</a> 
			</div>

			<div class="clearer">&nbsp;</div>

		</div>
	</div>
	</body>
</html>
