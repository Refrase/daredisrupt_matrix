<?php

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
          'edit.php?post_type=krydspunkt', // Krydspunkter
          'edit.php?post_type=teknologi', // Teknologier
          'edit.php?post_type=omraade', // Områder
          'edit.php?post_type=case', // Cases
          'edit.php?post_type=dropdown', // Dropdown
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

	function rrh_from_admin_menu() {
		global $menu;
    unset($menu[5]); // Remove posts from menu
    unset($menu[20]); // Remove pages from menu
		unset($menu[25]); // Remove comments from menu
	}
  add_action('admin_menu', 'rrh_from_admin_menu');

  // Registering af taxonomy used for targeting custom fields to subsets of the Crosspoint (Krydspunkt) custom post type
  function add_custom_taxonomies() {
    register_taxonomy('teknologi', 'krydspunkt', array(
      'hierarchical' => false,
      'labels' => array(
        'name' => _x( 'Teknologier (ignoreres)', 'taxonomy general name' ),
        'singular_name' => _x( 'Teknologi', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Teknologier' ),
        'all_items' => __( 'Alle Teknologier' ),
        'edit_item' => __( 'Redigér Teknologi' ),
        'update_item' => __( 'Opdatér Teknologi' ),
        'add_new_item' => __( 'Tilføj Teknologi' ),
        'new_item_name' => __( 'Nyt Teknologi Navn' ),
        'menu_name' => __( 'Teknologier' ),
      ),
      'rewrite' => array(
        'slug' => 'teknologier', // This controls the base slug that will display before each term
        'with_front' => false, // Don't display the category base before "/locations/"
        'hierarchical' => false // This will allow URL's like "/locations/boston/cambridge/"
      ),
    ));
  }
  add_action( 'init', 'add_custom_taxonomies', 0 );

  // Dynamically set options for the pages' select to all Cases created (next four function blocks)

  // Generic function that slugifies input
  function slugify($text, $strict = false) {
    $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
    $text = preg_replace('~[^\\pL\d.]+~u', '-', $text); // replace non letter or digits by -
    $text = trim($text, '-');
    setlocale(LC_CTYPE, 'en_GB.utf8');
    if (function_exists('iconv')) { $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text); } // transliterate
    $text = strtolower($text); // lowercase
    $text = preg_replace('~[^-\w.]+~', '', $text); // remove unwanted characters
    if (empty($text)) { return 'empty_$'; }
    if ($strict) { $text = str_replace(".", "_", $text); }
    return $text;
  }

  // Generic function that combines slugs and names to key/value pairs
  function build_slug_value_array( $post_type ) {
    $array = array();
    // Get title of all posts of given post type
    $args = array(
      'post_type' => $post_type,
      'posts_per_page' => '-1' // Ensuring more than 10 entries are fetched - if there are more than 10
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
      array_push($array, get_the_title());
    endwhile; endif; wp_reset_postdata();
    // Create keys for the array by "transliterating"/formatting it to a slug-like string (that is matched in the client-side code and used to sort)
    $array_slugified = array();
    foreach ($array as $release) {
      array_push($array_slugified, slugify($release, true));
    }
    // Combine to an array with slug as key and title as value
    $array = array_combine( $array_slugified, $array );
    return $array;
  }

  // Generic function to automatically set/update select options for a custom field in the wp-admin
  function acf_load_field_choices( $field, &$slug_value_array ) {  // '&' referencing variable from global scope
    $field['choices'] = array(); // reset choices
    if ( !empty($slug_value_array) ) {
      foreach ($slug_value_array as $key => $value) {
        $field['choices'][$key] = $value;
      }
    }
    return $field;
  }

  // Automatically set/update select options for pages with cases to include every Case created
  $all_cases = build_slug_value_array( 'case' );
  function acf_load_case_1_field_choices( $field ) {
    global $all_cases;
    return acf_load_field_choices( $field, $all_cases );
  }
  function acf_load_case_2_field_choices( $field ) {
    global $all_cases;
    return acf_load_field_choices( $field, $all_cases );
  }
  add_filter('acf/load_field/name=case_1', 'acf_load_case_1_field_choices');
  add_filter('acf/load_field/name=case_2', 'acf_load_case_2_field_choices');

?>
