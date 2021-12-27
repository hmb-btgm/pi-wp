<?php
function get_metaboxes( $pi ) {
  Redux::init( 'pi' );
  $metaboxes = Redux::get_post_meta('pi', $pi);
  return $metaboxes;
}

function get_pi_techologies( $pi ) {
  $id = is_array($pi) && !empty($pi['id']) ? $pi['id'] : $pi->ID;
  $techologies = get_the_terms( $id, 'pi_technologies');
  return $techologies;
}

function get_pi_teams( $pi ) {
  $id = is_array($pi) && !empty($pi['id']) ? $pi['id'] : $pi->ID;
  $teams = get_the_terms( $id, 'pi_teams');
  return $teams;
}
function get_pi_categories( $pi ) {
  $id = is_array($pi) && !empty($pi['id']) ? $pi['id'] : $pi->ID;
  $teams = get_the_terms( $id, 'pi_categories');
  return $teams;
}
  
add_action( 'rest_api_init', function () {
  //pi project metaboxes
  register_rest_field( 'pi', 'project', array(
    'get_callback' => 'get_metaboxes',
    'schema' => null
  ));
  //pi project techonologies
  register_rest_field( 'pi', 'technologies', array(
    'get_callback' => 'get_pi_techologies',
    'schema' => null
  ));
  //pi project teams
  register_rest_field( 'pi', 'teams', array(
    'get_callback' => 'get_pi_teams',
    'schema' => null
  ));
  //pi project categories
  register_rest_field( 'pi', 'categories', array(
    'get_callback' => 'get_pi_categories',
    'schema' => null
  ));
  
  function add_filter_for_pi( $args, $request ) {
    
    $tech = $request->get_param( 'tech' );
    $team = $request->get_param( 'team' );
    $cat = $request->get_param( 'cat' );
    
    if( !empty($tech) && !empty($team) && !empty($cat) ) {
      $args['tax_query'] = array(
        array(
          'taxonomy' => 'pi_technologies',
          'field'    => 'slug',
          'terms'    => $tech
        ),
        array(
          'taxonomy' => 'pi_teams',
          'field'    => 'slug',
          'terms'    => $team
        ),
        array(
          'taxonomy' => 'pi_categories',
          'field'    => 'slug',
          'terms'    => $cat
        )
      );
    }
  
    return $args;
  }
  
});
add_filter( 'rest_pi_query', 'add_filter_for_pi', 10, 2 );


