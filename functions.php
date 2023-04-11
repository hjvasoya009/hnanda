<?php

/**
 *
 * 	Fields and Default Values added to General Settings
 * 		- Key: 		The Field Name
 * 		- Value: 	The Field Description
 *
 **/

require_once(__DIR__ . '/src/lib/Mobile_Detect.php');
$Settings = array(

	/**
	 *
	 * 	The Widgets to Create
	 * 		- Uses the Standard Wordpress Widget Array
	 *
	 *
	 **/
	'Widgets' 	=> array(
		array(
			'name' 				=> __('Page Widgets', 'twentyten'),
			'id' 				=> 'page',
			'description' 		=> __('Widgets Located on Pages', 'twentyten'),
			'before_widget' 	=> '<section id="%1$s" class="widget-container %2$s goldbox">',
			'after_widget' 		=> '</section>',
			'before_title' 		=> '<h3 class="widget-title">',
			'after_title' 		=> '</h3>'
		),
		array(
			'name' 				=> __('Post Widgets', 'twentyten'),
			'id' 				=> 'post',
			'description' 		=> __('Widgets Located on Posts', 'twentyten'),
			'before_widget' 	=> '<section id="%1$s" class="widget-container %2$s goldbox">',
			'after_widget' 		=> '</section>',
			'before_title' 		=> '<h3 class="widget-title">',
			'after_title' 		=> '</h3>'
		)
	),


	/**
	 *
	 * 	Create the Menus
	 * 		- Register the Following Menus
	 *
	 *
	 **/
	'Menus' 	=> array(

		//Primary Navigation
		'primary' => 'Primary',

		//Footer Navigation
		'footer' => 'Footer',

		//Responsive Navigation
		'mobile' => 'Mobile'

	),


	/**
	 *
	 * 	Thumbnail Dimensions
	 * 		- Additional Thumbnail Dimensions created during each upload
	 *
	 *
	 **/
	'Thumbnails' 	=> array(
		'width' 		=> 940,
		'height' 		=> 640
	),


	/**
	 *
	 * 	Custom Wordpress Admin Editor Styles
	 * 		- Styles / Themes added to the Wordpress Admin Editor Dropdown
	 *
	 *
	 **/
	'Editor Styles' => array(
		array(
			'title' 	=> 'Small',
			'inline' 	=> 'small'
		),
		array(
			'title' 	=> 'Button',
			'inline' 	=> 'a',
			'classes' 	=> 'button'
		),
		array(
			'title' 	=> 'info',
			'block' 	=> 'div',
			'classes' 	=> 'info',
			'wrapper' 	=> true
		),
	),
);


/**
 *
 *	wp_title
 *		- Prepares the Wordpress Title Field
 *
 *		Params:
 * 			- $title: 		The Wordpress Title
 * 			- $separator: 	The Title Separator
 *
 *
 * 		Variables:
 *			- $paged: 		Contains the Page Number of a Listing Post
 * 			- $page: 		Contains the Page number of a single post that is paged
 *
 *
 *		Returns:
 * 			n/a
 *
 *
 **/
add_filter('wp_title', function ($title, $separator) {

	//Load the Variables
	global $paged, $page;


	//Don't affect wp_title() calls in feeds.
	if (is_feed()) return $title;


	//On Search Pages
	if (is_search()) {

		//Override the Title
		$title = 'Search results for "' . get_search_query() . '"';


		//Add a Page Number if we're on Page 2 or more
		if ($paged >= 2) {
			$title .= ' ' . $separator . ' Page: ' . $paged;
		}


		//Finish the Title and Return
		return $title . ' ' . $separator . ' ' . get_bloginfo('name', 'display');
	}


	//Append the Site Title
	$title .= get_bloginfo('name', 'display');



	//Add the Site Description to the Title if it's the Home Page
	if (is_home() || is_front_page()) {
		if ($site_description = get_bloginfo('description', 'display')) {
			$title .= ' ' . $separator . ' ' . $site_description;
		}
	}


	// Add a page number if necessary:
	if ($paged >= 2 || $page >= 2) {
		$title .= ' ' . $separator . ' Page ' . max($paged, $page);
	}


	//Return the Title
	return $title;
}, 10, 2);


/**
 *
 *	Initialize the Widgets
 *		- Sets up the Widgets
 *
 *	Params
 * 		n/a
 *
 **/
add_action('widgets_init', function () {

	//Load the Settings
	global $Settings;

	if (!empty($Settings['Widgets'])) {
		foreach ($Settings['Widgets'] as $Widget) {

			//Create the Widget
			register_sidebar($Widget);
		}
	}
});


/**
 *
 *	after_setup_theme
 *		- The Theme Initialization and Configuration
 *
 *	Params:
 * 		n/a
 *
 **/
add_action('after_setup_theme', function () {

	//Get the Settings
	global $Settings;

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support('post-thumbnails');

	// Add default posts and comments RSS feed links to head
	add_theme_support('automatic-feed-links');

	// Make the Theme Available for Translation
	load_theme_textdomain('twentyten', TEMPLATEPATH . '/languages');

	//Include the Translations
	if (is_readable(TEMPLATEPATH . '/languages/' . get_locale() . '.php')) {
		require_once(TEMPLATEPATH . '/languages/' . get_locale() . '.php');
	}

	// Set the Post Thumbnail Size
	set_post_thumbnail_size($Settings['Thumbnails']['width'], $Settings['Thumbnails']['height'], true);

	//Prepare the Data
	$menus = array();

	//Build the Menus
	if (!empty($Settings['Menus'])) {
		foreach ($Settings['Menus'] as $i => $menu) {
			$menus[strtolower(preg_replace('/[^a-z0-9]/i', '', $menu))] = __($menu, 'twentyten');
		}
	}

	//Create the Menu's
	if (!empty($menus)) {
		register_nav_menus($menus);
	}

	//Add Conditional HTML5Shim
	add_action('wp_head', function () { ?>
		<!--[if lt IE 9]>
				<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<![endif]-->
<?php });
});


/**
 *
 *	Additional Image Sizes
 *
 **/
add_image_size('hero', 1800);
add_image_size('50-50', 1000);


/**
 * Frontend assets
 */
add_action('wp_enqueue_scripts', function () {
	$manifest = json_decode(file_get_contents('build/assets.json', true));
	$main = $manifest->frontend;

	wp_enqueue_script('aos-js', get_template_directory_uri() . "/src/scripts/libraries/aos.js", ['jquery'], null, true);
	wp_enqueue_style('theme-css', get_template_directory_uri() . "/build/" . $main->css,  false, null);
	wp_enqueue_script('theme-js', get_template_directory_uri() . "/build/" . $main->js, ['jquery'], null, true);
}, 100);


/**
 * Admin assets
 */
add_action('admin_enqueue_scripts', function () {
	$manifest = json_decode(file_get_contents('build/assets.json', true));
	$main = $manifest->backend;
	wp_enqueue_style('theme-css', get_template_directory_uri() . "/build/" . $main->css,  false, null);
	wp_enqueue_script('theme-js', get_template_directory_uri() . "/build/" . $main->js, ['jquery'], null, true);
});

/**
 * Login assets
 */
add_action('login_enqueue_scripts', function () {
	$manifest = json_decode(file_get_contents('build/assets.json', true));
	$main = $manifest->backend;
	wp_enqueue_style('theme-css', get_template_directory_uri() . "/build/" . $main->css,  false, null);
	wp_enqueue_script('theme-js', get_template_directory_uri() . "/build/" . $main->js, ['jquery'], null, true);
}, 10);


/**
 *
 *	Excerpt Settings
 *		- Note: The Excerpts are duplicated in case you want to change one
 *
 **/

//Set the Excerpt Length
add_filter('excerpt_length', function () {
	return get_option('excerptlength', 40);
});


/**
 *
 *	Add Custom Class to Sub-Menu Parents
 *		-
 *
 * 		Params:
 * 			- $items: 		(Object) The Menu Items
 * 			- $args: 		(Object) The nav_menu_object arguments
 *
 *		Returns:
 * 			n/a
 *
 **/
add_filter('wp_nav_menu_objects', function ($items, $args) {

	//The Parent's key
	$last = 0;

	//The Menu Items
	foreach ($items as $key => $obj) {

		//Check if the item parent is 0
		if ($obj->menu_item_parent == 0) {

			//Save the Parent Key
			$last = $key;
		} else {

			//Add a Class
			$items[$last]->classes['dropdown'] = 'has-submenu';
		}
	}

	//Return the Array
	return $items;
}, 10, 2);


/**
 *
 *	Show the Home Page in the Menu
 *		-
 *
 * 		Params:
 * 			- $args: 		(Object) The nav_menu_object arguments
 *
 *		Returns:
 * 			n/a
 *
 **/
add_filter('wp_page_menu_args', function ($args) {
	$args['show_home'] = true;
	return $args;
});


/**
 *
 *	Remove the Comment Styles
 *		-
 *
 * 		Params:
 * 			- $args: 		(Object) The CSS Headers
 *
 *		Returns:
 * 			n/a
 *
 **/
add_action('widgets_init', function () {
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
});


/**
 *
 *	Add Class to Next and Previous Post Links
 *		-
 *
 * 		Params:
 * 			n/a
 *
 *		Returns:
 * 			n/a
 *
 **/
add_filter('next_posts_link_attributes', function () {
	return 'class="previous"';
});
add_filter('previous_posts_link_attributes', function () {
	return 'class="next"';
});
add_filter('next_post_link', function ($output) {
	return str_replace('<a href=', '<a class="next" href=', $output);
});
add_filter('previous_post_link', function ($output) {
	return str_replace('<a href=', '<a class="previous" href=', $output);
});



/**
 *
 *	Get the Logo
 *		- Simplifies the Output Data, and Wraps the Logo in an h1 tag for the home page, or a div tag for an inner page
 *
 * 		Params:
 * 			- $callback: 		(Function) The Callback Function
 *
 *		Returns: 			(Object)
 *			- tag: 				(String) The HTML Tag to Use
 * 			- home: 			(String) The URL to the Home Page
 * 			- title: 			(String) The Website Title
 * 			- directory: 		(String) The Theme Directory
 *
 **/
$logo_set = false;
function getLogo($callback, $wrap = true)
{

	//Get the Logo Set Variable
	global $logo_set;

	//Prepare the Data
	$data = (object)array(
		'tag' 			=> (is_home() || is_front_page()) && !$logo_set ? 'h1' : 'div',
		'home' 			=> home_url('/'),
		'title' 		=> esc_attr(get_option('businessname')),
		'directory' 	=> get_bloginfo('template_directory')
	);

	//Output Tag
	if ($wrap) echo '<' . $data->tag . ' class="logo">';

	//Output Data
	call_user_func($callback, $data);

	//Output Tag
	if ($wrap) echo '</' . $data->tag . '>';

	//Update the Logo Set Variable
	$logo_set = true;
};


/**
 *
 *	Add Custom Tiny MCE Buttons
 *		- Adds Custom Buttons the the Tiny MCE Editor
 *
 * 		Params:
 * 			n/a
 *
 *		Returns:
 * 			n/a
 *
 **/
add_filter('tiny_mce_before_init', function ($settings) {

	//Load the Settings
	global $Settings;

	//Show all Hidden Fields
	$settings['wordpress_adv_hidden'] 	= false;

	//Add Formatting
	$settings['style_formats'] 			= json_encode($Settings['Editor Styles']);

	//Return Settings
	return $settings;
});

//Return Missing Fields
add_filter('mce_buttons_3', function ($buttons) {

	$buttons[] = 'styleselect';
	$buttons[] = 'format';
	$buttons[] = 'cut';
	$buttons[] = 'copy';
	$buttons[] = 'charmap';
	$buttons[] = 'hr';
	$buttons[] = 'visualaid';
	$buttons[] = 'table';

	return $buttons;
});


/**
 *
 *	sidebar
 *		- Get the Template or Default Sidebar
 *
 * 		Params:
 * 			- $default: 		(String) The Default Sidebar
 *
 *		Returns:
 * 			- The Sidebar
 *
 **/
function sidebar($default = null)
{
	if (!is_tax() && !is_category()) {

		$template = basename(get_page_template());
		$template = substr($template, strpos($template, '-') + 1, strpos($template, '.') - strlen($template));

		return get_sidebar(file_exists(get_template_directory() . '/sidebar-' . $template . '.php') ? $template : $default);
	} else {

		return get_sidebar($default);
	}
}

/**
 *
 *	Change the Login Home URL
 *		- Changes the Wordpress Login Page Logo URL
 *
 * 		Params:
 * 			n/a
 *
 *		Returns:
 * 			n/a
 *
 **/
add_filter('login_headerurl', function () {

	return home_url();
});


/**
 *
 *	Change the Login Text
 *		- Changes the Wordpress Login Text
 *
 * 		Params:
 * 			n/a
 *
 *		Returns:
 * 			n/a
 *
 **/
add_filter('login_text', function () {

	return get_bloginfo('name');
});


/**
 *
 *	Change the Login Text
 *		- Changes the Wordpress Login Text
 *
 * 		Params:
 * 			$atts: 		(Object) The Shortcode Attributes
 * 			$content: 	(String) The Shortcode Content
 *
 **/
add_shortcode('b', function ($atts, $content = '') {
	return '<strong>' . $content . '</strong>';
});
add_shortcode('i', function ($atts, $content = '') {
	return '<em>' . $content . '</em>';
});
add_shortcode('br', function ($atts, $content = '') {
	return '<br />';
});


/**
 *
 *	Custom Walker Menu
 * 		- Custom Walker Menu that Adds Description to the Navigation
 *
 * 	Params:
 * 		n/a
 *
 **/
class Menu_With_Description extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
	{
		global $wp_query;

		//Check for the Total Posts
		$posts 	= $item->object == 'category' ? new WP_Query('cat=' . $item->object_id) : (object)array('found_posts' => 1);

		//Ensure Posts exist in the Cateogry
		if ($posts->found_posts > 0) {

			//Prepare the Classes
			$classes	= join(' ', apply_filters('nav_menu_css_class', array_filter(empty($item->classes) ? array() : (array) $item->classes), $item));

			//Initialize the Output
			$output .= ($depth ? str_repeat("\t", $depth) : '') . '<li id="menu-item-' . $item->ID . '" class="' . esc_attr($classes) . '">';

			//Prepare Attributes
			$attributes =
				(!empty($item->attr_title) ? 	' title="' . esc_attr($item->attr_title) . '"' 	: '') .
				(!empty($item->target) ? 		' target="' . esc_attr($item->target) . '"' 		: '') .
				(!empty($item->xfn) ? 		' rel="' . esc_attr($item->xfn) . '"' 				: '') .
				(!empty($item->url) ? 		' href="' . esc_attr($item->url) . '"' 			: '');

			//Create Link
			$link 	=
				$args->before .
				'<a' . $attributes . '>' .
				$args->link_before .
				do_shortcode(apply_filters('the_title', $item->title, $item->ID)) .
				$args->link_after .
				($item->object == 'category' && !$args->walker->has_children ? ' <span class="total">(' . (int)$posts->found_posts . ')</span>' : '') .
				(!empty($item->description) ? '<small>' . do_shortcode($item->description) . '</small>' : '') .
				'</a>' .
				$args->after;
		}

		//Return
		$output .= apply_filters('walker_nav_menu_start_el', (isset($link) ? $link : ''), $item, $depth, $args);
	}
}


/**
 *
 *	gform_ajax_spinner_url
 * 		- Updates the spinner to a better design
 *
 * 	Params:
 * 		n/a
 *
 **/
add_filter('gform_ajax_spinner_url', function () {
	return 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
}, 10, 2);


/**
 *
 *	Add ACF Options Page
 * 		-
 *
 * 	Params:
 * 		n/a
 *
 **/
if (function_exists('acf_add_options_page')) {

	acf_add_options_page();
}




//===========================================
/**
 *
 * 	WEBSITE SPECIFIC
 *
 **/
//===========================================


/**
 * Responsive Image Helper Function
 *
 * @param string $image_id the id of the image (from ACF or similar)
 * @param string $image_size the size of the thumbnail image or custom image size
 * @param string $max_width the max width this image will be shown to build the sizes attribute
 */

function acf_responsive_image($image_id, $image_size, $max_width)
{

	// check the image ID is not blank
	if ($image_id != '') {

		// set the default src image size
		$image_src = wp_get_attachment_image_url($image_id, $image_size);

		// set the srcset with various image sizes
		$image_srcset = wp_get_attachment_image_srcset($image_id, $image_size);

		// generate the markup for the responsive image
		echo 'src="' . $image_src . '" srcset="' . $image_srcset . '" sizes="(max-width: ' . $max_width . ') 100vw, ' . $max_width . '"';
	}
}





/**
 *
 *	specific_function_filter_or_action
 * 		- The Description of the Function
 *
 * 	Params:
 * 		$variable: 		(TYPE) Description of the Parameter
 *
 **/









/**
 *
 *	post_type_projects
 * 		- Register Custom Post Type
 *
 *
 **/

function post_type_projects()
{
	register_post_type(
		'projects',
		array(
			'labels' => array(
				'name'                  => __('Projects', 'hnanda'),
				'singular_name'         => __('Project', 'hnanda'),
				'add_new'               => __('Add New', 'hnanda'),
				'add_new_item'          => __('Add New Project', 'hnanda'),
				'edit'                  => __('Edit', 'hnanda'),
				'edit_item'             => __('Edit Projects', 'hnanda'),
				'new_item'              => __('New Projects', 'hnanda'),
				'view'                  => __('View Projects', 'hnanda'),
				'view_item'             => __('View Project', 'hnanda'),
				'search_items'          => __('Search Projects', 'hnanda'),
				'not_found'             => __('No Project found', 'hnanda'),
				'not_found_in_trash'    => __('No Project found in Trash', 'hnanda')
			),
			'public'        => true,
			'hierarchical'  => false,
			'has_archive'   => true,
			# 'rewrite' => false
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'revisions',
				'page-attributes',
			),
			'show_in_rest'  => true,
			'rest_base'     => 'projects',
			'can_export'    => true,
			'menu_icon'     => 'dashicons-admin-post',
		)
	);

	register_taxonomy(
		'projects',
		array(
			'hierarchical' => true,
			'label' => __('Locales'),
			'show_admin_column' => true,
		)
	);
}

add_action('init', 'post_type_projects');
