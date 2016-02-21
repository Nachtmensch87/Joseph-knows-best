<?php


/************* DASHBOARD WIDGETS *****************/

// disable default dashboard widgets
function disable_default_dashboard_widgets() {
	// remove_meta_box('dashboard_right_now', 'dashboard', 'core');    // Right Now Widget
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // Comments Widget
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  // Incoming Links Widget
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');         // Plugins Widget

	// remove_meta_box('dashboard_quick_press', 'dashboard', 'core');  // Quick Press Widget
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');   // Recent Drafts Widget
	remove_meta_box('dashboard_primary', 'dashboard', 'core');         //
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');       //

	/*
	have more plugin widgets you'd like to remove?
	share them with us so we can get a list of
	the most commonly used. :D
	https://github.com/eddiemachado/kr8/issues
	*/
}

/*
Now let's talk about adding your own custom Dashboard widget.
Sometimes you want to show clients feeds relative to their
site's content. For example, the NBA.com feed for a sports
site. Here is an example Dashboard Widget that displays recent
entries from an RSS Feed.

For more information on creating Dashboard Widgets, view:
http://digwp.com/2010/10/customize-wordpress-dashboard/
*/





// removing the dashboard widgets
add_action('admin_menu', 'disable_default_dashboard_widgets');
// adding any custom widgets



/************* CUSTOM LOGIN PAGE *****************/

// calling your own login css so you can style it

//Updated to proper 'enqueue' method
//http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function kr8_login_css() {
	wp_enqueue_style( 'kr8_login_css', get_template_directory_uri() . '/lib/css/login.css', false );
}

// changing the logo link from wordpress.org to your site
function kr8_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function kr8_login_title() { return get_option('blogname'); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'kr8_login_css', 10 );
add_filter('login_headerurl', 'kr8_login_url');
add_filter('login_headertitle', 'kr8_login_title');


/************* CUSTOMIZE ADMIN *******************/

/*
I don't really recommend editing the admin too much
as things may get funky if WordPress updates. Here
are a few funtions which you can choose to use if
you like.
*/

// Custom Backend Footer
function kr8_custom_admin_footer() {
	_e('<span id="footer-thankyou"><a href="https://gruene-nrw.de" target="_blank">Joseph knows best</a></span> - entwickelt von <a href="http://kre8tiv.de" target="_blank">Benjamin Jopen</a>.', 'kr8theme');
}

// adding it to the admin area
add_filter('admin_footer_text', 'kr8_custom_admin_footer');

?>
