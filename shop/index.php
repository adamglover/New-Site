<?php include('../perch/runtime.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Perch Shop Example Listing Page</title>
	<meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1.0" />
	<?php perch_get_css(); ?>
</head>

<body>
	<header class="layout-header">
		<div class="wrapper">
			<div class="company-name">Perch Example PayPal Shop</div>
			<img src="<?php perch_path('feathers/quill/img/logo.gif'); ?>" alt="Your Logo Here" class="logo"/>
		</div>
		<nav class="main-nav">
			<?php perch_pages_navigation(array(
					'levels'=>1
				));
			?>
		</nav>
	</header>
	<div class="wrapper cols2-nav-left">
		<nav class="sidebar">
			<?php 
			 	perch_shop_categories();
			?>
		</nav>
		<div class="primary-content">		
	 		<h1>Perch Shop Example</h1>
			<p>These pages demonstrate the Perch PayPal Shop integration.</p>
		</div>
	</div>

	<footer class="layout-footer">
		<div class="wrapper">
			<ul class="social-links">
				<li class="twitter"><a href="#" rel="me">Twitter</a></li>
				<li class="facebook"><a href="#" rel="me">Facebook</a></li>
				<li class="flickr"><a href="#" rel="me">Flickr</a></li>
				<li class="linkedin"><a href="#" rel="me">LinkedIn</a></li>
				<li class="rss"><a href="#">RSS</a></li>
			</ul>
			<small>Copyright &copy; <?php echo date("Y"); ?></small>
		</div>
	</footer>
			
	
	
	<?php perch_get_javascript(); ?>
</body>
</html>
