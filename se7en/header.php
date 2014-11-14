<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title><?php if(is_single() || is_page() || is_archive() || is_404() || is_search()) { ?><?php wp_title('|',true,'right'); ?><?php } ?><?php bloginfo('name'); ?><?php if( $paged == "" ) $pagenum = "";else echo $pagenum = " - 第 ".$paged." 页"; ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>"/>
<link rel="shortcut icon" href="http://xiaogui.org/favicon.ico" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php rss_feed(); ?>"/>
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>"/>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
<?php wp_head(); ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-16252339-1']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</head>
<body id="main">
<div id="h">
<div id="header">
<div class="features"></div>
<div id="baseHeader">
<a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo('stylesheet_directory');?>/images/xiaogui_logo.png" class="logo hfl" alt="<?php bloginfo('name'); ?>"/></a>
<ul class="nav hfl">
<li class="cat-item cat-item-9"><a href="http://xiaogui.org/program" title="">编程</a></li>
<li class="cat-item cat-item-8"><a href="http://xiaogui.org/design" title="">设计</a></li>
<li class="cat-item cat-item-3"><a href="http://xiaogui.org/software" title="">软件</a></li>
<li class="cat-item cat-item-1"><a href="http://xiaogui.org/other" title="">其他</a></li>
<?php wp_list_pages('depth=1&title_li=0&sort_column=menu_order&number=6'); ?>
</ul>
<div class="search hfr">
<?php include (TEMPLATEPATH . '/widget-search.php'); ?>
</div>
</div>
</div>
