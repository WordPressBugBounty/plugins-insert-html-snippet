<?php
if ( ! defined( 'ABSPATH' ) )
	 exit;
global $wpdb;
// Load the options


if(!$_POST && isset($_GET['ihs_notice'])&& $_GET['ihs_notice'] == 'hide')
{
	if (! isset( $_REQUEST['_wpnonce'] ) || ! wp_verify_nonce( $_REQUEST['_wpnonce'],'ihs-shw')){
		wp_nonce_ays( 'ihs-shw');
		exit;
	}
	update_option('xyz_ihs_dnt_shw_notice', "hide");
	?>
<style type='text/css'>
#xyz_ihs_notice_td
{
display:none !important;
}
</style>
<div class="xyz_ihs_system_notice_area_style1" id="xyz_ihs_system_notice_area">
Thanks again for using the plugin. We will never show the message again.
 &nbsp;&nbsp;&nbsp;<span id="xyz_ihs_system_notice_area_dismiss">Dismiss</span>
</div>
<?php
}

	if($_POST){
		if (! isset( $_REQUEST['_wpnonce'] ) || ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'ihs-setting_' )) {
			wp_nonce_ays( 'ihs-setting_' );
			exit;
		}
		else {
			$_POST=xyz_trim_deep($_POST);
			$_POST = stripslashes_deep($_POST);
			$xyz_ihs_limit = abs(intval($_POST['xyz_ihs_limit']));
			$xyz_ihs_pre_ads = intval($_POST['xyz_ihs_pre_ads']);
			$xyz_ihs_exec_in_editor = intval($_POST['xyz_ihs_exec_in_editor']);
			if($xyz_ihs_limit==0)$xyz_ihs_limit=20;
			$xyz_ihs_credit = sanitize_text_field($_POST['xyz_ihs_credit']);
			if($xyz_ihs_credit=="ihs" || $xyz_ihs_credit==0)
				{
					update_option('xyz_credit_link',$xyz_ihs_credit);
				}

			$xyz_ihs_sortfield=sanitize_text_field($_POST['xyz_ihs_sort_by_field']);
			if(($xyz_ihs_sortfield=="title")||($xyz_ihs_sortfield=="id"))
				{
					update_option('xyz_ihs_sort_field_name',$xyz_ihs_sortfield);
				}

			$xyz_ihs_sortorder=sanitize_text_field($_POST['xyz_ihs_sort_by_order']);
			if(($xyz_ihs_sortorder=="asc")||($xyz_ihs_sortorder=="desc"))
				{
					update_option('xyz_ihs_sort_order',$xyz_ihs_sortorder);
				}

				$xyz_ihs_show_snippet_usage=intval($_POST['xyz_ihs_show_snippet_usage']);
				update_option('xyz_ihs_show_snippet_usage',$xyz_ihs_show_snippet_usage);

			update_option('xyz_ihs_limit',$xyz_ihs_limit);
			update_option('xyz_ihs_exec_in_editor',$xyz_ihs_exec_in_editor);

?>
<!-- <div class="xyz_ihs_system_notice_area_style1" id="xyz_ihs_system_notice_area">
	Settings updated successfully. &nbsp;&nbsp;&nbsp;
	<span id="xyz_ihs_system_notice_area_dismiss">Dismiss</span>
</div> -->
			<div class="notice notice-success is-dismissible">
                <p><strong>Settings updated successfully. &nbsp;&nbsp;&nbsp;</strong></p>
</div>
<?php
		}
	}
?>
<div class="xyz_ihs_manage xyz_ihs_settings">
	<div class="xyz_ihs_manage_header">
		<div class="xyz_ihs_manage_heading">
			<h2>Settings</h2>
			<p>Control how snippets are listed, executed, and reported.</p>
		</div>
	</div>
	<form method="post" class="xyz_ihs_settings_form">
		<?php wp_nonce_field('ihs-setting_');?>
		<div class="xyz_ihs_settings_card">
			<h3 class="xyz_ihs_settings_section_title">Sorting &amp; Display</h3>
			<div class="xyz_ihs_setting_row">
				<div class="xyz_ihs_setting_copy">
					<label for="xyz_ihs_sort_by_field">Sorting of snippets</label>
					<p>Choose the order used on the snippet list.</p>
				</div>
				<div class="xyz_ihs_setting_control xyz_ihs_sort_controls">
							<select id="xyz_ihs_sort_by_field" name="xyz_ihs_sort_by_field">
								<option value="id" <?php if(isset($_POST['xyz_ihs_sort_by_field']) && $_POST['xyz_ihs_sort_by_field']=='id'){echo 'selected';} else if(get_option('xyz_ihs_sort_field_name')=="id"){echo 'selected';} ?>>Based on create time</option>
								<option value="title" <?php if(isset($_POST['xyz_ihs_sort_by_field']) && $_POST['xyz_ihs_sort_by_field']=='title'){ echo 'selected';}elseif(get_option('xyz_ihs_sort_field_name')=="title"){echo 'selected';} ?>>Based on name</option>
							</select>
					<select id="xyz_ihs_sort_by_order" name="xyz_ihs_sort_by_order" aria-label="Sort direction">
								<option value="asc" <?php if(isset($_POST['xyz_ihs_sort_by_order']) && $_POST['xyz_ihs_sort_by_order']=='asc'){ echo 'selected';}elseif(get_option('xyz_ihs_sort_order')=="asc"){echo 'selected';} ?>>Ascending</option>
								<option value="desc" <?php if(isset($_POST['xyz_ihs_sort_by_order']) && $_POST['xyz_ihs_sort_by_order']=='desc'){echo 'selected';} elseif(get_option('xyz_ihs_sort_order')=="desc"){echo 'selected';} ?>>Descending</option>
							</select>
				</div>
			</div>
			<div class="xyz_ihs_setting_row">
				<div class="xyz_ihs_setting_copy">
							<label for="xyz_ihs_limit">Pagination limit</label>
					<p>Number of snippets shown on each page of the list.</p>
				</div>
				<div class="xyz_ihs_setting_control">
					<input name="xyz_ihs_limit" type="text" id="xyz_ihs_limit" inputmode="numeric" value="<?php if(isset($_POST['xyz_ihs_limit']) ){echo abs(intval($_POST['xyz_ihs_limit']));}else{echo esc_attr(get_option('xyz_ihs_limit'));} ?>" />
				</div>
			</div>
			<div class="xyz_ihs_setting_row">
				<div class="xyz_ihs_setting_copy">
					<label for="xyz_ihs_show_snippet_usage">Show Snippet Usage Details</label>
					<p>Display where each snippet is used (posts/pages) within the admin panel. Usage data is maintained automatically after the initial sync.</p>
				</div>
				<div class="xyz_ihs_setting_control">
					<select name="xyz_ihs_show_snippet_usage" id="xyz_ihs_show_snippet_usage">
						<option value="0" <?php selected(get_option('xyz_ihs_show_snippet_usage'),0);?>>Disable</option>
						<option value="1" <?php selected(get_option('xyz_ihs_show_snippet_usage'),1);?>>Enable</option>
							</select>
				</div>
			</div>
		</div>
		<div class="xyz_ihs_settings_card">
			<h3 class="xyz_ihs_settings_section_title">Editor</h3>
			<div class="xyz_ihs_setting_row">
				<div class="xyz_ihs_setting_copy">
					<label for="xyz_ihs_exec_in_editor">Execute shortcodes in editors</label>
					<p>Enable or disable shortcode execution in editors (Gutenberg, Classic, Elementor, etc.).</p>
				</div>
				<div class="xyz_ihs_setting_control">
						<select name="xyz_ihs_exec_in_editor" id="xyz_ihs_exec_in_editor">
                                <option value="0" <?php selected(get_option('xyz_ihs_exec_in_editor'),0);?>>Disable</option>
                                <option value="1" <?php selected(get_option('xyz_ihs_exec_in_editor'),1);?>>Enable</option>
                            </select>
				</div>
			</div>
		</div>
		<div class="xyz_ihs_settings_card">
			<h3 class="xyz_ihs_settings_section_title">General</h3>
			<div class="xyz_ihs_setting_row">
				<div class="xyz_ihs_setting_copy">
					<label for="xyz_ihs_credit">Credit link to author</label>
					<p>Show a small credit link on the front end of your site.</p>
				</div>
				<div class="xyz_ihs_setting_control">
					<select name="xyz_ihs_credit" id="xyz_ihs_credit">
						<option value="ihs" <?php selected(get_option('xyz_credit_link'),"ihs"); ?>>Enable</option>
						<option value="0" <?php if(get_option('xyz_credit_link')!="ihs"){echo 'selected';} ?>>Disable</option>
			                            </select>
				</div>
			</div>
			<div class="xyz_ihs_setting_row">
				<div class="xyz_ihs_setting_copy">
					<label for="xyz_ihs_pre_ads">Premium Version Ads</label>
					<p>Show upgrade messages inside the plugin screens.</p>
				</div>
				<div class="xyz_ihs_setting_control">
					<select name="xyz_ihs_pre_ads" id="xyz_ihs_pre_ads">
						<option value="0" <?php selected(get_option('xyz_ihs_premium_version_ads'),0);?>>Disable</option>
						<option value="1" <?php selected(get_option('xyz_ihs_premium_version_ads'),1);?>>Enable</option>
					</select>
				</div>
			</div>
		</div>
		<div class="xyz_ihs_settings_actions">
			<button type="submit" id="submit" class="xyz_ihs_btn xyz_ihs_btn_primary">Update Settings</button>
		</div>
	</form>
</div>
