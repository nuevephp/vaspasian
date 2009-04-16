<?php foreach ($children as $child) { ?>
<tr id="page_<?php echo $child['id']; ?>" class="child">
	<td class="label pad node level-<?php echo $level; if(!$child['has_children']) echo ' no-children'; else if($child['is_expanded']) echo ' children-visible'; else echo ' children-hidden'; ?>">
		<div class="page" style="padding-left: 4px;">
			<span class="w1">
				<?php if($child['has_children']){ ?>
					<img src="<?php echo admin::theme(); ?>/images/spacer.png" width="16" height="16" alt="Create" />
					<?php //echo html::image(array('src'=>'cms_assets/images/spacer.gif', 'alt'=>'Spacer', 'width' => '17', 'height'=>'17', 'align'=>'middle', 'class'=>'expander', 'id'=>$child['id'])); ?>
				<?php } ?>
				<!-- <a href="<?php echo site_url('admin/page/subpage/'.$child['id']); ?>"> -->
					<img src="<?php echo admin::theme(); ?>/images/page.png" width="16" height="16" alt="Page" />
					<?php //echo html::image(array('src'=>'cms_assets/images/page.png', 'alt'=>'Page', 'width' => '32', 'height'=>'32', 'align'=>'middle')); ?>
					<span class="title"><?php echo $child['title']; ?></span>
				<!-- </a> -->
				<?php //echo html::image(array('src'=>'cms_assets/images/drag.gif', 'alt'=>'Drag and Drop', 'align'=>'middle', 'class'=>'drag')) ?>
			</span>
		</div>
	</td>
	<td class="quantity pad"><a href="<?php echo site_url($child['slug']); ?>"><?php //echo site_url($child['slug']); ?></a></td>
	<td class="status pad published-status"><?php //echo extend::status($child['status']); ?></td>
	<td class="modify pad">
		<a href="<?php echo site_url('admin/page/create/'.$child['id']); ?>">
			<img src="<?php echo admin::theme(); ?>/images/create.png" width="16" height="16" alt="Create" />
			<?php //echo html::image(array('src'=>'cms_assets/images/create.png', 'alt'=>'Add', 'width' => '16', 'height'=>'16', 'align'=>'middle')); ?>
		</a>
		<a href="<?php echo site_url('admin/page/edit/'.$child['id']); ?>">
			<img src="<?php echo admin::theme(); ?>/images/pencil.png" width="16" height="16" alt="Edit" />
			<?php //echo html::image(array('src'=>'cms_assets/images/pencil.png', 'alt'=>'Edit', 'width' => '16', 'height'=>'16', 'align'=>'middle')); ?>
		</a>
		<a href="<?php echo site_url('admin/page/delete/'.$child['id']); ?>">
			<img src="<?php echo admin::theme(); ?>/images/delete.png" width="16" height="16" alt="Delete" />
			<?php //echo html::image(array('src'=>'cms_assets/images/delete.png', 'alt'=>'Delete', 'width' => '16', 'height'=>'16', 'align'=>'middle')); ?>
		</a>
	</td>
	<?php if($child['has_children']) $this->children($child['id'], $level); ?>
</tr>
<?php } ?>