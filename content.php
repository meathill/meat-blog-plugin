<?php
/**
 * Created by PhpStorm.
 * User: Meathill
 * Date: 2017/7/15
 * Time: 15:43
 */

function check_weixin() {
  /**
   * @param string $content
   * @return string
   */
  function add_weixin_qrcode($content) {
    $content .= '<div class="weixin-gathering">
  <hr>
  <p>随手打赏，满身余香。您的支持将鼓励我继续创作！</p>
  <p><img src="//qiniu.meathill.com/image/weixin-gathering.png"></p>
</div>';
    return $content;
  }
  if (is_single() && preg_match('/\bmicromessenger\b/', $_SERVER['HTTP_USER_AGENT'])) {
    add_filter('the_content', 'add_weixin_qrcode', 10);
  }
}
add_action('template_redirect', 'check_weixin');

function add_lazy_load_to_images($content) {
  $content = str_replace('<img','<img loading="lazy"', $content);
  return $content;
}
add_filter('the_content','add_lazy_load_to_images');
