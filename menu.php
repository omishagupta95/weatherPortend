<?php
function hide_admin_bar() {
	$option=get_option('first_option');
	if ($option ==='yes')
			add_filter('show_admin_bar', '__return_false');
}
add_action('init', 'hide_admin_bar');

function our_menu_callback() {
	?>
	<form action="options.php" method="post">
	<?php 
	settings_fields('our_settings_group')
	?>
	<input id="hide-admin" type="checkbox" name="first_option" value="yes" <?php checked( get_option('first_option'), 'yes')?>>
	<label for="hide_admin">hide admin bar in frontend? </label>
	<?php submit_button('save'); ?>
	</form>
	<?php
}
function register_settings() {
	register_setting('our_settings_group', 'first_option');
}
add_action ('admin_init', 'register_settings');
function build_our_first_menu() {
	add_menu_page( 
		'page_title',
		'menu title',
		'manage_options',	
		'menu_slug',
		'our_menu_callback',
		'dashicons-image-filter',
		6
		);
		add_submenu_page('menu_slug',
		'submenu',
		'title',
		'administrator',
		'submenu_slug',
		'menu_callback');
}	
add_action ('admin_menu','build_our_first_menu' );
function shortcode_pp() {
	
}
add_shortcode( 'first_shortcode', 'shortcode_pp');
?>