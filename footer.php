<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo(get_bloginfo("template_url")); ?>/css/header.css">
<link rel="stylesheet" type="text/css" href="<?php echo(get_bloginfo("template_url")); ?>/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo(get_bloginfo("template_url")); ?>/css/footer.css">
<footer>
	<div class="social showMobile">
		<?php
		$social_links = get_field("social_links", 10);
		foreach($social_links as $social_link) {
			$title = $social_link["title"];
			$image = $social_link["image"];
			$image_url = $image["url"];
			$link = $social_link["link"];
			echo("<a href=\"".$link."\" title=\"".$title."\" target=\"_blank\"><img src=\"".$image_url."\" alt=\"".$title."\" /></a>");
		}
		?>
	</div>
	<div class="footer-1">
	
		<div class="footer-1-inner">
		
			<div class="menu">
				<h3>Learn More</h3>
				<?php
				wp_nav_menu(array('theme_location' => 'footer-menu'));
				?>
			</div>
		
			<div class="newsletter">
				<h3>Newsletter</h3>
				<?php
				echo(do_shortcode("[gravityform id=\"1\" name=\"Newsletter Form\" title=\"false\" description=\"false\"]"));
				?>
			</div>
		
			<div class="partners">
				<h3>Partners</h3>
				<div class="partnerIcons">
					<?php
						$partners = get_field("partners", 10);
						foreach($partners as $partner) {
							$title = $partner["title"];
							$image = $partner["image"];
							$image_url = $image["url"];
							$image_height = $partner["image_height"];
							$link = $partner["link"];
							echo("<a href=\"".$link."\" title=\"".$title."\" target=\"_blank\"><img src=\"".$image_url."\" alt=\"".$title."\" style=\"height: ".$image_height."px;\" /></a>");
						}
					?>
				</div>
			</div>
		
		</div>

	<div class="footer-2">
	
		<div class="footer-2-inner">
			
			<div class="copyright">
				©<?php echo(date("Y")); ?> The Gateway Arch. All Rights Reserved. A Bi-State Development Enterprise
			</div>
			
			<div class="social hideMobile">
				<?php
				$social_links = get_field("social_links", 10);
				foreach($social_links as $social_link) {
					$title = $social_link["title"];
					$image = $social_link["image"];
					$image_url = $image["url"];
					$link = $social_link["link"];
					echo("<a href=\"".$link."\" title=\"".$title."\" target=\"_blank\"><img src=\"".$image_url."\" alt=\"".$title."\" /></a>");
				}
				?>
			</div>
			
			<div class="clear"></div>
			
		</div>
	
	</div>
	
</footer>
<script type="application/ld+json">
{
	"@context" : "https://schema.org",
	"@type" : "Organization",
	"url" : "http://www.gatewayarch.com/",
  	"logo": "http://www.example.com/images/logo.svg",
	"sameAs" : [ "http://www.facebook.com/gateway.arch",
	    "http://www.twitter.com/GatewayArchSTL"],
	"contactPoint" : [{
		"@type" : "ContactPoint",
		"telephone" : "+1-877-982-1410",
    	"contactOption": "TollFree",
		"contactType" : "Customer Service"
	}]
}
</script>

</body>

</html>

<?php
wp_footer();
?>