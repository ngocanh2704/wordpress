<?php
/**
 * Load CSS
 */
 function muatheme_load_theme_style() {
   /* Load CSS */
  //wp_enqueue_style('parent-styles', get_template_directory_uri() . '/style.css');
  // wp_enqueue_style('child-styles', get_stylesheet_directory_uri() . '/style.css', array('parent-styles'));

   /* Add Font Awesome */
   wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() .'/font-awesome/css/font-awesome.min.css' );
 }
 add_action('wp_enqueue_scripts', 'muatheme_load_theme_style', 909 );

 /**
  * MH Function
  */
/* Shortcode facebook comments */
if ( !function_exists('mh_comments') ) {
	function mh_comments() {
    ob_start(); ?>
      <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div>
    <?php return ob_get_clean();
  }
	add_shortcode( 'mh_facebook_comments', 'mh_comments' );
}

/* Shortcode facebook share */
if ( !function_exists('mh_share') ) {
	function mh_share() {
    ob_start(); ?>
      <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
    <?php return ob_get_clean();
  }
	add_shortcode( 'mh_facebook_share', 'mh_share' );
}

/* Shortcode breadcrumbs */
if ( !function_exists('mh_breadcrumbs') ) {
	function mh_breadcrumbs() {
    ob_start();
    echo '<div class="row row-collapse">';
      echo '<div class="col">';
        echo '<div class="mh-breadcrumbs small">';
          do_action('flatsome_product_title');
        echo '</div>';
      echo '</div>';
    echo '</div>';
    return ob_get_clean();
  }
	add_shortcode( 'mh_get_breadcrumbs', 'mh_breadcrumbs' );
}

/* Menu categories */
if ( !function_exists('mh_show_category') ) {
  function mh_show_category() {
    if ( is_front_page() ) { ?>
      <script>
        jQuery( ".mh-show-menu-bar-1" ).click(function() {
          jQuery( "#mh-list-category-1" ).toggleClass( "active" );
        });

        jQuery( ".mh-show-menu-bar-2" ).click(function() {
          jQuery( "#mh-list-category-2" ).toggleClass( "active" );
        });

        jQuery( ".mh-show-menu-bar-3" ).click(function() {
          jQuery( "#mh-list-category-3" ).toggleClass( "active" );
        });
      </script>
    <?php }
  }
  add_action( 'flatsome_footer', 'mh_show_category' );
}

/* Register sidebar */
register_sidebar(array(
	'name' => 'Footer 3',
	'id' => 'mh-footer-3',
	'description' => 'Khu vực sidebar hiển thị Footer 3',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<span class="widget-title">',
	'after_title' => '</span>'
));

register_sidebar(array(
	'name' => 'Page sidebar: Danh mục sản phẩm',
	'id' => 'mh-page-right-sidebar',
	'description' => 'Khu vực sidebar hiển thị Page sidebar',
	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	'after_widget' => '</aside>',
	'before_title' => '<span class="widget-title">',
	'after_title' => '</span>'
));

?>