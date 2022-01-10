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
    // Post type labels
    $post_type_labels = array(
      'name'                => __( 'Project Inventory', PI_TEXT_DOMAIN ),
      'singular_name'       => __( 'Project', PI_TEXT_DOMAIN ),
      'menu_name'           => __( 'Project Inventory', PI_TEXT_DOMAIN ),
      'name_admin_bar'      => __( 'Project Inventory', PI_TEXT_DOMAIN ),
      'add_new'             => __( 'Add Project', PI_TEXT_DOMAIN ),
      'add_new_item'        => __( 'Add Project', PI_TEXT_DOMAIN ),
      'new_item'            => __( 'New Project', PI_TEXT_DOMAIN ),
      'edit_item'           => __( 'Edit Project', PI_TEXT_DOMAIN ),
      'view_item'           => __( 'View Project', PI_TEXT_DOMAIN ),
      'all_items'           => __( 'View Project Inventory', PI_TEXT_DOMAIN ),
      'search_items'        => __( 'Search Project', PI_TEXT_DOMAIN ),
      'parent_item_colon'   => __( 'Parent', PI_TEXT_DOMAIN ),
      'not_found'           => __( 'Project not found.', PI_TEXT_DOMAIN ),
      'not_found_in_trash'  => __( 'Project not found in trash.', PI_TEXT_DOMAIN )
    );

    $technologies_labels = array(
      'name'                => __( 'Technologies', PI_TEXT_DOMAIN ),
      'singular_name'       => __( 'Technology', PI_TEXT_DOMAIN ),
      'search_items'        => __( 'Search Technology', PI_TEXT_DOMAIN ),
      'popular_items'       => __( 'Popular Technologies', PI_TEXT_DOMAIN ),
      'all_items'           => __( 'All Technologies', PI_TEXT_DOMAIN ),
      'parent_item'         => __( 'Parent Technology ?' ),
      'edit_item'           => __( 'Edit Technology', PI_TEXT_DOMAIN ),
      'view_item'           => __( 'View Technology', PI_TEXT_DOMAIN ),
      'update_item'         => __( 'Update Technology', PI_TEXT_DOMAIN ),
      'add_new_item'        => __( 'Add New Technology', PI_TEXT_DOMAIN ),
      'new_item_name'       => __( 'Add Technology Name', PI_TEXT_DOMAIN )
    );

    $teams_labels = array(
      'name'                => __( 'Teams', PI_TEXT_DOMAIN ),
      'singular_name'       => __( 'Team or Team Member', PI_TEXT_DOMAIN ),
      'search_items'        => __( 'Search Team or Team Member', PI_TEXT_DOMAIN ),
      'all_items'           => __( 'All Teams', PI_TEXT_DOMAIN ),
<<<<<<< Updated upstream
      'parent_item'         => __( 'Which Team of Member?' ),
=======
      'parent_item'         => __( 'Parent Team ?' ),
>>>>>>> Stashed changes
      'edit_item'           => __( 'Edit Team or Team Member', PI_TEXT_DOMAIN ),
      'view_item'           => __( 'View Team or Team Member', PI_TEXT_DOMAIN ),
      'update_item'         => __( 'Update Team or Team Member', PI_TEXT_DOMAIN ),
      'add_new_item'        => __( 'Add New Team or Team Member', PI_TEXT_DOMAIN ),
      'new_item_name'       => __( 'Add Team or Team Member', PI_TEXT_DOMAIN ),
      'not_found'           => __( 'Teams or Team Member Not Found', PI_TEXT_DOMAIN ),
      'no_terms'            => __( 'No Teams or Team Member', PI_TEXT_DOMAIN ),
      'filter_by_item'      => __( 'Filter', PI_TEXT_DOMAIN )
    );

    $os_labels = array(
      'name'                => __( 'Operating Systems', PI_TEXT_DOMAIN ),
      'singular_name'       => __( 'Operating System', PI_TEXT_DOMAIN ),
      'search_items'        => __( 'Search OS', PI_TEXT_DOMAIN ),
      'all_items'           => __( 'All Os', PI_TEXT_DOMAIN ),
      'parent_item'         => __( 'Parent OS ?' ),
      'edit_item'           => __( 'Edit Os', PI_TEXT_DOMAIN ),
      'view_item'           => __( 'View Os', PI_TEXT_DOMAIN ),
      'update_item'         => __( 'Update Os', PI_TEXT_DOMAIN ),
      'add_new_item'        => __( 'Add New Os', PI_TEXT_DOMAIN ),
      'new_item_name'       => __( 'Add Os', PI_TEXT_DOMAIN ),
      'not_found'           => __( 'Os Not Found', PI_TEXT_DOMAIN ),
      'no_terms'            => __( 'No OS', PI_TEXT_DOMAIN ),
      'filter_by_item'      => __( 'Filter', PI_TEXT_DOMAIN )
    );

    register_post_type( 'pi', array(
      'labels'             => $post_type_labels,
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
      'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
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
    ));

    // register project category
    register_taxonomy( 'pi_categories', 'pi', array(
      'hierarchical'  => true,
      'query_var'     => true,
      'rewrite'       => true,
      'show_in_rest'  => true,
      'label'         => __( 'Categories', PI_TEXT_DOMAIN ),
      'singular_name' => __( 'Category', PI_TEXT_DOMAIN ),
      'capabilities'  => array(
        'manage_terms' => 'manage_pi_categories',
        'edit_terms'   => 'manage_pi_categories',
        'delete_terms' => 'manage_pi_categories',
        'assign_terms' => 'assign_pi_categories'
      )
    ));

    // register project's technologies
    register_taxonomy( 'pi_technologies', 'pi', array(
      'labels'              => $technologies_labels,
      'hierarchical'        => false,
      'query_var'           => true,
      'rewrite'             => false,
      'show_in_rest'        => true,
      'capabilities'        => array(
        'manage_terms' => 'manage_pi_technologies',
        'edit_terms'   => 'manage_pi_technologies',
        'delete_terms' => 'manage_pi_technologies',
        'assign_terms' => 'manage_pi_technologies'
      )
    ));

    // register project's teams
    register_taxonomy( 'pi_teams', 'pi', array(
      'labels'              => $teams_labels,
      'hierarchical'        => true,
      'query_var'           => true,
      'rewrite'             => true,
      'show_in_rest'        => true,
      'capabilities'        => array(
        'manage_terms' => 'manage_pi_teams',
        'edit_terms'   => 'manage_pi_teams',
        'delete_terms' => 'manage_pi_teams',
        'assign_terms' => 'manage_pi_teams'
      )
    ));

    // register operating system
    register_taxonomy( 'pi_os', 'pi', array(
      'labels'              => $os_labels,
      'hierarchical'        => true,
      'query_var'           => true,
      'rewrite'             => true,
      'show_in_rest'        => true,
      'capabilities'        => array(
        'manage_terms' => 'manage_pi_os',
        'edit_terms'   => 'manage_pi_os',
        'delete_terms' => 'manage_pi_os',
        'assign_terms' => 'manage_pi_os'
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
      'assign_pi_categories',
      'manage_pi_technologies',
      'manage_pi_teams',
      'manage_pi_os'
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