<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->
<h2 class="png">Comments</h2>
<?php if ($comments) : ?>
	<h4 id="comments" class="png"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h4>
	<div class="height10"><!--  --></div>
	<ul class="commentlist">
	<?php foreach ($comments as $comment) : ?>
		
		<li <?php if('admin' == $comment->comment_author){?>class="admin png"<? } else { ?><?php echo $oddcomment; ?><? } ?>id="comment-<?php comment_ID() ?>" >
			<div class="comment_meta">
				<span class="right c_date"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?> at <?php comment_time() ?></a></span><span class="c_author"><?php comment_author_link() ?></span>
			</div>
			<div class="left avatar">
				<img src="<?php echo "http://www.gravatar.com/avatar.php?gravatar_id=".md5($comment->comment_author_email)?>;" />
			</div>
			<div class="right comment_content">
				<?php if ($comment->comment_approved == '0') : ?>
				<em class="font11">Your comment is awaiting moderation.</em>
				<?php endif; ?>
				<?php comment_text() ?>
				
			</div>
			<div class="clear"><!--  --></div>
		</li>
	<?php
		/* Changes every other comment to a different class */
		 
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt png" ' : '';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ul>
	<div class="height10"><!--  --></div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
		<h4 id="comments" class="png">There are no comments.</h4>

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<h3 id="respond" class="png">Leave a Reply</h3>
<div class="height10"><!--  --></div>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>
<div class="comment_form">
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	<ul>
	<?php if ( $user_ID ) : ?>

	<li>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></li>

	<?php else : ?>

	<li><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" class="c_input png" />
	<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></li>

	<li><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" class="c_input png" />
	<label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></li>

	<li><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" class="c_input png" />
	<label for="url"><small>Website</small></label></li>

	<?php endif; ?>

	<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

	<li><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4" class="c_textarea png"></textarea></li>

	<li><input name="submit" type="submit" id="submit" tabindex="5" value="Enter A Comment" class="c_submit png" />
	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
	</li>
	<?php do_action('comment_form', $post->ID); ?>

	</form>
</div>
<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
