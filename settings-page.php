<?php

add_action('admin_menu', function () {
  add_submenu_page(
    'options-general.php',
    'Google Places',
    'Google Places',
    'manage_options',
    NBGP_PLUGIN_SLUG,
    function () {
      include_once __DIR__ . '/templates/settings.php';
    },
    99,
  );
});

add_action('admin_init', function () {
  register_setting(NBGP_PLUGIN_SLUG, nbgp_token_option_key());
  register_setting(NBGP_PLUGIN_SLUG, nbgp_place_id_option_key());
});