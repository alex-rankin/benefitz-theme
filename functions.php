<?php
// Link child theme to elementor
function benefitz_child_enqueue_scripts() {
	// Enqueue Styles
	wp_enqueue_style('hello-elementor-child-style', get_stylesheet_directory_uri() . '/style.css', [ 'hello-elementor-theme-style' ], '1.0.0' );
	// wp_enqueue_style('additional-styling', get_stylesheet_directory_uri() . '/css/main.css');

	// Register Scripts
	//wp_register_script('app-controller', get_theme_file_uri() . '/js/app.js');

	// Enqueue Scripts
	//wp_enqueue_script('app-controller');
}
add_action( 'wp_enqueue_scripts', 'benefitz_child_enqueue_scripts', 10 );

// Include PHP Scripts here
include( get_stylesheet_directory() . '/php/stripwordpress.php' );
include( get_stylesheet_directory() . '/php/whitelabel.php' );
include( get_stylesheet_directory() . '/php/class-tgm-plugin-activation.php' );
include( get_stylesheet_directory() . '/php/autoplugin.php' );

// When theme is activated direct to required plugin setup page
global $pagenow;
if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
	wp_redirect(admin_url("themes.php?page=tgmpa-install-plugins&plugin_status=install"));
}

// Header Content can go here
add_action( 'wp_head', function(){ ?>
	<!-- Google Tag Manager goes here! -->
<?php });

// Body Content can go here
add_action( 'wp_body_open', function() { ?>
	<!-- Add GTM no-script here! -->
<?php });

// Footer Content can go here
add_action( 'wp_footer', function () { ?> 

<?php });

// Admin Content can go here
add_action('admin_head', function () { ?>

<?php }); 