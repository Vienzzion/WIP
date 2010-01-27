<script src="<?php echo url::base(); ?>js/scrollable.js"></script>
<h2>
	<?php if (!empty($project['icon'])) { ?>
	<img src="<?php echo url::base(); ?>uploads/icons/<?php echo $project['icon']; ?>" class="icon" />
	<?php } else { ?>
	<img src="<?php echo url::base(); ?>images/icons/coffee_mug.png" width="48" height="48" class="icon" alt="" />
	<?php } ?>
	<?php echo $project['name']; ?>'s Timeline
</h2>

<div style="float: left;font-size: 18px; letter-spacing: -1px; color: #AAA; text-align: right; margin-bottom: 5px;">
Category: <em><?php echo $categories[$project['cid']]; ?></em> <?php if (!empty($project['website'])) { echo ' (<a href="'. $project['website'] .'">www</a>)'; } ?>
</div>

<div style="float: right; font-size: 18px; letter-spacing: -1px; color: #AAA; text-align: right; margin-bottom: 5px;"><?php echo $project['logtime']; ?></div>

<div style="clear: both; background-color: #FFF; border: 1px solid #777; padding: 0px; margin: 0px;">
<p style="margin: 10px; padding: 0px;"><?php echo $project['description']; ?></p>
</div>

<?php if (empty($timeline)) { ?>

<div style="border: 2px solid #800; background-color: #FDD; margin: 10px; padding: 10px;">
	Oh no! There's no updates in this project just yet. You should add something, you know.
</div>

<?php } else { ?>

<div class="scrollableWrapper" style="margin-top: 10px; margin-left: auto; margin-right: auto;">

	<div class="navi"></div>

	<!-- navigator -->
	<!-- prev link -->
	<a class="prev"></a>
	<!-- root element for scrollable -->
	<div class="scrollable">
		<div id="thumbs">
			<?php echo $timeline; ?>
		</div>
	</div>
	<!-- next link -->
	<a class="next"></a>
	<!-- let rest of the page float normally -->
	<br clear="all" />
</div>
<?php } ?>
