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
							<th class="col col-1">Type</th>
							<th class="col col-2">Modify</th>
						</tr>
						<?php if(count($recycled) > 0) { $i = 1; ?>
							<?php
								foreach ($recycled as $recycle) {
									$row = ($i % 2 != 0) ? 'row row-1' : 'alt';
									$i++;
							?>
								<tr class="<?php echo $row; ?>">
									<td class="col col-0"><?php echo $recycle['name']; ?></td>
									<td class="col col-1">
										<?php
											$property = unserialize($recycle['data']);
											/*echo "<pre>";
											var_dump($property);
											echo "</pre>";*/
											switch($recycle['table']){
												case "files":
													if(file_exists(WEBROOT . $public_folder . '/images/'.$property['file'])) {
														echo '<a href="'. base_url() . $public_folder . '/images/'.$property['file'] .'" class="overlay" target="image"><img src="'. vasp_theme() .'/images/photo.png' .'" /></a>';
													} else if(file_exists(WEBROOT . $public_folder . '/documents/'.$property['file'])) {
														echo '<a href="'. base_url() . $public_folder . '/documents/'.$property['file'] .'" target="_blank"><img src="'. vasp_theme() .'/images/document.png' .'" /></a>';
													} else if(file_exists(WEBROOT . $public_folder . '/audio/'.$property['file'])) {
														echo '<a href="'. base_url() . $public_folder . '/audio/'.$property['file'] .'" target="_blank"><img src="'. vasp_theme() .'/images/audio.png' .'" /></a>';
													} else if(file_exists(WEBROOT . $public_folder . '/video/'.$property['file'])) {
														echo '<a href="'. base_url() . $public_folder . '/video/'.$property['file'] .'" target="_blank"><img src="'. vasp_theme() .'/images/video.png' .'" /></a>';
													}
												break;
												case "layouts":
													echo $property['type'];
												break;
												case "newsletters":
													if(file_exists(WEBROOT.'upload/audio/'.$property['file'])) {
														echo '<a href="'. base_url().'upload/audio/'.$property['file'] .'" target="_blank"><img src="'. vasp_theme() .'/images/audio.png' .'" /></a>';
													}
												break;
												case "videos":
													if(file_exists(WEBROOT.'upload/video/'.$property['file'])) {
														echo '<a href="'. base_url().'upload/video/'.$property['file'] .'" target="_blank"><img src="'. vasp_theme() .'/images/video.png' .'" /></a>';
													}
												break;
												default:
													if(file_exists(WEBROOT . $public_folder . '/images/'.$property['file'])) {
														echo '<a href="'. base_url() . $public_folder . '/images/'.$property['file'] .'" class="overlay" target="image"><img src="'. vasp_theme() .'/images/photo.png' .'" /></a>';
													} else if(file_exists(WEBROOT . $public_folder . '/documents/'.$property['file'])) {
														echo '<a href="'. base_url() . $public_folder . '/documents/'.$property['file'] .'" target="_blank"><img src="'. vasp_theme() .'/images/document.png' .'" /></a>';
													} else if(file_exists(WEBROOT . $public_folder . '/audio/'.$property['file'])) {
														echo '<a href="'. base_url() . $public_folder . '/audio/'.$property['file'] .'" target="_blank"><img src="'. vasp_theme() .'/images/audio.png' .'" /></a>';
													} else if(file_exists(WEBROOT . $public_folder . '/video/'.$property['file'])) {
														echo '<a href="'. base_url() . $public_folder . '/video/'.$property['file'] .'" target="_blank"><img src="'. vasp_theme() .'/images/video.png' .'" /></a>';
													}
												break;
											}
										?>
									</td>
									<td class="col col-2"><a href="<?php echo site_url('admin/recycle/restore/'.$recycle['id']); ?>">Restore</a> | <a href="<?php echo site_url('admin/recycle/del/'.$recycle['id']); ?>">Delete</a></td>
								</tr>
						<?php } ?>
					<?php } ?>
					</table>
				</div>
			</div>

			<div id="sidebar-wrapper">
				<div id="sidebar">
					<ul id="mini-nav">
						<li <?php if(current_url() == 'file'){ echo 'class="active"'; } ?>><a href="<?php echo site_url('file'); ?>">All</a></li>
						<li <?php if(current_url() == 'file/images'){ echo 'class="active"'; } ?>><a href="<?php echo site_url('file/images'); ?>">Images</a></li>
						<li <?php if(current_url() == 'file/documents'){ echo 'class="active"'; } ?>><a href="<?php echo site_url('file/documents'); ?>">Documents</a></li>
						<li <?php if(current_url() == 'file/audio'){ echo 'class="active"'; } ?>><a href="<?php echo site_url('file/audio'); ?>">Audio</a></li>
						<li <?php if(current_url() == 'file/video'){ echo 'class="active"'; } ?>><a href="<?php echo site_url('file/video'); ?>">Video</a></li>
					</ul>
				</div>
			</div>
		</div>