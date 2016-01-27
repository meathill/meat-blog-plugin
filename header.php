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