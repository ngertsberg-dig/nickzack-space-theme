<?php
/**
 * Feature Capital functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NickZack
 */



add_filter('show_admin_bar', '__return_false');

function wpdocs_theme_name_scripts() {
    wp_enqueue_script( 'Swiper JS', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/js/swiper.min.js', array(), '1.0.0', false );
    wp_enqueue_style( 'Swiper CSS', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_script( 'TweenMax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js', array(), '1.0.0', false );
    wp_enqueue_style( 'Font Awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css', array(), '1.0.0', 'all' );
    wp_enqueue_script( 'jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), '1.0.0', false );
    wp_enqueue_script( 'Vue', 'https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.3/vue.min.js', array(), '1.0.0', false );
    
    wp_enqueue_style( '_pc_styles', get_template_directory_uri() . '/build/css/compiled/main.css' );

    wp_enqueue_script( 'ThreeJS', 'https://cdnjs.cloudflare.com/ajax/libs/three.js/101/three.min.js', array(), '1.0.0', false );
    wp_enqueue_script( 'GPUParticleSystem', get_template_directory_uri().'/includes/scripts/GPUParticleSystem.js', array(), '1.0.0', false );
    wp_enqueue_script( 'trackballcontrols', get_template_directory_uri().'/includes/scripts/trackballcontrols.js', array(), '1.0.0', false );
    wp_enqueue_script( 'tilt', 'https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js', array(), '1.0.0', false );
    

    

    }
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );


add_action( 'rest_api_init', function () {
  register_rest_route( 'projects','/all-projects', array(
    'methods' => 'GET',
    'callback' => 'return_news'
    
  ) );
} );

//get required fields and dump them into the json file

function return_news($data){
    $data = ['1','2','3','4'];
     return $data;

    
}
//project post type
function project_post_type() {
  $labels = array(
    'name'               => _x( 'Projects', 'post type general name' ),
    'singular_name'      => _x( 'Project', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Project' ),
    'edit_item'          => __( 'Edit Project' ),
    'new_item'           => __( 'New Project' ),
    'all_items'          => __( 'All Projects' ),
    'view_item'          => __( 'View Projects' ),
    'search_items'       => __( 'Search Projects' ),
    'not_found'          => __( 'No Project found' ),
    'not_found_in_trash' => __( 'No Projects found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Projects'
  );

  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds NickZack Projects',
    'public'        => true,
    'menu_position' => 99999,
    'supports'      => array( 'title', 'page-attributes' ),
   // 'taxonomies'    => array('leader_category'),
    'has_archive'   => true,
    'has_parent'    => true,
    'menu_icon'     => 'dashicons-admin-site',
    'hierarchical'  => true,
    'rewrite' => array('slug' => 'project'),
  );
  register_post_type( 'project', $args );
  flush_rewrite_rules();
}

add_action( 'init', 'project_post_type' );

add_image_size( 'project-logo', 310, 152, false );
add_image_size( 'tech-icon', 32, 32, false );

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
/**
 * Enqueue scripts and styles.
 */


/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

// /**
//  * Custom template tags for this theme.
//  */
// require get_template_directory() . '/inc/template-tags.php';

// /**
//  * Custom functions that act independently of the theme templates.
//  */
// require get_template_directory() . '/inc/extras.php';

// /**
//  * Customizer additions.
//  */
// require get_template_directory() . '/inc/customizer.php';

// /**
//  * Load Jetpack compatibility file.
//  */
// require get_template_directory() . '/inc/jetpack.php';

// function _pc_scripts() {


//   //wp_enqueue_script( 'highcharts', 'https://code.highcharts.com/highcharts.js', array(), '20151215', true );
//   wp_enqueue_script('all',get_template_directory_uri() . '/js-dist/main.js',array('jquery'),'',true);

//   // wp_enqueue_style( '_pc-style', get_stylesheet_uri() );

//   //wp_enqueue_script( '_pc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

  

//   if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
//     wp_enqueue_script( 'comment-reply' );
//   }
// }
// add_action( 'wp_enqueue_scripts', '_pc_scripts' );