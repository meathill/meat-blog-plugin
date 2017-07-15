<?php
/**
 * Created by PhpStorm.
 * User: Meathill
 * Date: 2017/7/15
 * Time: 15:43
 */

function add_weixin_qrcode($content) {
  $content .= '<div class="weixin-gathering">
  <hr>
  <p>随手打赏，满身余香。您的支持将鼓励我继续创作！</p>
  <p><img src="http://qiniu.meathill.com/image/weixin-gathering.png"></p>
</div>';
  return $content;
}

if (is_single() && preg_match('/\bmicromessenger\b/', $_SERVER['HTTP_USER_AGENT'])) {
  add_filter('the_content', 'add_weixin_qrcode', 5);
}

