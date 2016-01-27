<?php
/**
 * Created by PhpStorm.
 * User: meathill
 * Date: 16/1/28
 * Time: 上午12:10
 */

// feed跨域许可
function meat_rss() {
  header('Access-Control-Allow-Origin: *');
}
add_action('rss_tag_pre', 'meat_rss');

// feed流显示缩略图
function meat_feed_add_thumbnail() {
  global $post;
  if (has_post_thumbnail($post->ID)) {
    $thumbnail_ID = get_post_thumbnail_id( $post->ID );
    $thumbnail = wp_get_attachment_image_src($thumbnail_ID, 'medium');
    echo '<thumbnail>' . $thumbnail[0] . '</thumbnail>';
    return;
  }
  echo '';
}
add_action('rss2_item', 'meat_feed_add_thumbnail');