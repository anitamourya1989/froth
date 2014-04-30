<?php

add_theme_support( 'menus' );
$themename = "Anita";
$shortname = "nt";

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Choose a category"); 

$options = array (
 
array( "name" => $themename." Options",
	"type" => "title"), 

array( "name" => "General",
	"type" => "section"),

array( "type" => "open"),
 
array( "name" => "Colour Scheme",
	"desc" => "Select the colour scheme for the theme",
	"id" => "nt_color_scheme",
	"type" => "select",
	"options" => array("blue", "red", "green"),
	"std" => "blue"),
	
array( "name" => "Logo URL",
	"desc" => "Enter the link to your logo image",
	"id" => "nt_logo",
	"type" => "text",
	"std" => ""),
	
array( "name" => "Custom CSS",
	"desc" => "Want to add any custom CSS code? Put in here, and the rest is taken care of. This overrides any other stylesheets. eg: a.button{color:green}",
	"id" => "nt_custom_css",
	"type" => "textarea",
	"std" => ""),
	
array( "type" => "close"),

array( "name" => "Homepage",
	"type" => "section"),

array( "type" => "open"),

array( "name" => "Homepage header image",
	"desc" => "Enter the link to an image used for the homepage header.",
	"id" => "nt_header_img",
	"type" => "text",
	"std" => ""),
	
array( "name" => "Homepage featured category",
	"desc" => "Choose a category from which featured posts are drawn",
	"id" => "nt_feat_cat",
	"type" => "select",
	"options" => $wp_cats,
	"std" => "Choose a category"),
	
array( "type" => "close"),

array( "name" => "Footer",
	"type" => "section"),

array( "type" => "open"),
	
array( "name" => "Footer copyright text",
	"desc" => "Enter text used in the right side of the footer. It can be HTML",
	"id" => "nt_footer_text",
	"type" => "text",
	"std" => ""),
	
array( "name" => "Google Analytics Code",
	"desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.",
	"id" => "nt_ga_code",
	"type" => "textarea",
	"std" => ""),
	
array( "name" => "Custom Favicon",
	"desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",
	"id" => "nt_favicon",
	"type" => "text",
	"std" => get_bloginfo('url') ."/favicon.ico"),	
	
array( "name" => "Feedburner URL",
	"desc" => "Feedburner is a Google service that takes care of your RSS feed. Paste your Feedburner URL here to let readers see it in your website",
	"id" => "nt_feedburner",
	"type" => "text",
	"std" => get_bloginfo('rss2_url')),
 
array( "type" => "close")
 
);


function mytheme_add_admin() {
 
global $themename, $shortname, $options;
 
if ( $_GET['page'] == basename(__FILE__) ) {
 
	if ( 'save' == $_REQUEST['action'] ) {
 
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
 
		foreach ($options as $value) {
		if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

	header("Location: admin.php?page=functions.php&saved=true");
die;

} 
else if( 'reset' == $_REQUEST['action'] ) {
 
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
 
	header("Location: admin.php?page=functions.php&reset=true");
die;
 
}
}
 
add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'mytheme_admin');

register_nav_menus( array(
	'primary'   => __( 'Top primary menu', __( 'Header Menu' ) )
) );

}

function mytheme_add_init() {

$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/functions/functions.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/functions/rm_script.js", false, "1.0");

}
function mytheme_admin() {
 
global $themename, $shortname, $options;
$i=0;
 
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
 
?>
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?> Settings</h2>
 
<div class="rm_opts">
<form method="post">
<?php foreach ($options as $value) {
	switch ( $value['type'] ) {
	 
	case "open":
	?>
	 
	<?php break;
	 
	case "close":
	?>
	 
	</div>
	</div>
	<br />

	 
	<?php break;
	 
	case "title":
	?>
	<p>To easily use the <?php echo $themename;?> theme, you can use the menu below.</p>

	<?php break;
	 
	case 'text':
	?>

	<div class="rm_input rm_text">
		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
	 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
	
	</div>
	<?php
	break;
	 
	case 'textarea':
	?>

	<div class="rm_input rm_textarea">
		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
	
	</div>
	
	<?php
	break;
	 
	case 'select':
	?>

	<div class="rm_input rm_select">
		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
		
	<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
	<?php foreach ($value['options'] as $option) { ?>
			<option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
	</select>

		<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
	</div>
	<?php
	break;
	 
	case "checkbox":
	?>

	<div class="rm_input rm_checkbox">
		<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
		
	<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
	<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
		<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
	</div>

	<?php break; 
	case "section":

	$i++;

	?>

	<div class="rm_section">
	<div class="rm_title"><h3><img src="<?php bloginfo('template_directory')?>/functions/images/trans.gif" class="inactive" alt=""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
	</span><div class="clearfix"></div></div>
	<div class="rm_options">
	 
	<?php break;
 
	}
}
?>
 
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
	<p class="submit">
		<input name="reset" type="submit" value="Reset" />
		<input type="hidden" name="action" value="reset" />
	</p>
</form>
 </div> 
 

<?php } ?>

<?php

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function myplugin_add_meta_box() {

	$screens = array( 'post', 'page' );

	foreach ( $screens as $screen ) {

		add_meta_box(
			'myplugin_sectionid',
			__( 'My Post Section Title', 'myplugin_textdomain' ),
			'myplugin_meta_box_callback',
			$screen
		);


		add_meta_box(
			'show_onhome',
			__( 'Show on Front page', 'check_textdomain' ),
			'myplugin_meta_box_callback_show',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'myplugin_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function myplugin_meta_box_callback( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'myplugin_meta_box', 'myplugin_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, '_my_meta_value_key', true );


	echo '<label for="myplugin_new_field">';
	_e( 'Description for this field', 'myplugin_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="' . esc_attr( $value ) . '" size="25" />';


}

function myplugin_meta_box_callback_show( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'show_home_meta_box', 'show_home_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */

	$value2 = get_post_meta( $post->ID, '_show_on_home', true );
	if(isset($value2))
	{
		$checked = "checked";
	}
	else{
		$checked ="";
	}
	echo '<label for="show_onhome">';
	_e( 'Check to show this on home', 'check_textdomain' );
	echo '</label> ';
	?>
	<input type="checkbox" id="show_onhome" name="show_onhome" value="yes" <?php if ( isset ( $value2 ) ) checked( $value2, 'yes' ); ?> />
<?php

}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function myplugin_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['show_home_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['show_home_meta_box_nonce'], 'show_home_meta_box' ) ) {
		return;
	}



	// Check if our nonce is set.
	if ( ! isset( $_POST['myplugin_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce'], 'myplugin_meta_box' ) ) {
		return;
	}


	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, its safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( ! isset( $_POST['myplugin_new_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['myplugin_new_field'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, '_my_meta_value_key', $my_data );

	// ************************* //

	// Checks for input and saves
	if( isset( $_POST[ 'show_onhome' ] ) ) {
	    update_post_meta( $post_id, '_show_on_home', 'yes' );
	} else {
	    update_post_meta( $post_id, '_show_on_home', '' );
	}


}
add_action( 'save_post', 'myplugin_save_meta_box_data' );
?>


<?php

add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>