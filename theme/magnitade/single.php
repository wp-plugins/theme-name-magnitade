<?php get_header(); ?>
	<div id="contentbox">
		<div class="container">
			
			<div class="left pagenavi">
				<a href="<?php echo get_option('home'); ?>/">HOME</a> &gt; <a href="<?php echo get_option('home'); ?>/archives/category/blog">BLOG</a> &gt; Read Post
			</div>
			<div class="right search">
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>
			</div>
			<div class="clear"><!--  --></div>
			<div id="single">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="single_content">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Link to: <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<div class="single_meta">
						Category : <?php the_category(', ') ?> <?php the_tags(' / Tags : ', ', ', ''); ?> / Date : <span class="date"><?php the_time('Y.m.d') ?></span> / <?php the_views();?>
					</div>
					<div class="post right png" style="height:190px;margin-left:10px;">
						<?php if (get_post_meta($post->ID, 'thumbnails', true)){ ?>
						<div class="postimg" style="background:url('<?php echo get_post_meta($post->ID, 'thumbnails', true); ?>') no-repeat center center;">
						<?php } else { ?>
						<div class="postimg" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/images/nopic.jpg') no-repeat center center;">
						<?php } ?>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Link to: <?php the_title_attribute(); ?>" class="png"><?php the_title(); ?></a>
						</div>
					</div>
					<div class="the_content">
						<?php the_content(); ?>
						<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						<?php if (get_post_meta($post->ID, 'url', true)){ ?>
					<div class="post_meta linkb png">
						Visit: <a href="<?php echo get_post_meta($post->ID, 'url', true); ?>" rel="bookmark" title="Link to: <?php echo get_post_meta($post->ID, 'url', true); ?>" target="_blank"><?php echo get_post_meta($post->ID, 'url', true); ?></a> 
					</div>
					<?php } ?>
					</div>
					<div class="clear"><!--  --></div>
				</div>
				<div class="right other_post">
					<?php wp_related_posts(); ?>
				</div>
				<div class="comment">
					<?php comments_template(); ?>
				</div>
				<div class="clear"><!--  --></div>
				<?php endwhile; endif; ?>
			</div><!-- #single end -->
		</div>
	</div><!-- #contentbox end -->

<?php get_footer(); ?>