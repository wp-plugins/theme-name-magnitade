<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

function jx_pagenavi($before = '', $after = '', $prelabel = '', $nxtlabel = '', $pages_to_show = 10, $always_show = false) {
	global $request, $posts_per_page, $wpdb, $paged;
	if(empty($prelabel)) {
		$prelabel  = '&laquo;';
	}
	if(empty($nxtlabel)) {
		$nxtlabel = '&raquo;';
	}
	$half_pages_to_show = round($pages_to_show/2);
	if (!is_single()) {
		if(!is_category()) {
			preg_match('#FROM\s(.*)\sORDER BY#siU', $request, $matches);		
		} else {
			preg_match('#FROM\s(.*)\sGROUP BY#siU', $request, $matches);		
		}
		$fromwhere = $matches[1];
		$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");
		$max_page = ceil($numposts /$posts_per_page);
		if(empty($paged)) {
			$paged = 1;
		}
		if($max_page > 1 || $always_show) {
			echo "$before";
			echo "<span class='pageing_t png'>Pages</span>";
			if ($paged >= ($pages_to_show-1)) {
				echo '<a href="'.get_pagenum_link().'" class="png">&laquo;</a>';
			}
			previous_posts_link($prelabel);
			for($i = $paged - $half_pages_to_show; $i  <= $paged + $half_pages_to_show; $i++) {
				if ($i >= 1 && $i <= $max_page) {
					if($i == $paged) {
						echo "<span class='current png'>$i</span>";
					} else {
						echo '<a href="'.get_pagenum_link($i).'" class="png">'.$i.'</a>';
					}
				}
			}
			next_posts_link($nxtlabel, $max_page);
			if (($paged+$half_pages_to_show) < ($max_page)) {
				echo '<a href="'.get_pagenum_link($max_page).'" class="png">&raquo;</a>';
			}
			echo "$after";
		}
	}
}
?>
<?php
class ClassicOptions {
	function getOptions() {
		$options = get_option('classic_options');
		if (!is_array($options)) {
			$options['jinxuan_notice'] = false;
			$options['jinxuan_notice_content'] = '';
			$options['jinxuan_description'] = '';
			$options['jinxuan_icp'] = '';
			update_option('classic_options', $options);
		}
		return $options;
	}
 
	function init() {
		if(isset($_POST['classic_save'])) {
			$options = ClassicOptions::getOptions();
			if ($_POST['jinxuan_notice']) {
				$options['jinxuan_notice'] = (bool)true;
			} else {
				$options['jinxuan_notice'] = (bool)false;
			}
			$options['jinxuan_notice_content'] = stripslashes($_POST['jinxuan_notice_content']);
			$options['jinxuan_description'] = stripslashes($_POST['jinxuan_description']);
			$options['jinxuan_icp'] = stripslashes($_POST['jinxuan_icp']);
			update_option('classic_options', $options);
		} else {
			ClassicOptions::getOptions();
		}
		add_theme_page("JinXuan Options", "JinXuan Options", 'edit_themes', basename(__FILE__), array('ClassicOptions', 'display'));
	}
	function display() {
		$options = ClassicOptions::getOptions();

		
?>
<form action="#" method="post" enctype="multipart/form-data" name="classic_form" id="classic_form">
	<div class="wrap">
		<h2><?php _e('JinXuan Theme Options', 'retweet'); ?></h2>
 		<table class="form-table">
			<tbody>
				<tr valign="top">
				<th scope="row">
				<strong><?php _e('Option', 'retweet'); ?></strong>
				<br/>
				<small style="font-weight:normal;"><?php _e('Basic option', 'retweet') ?></small>
				</th>
				<td>
				<label title="<?php _e('Enable it to show notice at homepage.You can also use HTML to add a link,js code etc.', 'retweet'); ?>">
					<input name="jinxuan_notice" type="checkbox" value="checkbox" <?php if($options['jinxuan_notice']) echo "checked='checked'"; ?> />
					<?php _e('Show About Us(HTML enabled)', 'retweet'); ?>
				</label>
				<br/>
				<label>
					<textarea name="jinxuan_notice_content" cols="50" rows="2" id="jinxuan_notice_content" style="width:98%;font-size:12px;overflow:auto;" class="code"><?php echo($options['jinxuan_notice_content']); ?></textarea>
				</label>
				<br/>
				<label title="<?php _e('Input a description and it is good for SEO.', 'retweet'); ?>">
					<?php _e('Blog description(Input for SEO,text only)', 'retweet'); ?>
				</label>
				<label>
					<textarea name="jinxuan_description" cols="50" rows="2" id="jinxuan_description" style="width:98%;font-size:12px;overflow:auto;" class="code"><?php echo($options['jinxuan_description']); ?></textarea>
				</label>
				
				<br/>
				<label title="<?php _e('Input ICP information(China User).', 'retweet'); ?>">
					<?php _e('ICP No.( Chinese users need to fill in. )', 'retweet'); ?>
				</label>
				<label>
					<textarea name="jinxuan_icp" cols="20" rows="1" id="jinxuan_icp" style="width:98%;font-size:12px;overflow:auto;" class="code"><?php echo($options['jinxuan_icp']); ?></textarea>
				</label>
				</td>
				</tr>

			</tbody>
		</table>
		<p class="submit">
			<input type="submit" name="classic_save" value="<?php _e('Update Options &raquo;', 'retweet'); ?>" />
		</p>
	</div>
</form>
<?php
	}
}
 
add_action('admin_menu', array('ClassicOptions', 'init'));
 
?>