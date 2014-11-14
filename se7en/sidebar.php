<div id="sidebar">
<div class="sidebar-widget">
<div class="sidebar-feeds"><a href="<?php rss_feed(); ?>" id="feeds" target="_blank" style="color:#F36E30;text-decoration:none;">RSS 订阅</a></div>
<div class="sinaweibo"><a href="http://weibo.com/2074735461" target="_blank" style="color:#E06060;">小龟爬爬 新浪微博</a></div>
<div class="qqweibo"><a href="http://t.qq.com/xgpapa" target="_blank" style="color:#E06060;">小龟爬爬 腾讯微博</a></div>
<div class="taobaodian"><a href="http://ruocha.taobao.com" target="_blank" style="color:#E06060;">小龟爬爬 淘宝店</a></div>
<div class="translator"><a href="javascript:void(0);" onclick="translatePage();" style="color:#4B72A9">Translate this page</a></div>
</div>

<?php if ( is_single() ) { ?>
<div class="sidebar-widget hslice" id="related_posts">
<h4><span class="sidebar-title hfl">相关文章&nbsp;&nbsp;<font style="color:#37ab22">Related Posts</font></span></h4>
<ul class="entry-content sidebar-list hcf">
<?php wkc_related_posts('number=6') ?>
</ul>
</div>
<?php } ?>

<div class="sidebar-widget hslice" id="webslice">
<div class="entry-title hdn">最新文章</div>
<a rel="entry-content" href="<?php echo get_option('home'); ?>/webslice" class="hdn">Web Slices</a>
<a rel="bookmark" href="<?php echo get_option('home'); ?>" class="hdn"><?php bloginfo('name'); ?> Web Slices</a>
<h4><span class="sidebar-title hfl">最新文章&nbsp;&nbsp;<font style="color:#37ab22">Recent Posts</font></span></h4>
<ul class="entry-content sidebar-list hcf">
<?php wp_get_archives('type=postbypost&limit=6'); ?>
</ul>
</div>

<div class="sidebar-widget hslice" id="random_posts">
<h4><span class="sidebar-title hfl">随机文章&nbsp;&nbsp;<font style="color:#37ab22">Random Posts</font></span></h4>
<ul class="entry-content sidebar-list hcf">
<?php wkc_random_posts('number=6&length=50') ?>
</ul>
</div>

<?php if ( is_home() ) { ?>
<div class="sidebar-widget">
<h4><span class="sidebar-title hfl">最新评论&nbsp;&nbsp;<font style="color:#37ab22">Recent Comments</font></span></h4>
<ul class="sidebar-list hcf">
<?php get_recent_comments(); ?>
</ul>
</div>
<?php } ?>
<div class="sidebar-widget">
<h4><span class="sidebar-title hfl">存档&nbsp;&nbsp;<font style="color:#37ab22">Archives</font></span></h4>
<select class="hcf" name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;"> 
<?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
</select>
</div>
<?php if ( is_home() ) { ?>
<div class="sidebar-widget">
<h4><span class="sidebar-title hfl">链接&nbsp;&nbsp;<font style="color:#37ab22">Links</font></span></h4>
<ul class="sidebar-list hcf">
<?php wp_list_bookmarks('title_li=&categorize=0&orderby=id'); ?>
</ul>
</div>
<?php } ?>
<div class="sidebar-widget">
<h4><span class="sidebar-title hfl">赞助商广告&nbsp;&nbsp;<font style="color:#37ab22">Sponsored Ads</font></span></h4>
<script type="text/javascript"><!--
google_ad_client = "ca-pub-0788234518690852";
/* Sponsored Ads */
google_ad_slot = "6871652570";
google_ad_width = 160;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
<div class="sidebar-widget">
<h4><span class="sidebar-title hfl">Meta</span></h4>
<ul class="sidebar-list hcf">
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
</ul>
</div>
</div>
<!--/sidebar -->