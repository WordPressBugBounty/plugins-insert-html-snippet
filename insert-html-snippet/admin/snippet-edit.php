<?php 
if ( ! defined( 'ABSPATH' ) ) 
	exit;

global $wpdb;
$goback=1;
$xyz_ihs_snippetId = intval($_GET['snippetId']);

$xyz_ihs_message = '';
if(isset($_GET['xyz_ihs_msg'])){
	$xyz_ihs_message = intval($_GET['xyz_ihs_msg']);
}
if($xyz_ihs_message == 1){

	?>
<!-- <div class="xyz_ihs_system_notice_area_style1" id="xyz_ihs_system_notice_area">
HTML Snippet successfully updated.&nbsp;&nbsp;&nbsp;<span
id="xyz_ihs_system_notice_area_dismiss">Dismiss</span>
</div> -->
			<div class="notice notice-success is-dismissible">
                <p><strong>HTML Snippet successfully updated. &nbsp;&nbsp;&nbsp;</strong></p>
</div>
<?php
}

if(isset($_GET['goback']))
    $goback= intval($_GET['goback']);

    
$xyz_ihs_snippetId = intval($_GET['snippetId']);
if(isset($_POST) && isset($_POST['updateSubmit'])){
	if (!isset($_REQUEST['_wpnonce'] ) || ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'ihs-edit_'.$xyz_ihs_snippetId )) {
	wp_nonce_ays( 'ihs-edit_'.$xyz_ihs_snippetId );
	exit;
	} 
	$goback=intval($_POST['goback']);
	$goback++;

	$_POST = stripslashes_deep($_POST);
	$_POST = xyz_trim_deep($_POST);
	
	
	
	$temp_xyz_ihs_title = str_replace(' ', '', $_POST['snippetTitle']);
	$temp_xyz_ihs_title = str_replace('-', '', $temp_xyz_ihs_title);
	
	$xyz_ihs_title = str_replace(' ', '-', $_POST['snippetTitle']);
	$xyz_ihs_snippetDescription=sanitize_text_field($_POST['xyz_ihs_snippetDescription']);
	$xyz_ihs_content = $_POST['snippetContent'];
    $xyz_ihs_insertionMethod = intval($_POST['xyz_ihs_insertionMethod']);
    $xyz_ihs_insertionLocation = intval($_POST['xyz_ihs_insertionLocation']);

if ($xyz_ihs_insertionLocation == XYZ_IHS_INSERTION_LOCATION['ADMIN_RUN_ON_HEADER'] || $xyz_ihs_insertionLocation == XYZ_IHS_INSERTION_LOCATION['ADMIN_RUN_ON_FOOTER']) {
    $xyz_ihs_insertionLocationType = XYZ_IHS_INSERTION_LOCATION_TYPE['ADMIN'];
}
else if($xyz_ihs_insertionLocation == XYZ_IHS_INSERTION_LOCATION['FRONTEND_RUN_ON_HEADER'] || $xyz_ihs_insertionLocation == XYZ_IHS_INSERTION_LOCATION['FRONTEND_RUN_ON_FOOTER']){
    $xyz_ihs_insertionLocationType = XYZ_IHS_INSERTION_LOCATION_TYPE['FRONT_END']; 
}
else{
    $xyz_ihs_insertionLocationType = 0; 
}

	if($xyz_ihs_title != "" && $xyz_ihs_content != ""){
		
		// if(ctype_alnum($temp_xyz_ihs_title))		
		if (preg_match('/^[\p{L}\p{N}_-]+$/u', $temp_xyz_ihs_title)) 
		{
		$snippet_count = $wpdb->query($wpdb->prepare( 'SELECT * FROM '.$wpdb->prefix.'xyz_ihs_short_code WHERE id!=%d AND title=%s LIMIT 0,1',$xyz_ihs_snippetId,$xyz_ihs_title)) ;
		
		if($snippet_count == 0){
			$xyz_shortCode = '[xyz-ihs snippet="'.$xyz_ihs_title.'"]';
			
			$wpdb->update($wpdb->prefix.'xyz_ihs_short_code', array('title'=>$xyz_ihs_title,'description'=>$xyz_ihs_snippetDescription,'insertionMethod' => $xyz_ihs_insertionMethod, 'insertionLocation' => $xyz_ihs_insertionLocation, 'insertionLocationType' => $xyz_ihs_insertionLocationType,'content'=>$xyz_ihs_content,'short_code'=>$xyz_shortCode,), array('id'=>$xyz_ihs_snippetId));
			
			wp_safe_redirect(admin_url('admin.php?page=insert-html-snippet-manage&action=snippet-edit&snippetId='.$xyz_ihs_snippetId.'&xyz_ihs_msg=1'.'&goback='.$goback));
	
		}
		else{
			?>
			<div class="xyz_ihs_system_notice_area_style0" id="xyz_ihs_system_notice_area">
			HTML Snippet already exists. &nbsp;&nbsp;&nbsp;<span id="xyz_ihs_system_notice_area_dismiss">Dismiss</span>
			</div>
			<?php	
	
		}
		}
		else
		{
			?>
		<div class="xyz_ihs_system_notice_area_style0" id="xyz_ihs_system_notice_area">
		HTML Snippet title can have only alphabets,numbers or hyphen. &nbsp;&nbsp;&nbsp;<span id="xyz_ihs_system_notice_area_dismiss">Dismiss</span>
		</div>
		<?php
		
		}
		
	
	}else{
?>		
		<div class="xyz_ihs_system_notice_area_style0" id="xyz_ihs_system_notice_area">
			Fill all mandatory fields. &nbsp;&nbsp;&nbsp;<span id="xyz_ihs_system_notice_area_dismiss">Dismiss</span>
		</div>
<?php 
		}

	
}

global $wpdb;


$snippetDetails = $wpdb->get_results($wpdb->prepare( 'SELECT * FROM '.$wpdb->prefix.'xyz_ihs_short_code WHERE id=%d LIMIT 0,1',$xyz_ihs_snippetId )) ;
$snippetDetails = $snippetDetails[0];

$xyz_ihs_insertionMethod = $snippetDetails->insertionMethod;
$xyz_ihs_insertionLocation = $snippetDetails->insertionLocation;
?>

<div class="xyz_ihs_manage xyz_ihs_edit">
	<div class="xyz_ihs_manage_header">
		<div class="xyz_ihs_manage_heading">
			<h2>Edit HTML Snippet</h2>
			<p>Update how this snippet is placed and the HTML it outputs.</p>
		</div>
	</div>
	<form name="frmmainForm" id="frmmainForm" class="xyz_ihs_edit_form" method="post">
			<?php wp_nonce_field( 'ihs-edit_'.$xyz_ihs_snippetId ); ?>
			
		<input type="hidden" id="snippetId" name="snippetId" value="<?php if(isset($_POST['snippetId'])){ echo esc_attr($_POST['snippetId']);}else{ echo esc_attr($snippetDetails->id); }?>">
		<input type="hidden" name="goback" value="<?php echo esc_attr($goback); ?>">
		<div id="shortCode" hidden></div>

		<div class="xyz_ihs_edit_row">
			<label for="xyz_ihs_insertionMethod">Placement Methods <span class="xyz_ihs_required">*</span></label>
			<div class="xyz_ihs_edit_control">
				<select class="xyz_ihs_uniq_select" name="xyz_ihs_insertionMethod" id="xyz_ihs_insertionMethod">
					<option value="<?php echo XYZ_IHS_INSERTION_METHOD['AUTOMATIC']; ?>" <?php if ($xyz_ihs_insertionMethod == XYZ_IHS_INSERTION_METHOD['AUTOMATIC']) { echo "selected"; } ?>>Automatic</option>
					<option value="<?php echo XYZ_IHS_INSERTION_METHOD['SHORT_CODE']; ?>" <?php if ($xyz_ihs_insertionMethod == XYZ_IHS_INSERTION_METHOD['SHORT_CODE']) { echo "selected"; } ?>>Short code (Manual)</option>
                         
                            </select>
			</div>
		</div>


		<div class="xyz_ihs_edit_row" id="xyz_ihs_insertionLocationTR">
			<label for="xyz_ihs_insertionLocation">Insertion Location <span class="xyz_ihs_required">*</span></label>
			<div class="xyz_ihs_edit_control">
    <div class="xyz_ihs_insertionLocationDiv">
					<span id="xyz_ihs_insertion-location-txt">Select Insertion Location </span>
					<span class="xyz_ihs_location_arrows"><i class="fa fa-angle-down" aria-hidden="true"></i> <i class="fa fa-angle-up" aria-hidden="true"></i></span>

    </div>
				<input type="hidden" id="xyz_ihs_insertionLocation" name="xyz_ihs_insertionLocation" value="<?php echo esc_attr($xyz_ihs_insertionLocation); ?>">
    <ul id="xyz_ihs_uniq_list" class="xyz_ihs_uniq_list">
					<div class="xyz_ihs_left_column">
    
    <li class="xyz_ihs_li_h2"><label>Admin</label></li>
						<li class="xyz_ihs_li_option <?php echo ($xyz_ihs_insertionLocation == XYZ_IHS_INSERTION_LOCATION['ADMIN_RUN_ON_HEADER']) ? 'selected' : ''; ?>" data-value="<?php echo XYZ_IHS_INSERTION_LOCATION['ADMIN_RUN_ON_HEADER']; ?>">Run on header</li>
						<li class="xyz_ihs_li_option <?php echo ($xyz_ihs_insertionLocation == XYZ_IHS_INSERTION_LOCATION['ADMIN_RUN_ON_FOOTER']) ? 'selected' : ''; ?>" data-value="<?php echo XYZ_IHS_INSERTION_LOCATION['ADMIN_RUN_ON_FOOTER']; ?>">Run on footer</li>
    
    <li class="xyz_ihs_li_h2"><label>Front end</label></li>

						<li class="xyz_ihs_li_option <?php echo ($xyz_ihs_insertionLocation == XYZ_IHS_INSERTION_LOCATION['FRONTEND_RUN_ON_HEADER']) ? 'selected' : ''; ?>" data-value="<?php echo XYZ_IHS_INSERTION_LOCATION['FRONTEND_RUN_ON_HEADER']; ?>">Run on header</li>
						<li class="xyz_ihs_li_option <?php echo ($xyz_ihs_insertionLocation == XYZ_IHS_INSERTION_LOCATION['FRONTEND_RUN_ON_FOOTER']) ? 'selected' : ''; ?>" data-value="<?php echo XYZ_IHS_INSERTION_LOCATION['FRONTEND_RUN_ON_FOOTER']; ?>">Run on footer</li>
   
    </div>
					<div class="xyz_ihs_right_column"></div>
				</ul>
    </div>
		</div>
		<div class="xyz_ihs_edit_row">
			<label for="snippetTitle">Tracking Name <span class="xyz_ihs_required">*</span></label>
			<div class="xyz_ihs_edit_control">
				<input type="text" name="snippetTitle" id="snippetTitle" value="<?php if(isset($_POST['snippetTitle'])){ echo esc_attr($_POST['snippetTitle']);}else{ echo esc_attr($snippetDetails->title); }?>">
</div>
		</div>

		<div class="xyz_ihs_edit_row">
			<label for="xyz_ihs_snippetDescription">Description</label>
			<div class="xyz_ihs_edit_control">
				<textarea id="xyz_ihs_snippetDescription" name="xyz_ihs_snippetDescription"><?php
$xyz_ihs_description_value = isset($_POST['xyz_ihs_snippetDescription']) ? $_POST['xyz_ihs_snippetDescription'] : $snippetDetails->description;
echo esc_textarea( is_string( $xyz_ihs_description_value ) ? $xyz_ihs_description_value : '' );
?></textarea>
			</div>
		</div>

		<div class="xyz_ihs_edit_row">
			<label for="snippetContent">HTML code <span class="xyz_ihs_required">*</span></label>
			<div class="xyz_ihs_edit_control">
				<textarea id="snippetContent" name="snippetContent" class="xyz_ihs_code"><?php if(isset($_POST['snippetContent'])){ echo esc_textarea($_POST['snippetContent']);}else{ echo esc_textarea($snippetDetails->content); }?></textarea>
			</div>
		</div>

		<div class="xyz_ihs_settings_actions">
					       
			                
			<input class="xyz_ihs_btn xyz_ihs_btn_secondary" type="button" name="back" onclick="window.history.go(-<?php echo (int) $goback; ?>);" value="Back">
			<input class="xyz_ihs_btn xyz_ihs_btn_primary" type="submit" name="updateSubmit" value="Update">
					
			</div>

		</form>

</div>
<?php
require( dirname( __FILE__ ) . '/snippet-js.php' );
?>
