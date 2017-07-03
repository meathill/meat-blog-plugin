<?php
/**
 * Created by PhpStorm.
 * User: meathill
 * Date: 16/1/28
 * Time: 上午12:12
 */

// 增加自定义样式
function meat_header() {
  echo '<link rel="stylesheet" href="//qiniu.meathill.com/prism.min.css" >';
}
add_action('wp_head', 'meat_header');

// 移除 wp_emoji
function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
  add_filter( 'emoji_svg_url', '__return_false' );
}
add_action( 'init', 'disable_wp_emojicons' );

// 将 jquery 移到 footer
function starter_scripts() {
  wp_deregister_script( 'jquery' );
  wp_register_script( 'jquery', includes_url( '//cdn.staticfile.org/jquery/3.2.1/jquery.min.js' ), false, NULL, true );
  wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'starter_scripts' );