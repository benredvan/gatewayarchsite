<?php
/*-----------------------------------------------------------------------------------*/
/*  enable svg images in media uploader
/*-----------------------------------------------------------------------------------*/

function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	$mimes['vcf'] = 'text/x-vcard';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

/*-----------------------------------------------------------------------------------*/
/*  menus
/*-----------------------------------------------------------------------------------*/

function register_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
			'footer-menu' => __( 'Footer Menu' ),
		)
	);
}
add_action('init', 'register_menus');
?>