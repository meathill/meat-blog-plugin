<?php

add_filter( 'the_content', 'prefix_insert_feed_ad' );

function prefix_insert_feed_ad( $content ) {
  if ( is_single() || is_admin() ) {
    return $content;
  }

  $ad_code = '<div class="ad feed-ad"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-ek+69+u-c0+ip"
     data-ad-client="ca-pub-9946806099979342"
     data-ad-slot="3936377876"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script></div>';

  return insert_ad_after($ad_code, 3, $content);
}

// Parent Function that makes the magic happen

function insert_ad_after( $ad_code, $index, $content ) {
  $closing_tag = '</article>';
  $articles = explode( $closing_tag, $content );
  $content = implode($closing_tag, array_slice($articles, 0, $index))
    . $closing_tag . $ad_code
    . implode($closing_tag, array_slice($articles, $index));

  return $content;
}
