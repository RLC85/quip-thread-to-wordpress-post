<h3>Quip Settings</h3>
<form action="" method="post" name="settings" id="settings">
	<table>
		<tr>
			<th>
				<span>Access Token: </span>
			</th>
			<td>
				<label for="quip-access-token">
					<input type="text" name="quip-access-token" value="<?php echo get_option('quip-access-token'); ?>" />
				</label>
			</td>
		</tr>
		<tr>
			<th>
				<span>Sync Folders: </span>
			</th>
			<td>
				<label for="quip-sync-folders">
					<input type="checkbox" name="quip-sync-folders" />
				</label>
			</td>
		</tr>
		<tr>
			<th>
				<span>Home Folder: </span>
			</th>
			<td>
				<label for="quip-home-folder">
					<input type="text" name="quip-home-folder" value="<?php echo get_option('quip-home-folder'); ?>" />
				</label>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="Save Changes" />
			</td>
		</tr>
	</table>
</form>