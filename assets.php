<?php

function resize_by_qiniu( $html, $post_id, $post_thumbnail_id, $size ) {
  if($html) {
    $html = preg_replace_callback('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', function ($matches) {
      $img = $matches[1] . '?imageView2/0/w/1200';
#echo  '<!--';
#var_dump(parse_url($img),parse_url($matches[1]));
#echo '-->';
      return str_replace($matches[1], $img, $matches[0]);
    }, $html);
  }
  return $html;
}
add_filter( 'post_thumbnail_html', 'resize_by_qiniu', 10, 4 );
