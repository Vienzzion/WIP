foobaar
<?php
?>
<?php foreach ($projects as $pid => $p_name) { ?>

<h1>
	<!-- this is statically linked and should not be -->
	<img src="/images/icons/coffee_mug.png" width="48" height="48" class="icon" alt="" />
	<?php echo $p_name; ?>'s Timeline
</h1>
<p>
	Tralalalalalalalaalllaaaaaa
</p>

<p>
	<div class="scrollableWrapper">
		<!-- navigator -->
		<div class="navi"></div>
			<!-- prev link -->
			<a class="prev"></a>
			<!-- root element for scrollable -->
			<div class="scrollable">
				<div id="thumbs">
						<?php echo $timelines[$pid]; ?>
				</div>
			</div>
			<!-- next link -->
			<a class="next"></a>
			<!-- let rest of the page float normally -->
			<br clear="all" />
		</div>
	</div>
	<script src="<?php echo url::base(); ?>js/scrollable.js"></script>
</p>

<?php } ?>
