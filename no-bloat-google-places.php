<?php
/*
Plugin Name: No Bloat Google Places
Description: Access your Google Places easily through a single php function
Version:     1.0.0
Author:      Dylan Blokhuis
*/

define('NBGP_PLUGIN_SLUG', 'no-bloat-google-places');

function nbgp_token_option_key() {
  return "nbgp_token";
}

function nbgp_place_id_option_key() {
  return "nbgp_place_id";
}

/**
 * Gets the Google place from the google api
 * @return array|WP_Error
 */
function nbgp_get_google_place() {
  // $cached_value = get_transient('nbgp_result');
  // die($cached_value);
  // if ($cached_value) {
  //   return json_decode($cached_value)->result;
  // }

  $api_key = get_option(nbgp_token_option_key());
  if (!$api_key) {
    return new WP_Error(500, "No api key option set");
  }

  $place_id = get_option(nbgp_place_id_option_key());
  if (!$place_id) {
    return new WP_Error(500, "No place id option set");
  }

  $response = wp_remote_get("https://maps.googleapis.com/maps/api/place/details/json?language=nl&place_id=" . $place_id . "&key=" . $api_key);
  if (is_wp_error($response)) {
    return new WP_Error(500, "Error fetching Google Places: " . $response->get_error_message());
  }
  if ($response['response']['code'] !== 200) {
    return new WP_Error(500, "Error fetching Google Places: " . $response['body']);
  }
  $body = json_decode($response['body']);
  if ($body->status !== "OK") {
    return new WP_Error(500, "Error fetching Google Places: " . $body->error_message);
  }

  $a_day = 86400;
  set_transient("nbgp_result", $response['body'], $a_day);
  
  return json_decode($response['body'])->result;
}

require_once "settings-page.php";
