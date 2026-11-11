<?php
if ( ! defined( 'ABSPATH' ) )
	 exit;
if(isset($_GET['page']) && $_GET['page']=='insert-html-snippet-suggest-features' ){
	ob_start();
}
if(isset($_GET['page']) && $_GET['page']=='insert-html-snippet-manage' ){
	ob_start();
}
	add_action('admin_menu', 'xyz_ihs_menu');


function xyz_ihs_menu(){

	add_menu_page('insert-html-snippet', 'Insert Html Snippet', 'manage_options', 'insert-html-snippet-manage','xyz_ihs_snippets',plugins_url('images/logo.png',XYZ_INSERT_HTML_PLUGIN_FILE));

	add_submenu_page('insert-html-snippet-manage', 'HTML Snippets', 'HTML Snippets', 'manage_options', 'insert-html-snippet-manage','xyz_ihs_snippets');
	add_submenu_page('insert-html-snippet-manage', 'HTML Snippets - Manage settings', 'Settings', 'manage_options', 'insert-html-snippet-settings' ,'xyz_ihs_settings');	
	add_submenu_page('insert-html-snippet-manage', 'HTML Snippets - About', 'About', 'manage_options', 'insert-html-snippet-about' ,'xyz_ihs_about');
	add_submenu_page('insert-html-snippet-manage', 'HTML Snippets - Suggest Feature', 'Suggest a Feature', 'manage_options', 'insert-html-snippet-suggest-features' ,'xyz_ihs_suggest_feature');
}

function xyz_ihs_snippets(){
	$formflag = 0;
	if(isset($_GET['action']) && $_GET['action']=='snippet-delete' )
	{
		include(dirname( __FILE__ ) . '/snippet-delete.php');
		$formflag=1;
	}
	if(isset($_GET['action']) && $_GET['action']=='snippet-edit' )
	{
		require( dirname( __FILE__ ) . '/header.php' );
		include(dirname( __FILE__ ) . '/snippet-edit.php');
		require( dirname( __FILE__ ) . '/footer.php' );
		$formflag=1;
	}
	if(isset($_GET['action']) && $_GET['action']=='snippet-add' )
	{
		require( dirname( __FILE__ ) . '/header.php' );
		require( dirname( __FILE__ ) . '/snippet-add.php' );
		require( dirname( __FILE__ ) . '/footer.php' );
		$formflag=1;
	}
	if(isset($_GET['action']) && $_GET['action']=='snippet-status' )
	{
		require( dirname( __FILE__ ) . '/snippet-status.php' );
		$formflag=1;
	}
	if($formflag == 0){
		require( dirname( __FILE__ ) . '/header.php' );
		require( dirname( __FILE__ ) . '/snippets.php' );
		require( dirname( __FILE__ ) . '/footer.php' );
	}
}

function xyz_ihs_settings()
{
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/settings.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
	
}

function xyz_ihs_about(){
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/about.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}

function xyz_ihs_suggest_feature(){
	require( dirname( __FILE__ ) . '/header.php' );
	require( dirname( __FILE__ ) . '/suggest_feature.php' );
	require( dirname( __FILE__ ) . '/footer.php' );
}

function xyz_ihs_add_style_script(){

	wp_enqueue_script('jquery');
	$current_version = xyz_ihs_plugin_get_version();
	$notice_path = dirname( XYZ_INSERT_HTML_PLUGIN_FILE ) . '/js/notice.js';
	$style_path = dirname( XYZ_INSERT_HTML_PLUGIN_FILE ) . '/css/xyz_ihs_styles.css';
	$notice_ver = $current_version . '.' . ( file_exists( $notice_path ) ? filemtime( $notice_path ) : '0' );
	$style_ver = $current_version . '.' . ( file_exists( $style_path ) ? filemtime( $style_path ) : '0' );
	wp_register_script( 'xyz_ihs_notice_script', plugins_url('js/notice.js', XYZ_INSERT_HTML_PLUGIN_FILE ), array('jquery'), $notice_ver );
	wp_enqueue_script( 'xyz_ihs_notice_script' );
	
	wp_register_style('xyz_ihs_font_awesome', plugins_url('css/font-awesome.min.css', XYZ_INSERT_HTML_PLUGIN_FILE), array(), '4.7.0');
	wp_enqueue_style('xyz_ihs_font_awesome');
	wp_register_style('xyz_ihs_style', plugins_url('css/xyz_ihs_styles.css', XYZ_INSERT_HTML_PLUGIN_FILE), array('xyz_ihs_font_awesome'), $style_ver);
	wp_enqueue_style('xyz_ihs_style');
}
add_action('admin_enqueue_scripts', 'xyz_ihs_add_style_script');

?>
