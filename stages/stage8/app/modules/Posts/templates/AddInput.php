<form action="<?php echo $t['target_url']; ?>" method="post">
	<fieldset>
		<div class="form_row">
			<label for="input_title">Title:</label>
			<input type="text" name="title" id="input_title" />
		</div>
		<div class="form_row">
			<label for="input_content">Content:</label>
			<textarea name="content" id="input_content"></textarea>
		</div>
		<div class="form_row">
			<label for="input_category">Category:</label>
			<select name="category" id="input_category">
				<option value="1">No category</option>
				<option value="2">Agavi</option>
			</select>
		</div>
		<div class="form_row form_row_submit">
			<button type="submit" class="submit">Add Post</button>
		</div>
	</fieldset>
</form>