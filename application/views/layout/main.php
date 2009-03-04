		<div id="title_menu">
			<div id="page_title"><?php echo $page_title; ?></div>
		</div>
		<div id="main">
			<div id="content-wrapper">
				<div id="content">
					<?php if($success) echo '<div id="success">'. $success .'</div>'; ?>
					<?php if($error) echo '<div id="error">'. $error .'</div>'; ?>
					<table class="data-grid">
						<tr class="row row-0">
							<th class="col col-0">Name</th>
							<th class="col col-2">Modify</th>
						</tr>
						<?php if(count($files) > 0) { $i = 1; ?>
							<?php
								foreach ($files as $layout) {
									$row = ($i % 2 != 0) ? 'row row-1' : 'alt';
									$i++;
							?>
								<tr class="<?php echo $row; ?>">
									<td class="col col-0"><?php echo $layout->name; ?></td>
									<td class="col col-2">
										<a href="<?php echo site_url('admin/layout/edit/' . $layout->name); ?>">Edit</a> |
										<a href="<?php echo site_url('admin/layout/del/'); ?>">Delete</a>
									</td>
								</tr>
						<?php } ?>
					<?php } ?>
					</table>
				</div>
			</div>

			<div id="sidebar-wrapper">
				<div id="sidebar">
					<div id="add"><a href="<?php echo site_url('admin/layout/new'); ?>"><span>Add</span></a></div>
					<ul>
					<?php foreach ($directory as $dir) { ?>
						<li><a href="<?php echo site_url('admin/layout/dir/' . $dir->name);  ?>"><?php echo ucfirst($dir->name);  ?></a></li>
					<?php } ?>
					</ul>
				</div>
			</div>
		</div>