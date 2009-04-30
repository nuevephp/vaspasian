<div id="nav">
	<span class="nav-left"></span>
	<span class="nav-right"></span>
	<ul>
		<?php foreach (vasp_navi() as $nav): ?>
			<li class="<?php echo $nav['cssmode']; ?>"><a href="<?php echo $nav['url']; ?>" title="Go to the <?php echo $nav['title']; ?> page"><span><?php echo $nav['title']; ?></span></a></li>
		<?php endforeach ?>
	</ul>
</div>