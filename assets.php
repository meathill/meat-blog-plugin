<?php

function resize_by_qiniu( $html, $post_id, $post_thumbnail_id, $size ) {
  if($html) {
    $html = preg_replace_callback('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', function ($matches) {
      $img = $matches[1];
      if (preg_match('~//qiniu.meathill.com/~', $img)) {
        $img = $img . '?imageView2/0/w/1200';
      }
      return str_replace($matches[1], $img, $matches[0]);
    }, $html);
  }
  return $html;
}
add_filter( 'post_thumbnail_html', 'resize_by_qiniu', 10, 4 );