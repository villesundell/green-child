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

/**
 * Read a .json file from the child theme and print it as JSON-LD.
 */
function greenchild_include_jsonld_file() {
  // Path to the JSON file inside your child theme:
  $json_file = get_stylesheet_directory() . '/json-ld.json';

  if (file_exists( $json_file)) {
    // Read file contents (should already be valid JSON-LD)
    $json_contents = file_get_contents($json_file);

    // For simplicity, assume the JSON valid and print it directly:
    echo '<script type="application/ld+json">' . "\n";
    echo $json_contents . "\n";
    echo '</script>' . "\n";
  }
}

add_action('wp_head', 'greenchild_include_jsonld_file');
add_action('wp_enqueue_scripts', 'greenchild_child_enqueue_styles');

