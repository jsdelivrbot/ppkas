<?php
/**
 * @package ppkas
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 *
 * @author Jamaludin Rajalu
 */

function title_slideshow_input ( $title ) {
  if ( get_post_type() == 'slideshow' ) {
    $title = __( 'Enter slide title here', 'ppkas' );
  }
  return $title;
} // End title_text_input()
add_filter( 'enter_title_here', 'title_slideshow_input' );

function ppkas_slideshow() {

  $labels = array(
    'name'                => _x( 'Slideshows', 'Post Type General Name', 'ppkas' ),
    'singular_name'       => _x( 'Slideshow', 'Post Type Singular Name', 'ppkas' ),
    'menu_name'           => __( 'Slideshow', 'ppkas' ),
    'parent_item_colon'   => __( 'Parent Slideshow:', 'ppkas' ),
    'all_items'           => __( 'All Slideshows', 'ppkas' ),
    'view_item'           => __( 'View Slideshow', 'ppkas' ),
    'add_new_item'        => __( 'Add New Slideshow', 'ppkas' ),
    'add_new'             => __( 'New Slideshow', 'ppkas' ),
    'edit_item'           => __( 'Edit Slideshow', 'ppkas' ),
    'update_item'         => __( 'Update Slideshow', 'ppkas' ),
    'search_items'        => __( 'Search Slideshows', 'ppkas' ),
    'not_found'           => __( 'No Slideshows found', 'ppkas' ),
    'not_found_in_trash'  => __( 'No Slideshows found in Trash', 'ppkas' ),
  );
  $args = array(
    'label'               => __( 'slideshow', 'ppkas' ),
    'description'         => __( 'Frontpage image slideshow', 'ppkas' ),
    'labels'              => $labels,
    'supports'            => array( 'title', ),
    //'taxonomies'          => array( 'category', 'post_tag' ),
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => false,
    'show_in_admin_bar'   => false,
    //'menu_position'       => 20,
    'menu_icon'           => get_template_directory_uri() . '/img/icon-slideshow.svg',
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'post',
  );
  register_post_type( 'slideshow', $args );

}

// Hook into the 'init' action
add_action( 'init', 'ppkas_slideshow', 0 );

// Custom Column Adjustment
// @link http://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column

add_action('manage_slideshow_posts_custom_column', 'ppkas_slideshow_custom_columns');
add_filter('manage_edit-slideshow_columns', 'ppkas_add_new_slideshow_columns');

function ppkas_add_new_slideshow_columns( $columns ){
  $columns = array(
    'cb'                    => '<input type="checkbox">',
    'ppkas_slideshow_image'    => __( 'Image', 'ppkas' ),
    'title'                 => __( 'Title', 'ppkas' ),
    'date'                  => __( 'Date', 'ppkas' )
  );
  return $columns;
}

function ppkas_slideshow_custom_columns( $column ){
  global $post;

  switch ($column) {
    case 'ppkas_slideshow_image' : $slideshowURL = get_post_meta($post->ID,'ppkas_slideshow_image',true); echo '<img src="'.$slideshowURL.'" width="120">';break;
  }
}

?>
