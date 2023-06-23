<?php
require_once dirname(__FILE__) . '/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'my_theme_register_required_plugins');

function my_theme_register_required_plugins() {
  if (strpos($_SERVER['REQUEST_URI'], 'themes.php?page=tgmpa-install-plugins') !== false) {
  $plugins = array(
      // Required plugins for development of our own sites
      array(
          'name'      => 'Elementor',
          'slug'      => 'elementor',
          'required'  => true,
      ),
      // Include Elementor Pro in bundled theme
      array(
          'name'      => 'Elementor Pro',
          'slug'      => 'elementor-pro',
          'source'    => get_stylesheet_directory() . '/bundled-plugins/elementor-pro-3.14.0.zip',
          'required'  => true,
      ),
      array(
          'name'      => 'Wordfence Security',
          'slug'      => 'wordfence',
          'required'  => true,
      ),
      array(
          'name'      => 'Rank Math SEO',
          'slug'      => 'seo-by-rank-math',
          'required'  => true,
      ),
      array(
          'name'      => 'ManageWP',
          'slug'      => 'worker',
          'required'  => true,
      ),
      array(
          'name'      => 'FluentSMTP',
          'slug'      => 'fluent-smtp',
          'required'  => true,
      ),
      array(
          'name'      => 'Duplicate Page',
          'slug'      => 'duplicate-page',
          'required'  => true,
      ),
      array(
          'name'      => 'WP Super Cache',
          'slug'      => 'wp-super-cache',
          'required'  => true,
      ),
      array(
          'name'      => 'EWWW Image Optimizer',
          'slug'      => 'ewww-image-optimizer',
          'required'  => true,
      ),
      array(
          'name'      => 'Disable XML-RPC-API',
          'slug'      => 'disable-xml-rpc-api',
          'required'  => true,
      ),

      // Optional plugins for development of our own sites
      array(
          'name'      => 'Intuitive Custom Post Order',
          'slug'      => 'intuitive-custom-post-order',
          'required'  => false,
      ),
      array(
          'name'      => 'Code Snippets',
          'slug'      => 'code-snippets',
          'required'  => false,
      ),
      array(
          'name'      => 'WooCommerce',
          'slug'      => 'woocommerce',
          'required'  => false,
      ),
      // Include Croco Blocks wizard in bundled theme
      array(
          'name'      => 'Croco Block Wizard',
          'slug'      => 'croco-block-wizard',
          'source'    => get_stylesheet_directory() . '/bundled-plugins/crocoblock-wizard.zip',
          'required'  => false,
      ),
      array(
          'name'      => 'User Role Editor',
          'slug'      => 'user-role-editor',
          'required'  => false,
      ),
      array(
          'name'      => 'WP Activity Log',
          'slug'      => 'wp-security-audit-log',
          'required'  => false,
      ),
      array(
          'name'      => 'Fluent Form',
          'slug'      => 'fluentform',
          'required'  => false,
      ),
  );

  /*
* Array of configuration settings. Amend each line as needed.
*
* TGMPA will start providing localized text strings soon. If you already have translations of our standard
* strings available, please help us make TGMPA even better by giving us access to these translations or by
* sending in a pull-request with .po file(s) with the translations.
*
* Only uncomment the strings in the config array if you want to customize the strings.
*/

  $config = array(
  'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
  'default_path' => '',                      // Default absolute path to bundled plugins.
  'menu'         => 'tgmpa-install-plugins', // Menu slug.
  'parent_slug'  => 'themes.php',            // Parent menu slug.
  'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
  'has_notices'  => true,                    // Show admin notices or not.
  'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
  'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
  'is_automatic' => false,                   // Automatically activate plugins after installation or not.
  'message'      => '',                      // Message to output right before the plugins table.
);
tgmpa($plugins, $config);
?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      jQuery(document).ready(function($) {
      // Check if the current page is tgmpa-install-plugins
      if (window.location.href.indexOf('page=tgmpa-install-plugins') > -1) {
        // Check all required plugins on the plugin installation page
        $('.tgmpa-type-required input[type="checkbox"]').prop('checked', true);
      }
      });
    </script>
    <?php 
  }
}