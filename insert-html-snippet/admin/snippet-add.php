<?php 
if ( ! defined( 'ABSPATH' ) ) 
	exit;
global $wpdb;
$goback=1;
$_POST = stripslashes_deep($_POST);
$_POST = xyz_trim_deep($_POST);
$xyz_ihs_insertionLocation ='';
if(isset($_POST) && isset($_POST['addSubmit'])){
	if(!isset($_REQUEST['_wpnonce'])||!wp_verify_nonce($_REQUEST['_wpnonce'],'ihs-add_')){
		wp_nonce_ays( 'ihs-add_' );
		exit;
	} 
	$goback=intval($_POST['goback']);
	$goback++;
	$temp_xyz_ihs_title = str_replace(' ', '', $_POST['snippetTitle']);
	$temp_xyz_ihs_title = str_replace('-', '', $temp_xyz_ihs_title);
	$xyz_ihs_title = str_replace(' ', '-', $_POST['snippetTitle']);
    $xyz_ihs_snippetDescription=sanitize_text_field($_POST['xyz_ihs_snippetDescription']);
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
	$xyz_ihs_content = $_POST['snippetContent'];
	
	if($xyz_ihs_title != "" && $xyz_ihs_content != ""){
		//if(ctype_alnum($temp_xyz_ihs_title)) replaced with regex to support unicode characters
		if (preg_match('/^[\p{L}\p{N}_-]+$/u', $temp_xyz_ihs_title)) 
		{
			$snippet_count = $wpdb->query($wpdb->prepare( 'SELECT * FROM '.$wpdb->prefix.'xyz_ihs_short_code WHERE title=%s' ,$xyz_ihs_title)) ;
			
			if($snippet_count == 0){
				$xyz_shortCode = '[xyz-ihs snippet="'.$xyz_ihs_title.'"]';
				$wpdb->insert($wpdb->prefix.'xyz_ihs_short_code', array('title' =>$xyz_ihs_title,'description'=>$xyz_ihs_snippetDescription,'insertionMethod' => $xyz_ihs_insertionMethod, 'insertionLocation' => $xyz_ihs_insertionLocation, 'insertionLocationType' => $xyz_ihs_insertionLocationType,'content'=>$xyz_ihs_content,'short_code'=>$xyz_shortCode,'status'=>'1'),array('%s','%s','%d','%d','%d','%s','%s','%d'));
				wp_safe_redirect(admin_url('admin.php?page=insert-html-snippet-manage&xyz_ihs_msg=1'));
			}
			else{
?>
<div class="xyz_ihs_system_notice_area_style0" id="xyz_ihs_system_notice_area">
	HTML Snippet already exists. &nbsp;&nbsp;&nbsp;
	<span id="xyz_ihs_system_notice_area_dismiss">Dismiss</span>
</div>
<?php	
			}
		}
		else{
?>
<div class="xyz_ihs_system_notice_area_style0" id="xyz_ihs_system_notice_area">
	HTML Snippet title can have only alphabets,numbers or hyphen. &nbsp;&nbsp;&nbsp;
	<span id="xyz_ihs_system_notice_area_dismiss">Dismiss</span>
</div>
<?php
		}
	}
	else{
?>		
<div class="xyz_ihs_system_notice_area_style0" id="xyz_ihs_system_notice_area">
	Fill all mandatory fields. &nbsp;&nbsp;&nbsp;
	<span id="xyz_ihs_system_notice_area_dismiss">Dismiss</span>
</div>
<?php 
		}
	
}
?>
<div class="xyz_ihs_manage xyz_ihs_edit">
	<div class="xyz_ihs_manage_header">
		<div class="xyz_ihs_manage_heading">
			<h2>Add HTML Snippet</h2>
			<p>Choose where this snippet runs and paste the HTML it should output.</p>
		</div>
							</div>
	<form name="frmmainForm" id="frmmainForm" class="xyz_ihs_edit_form" method="post">
		<?php wp_nonce_field('ihs-add_'); ?>
		<input type="hidden" name="goback" value="<?php echo esc_attr($goback); ?>">
		<div id="shortCode" hidden></div>

		<div class="xyz_ihs_edit_row">
			<label for="xyz_ihs_insertionMethod">Placement Methods <span class="xyz_ihs_required">*</span></label>
			<div class="xyz_ihs_edit_control">
				<select class="xyz_ihs_uniq_select" name="xyz_ihs_insertionMethod" id="xyz_ihs_insertionMethod">
					<option value="<?php echo XYZ_IHS_INSERTION_METHOD['AUTOMATIC']; ?>" <?php if (isset($_POST['xyz_ihs_insertionMethod']) && $_POST['xyz_ihs_insertionMethod'] == XYZ_IHS_INSERTION_METHOD['AUTOMATIC']) { echo "selected"; } ?>>Automatic</option>
					<option value="<?php echo XYZ_IHS_INSERTION_METHOD['SHORT_CODE']; ?>" <?php if (isset($_POST['xyz_ihs_insertionMethod']) && $_POST['xyz_ihs_insertionMethod'] == XYZ_IHS_INSERTION_METHOD['SHORT_CODE']) { echo "selected"; } ?>>Short code (Manual)</option>
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
    <input type="hidden" id="xyz_ihs_insertionLocation" name="xyz_ihs_insertionLocation" value="<?php echo intval($xyz_ihs_insertionLocation);?>">
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
				<input type="text" name="snippetTitle" id="snippetTitle" value="<?php if(isset($_POST['snippetTitle'])){ echo esc_attr($_POST['snippetTitle']); } ?>">
			</div>
		</div>

		<div class="xyz_ihs_edit_row">
			<label for="xyz_ihs_snippetDescription">Description</label>
			<div class="xyz_ihs_edit_control">
				<textarea id="xyz_ihs_snippetDescription" name="xyz_ihs_snippetDescription"><?php if(isset($_POST['xyz_ihs_snippetDescription'])){ echo esc_textarea(sanitize_text_field((string) $_POST['xyz_ihs_snippetDescription'])); } ?></textarea>
			</div>
		</div>

		<div class="xyz_ihs_edit_row">
			<label for="snippetContent">HTML code <span class="xyz_ihs_required">*</span></label>
			<div class="xyz_ihs_edit_control">
				<textarea id="snippetContent" name="snippetContent" class="xyz_ihs_code"><?php if(isset($_POST['snippetContent'])){ echo esc_textarea($_POST['snippetContent']); } ?></textarea>
			</div>
		</div>

		<div class="xyz_ihs_settings_actions">
					
					
					       
			                
			<input class="xyz_ihs_btn xyz_ihs_btn_secondary" type="button" name="back" value="Back" onclick="window.history.go(-<?php echo (int) $goback; ?>);">
			<input class="xyz_ihs_btn xyz_ihs_btn_primary" type="submit" name="addSubmit" value="Create">
				         

						 
			</div>
		</form>
</div>
<?php
require( dirname( __FILE__ ) . '/snippet-js.php' );
?>
