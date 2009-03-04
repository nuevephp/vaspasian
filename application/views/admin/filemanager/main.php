		<div id="title_menu">
			<div id="page_title"><?php echo $page_title; ?></div>
			<div id="create">
				<a href="<?php echo site_url('file/add'); ?>"><img src="<?php echo admin::theme(); ?>/images/create.png" alt="Add" width="16" /><span>Add</span></a>
			</div>
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
						<?php if(count($files) > 0) { $i = 1; ?>
							<?php
								foreach ($files as $file) {
									$row = ($i % 2 != 0) ? 'row row-1' : 'alt';
									$i++;
							?>
								<tr class="<?php echo $row; ?>">
									<td class="col col-0"><?php echo $file->name; ?></td>
									<td class="col col-1">
										<?php
											switch($type_url){
												case "images":
													if(file_exists(WEBROOT . $public_folder . '/images/'.$file->file)) {
														echo '<a href="'. base_url() . $public_folder . '/images/'.$file->file .'" class="overlay" target="image"><img src="'. admin::theme() .'/images/photo.png' .'" /></a>';
													}
												break;
												case "documents":
													if(file_exists(WEBROOT . $public_folder . '/documents/'.$file->file)) {
														echo '<a href="'. base_url() . $public_folder . '/documents/'.$file->file .'" target="_blank"><img src="'. admin::theme() .'/images/document.png' .'" /></a>';
													}
												break;
												case "audio":
													if(file_exists(WEBROOT . $public_folder . '/audio/'.$file->file)) {
														echo '<a href="'. base_url() . $public_folder . '/audio/'.$file->file .'" target="_blank"><img src="'. admin::theme() .'/images/audio.png' .'" /></a>';
													}
												break;
												case "video":
													if(file_exists(WEBROOT . $public_folder . '/video/'.$file->file)) {
														echo '<a href="'. base_url() . $public_folder . '/video/'.$file->file .'" target="_blank"><img src="'. admin::theme() .'/images/video.png' .'" /></a>';
													}
												break;
												default:
													if(file_exists(WEBROOT . $public_folder . '/images/'.$file->file)) {
														echo '<a href="'. base_url() . $public_folder . '/images/'.$file->file .'" class="overlay" target="image"><img src="'. admin::theme() .'/images/photo.png' .'" /></a>';
													} else if(file_exists(WEBROOT . $public_folder . '/documents/'.$file->file)) {
														echo '<a href="'. base_url() . $public_folder . '/documents/'.$file->file .'" target="_blank"><img src="'. admin::theme() .'/images/document.png' .'" /></a>';
													} else if(file_exists(WEBROOT . $public_folder . '/audio/'.$file->file)) {
														echo '<a href="'. base_url() . $public_folder . '/audio/'.$file->file .'" target="_blank"><img src="'. admin::theme() .'/images/audio.png' .'" /></a>';
													} else if(file_exists(WEBROOT . $public_folder . '/video/'.$file->file)) {
														echo '<a href="'. base_url() . $public_folder . '/video/'.$file->file .'" target="_blank"><img src="'. admin::theme() .'/images/video.png' .'" /></a>';
													}
												break;
											}
										?>
									</td>
									<td class="col col-2"><a href="<?php echo site_url('admin/filemanager/del/'.$file->id); ?>">Delete</a></td>
								</tr>
						<?php } ?>
					<?php } ?>
					</table>
				</div>
			</div>

			<div id="sidebar-wrapper">
				<div id="sidebar">
					<ul id="mini-nav">
						<li <?php if(uri_string() == 'admin/filemanager'){ echo 'class="active"'; } ?>><a href="<?php echo site_url('admin/filemanager'); ?>">All</a></li>
						<li <?php if(uri_string() == 'admin/filemanager/images'){ echo 'class="active"'; } ?>><a href="<?php echo site_url('admin/filemanager/images'); ?>">Images</a></li>
						<li <?php if(uri_string() == 'admin/filemanager/documents'){ echo 'class="active"'; } ?>><a href="<?php echo site_url('admin/filemanager/documents'); ?>">Documents</a></li>
						<li <?php if(uri_string() == 'admin/filemanager/audio'){ echo 'class="active"'; } ?>><a href="<?php echo site_url('admin/filemanager/audio'); ?>">Audio</a></li>
						<li <?php if(uri_string() == 'admin/filemanager/video'){ echo 'class="active"'; } ?>><a href="<?php echo site_url('admin/filemanager/video'); ?>">Video</a></li>
					</ul>
					<div id="uploader">
						<form id="popup-add" class="smart_form" enctype="multipart/form-data" method="post" action="<?php echo site_url($type_url ? 'admin/filemanager/'.$type_url : 'filemanager'); ?>">
							<p>
								<label for="name">Name</label>
								<input id="name" name="name" type="text" value="<?php echo set_value('name'); ?>" class="size" />
								<?php echo form_error('name'); ?>
							</p>
							<?php if(empty($type_url)) { ?>
							<p>
								<label for="type">Type</label>
								<select id="type" name="type" class="size">
									<option value="images">Images</option>
									<option value="documents">Document</option>
									<option value="audio">Audio</option>
									<option value="video">Video</option>
								</select>
							</p>
							<?php } else { ?>
							<input name="type" type="hidden" value="<?php echo $type_url; ?>" />
							<?php } ?>
							<p>
								<label for="file">File</label>
								<input id="file" name="userfile" type="file" />
								<?php echo form_error('userfile'); ?>
								<?php if(isset($file_error)) echo $file_error; ?>
							</p>
							<div class="submit">
								<input type="submit" name="submit" value="Upload" class="submit-button" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>