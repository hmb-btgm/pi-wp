<?php
function get_metaboxes( $pi ) {
    Redux::init( 'pi' );
    $test = Redux::get_post_meta('pi', $pi);
    return $test;
  }
  
  add_action( 'rest_api_init', function () {
    // test
    register_rest_field( 'pi', 'project', array(
      'get_callback' => 'get_metaboxes',
      'schema' => null
    ));
  });
