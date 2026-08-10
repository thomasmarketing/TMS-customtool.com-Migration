<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================
	
	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
	
	======================================================================================================================== */

	add_theme_support('post-thumbnails');
	
	register_nav_menus(array('primary' => 'Primary Navigation'));

	//Walker Class for Menus

	class themeslug_walker_nav_menu extends Walker_Nav_Menu {

	// add classes to ul sub-menus
	 function start_lvl( &$output, $depth = 0, $args = array() ) {
	// depth dependent classes
	$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
	$display_depth = ( $depth + 2); // because it counts the first submenu as 0
	$classes = array(
	    'sub-menu',
	    ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
	    ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
	    'sn-level-' . $display_depth
	    );
	$class_names = implode( ' ', $classes );

	// build html
	$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}

	// add main/sub classes to li's and links
	 function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	global $wp_query;
	$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
	$display_depth = ( $depth + 1);
		
	// depth dependent classes
	$depth_classes = array(

	    ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
	    ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
	    ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
	    'sn-li-l' . $display_depth
	);
	$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

	// passed classes
	$classes = empty( $item->classes ) ? array() : (array) $item->classes;
	$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

	// build html
	$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

	// link attributes
	$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
	$attributes .= ' class="sn-menu-link ' . ( $depth > 0 ? 'sn-sub-menu-link' : 'sn-main-menu-link' ) . '"';

	$item_output = sprintf( '%1$s<a%2$s><span>%3$s%4$s%5$s</span></a>%6$s',
	    $args->before,
	    $attributes,
	    $args->link_before,
	    apply_filters( 'the_title', $item->title, $item->ID ),
	    $args->link_after,
	    $args->after
	);

	// build html
	$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	}

	
	// Emphasize beginning of page    
	function emph_function( $atts, $content = null ) {
	return '<p class="emph">'.do_shortcode($content).'</p>';
	}
	add_shortcode('emph', 'emph_function');

	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */



	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head() & wp_footer()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */




	


	function starkers_script_enqueuer() {

		//Modernizr - header
		wp_register_script( 'modernizr', get_template_directory_uri().'/js/vendor/modernizr.min.js');
		wp_enqueue_script( 'modernizr' );	


		//Use google jquery library instead of WordPress default - footer
    	wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2', true);
		wp_enqueue_script('jquery');

		//Both main.js and plugins.js minified - footer
		wp_register_script( 'plugins', get_template_directory_uri().'/js/production.min.js', array( 'jquery' ), '', true);
		wp_enqueue_script( 'plugins' );


		//Style.css - header
		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}	



	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}

	/* ========================================================================================================================
	
	Misc
	
	======================================================================================================================== */

	// Excerpt for Pages    
	add_action( 'init', 'my_add_excerpts_to_pages' );
	function my_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
	}
	//Remove Website field from comments & comment styling prompt

	function remove_comment_fields($fields) {
	    unset($fields['url']);
	    return $fields;
	}
	add_filter('comment_form_default_fields','remove_comment_fields');

	function remove_comment_styling_prompt($defaults) {
		$defaults['comment_notes_after'] = '';
		return $defaults;
	}
	add_filter('comment_form_defaults', 'remove_comment_styling_prompt');


	//Remove inline image sizing
	add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
	add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

	function remove_width_attribute( $html ) {
	   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
	   return $html;
	}

	//Plugin Updates
	add_filter( 'auto_update_plugin', '__return_true' );

	//Advanced Custom Fields Options	
	if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
	}


	/*================= Responsive images =============*/
	function adjust_image_sizes_attr( $sizes, $size ) {
   $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
   return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'adjust_image_sizes_attr', 10 , 2 );


/**
 * =======================================================================================================================
 * Extend WordPress search to include custom fields
 *
 * ======================================================================================================================= */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
// function cf_search_join( $join ) {
//     global $wpdb;

//     if ( is_search() ) {    
//         $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
//     }

//     return $join;
// }
// add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
// function cf_search_where( $where ) {
//     global $pagenow, $wpdb;

//     if ( is_search() ) {
//         $where = preg_replace(
//             "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
//             "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
//     }

//     return $where;
// }
// add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
// function cf_search_distinct( $where ) {
//     global $wpdb;

//     if ( is_search() ) {
//         return "DISTINCT";
//     }

//     return $where;
// }
// add_filter( 'posts_distinct', 'cf_search_distinct' );

/*Solved gravity form console error*/
add_filter("gform_init_scripts_footer", "init_scripts");
function init_scripts() {
return true;
}
/*End*/

/*Enable Custom file uplode*/
function custom_upload_mimes ( $existing_mimes=array() ) {
	$existing_mimes['dwg'] = 'application/acad';
	$existing_mimes['ai'] = 'application/postscript';
	$existing_mimes['dxf'] = 'application/dxf';
	$existing_mimes['eps'] = 'application/postscript';
	
	return $existing_mimes;
	}
add_filter('upload_mimes','custom_upload_mimes');

function add_child_theme_textdomain() {
    add_image_size( 'product_thumb', 400, 250, true ); //(cropped)
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );


// Disable WordPress Administration Email verification Screen 
add_filter( 'admin_email_check_interval', '__return_false' );

add_filter( 'acf/the_field/escape_html_optin', '__return_true' );


// search on keyword
add_filter( 'relevanssi_index_custom_fields', 'rlv_remove_unwanted' );
function rlv_remove_unwanted( $fields ) {
    $unwanted_fields[] = 'flexible_content';
    return array_diff( $fields, $unwanted_fields );
}


add_filter('wpseo_breadcrumb_single_link', function($link_output, $link) {
    // Replace 'Home' with your prefix text or the relevant breadcrumb text
    if (stripos($link['text'], 'You searched for') !== false) {
        return esc_html($link['text']); // Return plain text instead of a link
    }
    return $link_output; // Keep other links intact
}, 10, 2);


function remove_auto_sizes_css_fix($add_auto_sizes) {return false;}
add_filter('wp_img_tag_add_auto_sizes', 'remove_auto_sizes_css_fix');

// function create_custom_product_posttype() {
//     register_post_type( 'product',
//     // CPT Options
//         array(
//             'labels' => array(
//             'name' => __( 'Product' ),
//             'singular_name' => __( 'Product' )
//             ),
//             'public' => true,
//             'publicly_queryable' => true,
//             'has_archive' => false,
//             'show_ui' => true,
//             'query_var' => false,
//             'rewrite' => array('slug' => 'product', 'with_front'  => false),
//             'capability_type' => 'post',
//             'hierarchical' => false,               
//             'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', ),
//         )
//     );
    
//     flush_rewrite_rules( true );
    
// }
// add_action( 'init', 'create_custom_product_posttype' );

// Add /blog/ prefix to category and date archives
function custom_blog_archive_prefix() {
    // Year
    add_rewrite_rule(
        '^blog/([0-9]{4})/?$',
        'index.php?year=$matches[1]',
        'top'
    );

    // Year/Month
    add_rewrite_rule(
        '^blog/([0-9]{4})/([0-9]{2})/?$',
        'index.php?year=$matches[1]&monthnum=$matches[2]',
        'top'
    );

    // Year/Month/Day
    add_rewrite_rule(
        '^blog/([0-9]{4})/([0-9]{2})/([0-9]{2})/?$',
        'index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]',
        'top'
    );

}
add_action('init', 'custom_blog_archive_prefix');
function custom_flush_rewrite_rules() {
    custom_blog_archive_prefix();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'custom_flush_rewrite_rules');

add_filter( 'gform_validation', 'custom_at_least_one_field_validation' );
function custom_at_least_one_field_validation( $validation_result ) {

    $form = $validation_result['form'];

    // Add form IDs where this rule should apply
    $allowed_forms = array( 1, 4 ); // ← Add your form IDs here

    if ( ! in_array( $form['id'], $allowed_forms ) ) {
        return $validation_result; // do nothing for other forms
    }

    // Field IDs to check inside those forms
    $field_ids = array( 7, 8, 9, 10, 5, 2 );

    $is_filled = false;

    // Check values
    foreach ( $field_ids as $fid ) {
        $value = rgpost( "input_{$fid}" );
        if ( ! empty( $value ) ) {
            $is_filled = true;
            break;
        }
    }

    // If all empty → set error on each field
    if ( ! $is_filled ) {
        foreach ( $form['fields'] as &$field ) {
            if ( in_array( $field->id, $field_ids ) ) {
                $field->failed_validation  = true;
                $field->validation_message = 'At least one field must be filled out.';
            }
        }

        $validation_result['is_valid'] = false;
    }

    $validation_result['form'] = $form;
    return $validation_result;
}

add_action('wp_enqueue_scripts', function () {
    if (is_product()) {
        wp_enqueue_script('wc-add-to-cart');
    }
});


add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
    ob_start();
    ?>
    <div class="popup-cart-body">
        <?php wc_get_template('cart/mini-cart.php'); ?>
    </div>
    <?php
    $fragments['.popup-cart-body'] = ob_get_clean();
    return $fragments;
});

function mytheme_add_woocommerce_support() {
    add_theme_support('woocommerce');

    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

add_filter( 'woocommerce_show_page_title', '__return_false' );


add_action('pre_get_posts', function ($query) {
    if (is_admin() || !$query->is_main_query()) {
        return;
    }

    if (is_shop()) {

        $query->set('post__in', array(2880, 2794)); 
    }
});