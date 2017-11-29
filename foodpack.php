<?php

/**
 * Plugin Name: FoodPack
 * Plugin URI: https://github.com/meathill/meat-blog-plugin
 * Description: A set of useful tools.
 * Version: 0.1
 * Author: Meathill <meathill@gmail.com>
 * Author URI: http://meathill.com/
 * License: MIT
 *
 * Created by PhpStorm.
 * User: meathill
 * Date: 16/1/28
 * Time: 上午12:04
 */

define('DIR', dirname(__FILE__));

// 加载其它php
require(DIR . '/feed.php');
require(DIR . '/header.php');
require(DIR . '/footer.php');
require(DIR . '/assets.php');
