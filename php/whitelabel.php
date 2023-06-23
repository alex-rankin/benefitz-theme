<?php
// Insert Console logo
add_action( 'wp_footer', function () { ?>
  <script>
  let textLogo = ' Proudly built by BENEFITZ - ';
  let textLink = ' https://benefitz.co.nz ';
  console.log('\x1b[30;47;1m' + textLogo + '\x1b[0m' + '\x1b[44;34m' + textLink + '\x1b[0m');
  </script>
<?php });

// Swap out WP Login logo
function my_login_logo() { ?>
	<style type="text/css">
		#login h1 a, .login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/login_logo.webp);
			height: 56px;
			width: 320px;
			background-size: 100% auto;
			background-repeat: no-repeat;
			padding-bottom: 50px;
		}

		body {
			background: #fff!important;
		}
	
		body:before {
			width: 50%;
			right: 0;
			height: 100%;
			content: "";
			position: absolute;
			background-size: cover;
			background-repeat: no-repeat;
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/login_background.webp) !important;
			display: flex;
			align-items: center;
			background-position: center;
		}
		
		#login {
			margin: 0!important;
			padding: 0!important;
			box-sizing: border-box;
			position: relative;
			left: 25%;
			transform: translate(-50%, 40%);
			z-index: 3;
		}
		
		#loginform {
			padding: 0 2px;
			border: none;
			box-shadow: none;
			background: #fff;
		}
		
		#wp-submit {
			background-color: #000;
			border-color: transparent;
			border-width: 0;
			border-radius: 4px;
			color: #fff;
			padding: 5px;
			width: 100%;
			transition: ease-in-out 0.3s;
		}
		
		#wp-submit:hover {background-color:#333;}
		
		.forgetmenot label {margin-bottom: 15px!important;}

		.dashicons-hidden, .dashicons-visibility {color: #333;}
		
		#login input[type=text],
		#login input[type=password] {
			border: 1px solid rgba(181, 181, 181, 35%);
		}
		
		#login input[type=text]:focus,
		#login input[type=password]:focus,
		.forgetmenot input[type=checkbox]:focus,
		.button.wp-hide-pw:focus {border-color: #ccc!important; box-shadow: 0 0 0 1px #000!important;}
		
		#backtoblog, .login #nav{padding: 0px!important;}
		
		#login .privacy-policy-page-link {display: none; visibility: hidden;}

		.language-switcher {display:none; visibility: hidden;}
		
		@media screen and (max-width: 765px) {
			body:before {display:none!important; visibility:hidden;}
			#login {transform: none; margin: 50px auto!important; left: 0%!important;}
		}
		
		@media screen and (min-width: 2000px) {
			#login {transform: translate(-50%, 80%);}
		}
	</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
	
// Swap out WP link
function login_page_URL( $url ) {
	$url = ( 'https://www.benefitz.co.nz' );
	return $url;
}
add_filter( 'login_headerurl', 'login_page_URL' );

// Admin WP menu logo swap
function admin_logo_swap() { ?>
	<style type="text/css">
		#wp-admin-bar-wp-logo {width: 160px; display: flex; justify-content: center;}
		.ab-top-menu>#wp-admin-bar-wp-logo:hover>.ab-item {background: none!important;}
		.ab-icon, #wp-admin-bar-wp-logo-external, #wp-admin-bar-wp-logo .ab-sub-wrapper {display: none!important; visibility: hidden;}
		.admin_logo {height: 60px!important; padding: 10px!important;}
	</style>

<script type="text/javascript">
	let newLogo = document.createElement('img')
	newLogo.src = '<?php echo get_stylesheet_directory_uri(); ?>/images/admin_logo.webp';
	newLogo.style.height = '20px'; newLogo.style.padding = '10px 10px 0px 0px';

	window.onload = function() {
	let logoCheck = document.querySelector('#wp-admin-bar-wp-logo a');
		if (logoCheck) {
			logoCheck.appendChild(newLogo);
			logoCheck.href = '<?php echo get_home_url(); ?>' // Get & update the sites URL
		}
	}
</script>

<?php }
add_action('admin_head', 'admin_logo_swap');