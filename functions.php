<?php

  add_theme_support( 'menus' );
  add_theme_support( 'post-thumbnails' );

  // Styling
  function matrix_theme_styles() {

    // PROD
    // wp_enqueue_style( 'style_bundle', get_template_directory_uri() . '/dist/css/style.min.css' );

    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array( 'style_bundle' ) );
  } add_action( 'wp_enqueue_scripts', 'matrix_theme_styles' );

  // Scripts
  function matrix_theme_js() {

    // DEV
    wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/main.js', array(), null, true );
    // Making the rest url dynamically available to the JavaScript
    wp_localize_script( 'main_js', 'wp', array(
      'rest_root' => esc_url_raw( rest_url() ),
      'routes'    => rest_theme_routes(),
    ));

    // PROD
    // wp_enqueue_script( 'main_min_js', get_template_directory_uri() . '/dist/js/main.min.js', array(), '', true );
    // Making the rest url dynamically available to the JavaScript
    // wp_localize_script( 'main_min_js', 'wp', array(
    //   'rest_root' => esc_url_raw( rest_url() ),
    //   'routes'    => rest_theme_routes(),
    // ));

  } add_action( 'wp_enqueue_scripts', 'matrix_theme_js' );

  function rest_theme_routes() {
  	$routes = array();
  	$query = new WP_Query( array(
  		'post_type'      => 'any',
  		'post_status'    => 'publish',
  		'posts_per_page' => -1,
  	));
  	if ( $query->have_posts() ) {
  		while ( $query->have_posts() ) {
  			$query->the_post();
  			$routes[] = array(
  				'id'   => get_the_ID(),
  				'type' => get_post_type(),
  				'slug' => basename( get_permalink() ),
  			);
  		}
  	}
  	wp_reset_postdata();
  	return $routes;
  }

  // Disable possibility of changing theme
  add_action('admin_init', 'remove_theme_menus');
  function remove_theme_menus() {
    global $submenu;
    unset($submenu['themes.php'][5]);
    unset($submenu['themes.php'][15]);
  }

  // Rearrange wp-admin menu
	function custom_menu_order($menu_ord) {
	    if (!$menu_ord) return true;

	    return array(
	        'index.php', // Dashboard
					'edit.php?post_type=page', // Pages
					'edit.php', // Posts
	        'separator1', // First separator
	        'upload.php', // Media
	        'separator2', // Second separator
	        'themes.php', // Appearance
	        'plugins.php', // Plugins
	        'users.php', // Users
	        'tools.php', // Tools
	        'options-general.php', // Settings
	        'separator-last', // Last separator
	    );
	}
	add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
	add_filter('menu_order', 'custom_menu_order');

	function rrh_change_post_links() {
		global $menu;
		unset($menu[25]); // Remove comments from menu
	}
  add_action('admin_menu', 'rrh_change_post_links');
  
?>
