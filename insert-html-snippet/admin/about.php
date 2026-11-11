<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$xyz_ihs_tick = '<span class="xyz_ihs_compare_icon xyz_ihs_compare_yes" aria-label="Included"></span>';
$xyz_ihs_cross = '<span class="xyz_ihs_compare_icon xyz_ihs_compare_no" aria-label="Not included"></span>';
$xyz_ihs_purchase_url = 'https://xyzscripts.com/members/product/purchase/XYZWPICSPRE';
$xyz_ihs_premium_url = 'https://xyzscripts.com/wordpress-plugins/xyz-wp-insert-code-snippet/details';
?>

<div class="xyz_ihs_about_page">
	<div class="xyz_ihs_page_header">
		<h2 class="xyz_ihs_page_title">
			Insert HTML Snippet
			<span class="xyz_ihs_about_version">V <?php echo esc_html( xyz_ihs_plugin_get_version() ); ?></span>
		</h2>
	</div>

	<div class="xyz_ihs_about_intro_card">
		<p class="xyz_ihs_about_intro">
			Integrate HTML code seamlessly to your wordpress. This plugin lets you generate a shortcode corresponding
			to any random HTML code be is javascript, ad codes, vide embedding codes or any raw HTML. The shortcodes
			can be used in your pages, posts and widgets. Insert HTML Snippet is developed and maintained by
			<a href="http://xyzscripts.com" target="_blank" rel="noopener noreferrer">xyzscripts</a>.
		</p>
		<p class="xyz_ihs_about_intro_secondary">
			If you would like to have more features, please try
			<a href="<?php echo esc_url( $xyz_ihs_premium_url ); ?>" target="_blank" rel="noopener noreferrer">XYZ WP Insert Code Snippet</a>
			which is a premium version of this plugin. We have included a quick comparison of the free and premium plugins for your reference.
		</p>
		<div class="xyz_ihs_about_cta_row">
			<a class="xyz_ihs_about_cta_primary" href="<?php echo esc_url( $xyz_ihs_purchase_url ); ?>" target="_blank" rel="noopener noreferrer">Buy Now</a>
			<a class="xyz_ihs_about_cta_secondary" href="<?php echo esc_url( $xyz_ihs_premium_url ); ?>" target="_blank" rel="noopener noreferrer">Compare Features</a>
		</div>
	</div>

	<div class="xyz_ihs_about_compare_card">
		<div class="xyz_ihs_about_compare_header">
			<h3 class="xyz_ihs_about_compare_title">Free vs Premium</h3>
			<p class="xyz_ihs_about_compare_subtitle">Quick feature comparison for your reference</p>
		</div>

		<div class="xyz_ihs_compare_table_wrap">
			<table class="xyz_ihs_compare_table">
				<thead>
					<tr>
						<th scope="col" class="xyz_ihs_compare_col_group">Feature group</th>
						<th scope="col" class="xyz_ihs_compare_col_feature">Feature</th>
						<th scope="col" class="xyz_ihs_compare_col_plan">Free</th>
						<th scope="col" class="xyz_ihs_compare_col_plan xyz_ihs_compare_col_premium">Premium</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td rowspan="5" class="xyz_ihs_compare_group"><span>Shortcodes</span></td>
						<td>Convert HTML snippets to shortcodes</td>
						<td><?php echo $xyz_ihs_tick; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Convert Javascript codes to shortcodes</td>
						<td><?php echo $xyz_ihs_tick; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Convert CSS codes to shortcodes</td>
						<td><?php echo $xyz_ihs_tick; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Convert PHP snippets to shortcodes</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Passing custom parameters to shortcode</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>

					<tr>
						<td rowspan="9" class="xyz_ihs_compare_group"><span>Snippet Placement Methods</span></td>
						<td>Shortcode (Manual)</td>
						<td><?php echo $xyz_ihs_tick; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Execute on Demand</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Automatic - Global: (Site-wide PHP snippet)</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Automatic - Admin Panel (All Pages &amp; Body): (Every Admin Page, Admin Body)</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Automatic - Admin Panel (Header &amp; Footer): (Admin Header, Admin Footer)</td>
						<td><?php echo $xyz_ihs_tick; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Automatic - Front End (All Pages &amp; Body): (All Pages, Body of Front End)</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Automatic - Front End (Header &amp; Footer): (Front End Header, Front End Footer)</td>
						<td><?php echo $xyz_ihs_tick; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Automatic - Specific Page: (Before Content, After Content, Before Paragraph, After Paragraph)</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Automatic - Archive Pages: (Insert Before Excerpt, Insert After Excerpt, Between Posts, Before Post, After Post)</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>

					<tr>
						<td rowspan="3" class="xyz_ihs_compare_group"><span>Third party code</span></td>
						<td>Insert adsense or any adcode</td>
						<td><?php echo $xyz_ihs_tick; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Insert addthis or any social bookmarking code</td>
						<td><?php echo $xyz_ihs_tick; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Insert flash, videos etc. to your posts,pages and widgets</td>
						<td><?php echo $xyz_ihs_tick; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>

					<tr>
						<td rowspan="4" class="xyz_ihs_compare_group"><span>Snippet Management</span></td>
						<td>Syntax highlighter for snippet creation</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Option to duplicate snippet</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Export snippets</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Import snippets</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>

					<tr>
						<td rowspan="3" class="xyz_ihs_compare_group"><span>Privilege Management</span></td>
						<td>Role/User based Snippet Management Privilege</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Role/User based Snippet Usage Privilege</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Master Password for super admin</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>

					<tr>
						<td rowspan="5" class="xyz_ihs_compare_group"><span>Snippet Targeting</span></td>
						<td>Geographic Targeting</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Device Targeting</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>User Targeting</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Role Targeting</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Date &amp; Time Targeting</td>
						<td><?php echo $xyz_ihs_cross; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>

					<tr>
						<td rowspan="3" class="xyz_ihs_compare_group"><span>Integration</span></td>
						<td>Integrate to posts/pages</td>
						<td><?php echo $xyz_ihs_tick; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Support for shortcodes in widgets</td>
						<td><?php echo $xyz_ihs_tick; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>
					<tr>
						<td>Dropdown menu in TinyMCE editor to pick snippets easily</td>
						<td><?php echo $xyz_ihs_tick; ?></td>
						<td><?php echo $xyz_ihs_tick; ?></td>
					</tr>

					<tr class="xyz_ihs_compare_footer_row">
						<td rowspan="2" class="xyz_ihs_compare_group"><span>Other</span></td>
						<td>Price</td>
						<td><span class="xyz_ihs_compare_price_free">FREE</span></td>
						<td><span class="xyz_ihs_compare_price_premium">Starts from 19 USD</span></td>
					</tr>
					<tr class="xyz_ihs_compare_footer_row">
						<td>Purchase</td>
						<td></td>
						<td>
							<a class="xyz_ihs_buy_now_btn" target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( $xyz_ihs_purchase_url ); ?>">Buy Now</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
