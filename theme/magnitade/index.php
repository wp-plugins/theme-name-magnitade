<?php get_header(); ?>
	<div id="contentbox">
		<?php if (have_posts()) : ?>
		<div class="container">
			<div class="left category png">
				<div class="category_c png">
					<ul>
					<?php wp_list_categories('show_count=0&title_li='); ?>
					</ul>
					<div class="clear"><!--  --></div>
				</div>
			</div>
			<div class="right search">
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>
			</div>
			<div class="clear"><!--  --></div>
			<?php if($s){?><div class="keywords">KeyWords : <?php echo $s;?></div><? } ?>
			<div id="loop">
				<?php 
					while (have_posts()) : the_post(); $i++; 
					$floatclass = 'float'.$i%3;
				?>
				<div class="post <? echo $floatclass;?> png">
					<?php if (get_post_meta($post->ID, 'thumbnails', true)){ ?>
					<div class="postimg" style="background:url('<?php echo get_post_meta($post->ID, 'thumbnails', true); ?>') no-repeat center center;">
					<?php } else { ?>
					<div class="postimg" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/images/nopic.jpg') no-repeat center center;">
					<?php } ?>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Link to: <?php the_title_attribute(); ?>" class="png"><?php the_title(); ?></a>
					</div>
					
					<div class="posttext">
						<?php the_excerpt(); ?>
					</div>
					<?php if (get_post_meta($post->ID, 'url', true)){ ?>
					<div class="post_meta linkb png">
						Visit: <a href="<?php echo get_post_meta($post->ID, 'url', true); ?>" rel="bookmark" title="Link to: <?php echo get_post_meta($post->ID, 'url', true); ?>" target="_blank"><?php echo get_post_meta($post->ID, 'url', true); ?></a> 
					</div>
					<?php } else { ?>
					<div class="post_meta linka png">
						Read: <a href="<?php the_permalink() ?>" rel="bookmark" title="Link to: <?php the_title_attribute(); ?>"><?php the_title(); ?></a> <span class="date"><?php the_time('Y.m.d') ?></span>
					</div>
					<?php } ?>

				</div>
				
				<?php endwhile; ?>
				<div class="clear"><!--  --></div>
			</div><!-- #loop end -->
			<div class="pageing">
				<?php jx_pagenavi();?>
				<div class="clear"><!--  --></div>
			</div>
		</div>
		
		<?php else : endif; ?>
	</div><!-- #contentbox end -->
	
<?php get_footer(); ?>