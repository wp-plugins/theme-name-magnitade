<div id="footer">
		<div class="container">
			<?php if(is_home()) { ?>
			<div class="about">
				<h2 class="png">About Me</h2>
				<p>
					<?php 
						$options = get_option('classic_options');
						if($options['jinxuan_notice_content']) {
							echo($options['jinxuan_notice_content']);
						} else {
							echo 'Pls enter something to "about me" at wp-admin -> JinXuan Theme Options.';
						}
					?> <a href="<?php echo get_option('home'); ?>/about">More</a>
				</p>
			</div>
			<?php } ?>
			<div class="rss_feed">
				<h2 class="png">RSS FEEDS</h2>
				<ul>
					<li class="png">Post (RSS) : <a href="<?php bloginfo('rss2_url'); ?>"><?php bloginfo('rss2_url'); ?></a></li>
					<li class="png">Comment (RSS) : <a href="<?php bloginfo('comments_rss2_url'); ?>"><?php bloginfo('comments_rss2_url'); ?></a></li>
				</ul>
			</div>
			<?php if(is_home()) { ?>
			<div class="mylife"><div class="mylife_c"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mylife.png" class="png" alt="" /></div></div>
			<div class="friendlinks">
				<?php wp_list_bookmarks('title_li=&category_before=&category_after=&title_before=<h2 class="png">&title_after=</h2>'); ?>
				<div class="clear"><!--  --></div>
			</div>
			<?php } ?>
			<div class="copyright png">
				Powered by <a href="http://www.wordpress.org">WordPress</a>. Design by <a href="http://www.missui.com/about">Jinxuan</a>. <?php 
						$options = get_option('classic_options');
						if($options['jinxuan_icp']) {
							echo($options['jinxuan_icp']);
						}
					?><br />
				&copy; 2008 - <?php echo date('Y');?> <a href="http://www.missui.com">I am JingXuan</a>. All right reserved. <script type="text/javascript" src="http://js.tongji.linezing.com/241561/tongji.js"></script><noscript><a href="http://www.linezing.com"><img src="http://img.tongji.linezing.com/241561/tongji.gif"/></a></noscript>
			</div>
			
			
		</div>
	</div><!-- #footer end -->
	<?php wp_footer(); ?>
</body>
</html>