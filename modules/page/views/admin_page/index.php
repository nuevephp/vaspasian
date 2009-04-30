		<div id="title_menu">
			<div id="page_title"><?php echo $page_title ?></div>
		</div>
		<div class="content">
			<?php if(count($page) > 0){ ?>
				<table class="table">
					<thead class="table-head">
						<tr>
							<th class="label pad-head">Name</th>
							<th class="quantity pad-head">Menu</th>
							<th class="status pad-head">Status</th>
							<th class="modify pad-head">Modify</th>
						</tr>
					</thead>
					<tbody class="table-body">
						<tr id="page_<?php echo $page['id']; ?>">
							<td class="label pad">
								<?php echo $page['title']; ?>
							</td>
							<td class="quantity pad"><?php //echo $page->in_menu ? 'Yes' : 'No'; ?></td>
							<td class="status pad"></td>
							<td class="modify pad">
								<a href="<?php echo site_url('admin/page/add/'.$page['id']); ?>">
									<img src="<?php echo vasp_theme(); ?>/images/create.png" width="16" height="16" alt="Create" />
								</a>
								<a href="<?php echo site_url('admin/page/edit/'.$page['id']); ?>">
									<img src="<?php echo vasp_theme(); ?>/images/pencil.png" width="16" height="16" alt="Edit" />
								</a>
								<a href="<?php echo site_url('admin/page/del/'.$page['id']); ?>">
									<img src="<?php echo vasp_theme(); ?>/images/delete.png" width="16" height="16" alt="Delete" />
								</a>
							</td>
						</tr>
						<?php echo $children_content; ?>
						<tr>
							<td colspan="5"><?php //echo $pagination; ?></td>
						</tr>
					</tbody>
				</table>
			<?php } else { ?>
				<div id="page_info" class="name">Please add a <a href="<?php echo site_url('admin/page/add'); ?>">new page</a> to start</div>
			<?php } ?>