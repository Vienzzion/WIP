<div class="left">
	<h2>
		<img src="<?php echo url::base(); ?>images/icons/comment_48.png" width="48" height="48" class="icon" alt="" />
		Comments (<?php echo $comment_total; ?>)
	</h2>

	<?php foreach ($comments as $row) { ?>
<?php
$comment_var_name = 'comment'. $row->uid;
$comment_user_info = $$comment_var_name;
?>

	<div style="background-image: url('<?php echo url::base(); ?>images/comment_divide.png'); background-position: bottom; background-repeat: repeat-x; border-top: 1px dotted #BBB; padding-top: 5px; background-color: #FFF; margin-bottom: 10px; padding-bottom: 10px; padding-left: 5px; border-left: 1px solid #EEE; border-right: 1px solid #EEE; overflow: hidden;">

		<div style="float: left;">
			<?php if (!empty($comment_user_info['avatar'])) { ?>
			<img src="<?php echo url::base(); ?>uploads/avatars/<?php echo $comment_user_info['avatar']; ?>_small.jpg" class="icon" alt="" style="border: 1px solid #999; padding: 1px; float: left;" />
			<?php } else { ?>
			<img src="<?php echo url::base(); ?>images/noprojecticon.png" class="icon" alt="" style="border: 1px solid #999; padding: 1px; float: left;" />
			<?php } ?>
		</div>

		<div style="margin-left: 5px; float: left; width: 485px;">
			<h3 style="height: 20px;">
				<?php if ($row->uid == 1) { echo $comment_user_info['username']; } else { echo '<a href="'. url::base() .'profiles/view/'. $row->uid .'/" style="text-decoration: none;">'. $comment_user_info['username'] .'</a>'; } ?> says:
		<?php if ($this->uid == $row->uid && $this->uid != 1 || $this->uid == $update_uid && $this->uid != 1) { echo '<div style="float: right; margin-right: 5px;"><a href="'. url::base() .'feedback/delete/'. $row->id .'/"><img src="'. url::base() .'images/icons/delete.png" alt="Delete" class="icon" /></a></div>'; } ?>
			</h3>
			<p>
				<?php echo nl2br($row->comment);  ?>
			</p>
		</div>
	</div>
	<?php } ?>

	<p>
		If you don't have anything specific to say but you like this update nonetheless, you should <a href="<?php echo url::base(); ?>feedback/kudos/<?php echo $uid; ?>/">kudos</a> it.
	</p>

	<?php if ($comment_total == 0) { ?>
	<p>
		Uhoh! It seems as though there are <strong>no comments yet</strong> for this update. Why don't you leave one?
	</p>
	<?php } ?>

	<div class="form">
		<form action="<?php echo url::base(); ?>updates/view/<?php echo $uid; ?>/" method="post">
			<fieldset>
				<legend>
					<img src="<?php echo url::base(); ?>images/icons/clock_add.png" alt="" width="16" height="16" class="icon" />
					Leave a comment
				</legend>
				<div class="elements">
					<p>
						<label for="comment">Comment:</label>
						<textarea name="comment" id="comment" cols="40" rows="6" <?php if (isset($errors['comment'])) { echo 'class="error"'; } ?>><?php echo $form['comment']; ?></textarea>
					</p>

<?php if ($this->logged_in) { if ($subscribed != TRUE && $update_uid != 1 && $pid != 1 && $tracking == FALSE && $update_uid != $this->uid) { ?>
					<p>
						<input type="checkbox" name="subscribe" value="1" checked="checked" style="margin-left: 100px;" /> - Yes, I also want to subscribe to this project.
					</p>
<?php } ?>

<?php if ($update_uid != 1 && $update_uid != $this->uid && !isset($kudos_error)) { ?>
					<p>
						<input type="checkbox" name="kudos" value="1" checked="checked" style="margin-left: 100px;" /> - Yes, I also want to kudos this WIP.
					</p>
<?php } } ?>

					<?php if (!$this->logged_in) { ?>
					<p>
						If you were logged in, we won't ask you silly questions like in primary school.
					</p>
					<p>
						<label for="captcha">Eye test:</label>
						<input type="text" id="captcha" name="captcha" <?php if (isset($errors['captcha'])) { echo 'class="error"'; } ?> /><br /><br />
					</p>
					<p>
						<img src="<?php echo url::base(); ?>image/securimage/" alt="captcha" />
					</p>
					<?php } ?>

					<p class="submit">
						<input type="submit" name="submit" class="submit" value="Leave a comment" />
					</p>
				</div>
			</fieldset>
		</form>
	</div>

</div>

<div class="right">
	<?php
	if (isset($errors)) {
	?>
	<div class="form">
		<h3>
			<img src="/images/icons/warning_16.png" alt="" width="16" height="16" class="icon" />
			Errors Occured
		</h3>
		<div class="elements">
			<ol class="errors">
			<?php
			foreach ($errors as $error) {
				echo '<li>'. $error .'</li><br />';
			}
			?>
			</ol>
		</div>
	</div>
	<?php } ?>

	<div id="picture">
		<img src="<?php echo url::base(); ?>images/icons/mail.png" alt="" />
	</div>
</div>
