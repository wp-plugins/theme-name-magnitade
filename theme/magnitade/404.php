<?php get_header(); ?>


	<div id="contentbox">
		
		<div class="container">
			<div class="left pagetitle">
				<h2 class="png">404 Error!</h2>
			</div>
			<div class="right search">
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>
			</div>
			<div class="clear"><!--  --></div>
			
			<div id="page">
				<div class="page_content">
					<center>
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/404.png" class="png" />
					</center>
				</div>
				<div class="clear"><!--  --></div>
			</div><!-- #page end -->

		</div>
		
		
	</div><!-- #contentbox end -->

<?php get_footer(); ?>