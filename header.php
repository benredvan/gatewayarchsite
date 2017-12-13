<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
<script>
	$(function() {
		$(".mobileMenu").on("click", function(){
			$("header").toggleClass("show-nav");
		});
	});
</script>
<header>
	<div class="innerWrapper">

		<link rel="stylesheet" type="text/css" href="<?php echo(get_bloginfo("template_url")); ?>/css/header.css">
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

		<a href="/" class="homeLink" name="Gateway Arch Home"> </a>
		<button id="buyTicketTop">Buy Tickets</button>
		<ul id="navigation">
			<li>
				<a href="/plan">Plan Your Visit</a>
				<ul class="level-2">
					<li><a href="/plan/page1">Hello Plan Your visit</a></li>
					<li><a href="/plan/page2">Plan Page Two</a></li>
					<li><a href="/plan/page3">Yes Page Three</a></li>
					<li><a href="/plan/page4">Plan Visit Four</a></li>
				</ul>
			</li>
			<li>
				<a href="/experience">Experience</a>
				<ul class="level-2">
					<li><a href="/plan/page1">Hello Page Experience</a></li>
					<li><a href="/plan/page2">Plan Page Two</a></li>
					<li><a href="/plan/page3">Yes Page Three</a></li>
					<li><a href="/plan/page4">Plan Visit Four</a></li>
				</ul>
			</li>
			<li>
				<a href="/groups">Groups</a>
				<ul class="level-2">
					<li><a href="/plan/page1">Hello it's Groups</a></li>
					<li><a href="/plan/page2">Plan Page Two</a></li>
					<li><a href="/plan/page3">Yes Page Three</a></li>
					<li><a href="/plan/page4">Plan Visit Four</a></li>
				</ul>
			</li>
			<li>
				<a href="/events">Events</a>
				<ul class="level-2">
					<li><a href="/plan/page1">Hello Some Events</a></li>
					<li><a href="/plan/page2">Plan Page Two</a></li>
					<li><a href="/plan/page3">Yes Page Three</a></li>
					<li><a href="/plan/page4">Plan Visit Four</a></li>
				</ul>
			</li>
		</ul>
	</div>
</header>