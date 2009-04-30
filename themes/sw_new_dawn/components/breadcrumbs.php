<div id="breadcrumbs">
	<p>
		<a href="<?php echo site_url('home'); ?>">Home</a>
		
		<?php foreach(breadcrumbs() as $breadcrumb): ?>
			<?php if(!$breadcrumb['current_page']): ?>
			&raquo; <a href="<?php echo $breadcrumb['url']; ?>"><?php echo $breadcrumb['name']; ?></a>
			<?php elseif(current_url() === site_url('home')): ?>
			<?php else: ?>
			&raquo; <?php echo $breadcrumb['name']; ?>
			<?php endif; ?>
		<?php endforeach; ?>
	</p>
</div>