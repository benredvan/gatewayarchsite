<html>
<head>
	<title>Gateway Arch - Dev Site</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="/images/logo.svg" itemprop="image">
	<meta content="/images/logo.svg" itemprop="logo"><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo(get_bloginfo("template_url")); ?>/css/header.css">
	<link rel="stylesheet" type="text/css" href="<?php echo(get_bloginfo("template_url")); ?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo(get_bloginfo("template_url")); ?>/css/footer.css">
</head>
<body>

<div class="alertBox">
	<div class="inner">
		<label>ALERT:</label> The Gateway Arch Ticketing &amp; Visitor 
		lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. At auctor urna nunc id cursus metus aliquam eleifend. Dictum fusce ut placerat orci. Consequat semper viverra nam libero justo laoreet sit amet cursus. Faucibus nisl tincidunt eget nullam non nisi est. Habitasse platea dictumst quisque sagittis purus sit amet volutpat consequat. Sapien faucibus et molestie ac feugiat. Id diam maecenas ultricies mi. Elementum integer enim neque volutpat ac. Faucibus in ornare quam viverra orci sagittis eu volutpat.
		<br /><br />
		Amet consectetur Laoreet id donec ultrices tincidunt arcu non sodales neque sodales. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed velit. Congue mauris rhoncus aenean vel elit scelerisque mauris. Justo donec enim diam vulputate ut pharetra sit amet. Aliquam etiam erat velit scelerisque in dictum. In fermentum et sollicitudin ac orci. A arcu cursus vitae congue. Pretium aenean pharetra magna ac. Aliquam vestibulum morbi blandit cursus risus at. Sit amet massa vitae tortor. Ornare arcu odio ut sem nulla pharetra diam sit.
	</div>
</div>

<header>

	<div class="innerWrapper">
		
		<div class="mobileMenu">

			<div class="hamburger hamburger--slider">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
			<span class="label">
				<span class="showMenuOpen">HIDE</span>
				<span class="hideMenuOpen">MENU</span>
			</span>
		</div>

		<a href="/" class="homeLink" name="Gateway Arch Home"> <span>&nbsp;</span> </a>
		
		<?php
		wp_nav_menu(array('theme_location' => 'header-menu', 'container' => ''));
		?>

		<button id="buyTicketTop"><label>Buy Tickets</label></button>
	</div>
</header>