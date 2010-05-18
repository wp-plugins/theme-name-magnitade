<!doctype html>
<html dir="ltr" lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<?
	$options = get_option('classic_options');
	if (is_home()){
    $description = $options['jinxuan_description'];
} elseif (is_single()){
    if ($post->post_excerpt) {
        $description     = $post->post_excerpt;
    } else {
        $description = substr(strip_tags($post->post_content),0,220);
    }
}
?>
<meta name="description" content="<?php echo $description; ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if lte IE 6]>
		<script src="<?php bloginfo('stylesheet_directory'); ?>/javascript/png.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" charset="utf-8">
				DD_belatedPNG.fix('.png');
		</script>
		<style type="text/css" media="screen">
			form div input { background: transparent}
		</style>
<![endif]-->
<?php wp_head(); ?>
</head>
<body>
	<div id="header">
		<div class="container">
			<div class="left logo">
				<h1><a href="<?php echo get_option('home'); ?>/" class="png">I am JingXuan.</a></h1>
			</div>
			<div class="right menu">
				<ul>
					<li <?php if(is_home()){ ?>class="current"<?php } ?>><a href="<?php echo get_option('home'); ?>/">HOME</a></li>
					<li <?php if(is_page('2')){ ?>class="current"<?php } ?>><a href="<?php echo get_option('home'); ?>/about">ABOUT</a></li>
					<li <?php if(is_category() || is_single() || is_404()){ ?>class="current"<?php } ?>><a href="<?php echo get_option('home'); ?>/archives/category/blog">BLOG</a></li>
					<li <?php if(is_page('96')){ ?>class="current"<?php } ?>><a href="<?php echo get_option('home'); ?>/contact">CONTACT</a></li>
					
				</ul>
				<div class="clear"><!--  --></div>
			</div>
			<div class="clear"><!--  --></div>
		</div>
	</div><!-- #header end -->