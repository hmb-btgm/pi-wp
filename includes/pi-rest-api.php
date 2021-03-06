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
    
    $args['tax_query'] = array();

    if( !empty($tech) ) {
      array_push($args['tax_query'], array(
        'taxonomy' => 'pi_technologies',
        'field'    => 'slug', 
        'operator' => 'AND',
        'terms'    => explode(',',$tech)
      ));
    }

    if( !empty($team) ) {
      array_push($args['tax_query'], array(
        'taxonomy' => 'pi_teams',
        'field'    => 'slug',
        'operator' => 'AND',
        'terms'    => explode(',',$team)
      ));
    }

    if( !empty($cat) ) {
      array_push($args['tax_query'], array(
        'taxonomy' => 'pi_categories',
        'field'    => 'slug',
        'terms'    => explode(',',$cat)
      ));
    }

    if( count( $args['tax_query'] ) == 0 ) {
      unset($args['tax_query']);
    }
  
    return $args;
  }
  
});
add_filter( 'rest_pi_query', 'add_filter_for_pi', 10, 2 );


