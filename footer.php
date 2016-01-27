<?php
/**
 * Created by PhpStorm.
 * User: meathill
 * Date: 16/1/28
 * Time: 上午12:14
 */

// 增加GA统计
function meat_foot() {
  readfile(dirname(__FILE__) . '/template/footer.html');
}
add_action('wp_footer', 'meat_foot');