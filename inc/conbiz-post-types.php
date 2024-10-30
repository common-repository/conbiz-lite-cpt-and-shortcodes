<?php

/**
 * ConBiz custom functions 
 *
 * Author : WingThemes 
 */


/**
 * Slider Post Type
 */

if ( ! function_exists('conbiz_slider_post_type') ) {
function conbiz_slider_post_type() {

	$labels = array(
		'name'                => _x( 'Sliders', 'Post Type General Name', 'conbiz' ),
		'singular_name'       => _x( 'Slider', 'Post Type Singular Name', 'conbiz' ),
		'menu_name'           => __( 'Slider', 'conbiz' ),
		'parent_item_colon'   => __( 'Parent Slider:', 'conbiz' ),
		'all_items'           => __( 'All Sliders', 'conbiz' ),
		'view_item'           => __( 'View Slider', 'conbiz' ),
		'add_new_item'        => __( 'Add New Slider', 'conbiz' ),
		'add_new'             => __( 'Add New', 'conbiz' ),
		'edit_item'           => __( 'Edit Slider', 'conbiz' ),
		'update_item'         => __( 'Update Slider', 'conbiz' ),
		'search_items'        => __( 'Search Slider', 'conbiz' ),
		'not_found'           => __( 'Not found', 'conbiz' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'conbiz' ),
	);
	$args = array(
		'label'               => __( 'conbiz_slider', 'conbiz' ),
		'description'         => __( 'Conbiz customized bootstrap carousel slider', 'conbiz' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 80,
		'menu_icon'           => 'dashicons-images-alt2',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'conbiz_slider', $args );

}

// Hook into the 'init' action
add_action( 'init', 'conbiz_slider_post_type', 0 );

}



/**
 * Portfolio post type
 */

if ( ! function_exists('conbiz_portfolio_post_type') ) {

function conbiz_portfolio_post_type() {

	$labels = array(
		'name'                => _x( 'Portfolios', 'Post Type General Name', 'conbiz' ),
		'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name', 'conbiz' ),
		'menu_name'           => __( 'Portfolio', 'conbiz' ),
		'parent_item_colon'   => __( 'Parent Portfolio:', 'conbiz' ),
		'all_items'           => __( 'All Portfolios', 'conbiz' ),
		'view_item'           => __( 'View Portfolio', 'conbiz' ),
		'add_new_item'        => __( 'Add New Portfolio', 'conbiz' ),
		'add_new'             => __( 'Add New', 'conbiz' ),
		'edit_item'           => __( 'Edit Portfolio', 'conbiz' ),
		'update_item'         => __( 'Update Portfolio', 'conbiz' ),
		'search_items'        => __( 'Search Portfolio', 'conbiz' ),
		'not_found'           => __( 'Not found', 'conbiz' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'conbiz' ),
	);
	$rewrite = array(
		'slug'                => 'portfolio',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'conbiz_portfolio', 'conbiz' ),
		'description'         => __( 'conbiz Portfolio Post Type', 'conbiz' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'page-attributes', ),
		'taxonomies'          => array( 'portfolio_category' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 80,
		'menu_icon'           => 'dashicons-images-alt',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'conbiz_portfolio', $args );

}

// Hook into the 'init' action
add_action( 'init', 'conbiz_portfolio_post_type', 0 );

}



/**
 * Portfolio category 
 */

if ( ! function_exists( 'conbiz_portfolio_category' ) ) {

function conbiz_portfolio_category() {

	$labels = array(
		'name'                       => _x( 'Portfolio Categories', 'Taxonomy General Name', 'conbiz' ),
		'singular_name'              => _x( 'Portfolio Category', 'Taxonomy Singular Name', 'conbiz' ),
		'menu_name'                  => __( 'Portfolio Category', 'conbiz' ),
		'all_items'                  => __( 'All Portfolio Categories', 'conbiz' ),
		'parent_item'                => __( 'Parent Portfolio Category', 'conbiz' ),
		'parent_item_colon'          => __( 'Parent Portfolio Category:', 'conbiz' ),
		'new_item_name'              => __( 'New Portfolio Category', 'conbiz' ),
		'add_new_item'               => __( 'Add New Portfolio Category', 'conbiz' ),
		'edit_item'                  => __( 'Edit Portfolio Category', 'conbiz' ),
		'update_item'                => __( 'Update Portfolio Category', 'conbiz' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'conbiz' ),
		'search_items'               => __( 'Search Portfolio Categories', 'conbiz' ),
		'add_or_remove_items'        => __( 'Add or remove Portfolio Categories', 'conbiz' ),
		'choose_from_most_used'      => __( 'Choose from the most used Portfolio Categories', 'conbiz' ),
		'not_found'                  => __( 'Not Found', 'conbiz' ),
	);
	$rewrite = array(
		'slug'                       => 'portfolio-categories',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'conbiz_portfolio_category', array( 'conbiz_portfolio' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'conbiz_portfolio_category', 0 );

}



/**
 * Portfolio Tag 
 */

if ( ! function_exists( 'conbiz_portfolio_tag' ) ) {

function conbiz_portfolio_tag() {

	$labels = array(
		'name'                       => _x( 'Portfolio Tags', 'Taxonomy General Name', 'conbiz' ),
		'singular_name'              => _x( 'Portfolio Tag', 'Taxonomy Singular Name', 'conbiz' ),
		'menu_name'                  => __( 'Portfolio Tag', 'conbiz' ),
		'all_items'                  => __( 'All Portfolio Tags', 'conbiz' ),
		'parent_item'                => __( 'Parent Portfolio Tag', 'conbiz' ),
		'parent_item_colon'          => __( 'Parent Portfolio Tag:', 'conbiz' ),
		'new_item_name'              => __( 'New Portfolio Tag', 'conbiz' ),
		'add_new_item'               => __( 'Add New Portfolio Tag', 'conbiz' ),
		'edit_item'                  => __( 'Edit Portfolio Tag', 'conbiz' ),
		'update_item'                => __( 'Update Portfolio Tag', 'conbiz' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'conbiz' ),
		'search_items'               => __( 'Search Portfolio Tags', 'conbiz' ),
		'add_or_remove_items'        => __( 'Add or remove Portfolio Tags', 'conbiz' ),
		'choose_from_most_used'      => __( 'Choose from the most used Portfolio Tags', 'conbiz' ),
		'not_found'                  => __( 'Not Found', 'conbiz' ),
	);
	$rewrite = array(
		'slug'                       => 'portfolio-tags',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'conbiz_portfolio_tags', array( 'conbiz_portfolio' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'conbiz_portfolio_tag', 0 );

}



/**
 * Team post type
 */

if ( ! function_exists('conbiz_team_post_type') ) {

function conbiz_team_post_type() {

	$labels = array(
		'name'                => _x( 'Team members', 'Post Type General Name', 'conbiz' ),
		'singular_name'       => _x( 'Team', 'Post Type Singular Name', 'conbiz' ),
		'menu_name'           => __( 'Team', 'conbiz' ),
		'parent_item_colon'   => __( 'Parent Team:', 'conbiz' ),
		'all_items'           => __( 'All team members', 'conbiz' ),
		'view_item'           => __( 'View Team', 'conbiz' ),
		'add_new_item'        => __( 'Add New Team', 'conbiz' ),
		'add_new'             => __( 'Add New', 'conbiz' ),
		'edit_item'           => __( 'Edit Team', 'conbiz' ),
		'update_item'         => __( 'Update Team', 'conbiz' ),
		'search_items'        => __( 'Search Team', 'conbiz' ),
		'not_found'           => __( 'Not found', 'conbiz' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'conbiz' ),
	);
	$rewrite = array(
		'slug'                => 'team',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'conbiz_team', 'conbiz' ),
		'description'         => __( 'conbiz team post type', 'conbiz' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', ),
		'taxonomies'          => array( 'team_category' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 80,
		'menu_icon'           => 'dashicons-groups',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'conbiz_team', $args );

}

// Hook into the 'init' action
add_action( 'init', 'conbiz_team_post_type', 0 );

}



/**
 * Team category
 */

if ( ! function_exists( 'conbiz_team_category' ) ) {

function conbiz_team_category() {

	$labels = array(
		'name'                       => _x( 'Team categories', 'Taxonomy General Name', 'conbiz' ),
		'singular_name'              => _x( 'Team category', 'Taxonomy Singular Name', 'conbiz' ),
		'menu_name'                  => __( 'Team category', 'conbiz' ),
		'all_items'                  => __( 'All categories', 'conbiz' ),
		'parent_item'                => __( 'Parent team category', 'conbiz' ),
		'parent_item_colon'          => __( 'Parent team category:', 'conbiz' ),
		'new_item_name'              => __( 'New Team Category Name', 'conbiz' ),
		'add_new_item'               => __( 'Add New Team Category', 'conbiz' ),
		'edit_item'                  => __( 'Edit Team Category', 'conbiz' ),
		'update_item'                => __( 'Update Team Category', 'conbiz' ),
		'separate_items_with_commas' => __( 'Separate team categories with commas', 'conbiz' ),
		'search_items'               => __( 'Search Team Categories', 'conbiz' ),
		'add_or_remove_items'        => __( 'Add or remove team categories', 'conbiz' ),
		'choose_from_most_used'      => __( 'Choose from the most used team categories', 'conbiz' ),
		'not_found'                  => __( 'Not Found', 'conbiz' ),
	);
	$rewrite = array(
		'slug'                       => 'team-category',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'team_category', array( 'conbiz_team' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'conbiz_team_category', 0 );

}



/**
 * Testimonial Post type
 */

if ( ! function_exists('conbiz_testimonial_post_type') ) {

function conbiz_testimonial_post_type() {
	
	$labels = array(
		'name'                => _x( 'Testimonials', 'Post Type General Name', 'conbiz' ),
		'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'conbiz' ),
		'menu_name'           => __( 'Testimonial', 'conbiz' ),
		'parent_item_colon'   => __( 'Parent Testimonial:', 'conbiz' ),
		'all_items'           => __( 'All Testimonials', 'conbiz' ),
		'view_item'           => __( 'View Testimonial', 'conbiz' ),
		'add_new_item'        => __( 'Add New Testimonial', 'conbiz' ),
		'add_new'             => __( 'Add New', 'conbiz' ),
		'edit_item'           => __( 'Edit Testimonial', 'conbiz' ),
		'update_item'         => __( 'Update Testimonial', 'conbiz' ),
		'search_items'        => __( 'Search Testimonial', 'conbiz' ),
		'not_found'           => __( 'Not found', 'conbiz' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'conbiz' ),
	);
	$rewrite = array(
		'slug'                => 'testimonial',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'conbiz_testimonial', 'conbiz' ),
		'description'         => __( 'Conbiz testimonial post type.', 'conbiz' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes', ),
		'taxonomies'          => array( 'testimonial_category' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 80,
		'menu_icon'           => 'dashicons-format-quote',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'conbiz_testimonial', $args );

}

// Hook into the 'init' action
add_action( 'init', 'conbiz_testimonial_post_type', 0 );

}



/**
 * Change Title Placeholder
 */

function conbiz_testimonial_change_default_title_placeholder( $title ){

    $screen = get_current_screen();

    if ( 'conbiz_testimonial' == $screen->post_type ){
        $title = __( 'Client Name','conbiz' );
    }

    return $title;
}

add_filter( 'enter_title_here', 'conbiz_testimonial_change_default_title_placeholder' );




/**
 * Testimonial category
 */

if ( ! function_exists( 'conbiz_testimonial_category' ) ) {

function conbiz_testimonial_category() {

	$labels = array(
		'name'                       => _x( 'Testimonial Categories', 'Taxonomy General Name', 'conbiz' ),
		'singular_name'              => _x( 'Testimonial Category', 'Taxonomy Singular Name', 'conbiz' ),
		'menu_name'                  => __( 'Testimonial Category', 'conbiz' ),
		'all_items'                  => __( 'All Testimonial Categories', 'conbiz' ),
		'parent_item'                => __( 'Parent Testimonial Category', 'conbiz' ),
		'parent_item_colon'          => __( 'Parent Testimonial Category:', 'conbiz' ),
		'new_item_name'              => __( 'New Testimonial Category Name', 'conbiz' ),
		'add_new_item'               => __( 'Add New Testimonial Category', 'conbiz' ),
		'edit_item'                  => __( 'Edit Testimonial Category', 'conbiz' ),
		'update_item'                => __( 'Update Testimonial Category', 'conbiz' ),
		'separate_items_with_commas' => __( 'Separate Testimonial Categories with commas', 'conbiz' ),
		'search_items'               => __( 'Search Testimonial Categories', 'conbiz' ),
		'add_or_remove_items'        => __( 'Add or remove Testimonial Categories', 'conbiz' ),
		'choose_from_most_used'      => __( 'Choose from the most used testimonial categories', 'conbiz' ),
		'not_found'                  => __( 'Not Found', 'conbiz' ),
	);
	$rewrite = array(
		'slug'                       => 'testimonial-category',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'testimonial_category', array( 'conbiz_testimonial' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'conbiz_testimonial_category', 0 );

}



/**
 * Client logos post type
 */

if ( ! function_exists('conbiz_client_logos_post_type') ) {

function conbiz_client_logos_post_type() {

	$labels = array(
		'name'                => _x( 'Logos', 'Post Type General Name', 'conbiz' ),
		'singular_name'       => _x( 'Logo', 'Post Type Singular Name', 'conbiz' ),
		'menu_name'           => __( 'Partner,logo, etc.', 'conbiz' ),
		'parent_item_colon'   => __( 'Parent logo:', 'conbiz' ),
		'all_items'           => __( 'All Logos', 'conbiz' ),
		'view_item'           => __( 'View Logo', 'conbiz' ),
		'add_new_item'        => __( 'Add New Logo', 'conbiz' ),
		'add_new'             => __( 'Add New Logo', 'conbiz' ),
		'edit_item'           => __( 'Edit Logo', 'conbiz' ),
		'update_item'         => __( 'Update Logo', 'conbiz' ),
		'search_items'        => __( 'Search Logo', 'conbiz' ),
		'not_found'           => __( 'Not found', 'conbiz' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'conbiz' ),
	);
	$rewrite = array(
		'slug'                => 'logos',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'conbiz_client_logos', 'conbiz' ),
		'description'         => __( 'logos post type.', 'conbiz' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'page-attributes', ),
		'taxonomies'          => array( 'client_logo_category' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'menu_position'       => 80,
		'menu_icon'           => 'dashicons-businessman',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'conbiz_client_logos', $args );

}

// Hook into the 'init' action
add_action( 'init', 'conbiz_client_logos_post_type', 0 );

}



/**
 * Client Logo category
 */

if ( ! function_exists( 'conbiz_client_logos_category' ) ) {

// Register Custom Taxonomy
function conbiz_client_logos_category() {

	$labels = array(
		'name'                       => _x( 'Logo Category', 'Taxonomy General Name', 'conbiz' ),
		'singular_name'              => _x( 'Logo Category', 'Taxonomy Singular Name', 'conbiz' ),
		'menu_name'                  => __( 'Logos Category', 'conbiz' ),
		'all_items'                  => __( 'All Logos Categories', 'conbiz' ),
		'parent_item'                => __( 'Parent Logos Category', 'conbiz' ),
		'parent_item_colon'          => __( 'Parent Logos Category:', 'conbiz' ),
		'new_item_name'              => __( 'New Logos Category Name', 'conbiz' ),
		'add_new_item'               => __( 'Add New Logos Category', 'conbiz' ),
		'edit_item'                  => __( 'Edit Logos Category', 'conbiz' ),
		'update_item'                => __( 'Update Logos Category', 'conbiz' ),
		'separate_items_with_commas' => __( 'Separate Logos Categories with commas', 'conbiz' ),
		'search_items'               => __( 'Search Logos Categories', 'conbiz' ),
		'add_or_remove_items'        => __( 'Add or remove Logos Categories', 'conbiz' ),
		'choose_from_most_used'      => __( 'Choose from the most used Logos Categories', 'conbiz' ),
		'not_found'                  => __( 'Not Found', 'conbiz' ),
	);
	$rewrite = array(
		'slug'                       => 'logo-category',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'client_logo_category', array( 'conbiz_client_logos' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'conbiz_client_logos_category', 0 );

}