<ul>
	<?php foreach (vasp_navi('hover') as $nav): ?>
		<li><a href="<?php echo $nav['url']; ?>" title="Go to the <?php echo $nav['title']; ?> page" class="<?php echo $nav['cssmode']; ?>"><span><?php echo $nav['title']; ?></span></a></li>
	<?php endforeach ?>
</ul>