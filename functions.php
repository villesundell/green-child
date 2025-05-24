<?php
// SPDX-License-Identifier: CC0-1.0

/**
 * Child theme functionality and smooth style enqueuing
 */

function greenchild_child_enqueue_styles() {
  // Parent theme stylesheet
  wp_enqueue_style(
    'twenty-twenty-five-style',
    get_template_directory_uri() . '/style.css',
    array(),
    wp_get_theme('twentytwentyfive')->get('Version')
  );

  // Child theme stylesheet
  wp_enqueue_style(
    'green-child-style',
    get_stylesheet_directory_uri() . '/style.css',
    array('twenty-twenty-five-style'),
    wp_get_theme()->get('Version')
  );

  // Google Fonts
  wp_enqueue_style(
    'greenchild-google-fonts',
    'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;500&family=IBM+Plex+Mono:wght@400;700&family=Barlow+Semi+Condensed:wght@400;600&display=swap',
    array(),
    null
  );
}
add_action('wp_enqueue_scripts', 'greenchild_child_enqueue_styles');

