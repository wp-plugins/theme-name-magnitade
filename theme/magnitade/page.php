<?php get_header(); ?>



	<div id="contentbox">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="container">
			<div class="left pagetitle">
				<h2 class="png"><?php the_title(); ?></h2>
			</div>
			<div class="right search">
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>
			</div>
			<div class="clear"><!--  --></div>
			
			<div id="page">
				<div class="page_content">
					<?php the_content('(more)'); ?>
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div>
				<div class="clear"><!--  --></div>
			</div><!-- #page end -->

		</div>
		
		<?php endwhile; endif; ?>
	</div><!-- #contentbox end -->

<?php get_footer(); ?>