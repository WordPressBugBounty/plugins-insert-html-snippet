<?php
if ( ! defined( 'ABSPATH' ) )
    exit;
    
    global $wpdb;
    $_GET = stripslashes_deep($_GET);
    $xyz_ihs_message = $search_name_db=$search_name='';
   
    if(isset($_GET['xyz_ihs_msg'])){
        $xyz_ihs_message = intval($_GET['xyz_ihs_msg']);
    }
    if($_POST)
     {
         if(isset($_POST['search']))
         {
            if(!isset($_REQUEST['_wpnonce'])||!wp_verify_nonce($_REQUEST['_wpnonce'],'snipp-manage_') ){
                wp_nonce_ays( 'snipp-manage_' );
                exit;
            }
         }
        //  if(isset($_POST['textFieldButton2']))
        //  {
        //      if(!isset($_REQUEST['_wpnonce'])||!wp_verify_nonce($_REQUEST['_wpnonce'],'bulk_actions_ihs') ){
        //          wp_nonce_ays( 'bulk_actions_ihs' );
        //          exit;
        //      }
        //  }
        if (isset($_POST['apply_ihs_bulk_actions'])){
            if (isset($_POST['ihs_bulk_actions_snippet']))
			{
	    if(!isset($_REQUEST['_wpnonce'])||!wp_verify_nonce($_REQUEST['_wpnonce'],'bulk_actions_ihs') )
            {
                 wp_nonce_ays( 'bulk_actions_ihs' );
                 exit;
             }
                $ihs_bulk_actions_snippet=intval($_POST['ihs_bulk_actions_snippet']);
				$xyz_ihs_snippet_ids = [];
                if (isset($_POST['xyz_ihs_snippet_ids']) && is_array($_POST['xyz_ihs_snippet_ids']))
                    $xyz_ihs_snippet_ids = array_map('intval', $_POST['xyz_ihs_snippet_ids']);
                    $xyz_ihs_pageno = isset( $_GET['pagenum'] ) ? absint( $_GET['pagenum'] ) : 1;
                    
                    if (empty($xyz_ihs_snippet_ids))
                    {
                        wp_safe_redirect(admin_url('admin.php?page=insert-html-snippet-manage&xyz_ihs_msg=8&pagenum='.$xyz_ihs_pageno));
                        exit();
                    }
                    if ($ihs_bulk_actions_snippet==2)//bulk-delete
                    {
                        foreach ($xyz_ihs_snippet_ids as $snippet_id)
                        {
                            $wpdb->query($wpdb->prepare( 'DELETE FROM  '.$wpdb->prefix.'xyz_ihs_short_code  WHERE id=%d',$snippet_id)) ;
                        }
                        wp_safe_redirect(admin_url('admin.php?page=insert-html-snippet-manage&xyz_ihs_msg=3&pagenum='.$xyz_ihs_pageno));
                        exit();
                    }
                    elseif ($ihs_bulk_actions_snippet==0)//bulk-Deactivate
                    {
                        foreach ($xyz_ihs_snippet_ids as $xyz_ihs_snippetId)
                            $wpdb->update($wpdb->prefix.'xyz_ihs_short_code', array('status'=>2), array('id'=>$xyz_ihs_snippetId));
                            wp_safe_redirect(admin_url('admin.php?page=insert-html-snippet-manage&xyz_ihs_msg=4&pagenum='.$xyz_ihs_pageno));
                            exit();
                    }
                    elseif ($ihs_bulk_actions_snippet==1)//bulk-activate
                    {
                        foreach ($xyz_ihs_snippet_ids as $xyz_ihs_snippetId)
                            $wpdb->update($wpdb->prefix.'xyz_ihs_short_code', array('status'=>1), array('id'=>$xyz_ihs_snippetId));
                            wp_safe_redirect(admin_url('admin.php?page=insert-html-snippet-manage&xyz_ihs_msg=4&pagenum='.$xyz_ihs_pageno));
                            exit();
                    }
                    elseif ($ihs_bulk_actions_snippet==-1)//no action selected
                    {
                        wp_safe_redirect(admin_url('admin.php?page=insert-html-snippet-manage&xyz_ihs_msg=7&pagenum='.$xyz_ihs_pageno));
                        exit();
                    }
            }
            
        }

        
    }
    if($xyz_ihs_message == 1){
        ?>
<div class="xyz_ihs_system_notice_area_style1" id="xyz_ihs_system_notice_area">
<span id="system_notice_area_common_msg">
HTML Snippet successfully added.&nbsp;&nbsp;&nbsp;
</span>
<span
id="xyz_ihs_system_notice_area_dismiss">Dismiss</span>
</div>
<?php

}
if($xyz_ihs_message == 2){

	?>
<div class="xyz_ihs_system_notice_area_style0" id="xyz_ihs_system_notice_area">
<span id="system_notice_area_common_msg">HTML Snippet not found.&nbsp;&nbsp;&nbsp;
</span>
<span
id="xyz_ihs_system_notice_area_dismiss">Dismiss</span>
</div>
<?php

}
if($xyz_ihs_message == 3){

	?>
<div class="xyz_ihs_system_notice_area_style1" id="xyz_ihs_system_notice_area">
<span id="system_notice_area_common_msg">
HTML Snippet successfully deleted.&nbsp;&nbsp;&nbsp;
</span>
<span
id="xyz_ihs_system_notice_area_dismiss">Dismiss</span>
</div>
<?php

}
if($xyz_ihs_message == 4){

	?>
<div class="xyz_ihs_system_notice_area_style1" id="xyz_ihs_system_notice_area">
<span id="system_notice_area_common_msg">
HTML Snippet status successfully changed.&nbsp;&nbsp;&nbsp;
</span>
<span
id="xyz_ihs_system_notice_area_dismiss">Dismiss</span>
</div>
<?php

}
if($xyz_ihs_message == 5){

	?>
<div class="xyz_ihs_system_notice_area_style1" id="xyz_ihs_system_notice_area">
<span id="system_notice_area_common_msg">
HTML Snippet successfully updated.&nbsp;&nbsp;&nbsp;
</span>
<span
id="xyz_ihs_system_notice_area_dismiss">Dismiss</span>
</div>
<div class="notice notice-success is-dismissible">
	<p><strong>HTML Snippet successfully updated. &nbsp;&nbsp;&nbsp;</strong></p>
</div>
<?php
}
if($xyz_ihs_message == 7)
{
?>
 <div class="xyz_ihs_system_notice_area_style1" id="xyz_ihs_system_notice_area">
			<span id="system_notice_area_common_msg">
Please select an action to apply.&nbsp;&nbsp;&nbsp;
</span>
		<span id="xyz_ihs_system_notice_area_dismiss">Dismiss</span>
 </div>
<?php 
}
if($xyz_ihs_message == 8)
{
	?>
	<div class="xyz_ihs_system_notice_area_style1" id="xyz_ihs_system_notice_area">
<span id="system_notice_area_common_msg">		
Please select at least one snippet to perform this action.&nbsp;&nbsp;&nbsp;
</span		
<span id="xyz_ihs_system_notice_area_dismiss">Dismiss</span>
	</div>
<?php
}
?>
<div class="xyz_ihs_manage">


			<?php 
			global $wpdb;
			$pagenum = isset( $_GET['pagenum'] ) ? absint( $_GET['pagenum'] ) : 1;
			$limit = get_option('xyz_ihs_limit');			
			$offset = ( $pagenum - 1 ) * $limit;
			$field=get_option('xyz_ihs_sort_field_name');
			$order=get_option('xyz_ihs_sort_order');
			if(isset($_POST['snippet_name']))
			{
			$search_name=sanitize_text_field($_POST['snippet_name']);
			$search_name_db=esc_sql($search_name);
    		        }

	               if(isset($_POST['insertionMethod']))
			{
				$insertionMethod =intval($_POST["insertionMethod"]); 
			}
			else
			{
				$insertionMethod =0;
			}
			$strInsertionMethod='';
			if (intval($insertionMethod)>0)
			{
			$strInsertionMethod=" AND insertionMethod=$insertionMethod";
			}
		

			$entries = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix."xyz_ihs_short_code  	WHERE title like '%".$search_name_db."%'".$strInsertionMethod." ORDER BY  $field $order LIMIT $offset,$limit" );

$xyz_ihs_add_url = admin_url('admin.php?page=insert-html-snippet-manage&action=snippet-add');
$xyz_ihs_sync_needed = get_option('xyz_ihs_sync_needed');
$xyz_ihs_show_usage = get_option('xyz_ihs_show_snippet_usage');
			?>
<div class="xyz_ihs_manage_header">
	<div class="xyz_ihs_manage_heading">
		<h2>HTML Snippets</h2>
		<p>Create, place, and manage the HTML snippets on your site.</p>
	</div>
	<button type="button" class="xyz_ihs_btn xyz_ihs_btn_primary" onclick='document.location.href="<?php echo esc_url($xyz_ihs_add_url);?>"'>
		<svg class="xyz_ihs_btn_icon" width="14" height="14" viewBox="0 0 14 14" aria-hidden="true" focusable="false"><path d="M7 1.25v11.5M1.25 7h11.5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"/></svg>
		Add New HTML Snippet
	</button>
</div>
			
<?php if (( $xyz_ihs_sync_needed != 0 ) && ( $xyz_ihs_show_usage == 1 )) { ?>
<div id="ics-sync-notice" class="xyz_ihs_sync">
	<div class="xyz_ihs_sync_copy">
		<strong>Usage Tracking Sync Required</strong>
		<p>Your site needs a one-time synchronization to build snippet usage records. This helps in displaying accurate usage statistics.</p>
	</div>
	<div class="xyz_ihs_sync_actions">
		<button type="button" id="xyz-start-sync" class="xyz_ihs_btn xyz_ihs_btn_primary" data-offset="<?php echo esc_attr($xyz_ihs_sync_needed); ?>">
			<?php echo ( $xyz_ihs_sync_needed > 1 ) ? 'Resume Sync' : 'Start Sync'; ?>
		</button>
		<span id="sync-progress"></span>
	</div>
</div>
<?php } ?>
			
<div class="xyz_ihs_toolbar">
	<form method="post" id="xyz_ihs_bulk_form" class="xyz_ihs_bulk_form">
		<?php wp_nonce_field( 'bulk_actions_ihs');?>
	</form>
	<div class="xyz_ihs_bulk">
		<label for="ihs_bulk_actions_snippet">With selected</label>
		<select name="ihs_bulk_actions_snippet" id="ihs_bulk_actions_snippet" form="xyz_ihs_bulk_form">
	<option value="-1">Bulk Actions</option>
	<option value="0">Deactivate</option>
	<option value="1">Activate</option>
	<option value="2">Delete</option>
</select>
		<button type="submit" name="apply_ihs_bulk_actions" value="Apply" form="xyz_ihs_bulk_form" class="xyz_ihs_btn xyz_ihs_btn_secondary">Apply</button>
	</div>
		
	<form name="manage_snippets" class="xyz_ihs_filter_form" action="" method="post">
							 <?php wp_nonce_field('snipp-manage_');?>
		<div class="xyz_ihs_field">
				            
			<label for="insertionMethod">Snippet Placement</label>
   <select name="insertionMethod" id="insertionMethod" >
  <option value="0" <?php if($insertionMethod==0) { echo "selected"; } ?>>All</option>
	  <option value="1" <?php if($insertionMethod==1) { echo "selected"; } ?>>Automatic</option>
	<option value="2" <?php if($insertionMethod==2) { echo "selected"; } ?>>Short Code</option>
	
		</select>
	</div>
		<div class="xyz_ihs_field xyz_ihs_field_search">
			<label for="xyz_ihs_snippet_name">Search</label>
			<input type="text" id="xyz_ihs_snippet_name" name="snippet_name" value="<?php if(isset($search_name)){ echo esc_attr($search_name);}?>" placeholder="Search by tracking name">
				                 	
	          				</div>	
		<button type="submit" name="search" value="Go" class="xyz_ihs_btn xyz_ihs_btn_secondary">Go</button>
</form>		
</div>
		
<div class="xyz_ihs_table_scroll">
<table class="xyz_ihs_table">
				<thead>
					<tr>
			<th scope="col" class="xyz_ihs_col_check"><input type="checkbox" id="chkAllSnippets" form="xyz_ihs_bulk_form" /></th>
			<th scope="col" class="xyz_ihs_col_name">Tracking Name</th>
			<th scope="col" class="xyz_ihs_col_placement">Snippet Placement</th>
			<th scope="col" class="xyz_ihs_col_details">Placement Details</th>

			<th scope="col" class="xyz_ihs_col_status">Status</th>
			<th scope="col" class="xyz_ihs_col_actions">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					
		if( !empty($entries) )
        				  {
						$count=1;
						$class = '';
						foreach( $entries as $entry ) {
							$class = ( $count % 2 == 0 ) ? ' class="alternate"' : '';
							$snippetId=intval($entry->id);
							?>
					<tr <?php echo $class; ?>>
		<td class="xyz_ihs_col_check">
		<input type="checkbox" class="chk" value="<?php echo $snippetId; ?>" name="xyz_ihs_snippet_ids[]" id="xyz_ihs_snippet_ids_<?php echo $snippetId; ?>" form="xyz_ihs_bulk_form" />
					</td>
			<td class="xyz_ihs_name" title="<?php echo esc_attr( is_string( $entry->description ) ? $entry->description : '' ); ?>"><?php
			echo esc_html($entry->title);
			?></td>
			<td class="xyz_ihs_col_placement">
    <?php 
$placement_text = '';
    if ($entry->status == 2) {
				$placement_text ='<span class="xyz_ihs_muted">NA</span>';
    } else { 
    if ($entry->insertionMethod == 1) {

        $placement_text =
		'<span class="xyz_ihs_placement_inline"><span class="ihs-badge ihs-badge-auto">Automatic</span></span>';
    }
    elseif ($entry->insertionMethod == 2) {


        $placement_text =
		'<span class="xyz_ihs_placement_inline">' .
            '<span class="ihs-badge ihs-badge-shortcode">Shortcode</span> ' .
            '<span onclick="xyz_ihs_copy_shortcode(' . (int) $entry->id . ')" ' .
            'class="xyz_ihs_copy_shortcode" id="xyz_ihs_shortcode_' . (int) $entry->id . '">' .
            '[xyz-ihs snippet="' . esc_html($entry->title) . '"]</span>' .
		'<span class="xyz_ihs_inline_icon" onclick="xyz_ihs_copy_shortcode(' . (int) $entry->id . ')" title="Click to copy">' .
            '<img class="xyz_ihs_img xyz_ihs_img_table" title="Click to copy" ' .
            'src="' . esc_url(plugins_url('insert-html-snippet/images/copy-document.png')) . '">' .
		'</span></span>';
}
echo $placement_text;
}?>
</td>
		<td class="xyz_ihs_details xyz_ihs_col_details">
		<?php
		if ($entry->status == 2) {
			echo '—';
		} elseif ($entry->insertionMethod == 1) {
			if (!empty($entry->insertionLocation)) {
				echo esc_html(
					xyz_ihs_get_insertion_location_label($entry->insertionLocation)
				);
			} else {
				echo '—';
    }
		} elseif ($entry->insertionMethod == 2) {

			$post_count=0;
			$post_count = $wpdb->get_var($wpdb->prepare(
				"SELECT COUNT(*) FROM {$wpdb->prefix}xyz_ihs_usage WHERE snippet_id = %d", 
				$entry->id
			));
			if ($post_count > 0 && (get_option('xyz_ihs_show_snippet_usage')==1)) {
			  echo 'Used in ' . $count . ' posts/pages';
			}else {
			  if(get_option('xyz_ihs_show_snippet_usage')!=1)
			  echo '<span title="Usage details are hidden. Enable &quot;Show Snippet Usage Details&quot; in settings." style="cursor: help;">Hidden</span>';      else
				echo 'Not used';
			}
		}
    ?>
</td>
			<td class="xyz_ihs_col_status">
							<?php 
								if($entry->status == 2){
						echo '<span class="xyz_ihs_status xyz_ihs_status_inactive">Inactive</span>';
								}elseif ($entry->status == 1){
						echo '<span class="xyz_ihs_status xyz_ihs_status_active">Active</span>';
								}
							
							?>
						</td>
			<td class="xyz_ihs_col_actions">
			<div class="xyz_ihs_actions">
						<?php 
								if($entry->status == 2){
								$stat1 = admin_url('admin.php?page=insert-html-snippet-manage&action=snippet-status&snippetId='.$snippetId.'&status=1&pageno='.$pagenum);
						?>
			<a class="xyz_ihs_action xyz_ihs_action_activate" href='<?php echo wp_nonce_url($stat1,'ihs-stat_'.$snippetId); ?>' title="Activate" aria-label="Activate">
				<i class="fa fa-play" aria-hidden="true"></i>
						</a>
							<?php 
								}elseif ($entry->status == 1){
									$stat2 = admin_url('admin.php?page=insert-html-snippet-manage&action=snippet-status&snippetId='.$snippetId.'&status=2&pageno='.$pagenum);
								?>
			<a class="xyz_ihs_action xyz_ihs_action_deactivate" href='<?php echo wp_nonce_url($stat2,'ihs-stat_'.$snippetId); ?>' title="Deactivate" aria-label="Deactivate">
				<i class="fa fa-pause" aria-hidden="true"></i>
						</a>
								<?php 	
								}
								
							?>
						
			<a class="xyz_ihs_action xyz_ihs_action_edit" href='<?php echo admin_url('admin.php?page=insert-html-snippet-manage&action=snippet-edit&snippetId='.$snippetId.'&pageno='.$pagenum); ?>' title="Edit Snippet" aria-label="Edit Snippet">
				<i class="fa fa-pencil" aria-hidden="true"></i>
						</a>

						<?php $delurl = admin_url('admin.php?page=insert-html-snippet-manage&action=snippet-delete&snippetId='.$snippetId.'&pageno='.$pagenum);?>
			<a class="xyz_ihs_action xyz_ihs_action_danger" href='<?php echo wp_nonce_url($delurl,'ihs-del_'.$snippetId); ?>' title="Delete Snippet" aria-label="Delete Snippet" onclick="javascript: return confirm('Please click \'OK\' to confirm ');">
				<i class="fa fa-trash" aria-hidden="true"></i>
			</a>
			</div>
			</td>
					</tr>
					<?php
					$count++;
						}
					} else { ?>
		<tr class="xyz_ihs_empty_row">
			<td colspan="6">
				<div class="xyz_ihs_empty">
					<strong>HTML Snippets not found</strong>
					<span>Add a snippet to start placing HTML on your site.</span>
				</div>
			</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
</div>
			
<div class="xyz_ihs_list_footer">
	<button type="button" class="xyz_ihs_btn xyz_ihs_btn_primary" onclick='document.location.href="<?php echo esc_url($xyz_ihs_add_url);?>"'>
		<svg class="xyz_ihs_btn_icon" width="14" height="14" viewBox="0 0 14 14" aria-hidden="true" focusable="false"><path d="M7 1.25v11.5M1.25 7h11.5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"/></svg>
		Add New HTML Snippet
	</button>
			<?php
			$total = $wpdb->get_var( "SELECT COUNT(`id`) FROM ".$wpdb->prefix."xyz_ihs_short_code" );
			$num_of_pages = ceil( $total / $limit );

			$page_links = paginate_links( array(
					'base' => add_query_arg( 'pagenum','%#%'),
				    'format' => '',
				    'prev_text' =>  '&laquo;',
				    'next_text' =>  '&raquo;',
				    'total' => $num_of_pages,
				    'current' => $pagenum
			) );

			if ( $page_links ) {
		echo '<div class="xyz_ihs_pagination">' . $page_links . '</div>';
			}

			?>
</div>
	
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery("#chkAllSnippets").click(function(){
		jQuery(".chk").prop("checked",jQuery("#chkAllSnippets").prop("checked"));
    }); 
	    // Handling the Sync Button click
		jQuery(document).on('click', '#xyz-start-sync', function(e) {
    e.preventDefault();
    let btn = jQuery(this);
    let progress = jQuery('#sync-progress');
    btn.prop('disabled', true).text('Syncing...');
    // Read initial offset from button data attribute
    let initialOffset = parseInt(btn.data('offset')) || 0;
    function runSyncBatch(offset) {
        jQuery.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'xyz_ihs_sync_usage',
                offset: offset
            },
            success: function(response) {
                if (response.success && response.data.status === 'processing') {
                    progress.text('Processed ' + response.data.new_offset + ' posts...');
                    // Update button data-offset to keep track
                    btn.data('offset', response.data.new_offset);
                    runSyncBatch(response.data.new_offset);
                } else {
                    progress.text('✅ Sync Complete!');
                    btn.prop('disabled', false).text('Sync Usage Now');
                    btn.data('offset', 0); // reset offset
                    location.reload(); 
                }
            },
            error: function() {
                progress.text('❌ Sync failed. Please try again.');
                btn.prop('disabled', false).text('Sync Usage Now');
            }
        });
    }
    runSyncBatch(initialOffset);
});
});
const xyz_ihs_copy_shortcode = (id) => {

    var span = document.getElementById("xyz_ihs_shortcode_" + id);
    var tempTextarea = document.createElement("textarea");
    tempTextarea.value = span.textContent;
    document.body.appendChild(tempTextarea);
    tempTextarea.select();
    tempTextarea.setSelectionRange(0, 99999); // For mobile devices
    document.execCommand("copy");
    document.body.removeChild(tempTextarea);


  (typeof xyz_ihs_notice === 'function')? xyz_ihs_notice('Short code copied successfully',1):null;

};


const xyz_ihs_notice = (msg = '', flag = 0) => {


const noticeElement = jQuery('#xyz_ihs_system_notice_area');
if (noticeElement.length > 0) 
{

  jQuery('#system_notice_area_common_msg').text(msg);
  if (flag === 0) {
  if(noticeElement.hasClass('xyz_ihs_system_notice_area_style1'))
  noticeElement.removeClass('xyz_ihs_system_notice_area_style1')
  if(! noticeElement.hasClass('xyz_ihs_system_notice_area_style0'))
  noticeElement.addClass('xyz_ihs_system_notice_area_style0');

  } else {
  if(noticeElement.hasClass('xyz_ihs_system_notice_area_style0'))
  noticeElement.removeClass('xyz_ihs_system_notice_area_style0')
  if(! noticeElement.hasClass('xyz_ihs_system_notice_area_style1'))
  noticeElement.addClass('xyz_ihs_system_notice_area_style1');

  }
  noticeElement.animate({
    opacity: 'show',
    height: 'show'
  }, 500);

}
else{



  let noticeElementString = 
`<div class="xyz_ihs_system_notice_area_style${flag}" id="xyz_ihs_system_notice_area">
    <span id="system_notice_area_common_msg">${msg}.&nbsp;&nbsp;&nbsp;</span>
    <span id="xyz_ihs_system_notice_area_dismiss">Dismiss</span>
  </div>`;

  let noticeElement = jQuery(noticeElementString);
  jQuery('body').append(noticeElement);
  noticeElement.animate({
    opacity: 'show',
    height: 'show'
  }, 500); 





}

};


</script>
