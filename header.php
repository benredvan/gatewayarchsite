<html>
<head>
	<title>Gateway Arch - Dev Site</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
	<script>
		$(function() { // event rigging

			$(".mobileMenu").on("click", function(){
				$("header").toggleClass("show-nav");
			});
			//debounced resize event
			var resizeTimer;
			$(window).on('resize', function(e) {
				clearTimeout(resizeTimer);
				resizeTimer = setTimeout(function() {
				
				//resizing has "stopped", cleanup menu
				$("header").removeClass("show-nav");
    			$("header li.activeMenu").removeClass("activeMenu");
			            
			  }, 250);
			});
			$(window).on('scroll', function(e){
				if($(window).scrollTop() > 12){
					$("body").addClass("pageScrolled");
				}else{
					$("body").removeClass("pageScrolled");
				}
			});

			$(document).click(function(e) {
	    		if ($(e.target).closest('header').length === 0) {
	    			//close menu, cleanup
	    			$("header").removeClass("show-nav");
	    			$("header li.activeMenu").removeClass("activeMenu");
	    		}
	    	});
	    	//level 2 menu show
	    	/*
	    	$("#navigation>li>a").on('touchstart', function(e){
	    		e.preventDefault();

	    		if($(this).parent().hasClass("activeMenu")){
	    			//navigate
	    			document.location=$(this).attr("href");
	    		}else{
		    		$(this).parent().addClass("activeMenu").siblings().removeClass("activeMenu");
	    		}
	    	});
	    	*/

	    	$("#navigation>li>a").on('touchstart', function (e) {
			    e.preventDefault();
	    		var rect = e.target.getBoundingClientRect();
				var xpos = e.targetTouches[0].pageX - rect.left;
	    		
	    		if (xpos > ($(this).outerWidth() - 62)) { //62 pixels on right for icon click
			        $(this).parent().toggleClass("activeMenu").siblings().removeClass("activeMenu");
			    }else{
	    			document.location=$(this).attr("href");
			    }
			});
		});
	</script>
</head>
<body>



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
		<button id="buyTicketTop"><label>Buy Tickets</label></button>
		<ul id="navigation"><li>
				<a href="/plan">Plan Your Visit</a>
				<ul class="level-2">
					<li><a href="/plan/page1">Hello Plan Your visit</a></li>
					<li><a href="/plan/page2">Plan Page Two</a></li>
					<li><a href="/plan/page3">Yes Page Three</a></li>
					<li><a href="/plan/page4">Plan Visit Four</a></li>
				</ul>
			</li><li>
				<a href="/experience">Experience</a>
				<ul class="level-2">
					<li><a href="/plan/page1">Hello Page Experience</a></li>
					<li><a href="/plan/page2">Plan Page Two</a></li>
					<li><a href="/plan/page3">Yes Page Three</a></li>
					<li><a href="/plan/page4">Plan Visit Four</a></li>
				</ul>
			</li><li>
				<a href="/groups">Groups</a>
				<ul class="level-2">
					<li><a href="/plan/page1">Hello it's Groups</a></li>
					<li><a href="/plan/page2">Plan Page Two</a></li>
					<li><a href="/plan/page3">Yes Page Three</a></li>
					<li><a href="/plan/page4">Plan Visit Four</a></li>
				</ul>
			</li><li>
				<a href="/events">Events</a>
				<ul class="level-2">
					<li><a href="/plan/page1">Hello Some Events</a></li>
					<li><a href="/plan/page2">Plan Page Two</a></li>
					<li><a href="/plan/page3">Yes Page Three</a></li>
					<li><a href="/plan/page4">Plan Visit Four</a></li>
				</ul>
			</li></ul>
	</div>
</header>