<div class="left">
	<h2>
		<img src="<?php echo url::base(); ?>images/icons/image_48.png" width="48" height="48" class="icon" alt="" />
		Show people what you're working on.
	</h2>

	<p>
		Here is where you can update the progress on a project. Your updates will be public and shown right away. You can then view and share your chronological progress via your profile or project page.
	</p>

	<p>
		<strong>We're flexible.</strong> You don't need to fill up everything in the form below - only what you need. We only ask for a summary.
	</p>

	<?php if (!$this->logged_in) { ?>
	<p>
		If seems as though you are <strong>not logged in</strong>. If you <a href="<?php echo url::base(); ?>users/register/">register</a>, you will receive benefits such as project statistics, timelines, permanent file storage, and so many cool things it's not funny any more.
	</p>
	<?php } ?>

	<div class="form">
		<?php if (isset($uid)) { ?>
		<form action="<?php echo url::base(); ?>updates/add/<?php echo $uid; ?>/" method="post" enctype="multipart/form-data">
		<?php } else { ?>
		<form action="<?php echo url::base(); ?>updates/add/" method="post" enctype="multipart/form-data">
		<?php } ?>
			<fieldset>
				<legend>
					<img src="<?php echo url::base(); ?>images/icons/clock_add.png" alt="" width="16" height="16" class="icon" />
					<?php if (isset($uid)) { ?>
					Edit Update
					<?php } else { ?>
					Add an update
					<?php } ?>
				</legend>
				<div class="elements">
					<input type="hidden" name="did" value="<?php echo $form['did']; ?>" />
					<?php if ($this->logged_in) { ?>
					<p>
						<label for="pid">Project:
						<a href="<?php echo url::base(); ?>projects/add/"><img src="<?php echo url::base(); ?>images/icons/add.png" alt="Add" /></a></label>
						<select name="pid" id="pid">
						<?php foreach ($projects as $pid => $p_name) { ?>
						<option value="<?php echo $pid; ?>" <?php if ($form['pid'] == $pid) { echo 'selected="selected"'; } ?>><?php echo $p_name; ?></option>
						<?php } ?>
						<?php if (!empty($contributor_projects)) { ?>
						<option value="1">--Shared Projects--</option>
						<?php foreach ($contributor_projects as $pid => $p_name) { ?>
						<option value="<?php echo $pid; ?>" <?php if ($form['pid'] == $pid) { echo 'selected="selected"'; } ?>><?php echo $p_name; ?></option>
						<?php } ?>
						<?php } ?>
						</select>
					</p>
					<?php } ?>

					<p>
						<label for="summary">Summary:</label>
						<input type="text" id="summary" name="summary" style="height: 25px; width: 400px; font-size: 15px;" value="<?php echo $form['summary']; ?>" <?php if (isset($errors['summary'])) { echo 'class="error"'; } ?> />
					</p>

					<p>
						<label for="detail" style="height: 20px;">Detail:</label>
						<script type="text/javascript">edToolbar('detail'); </script>
						<textarea name="detail" id="detail" cols="40" rows="6" class="resizable" <?php if (isset($errors['detail'])) { echo 'class="error"'; } ?>><?php echo $form['detail']; ?></textarea>
					</p>

					<p>
						<label for="attachment">Attach:
						<?php if ($this->logged_in) { ?>
						<span>
<?php
if (isset($uid)) {
	$offset = 0;
	for ($i = 0; $i < 5; $i++) {
		if (!empty(${'existing_filename'. $i})) {
			$offset = $i + 1;
		}
	}
?>
							<a href="javascript:addUploadFields(1, <?php echo $offset; ?>)"><img src="<?php echo url::base(); ?>images/icons/add.png" alt="Add" id="add" /></a>
<?php } else { ?>
							<a href="javascript:addUploadFields(1, 1)"><img src="<?php echo url::base(); ?>images/icons/add.png" alt="Add" id="add" /></a>
<?php } ?>
						</span>
						<?php } ?></label>

<?php
if (isset($uid)) {
	for ($i = 0; $i < 5; $i++) {
		if (!empty(${'existing_filename'. $i})) {
?>
<div style="float: left; clear: both; margin-bottom: 5px;">
<span style="float: left; margin-right: 15px;"><img src="<?php echo ${'existing_icon'. $i}; ?>" alt="attachment<?php echo $i; ?>" style="padding: 1px; border: 1px solid #999;" /></span>
						<span style="float: left;"><input type="file" id="attachment" name="attachment0" style="height: 23px;" /></span>
</div>

<?php } } } else { ?>

						<span style="float: left;"><input type="file" id="attachment" name="attachment0" style="height: 23px;" /></span>

<?php } ?>

						<?php if ($this->logged_in) { ?>
						<p id="upload_fields_container"></p>
						<?php } ?>
					</p>

					<p>
						<label for="syntax">Syntax:</label>
						<select id="syntax" name="syntax">
						<?php foreach ($languages as $lid => $l_name) { ?>
						<option value="<?php echo $lid; ?>" <?php if ($form['syntax'] == $lid) { echo 'selected="selected"'; } ?>><?php echo $l_name; ?></option>
						<?php } ?>
						</select>
					</p>

					<p>
						<label for="pastebin">Pastebin:</label>
						<textarea name="pastebin" id="pastebin" rows="6" cols="40" <?php if (isset($errors['pastebin'])) { echo 'class="error"'; } ?>><?php echo $form['pastebin']; ?></textarea>
					</p>

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

					<div id="overlay" style="display: none; position: absolute; text-align: center; top: 0; left: 0; width: 100%; height: 170%; background-color: #000; -moz-opacity: 0.8; opacity: .80; filter: alpha(opacity=80);">
						<div style="display: table-cell; vertical-align: middle; color: #FFF;">
							<img src="<?php echo url::base(); ?>images/loading.gif" alt="Loading" /><br />
							Please be patient as your update is submitted.<br />
							Uploading files will take a longer time to complete. Try to resist closing your browser window.
						</div>
					</div>

					<p class="submit">
						<?php if (isset($uid)) { ?>
						<input type="submit" id="submit" name="submit" class="submit" onclick="doOverlay();" value="Edit update" />
						<?php } else { ?>
						<input type="submit" id="submit" name="submit" class="submit" onclick="doOverlay();" value="Add update" />
						<?php } ?>
					</p>

					<?php if (!isset($uid)) { ?>
					<p>
						By using this site, you agree to our <a href="<?php echo url::base() .'site/legal/'; ?>">legal and licensing information</a>.
					</p>
					<?php } ?>
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

	<div class="form">
		<h3>
			<img src="/images/icons/cup.png" alt="" width="16" height="16" class="icon" />
			Some tips
		</h3>
		<div class="elements">
			<?php if (!$this->logged_in) { ?>
			<h4>
				Anonymous File Limitations
			</h4>
			<p>
				As a guest, your files are stored temporarily and will be removed periodically. You are also limited to a maximum filesize of 5MB.
			</p>
			<?php } ?>
			
			<h4>
				File Support
			</h4>
			<p>
				gif jpg png svg tiff bmp exr pdf zip rar tar tar.gz tar.bz ogg mp3 wav avi mpg mov mp4 swf flv blend xcf doc ppt xls odt ods odp odg psd fla ai indd aep
			</p>

			<h4>
				The Pastebin
			</h4>
			<p>
				Sometimes you would like to paste source code snippets online. We do not allow single source code file uploads here, such as a .php file, but we do allow you to paste the code. If you want to release a lot of source code, consider compressing it into a single file and uploading it as a package.
			</p>
		</div>
	</div>

	<div id="picture">
		<img src="<?php echo url::base(); ?>images/icons/post_note.png" alt="" />
	</div>
</div>
