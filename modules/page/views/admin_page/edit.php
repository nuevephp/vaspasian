		<div id="title_menu">
			<div id="page_title"><?php echo $page_title; ?></div>
		</div>
		<div id="content">
			<div id="product-add">
				<h5>Page Information</h5>
				<ul class="ui-tabs-nav">
                    <li><a href="#general"><span>Content</span></a></li>
					<li><a href="#meta"><span>Meta data</span></a></li>
                </ul>
				<form id="super_form" name="super_form" method="post" action="<?php echo site_url(current_url()); ?>">
				<div id="general">
					<p>
                        <label for="type">Type</label>
                        <select id="type" name="type">
							
						</select>
                    </p>
					<p>
                        <label for="title">Title</label>
                        <input id="title" name="title" type="text" value="<?php echo $page['title']; ?>" size="25" class="input_size" />
                        <input id="position" name="position" type="hidden" value="<?php echo $page['position']; ?>" />
                    </p>
                    <p>
                        <label for="url">Slug</label>
                        <?php echo base_url(); ?><input id="url" name="url" type="text" value="<?php echo $page['slug'];?>" size="25" class="input_size" />
                    </p>
					<p>
						<label for="status">Status</label>
						<select id="status" name="status">
							
						</select>
					</p>
					<p>
                        <label for="group">User Group</label>
                        <select name="group" id="group">
                            <option value="0" "selected="selected">None</option>
                        </select>
                    </p>
                    <p>
                        <label for="parent">Parent:</label>
                        <select name="parent" id="parent">
                            <option value="0" <?php if (!(strcmp($parent_id,0))) echo "selected=\"selected\""; ?>>None</option>
                        <?php foreach ($parent as $head) { ?>
                            <option value="<?php echo $head->id; ?>" <?php if (!(strcmp($head['id'], (isset($repopulate->parent)) ? $repopulate->parent : $page['parent']))) echo "selected=\"selected\""; ?>><?php echo $head['title']; ?></option>
                        <?php } ?>
                        </select>
                    </p>
					<p>
                        <label for="content">Body</label>
                        <textarea id="content" name="content" rows="8" cols="20"><?php echo (isset($repopulate->content)) ? $repopulate->content : $page['content'];?></textarea>
                    </p>
				</div>
				<div id="meta">
                    <h4>Meta data</h4>
					<p>
                        <label for="keywords">Keywords</label>
                        <input id="keywords" name="keywords" type="text" value="<?php echo(isset($repopulate->keywords)) ? $repopulate->keywords : $page['keywords']; ?>" size="25" class="input_size" />
                    </p>
					<p>
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="2" class="input_size"><?php echo(isset($repopulate->description)) ? $repopulate->description : $page['description']; ?></textarea>
                    </p>
				</div>
				<div class="form_button">
					<input value="Update Page" type="submit" class="submit_button" />
				</div>
				</form>
			</div>
	  	</div>