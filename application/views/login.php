<div class="left">
	<h2>
		<img src="<?php echo url::base(); ?>images/icons/circle_green.png" width="48" height="48" class="icon" alt="" />
		Strap in and get ready to WIPUP.
	</h2>

	<p>
		Once you're logged in, you're ready to take WIPUP to a personal level. If you don't have an account, you can <a href="<?php echo url::base(); ?>users/register/">register</a> one now. If you have OpenID, you can use it to immediately sign in.
	</p>

	<div class="form">
		<form action="<?php echo url::base(); ?>users/login/" method="post">
			<fieldset>
				<legend>
					<img src="<?php echo url::base(); ?>images/icons/form.png" alt="" width="16" height="16" class="icon" />
					Log in
				</legend>
				<div class="elements">
					<p>
						<label for="openid_identifier" title="WIPUP allows you to use OpenID-enabled accounts to sign in, such as Google, Facebook, Twitter, and Wordpress. Just click the OpenID icon to get started.">Username:
							<a class="rpxnow" onclick="return false;" href="https://wipup.rpxnow.com/openid/v2/signin?token_url=http%3A%2F%2F<?php echo substr(url::base(), 7); ?>users%2Frpx%2F"><img src="<?php echo url::base(); ?>images/icons/openid.gif" class="icon" /></a>
						</label>
						<input type="text" id="openid_identifier" name="openid_identifier" value="<?php //echo $form['openid_identifier']; ?>" <?php if (isset($errors['openid_identifier'])) { echo 'class="error"'; } ?> />
					</p>

					<p>
						<label for="password">Password:</label>
						<input type="password" id="password" name="password" />
					</p>

					<p>
						<label for="remember">Remember:</label>
						<input type="checkbox" id="remember" name="remember" />
					</p>

					<p class="submit">
						<input type="submit" name="submit" class="submit" value="Log me in" />
					</p>

					<p>
						By using this site, you agree to our <a href="<?php echo url::base() .'site/legal/'; ?>">legal and licensing information</a>.
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
		<img src="<?php echo url::base(); ?>images/icons/user_picture.png" alt="" />
	</div>
</div>
