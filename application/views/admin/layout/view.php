		<div id="title_menu">
			<div id="page_title"><?php echo $page_title; ?></div>
		</div>
		<div id="main">
			<div id="content-wrapper">
				<div id="content">
					<?php if($success) echo '<div id="success">'. $success .'</div>'; ?>
					<?php if($error) echo '<div id="error">'. $error .'</div>'; ?>
					<form action="<?php echo site_url('layout/save'); ?>" method="post" accept-charset="utf-8">
						<p class="content">
				            <input type="hidden" name="file[name]" value="<?php echo $filename; ?>" />
				            <textarea class="textarea" id="file_content" name="file[content]" style="width: 100%; height: 400px;" rows="20" cols="40"><?php echo htmlentities($content, ENT_COMPAT, 'UTF-8'); ?></textarea><br />
				        </p>
					
						<p><input name="continue" type="submit" value="Save and Continue"> <input name="commit" type="submit" value="Save"></p>
					</form>
					</table>
				</div>
			</div>

			<div id="sidebar-wrapper">
				<div id="sidebar">
					<div id="add"><a href="<?php echo site_url('layout/new'); ?>"><span>Add</span></a></div>
					
				</div>
			</div>
		</div>