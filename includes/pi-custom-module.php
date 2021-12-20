<?php
/*
 * Custom Post Type for PI
 */
if ( !class_exists( 'PI_Custom_Post_Type' ) ) {
class PI_Custom_Post_Type {

  function __construct() {
    //
    add_action( 'init', array( &$this, 'pi_init' ) );

    add_action( 'admin_init', array( &$this, 'pi_extend_admin_capabilities' ) );
  }

  // Register Post Type
  function pi_init() {
    //
    $labels = array(
      'name'               => __( 'Project Inventory', PI_TEXT_DOMAIN ),
      'singular_name'      => __( 'Project', PI_TEXT_DOMAIN ),
      'menu_name'          => __( 'Project Inventory', PI_TEXT_DOMAIN ),
      'name_admin_bar'     => __( 'Project Inventory', PI_TEXT_DOMAIN ),
      'add_new'            => __( 'Add Project', PI_TEXT_DOMAIN ),
      'add_new_item'       => __( 'Add Project', PI_TEXT_DOMAIN ),
      'new_item'           => __( 'New Project', PI_TEXT_DOMAIN ),
      'edit_item'          => __( 'Edit Project', PI_TEXT_DOMAIN ),
      'view_item'          => __( 'View Project', PI_TEXT_DOMAIN ),
      'all_items'          => __( 'View Project Inventory', PI_TEXT_DOMAIN ),
      'search_items'       => __( 'Search Project', PI_TEXT_DOMAIN ),
      'parent_item_colon'  => __( 'Parent', PI_TEXT_DOMAIN ),
      'not_found'          => __( 'Project not found.', PI_TEXT_DOMAIN ),
      'not_found_in_trash' => __( 'Project not found in trash.', PI_TEXT_DOMAIN )
    );

    $args = array(
      'labels'             => $labels,
      'public'             => true,
      'show_in_rest'       => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'project' ),
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => null,
      'menu_icon'          => 'dashicons-yes',
      'supports'           => array( 'title', 'editor', 'author' ),
      'map_meta_cap'       => true,
      'capabilities'       => array(
        'publish_posts'       => 'publish_projects',
        'edit_posts'          => 'edit_projects',
        'edit_others_posts'   => 'edit_others_projects',
        'delete_posts'        => 'delete_projects',
        'delete_others_posts' => 'delete_others_projects',
        'read_private_posts'  => 'read_private_projects',
        'edit_post'           => 'edit_project',
        'delete_post'         => 'delete_project',
        'read_post'           => 'read_project'
      )
    );

    register_post_type( 'pi', $args );
    register_taxonomy( 'pi_cat', 'pi', array(
      'hierarchical'  => true,
      'query_var'     => true,
      'rewrite'       => true,
      'show_in_rest'  => true,
      'capabilities'  => array(
        'manage_terms' => 'manage_pi_categories',
        'edit_terms'   => 'manage_pi_categories',
        'delete_terms' => 'manage_pi_categories',
        'assign_terms' => 'assign_pi_categories'
      )
    ));
  }

  // Extend Role List Capabilities
  function pi_extend_admin_capabilities() {
    $role_list = apply_filters( 'pi_extend_role_capabilities', array( 'administrator' ) );

    $capabilities = array(
      'publish_projects',
      'edit_projects',
      'edit_others_projects',
      'delete_projects',
      'delete_others_projects',
      'read_private_projects',
      'edit_project',
      'delete_project',
      'read_project',
      'manage_pi_categories',
      'assign_pi_categories'
    );

    //
    foreach ( $role_list as $role_name ) {
      $role = get_role( $role_name );

      // add capability at role
      foreach ( $capabilities as $cap ) {
        $role->add_cap( $cap );
      }
    }
  }
}

new PI_Custom_Post_Type;
}