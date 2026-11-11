<?php
if ( ! defined( 'ABSPATH' ) )
    exit;
?>
</div>

<div class="xyz_ihs_admin_footer">
<div class="xyz_ihs_site_footer">
<?php if ( get_option( 'xyz_ihs_premium_version_ads' ) == 1 ) { ?>
<div id="xyz-ihs-premium">
    <div class="xyz_ihs_ContentCenter">
            <a target="_blank" rel="noopener noreferrer"
            href="https://xyzscripts.com/wordpress-plugins/xyz-wp-insert-code-snippet/details">Upgrade to the Fully Featured XYZ WP Insert Code Snippet Premium Plugin for </a>
             <span class="xyz_ihs_premium_price">Just 19 USD</span>
      <span class="xyz_ihs_premium_note">Access exclusive features like advanced targeting, automatic snippet placements across your site, syntax highlighting for better code management, and easy snippet export/import.</span>
    </div>
	<div class="xyz_ihs_ButtonWrap">
    <div class="xyz_ihs_BuyNowButton">
        <a target="_blank" rel="noopener noreferrer"
            href="https://xyzscripts.com/members/product/purchase/XYZWPICSPRE">Buy Now
        </a>
    </div>
    <div class="xyz_ihs_CompareButton">
             <a href="<?php echo admin_url('admin.php?page=insert-html-snippet-about');?>">Compare Specs</a>
    </div>
		</div>
</div>
<?php } ?>

<div class="xyz_ihs_footer_banner">
	<div class="xyz_ihs_footer_banner_copy">
		<strong>We are available for custom development</strong>
		<span>Custom plugins, integrations, and features — built to spec.</span>
	</div>
	<a class="xyz_ihs_footer_quote" href="https://xyzscripts.com/support/" target="_blank" rel="noopener noreferrer">
		<i class="fa fa-envelope" aria-hidden="true"></i> Get a quote
	</a>
</div>

<div class="xyz_ihs_footer_cards_panel">
	<div class="xyz_ihs_footer_cards">
		<div class="xyz_ihs_footer_card">
			<h3 class="xyz_ihs_footer_card_title"><i class="fa fa-share-alt" aria-hidden="true"></i> Follow Us</h3>
			<div class="xyz_ihs_footer_social">
				<a target="_blank" rel="noopener noreferrer" href="http://facebook.com/xyzscripts" aria-label="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				<a target="_blank" rel="noopener noreferrer" href="http://twitter.com/xyzscripts" aria-label="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				<a target="_blank" rel="noopener noreferrer" href="https://www.instagram.com/xyz_scripts/" aria-label="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
				<a target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/company/xyzscripts" aria-label="LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
			</div>
		</div>

		<div class="xyz_ihs_footer_card">
			<h3 class="xyz_ihs_footer_card_title"><i class="fa fa-headphones" aria-hidden="true"></i> Support</h3>
			<div class="xyz_ihs_footer_support">
				<a target="_blank" rel="noopener noreferrer" href="https://xyzscripts.com/support/"><i class="fa fa-phone" aria-hidden="true"></i> Contact Us</a>
				<a target="_blank" rel="noopener noreferrer" href="https://wordpress.org/support/plugin/insert-html-snippet/reviews/"><i class="fa fa-star" aria-hidden="true"></i>Please Rate Us</a>
				<a target="_blank" rel="noopener noreferrer" href="https://wordpress.org/support/plugin/insert-html-snippet/"><i class="fa fa-life-ring" aria-hidden="true"></i> Create a ticket</a>
			</div>
		</div>

		<div class="xyz_ihs_footer_card xyz_ihs_footer_subscribe_card">
			<h3 class="xyz_ihs_footer_card_title"><i class="fa fa-envelope-o" aria-hidden="true"></i> Stay tuned for our updates</h3>
			<script language="javascript">
			function check_email(emailString)
			{
				var mailPattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,})$/;
				var matchArray = emailString.match(mailPattern);
				if (emailString.length == 0)
					return false;
				if (matchArray == null)    {
					return false;
				}else{
					return true;
				}
			}
			function verify_lists(form)
			{
				var total=0;
				var checkBox=form['chk[]'];
				if(checkBox.length){
					for(var i=0;i<checkBox.length;i++){
						checkBox[i].checked?total++:null;
					}
				}
				else{
					checkBox.checked?total++:null;
				}
				if(total>0){
					return true;
				}
				else{
					return false;
				}
			}
			function verify_fields()
			{
				if(check_email(document.email_subscription.email.value) == false){
					alert("Please check whether the email is correct.");
					document.email_subscription.email.select();
					return false;
				}
				else if(verify_lists(document.email_subscription)==false){
					alert("Select atleast one list.");
				}
				else{
					document.email_subscription.submit();
				}
			}
			</script>
			<?php global $current_user; wp_get_current_user(); ?>
			<form action="https://xyzscripts.com/newsletter/index.php?page=list/subscribe" method="post" name="email_subscription" id="email_subscription" class="xyz_ihs_footer_subscribe" target="_blank">
				<input type="hidden" name="fieldNameIds" value="1,">
				<input type="hidden" name="redirActive" value="https://xyzscripts.com/subscription/pending/XYZWPIHSFRE">
				<input type="hidden" name="redirPending" value="https://xyzscripts.com/subscription/active/XYZWPIHSFRE">
				<input type="hidden" name="mode" value="1">
				<input class="xyz_ihs_name" type="text" placeholder="Name" name="field1" value="<?php
				if ($current_user->user_firstname != "" || $current_user->user_lastname != "")
				{
					echo esc_html($current_user->user_firstname . " " . $current_user->user_lastname);
				}
				else if (strcasecmp($current_user->display_name, 'admin')!=0 && strcasecmp($current_user->display_name , "administrator")!=0 )
				{
					echo esc_html($current_user->display_name);
				}
				else if (strcasecmp($current_user->user_login ,"admin")!=0 && strcasecmp($current_user->user_login , "administrator")!=0 )
				{
					echo esc_html($current_user->user_login);
				}
				?>">
				<input class="xyz_ihs_email" name="email" type="text" placeholder="Email" value="<?php echo esc_html($current_user->user_email); ?>">
				<button id="xyz_ihs_submit_btn" class="xyz_ihs_footer_subscribe_btn" type="submit" name="Submit" value="Subscribe" onclick="javascript: if(!verify_fields()) return false; "><i class="fa fa-paper-plane" aria-hidden="true"></i> Subscribe</button>
				<input type="hidden" name="listName" value="6,1,"/>
			</form>
		</div>
	</div>
</div>

<div class="xyz_ihs_our_plugins_new">
	<p class="xyz_ihs_plugin_head">Our Plugins :</p>
	<a target="_blank" href="https://wordpress.org/plugins/social-media-auto-publish/"><span>1</span>Social Media Auto Publish</a>
	<a target="_blank" href="https://wordpress.org/plugins/facebook-auto-publish/"><span>2</span>Facebook Auto Publish</a>
	<a target="_blank" href="https://wordpress.org/plugins/twitter-auto-publish/"><span>3</span>Twitter Auto Publish</a>
	<a target="_blank" href="https://wordpress.org/plugins/linkedin-auto-publish/"><span>4</span>LinkedIn Auto Publish</a>
	<a target="_blank" href="https://wordpress.org/plugins/insert-html-snippet/"><span>5</span>Insert HTML Snippet</a>
	<a target="_blank" href="https://wordpress.org/plugins/insert-php-code-snippet/"><span>6</span>Insert PHP Code Snippet</a>
	<a target="_blank" href="https://wordpress.org/plugins/contact-form-manager/"><span>7</span>Contact Form Manager</a>
	<a target="_blank" href="https://wordpress.org/plugins/newsletter-manager/"><span>8</span>Newsletter Manager</a>
	<a target="_blank" href="https://wordpress.org/plugins/lightbox-pop/"><span>9</span>Lightbox Pop</a>
	<a target="_blank" href="https://wordpress.org/plugins/full-screen-popup/"><span>10</span>Full Screen Popup</a>
	<a target="_blank" href="https://wordpress.org/plugins/popup-dialog-box/"><span>11</span>Popup Dialog Box</a>
	<a target="_blank" href="https://wordpress.org/plugins/quick-bar/"><span>12</span>Quick Bar</a>
	<a target="_blank" href="https://wordpress.org/plugins/quick-box-popup/"><span>13</span>Quick Box Popup</a>
	<a target="_blank" href="https://wordpress.org/plugins/custom-field-manager/"><span>14</span> Custom Field Manager</a>
	<a target="_blank" href="https://wordpress.org/plugins/wp-filter-posts/"><span>15</span>  WP Filter Posts</a>
	<a target="_blank" href="https://wordpress.org/plugins/wp-gallery-manager/"><span>16</span>  WP Gallery Manager</a>
</div>

<p class="xyz_ihs_poweredBy">Powered by <a href="http://xyzscripts.com" target="_blank" rel="noopener noreferrer">XYZScripts</a></p>
</div>
</div>
</div>
