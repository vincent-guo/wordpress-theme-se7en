<?php
function rss_feed(){
	$feed = get_bloginfo('rss2_url');
	echo $feed;
}
function kudos_css() {
	echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().'/kudos.css" type="text/css" media="screen" />'."\n";
}
function livesino_excerpt_length($length) {
	return 16;
}
add_filter('excerpt_length', 'livesino_excerpt_length');
function no_self_ping( &$links ) {
	$home = get_option( 'home' );
	foreach ( $links as $l => $link )
		if ( 0 === strpos( $link, $home ) )
			unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );

function get_recent_comments() {
	global $wpdb;
	$request = "SELECT ID, comment_ID, comment_content, comment_author FROM $wpdb->posts, $wpdb->comments WHERE $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND (post_status = 'publish' OR post_status = 'static') AND comment_type = ''";
	$request .= "AND post_password ='' AND comment_approved = '1' ORDER BY $wpdb->comments.comment_date DESC LIMIT 8";
	$comments = $wpdb->get_results($request);
	$output = '';
	foreach ($comments as $comment) {
		$comment_author = stripslashes($comment->comment_author);
		$comment_content = strip_tags($comment->comment_content);
		$comment_content = stripslashes($comment_content);
		$comment_excerpt = substr($comment_content,0,80);
		$comment_excerpt = utf8_trim($comment_excerpt);
		$permalink = get_permalink($comment->ID)."#comment-".$comment->comment_ID;
		$output .= '<li><a href="'. $permalink .'" title="查看 '. $comment_author .' 的整条评论">'. $comment_author .'</a>: '. $comment_excerpt .'...</li>';
	}
	echo $output;
}
function utf8_trim($str) {
	$len = strlen($str);
	for ($i=strlen($str)-1; $i>=0; $i-=1){
		$hex .= ' '.ord($str[$i]);
		$ch = ord($str[$i]);
		if (($ch & 128)==0) return(substr($str,0,$i));
		if (($ch & 192)==192) return(substr($str,0,$i));
	}
	return($str.$hex);
}

function ignition_rel_replace($content){
	global $post;
	$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
	$replacement = '<a$1href=$2$3.$4$5 rel="ignition"$6>$7</a>';
	$content = preg_replace($pattern, $replacement, $content);
	return $content;
}
function ignition_css() {
	echo '<link rel="stylesheet" href="'.get_stylesheet_directory_uri().'/colorbox/colorbox.css" type="text/css" media="screen" />'."\n";
}
add_filter('the_content', 'ignition_rel_replace');
add_action('wp_head', 'ignition_css');
function pagenavi(){
	global $wp_query;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	$total = $wp_query->max_num_pages;
	$links = '<div class="page_navi">';
	$links .= '<span class="page-numbers pages">第 '. $current .' 页，共 '. $total .' 页</span>';
	if ( $total == 1 ) return;
	if ( $current > 1 )	$links .= pagenavi_link( $current - 1, '&laquo; 前页');
	if ( $current > 5 ) $links .= pagenavi_link( 1, '1').'<span class="page-numbers dots">...</span>';
	for( $i = $current - 3; $i <= $current + 3; $i++ ) {
		if ( $i > 0 && $i <= $total ) $i == $current ? $links .= '<span class="page-numbers current">'.$i.'</span>' : $links .= pagenavi_link( $i, $i );
	}
	if ( $current < $total - 4 ) $links .= '<span class="page-numbers dots">...</span>'. pagenavi_link( $total, $total );
	if ( $current < $total ) $links .= pagenavi_link( $current + 1, '次页 &raquo;');
	$links .= '</div>';
	echo $links;
}
function pagenavi_link($page, $n) {
	return '<a href="' . esc_url(get_pagenum_link($page)) . '" class="page-numbers">'.$n.'</a>';
}
?>