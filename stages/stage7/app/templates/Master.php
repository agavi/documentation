<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<base href="<?php echo $ro->getBaseHref(); ?>" />
		<title><?php if(isset($t['_title'])) echo htmlspecialchars($t['_title']) . ' - '; echo AgaviConfig::get('core.app_name'); ?></title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>

<?php echo $slots['header']; ?>
<?php echo $slots['navigation']; ?>
	
	<div id="main_wrapper_outer">
		<div id="main_wrapper_inner">
			<div class="center_wrapper">

				<div class="left" id="main">
					<div id="main_content">
						
						<!-- this is where the main content will be placed -->
						<?php echo $inner; ?>
						
					</div>
				</div>

				<?php echo $slots['sidebar']; ?>

				<div class="clearer">&#160;;</div>

			</div>
		</div>
	</div>

	<?php echo $slots['dashboard']; ?>

	<?php echo $slots['footer']; ?>
	</body>
</html>
