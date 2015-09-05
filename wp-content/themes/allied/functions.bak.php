<?php
/**
 * Kyoto functions and definitions
 *
 * @package Kyoto
 */

require_once( trailingslashit( get_template_directory() ) . 'kyoto/kyoto.php' );
$kyoto = Kyoto::get_instance();

$kyoto->setTextDomain('kyoto');


if ( ! function_exists( 'kyoto_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kyoto_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Kyoto, use a find and replace
	 * to change 'kyoto' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'kyoto', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'kyoto' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kyoto_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // kyoto_setup
add_action( 'after_setup_theme', 'kyoto_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kyoto_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kyoto_content_width', 640 );
}
add_action( 'after_setup_theme', 'kyoto_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function kyoto_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kyoto' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'kyoto_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
// function kyoto_scripts() {

	
// 	$files = kyoto_directory_file_names(get_theme_root() . '/kyoto/css');
	
// 	$kyoto_options = get_option('kyoto_theme_options');

// 	$skin_css = get_template_directory_uri() . '/css/' . strtolower($kyoto_options['skin']) . '-theme.css';
	
// 	$fontawesome_css = get_template_directory_uri() . '/assets/fontawesome/css/font-awesome.min.css';
	
// 	wp_enqueue_style( 'kyoto-style', get_stylesheet_uri() );

// 	wp_enqueue_style( 'kyoto-style-skin', $skin_css, array('kyoto-style') );

// 	wp_enqueue_style( 'kyoto-fontawesome', $fontawesome_css, array('kyoto-style-skin') );
	
// 	wp_enqueue_script( 'kyoto-bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/dist/js/bootstrap.min.js', array( 'jquery' ));

// 	wp_enqueue_script( 'kyoto-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

// 	wp_enqueue_script( 'kyoto-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

// 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
// 		wp_enqueue_script( 'comment-reply' );
// 	}
// }
// add_action( 'wp_enqueue_scripts', 'kyoto_scripts' );

function kyoto_directory_file_names($directory, $fullPath = true)
{
	$glob = glob($directory.'/*');

    if ($glob === false) {
        return [];
    }

    // To get the appropriate files, we'll simply glob the directory and filter
    // out any "files" that are not truly files so we do not end up with any
    // directories in our list, but only true files within the directory.
    $array = array_filter($glob, function ($file) use($fullPath) {
        if(filetype($file) == 'file'){
        	return $file;
        }
    });

    if($fullPath === false) {
    	foreach($array as $key => $file) {
    		$css = basename($file);
    		$array[$key] = ucwords(str_replace('-theme.css', '', $css));
    	}
    }

    return $array;

}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



///  FRANKY ////

add_option('kyoto_theme_options', ['skin'=>'flatly']);

add_action('admin_menu', 'kyoto_create_menu');

add_action('admin_init', 'kyoto_theme_register_settings');

function kyoto_create_menu() {

	add_menu_page(
		'Theme Options Page', 
		'Theme Options', 
		'manage_options', 
		'options', 
		'kyoto_theme_settings_page'
	);

}

function kyoto_theme_register_settings() {

	register_setting(
		'kyoto-theme-settings-group', 
		'kyoto_theme_options', 
		'kyoto_theme_sanitize_options'
	);
}

function kyoto_theme_sanitize_options($input) {
	$input['skin'] = sanitize_text_field($input['skin']);
	return $input;
}

function kyoto_theme_settings_page() {
?>

	<div class="wrap">

		<h2>Theme Options</h2>

		<form method="post" action="options.php">

			<?php settings_fields('kyoto-theme-settings-group') ?>
			<?php $options = get_option('kyoto_theme_options') ?>

			<table class="form-table">
				
				<!-- <tr valign="top">
					<th scope="row">Skin Name</th>
					<td>
						<input type="text" name="kyoto_theme_options[skin]"
							value="<?php echo esc_attr( $options['skin']) ?>">
					</td>
				</tr> -->

				<?php $files = kyoto_directory_file_names(get_theme_root() . '/kyoto/css', false) ?>

				<tr valign="top">
					<th scope="row">Skin Name</th>
					<td>
						<select name='kyoto_theme_options[skin]'>
							<?php foreach($files as $file) : ?>
							<option  value='<?php echo $file ?>' <?php selected( $options['skin'], $file ); ?>><?php echo $file ?></option>
							<?php endforeach ?>
							
						</select>
					</td>
				</tr>


			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="Save Changes">
			</p>
		</form>

	</div>

<?php }


// Include the Ajax library on the front end
add_action( 'wp_head', 'add_ajax_library');

/**
 * Adds the WordPress Ajax Library to the frontend.
 */
function add_ajax_library() {
 
    $html = '<script type="text/javascript">';
        $html .= 'var ajaxurl = "' . admin_url( 'admin-ajax.php' ) . '"';
    $html .= '</script>';
 
    echo $html;
 
} 

add_action( 'wp_ajax_change_skin', 'change_skin' );



function change_skin() {

	$skin = $_POST['skin'];

	update_option('kyoto_theme_options', ['skin'=>$skin]);

	echo $skin;

 
    wp_die();
 
} // end mark_as_read


///////////////////////
///
///
/**
 * Redirect to the custom login page
 */
function cubiq_login_init () {
	$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'login';
	if ( isset( $_POST['wp-submit'] ) ) {
		$action = 'post-data';
	} else if ( isset( $_GET['reauth'] ) ) {
		$action = 'reauth';
	}
	// redirect to change password form
	if ( $action == 'rp' || $action == 'resetpass' ) {
		if( isset($_GET['key']) && isset($_GET['login']) ) {
			$rp_path = wp_unslash('/login/');
			$rp_cookie	= 'wp-resetpass-' . COOKIEHASH;
			$value = sprintf( '%s:%s', wp_unslash( $_GET['login'] ), wp_unslash( $_GET['key'] ) );
			setcookie( $rp_cookie, $value, 0, $rp_path, COOKIE_DOMAIN, is_ssl(), true );
		}
		
		wp_redirect( home_url('/login/?action=resetpass') );
		exit;
	}
	// redirect from wrong key when resetting password
	if ( $action == 'lostpassword' && isset($_GET['error']) && ( $_GET['error'] == 'expiredkey' || $_GET['error'] == 'invalidkey' ) ) {
		wp_redirect( home_url( '/login/?action=forgot&failed=wrongkey' ) );
		exit;
	}
	if (
		$action == 'post-data'		||			// don't mess with POST requests
		$action == 'reauth'			||			// need to reauthorize
		$action == 'logout'						// user is logging out
	) {
		return;
	}
	wp_redirect( home_url( '/login/' ) );
	exit;
}
add_action('login_init', 'cubiq_login_init');
/**
 * Redirect logged in users to the right page
 */
function cubiq_template_redirect () {
	if ( is_page( 'login' ) && is_user_logged_in() ) {
		wp_redirect( home_url( '/user/' ) );
		exit();
	}
	if ( is_page( 'user' ) && !is_user_logged_in() ) {
		wp_redirect( home_url( '/login/' ) );
		exit();
	}
}
add_action( 'template_redirect', 'cubiq_template_redirect' );
/**
 * Prevent subscribers to access the admin
 */
function cubiq_admin_init () {
	if ( current_user_can( 'subscriber' ) && !defined( 'DOING_AJAX' ) ) {
		wp_redirect( home_url('/user/') );
		exit;
	}
}
add_action( 'admin_init', 'cubiq_admin_init' );
/**
 * Registration page redirect
 */
function cubiq_registration_redirect ($errors, $sanitized_user_login, $user_email) {
	// don't lose your time with spammers, redirect them to a success page
	if ( !isset($_POST['confirm_email']) || $_POST['confirm_email'] !== '' ) {
		wp_redirect( home_url('/login/') . '?action=register&success=1' );
		exit;
	}
	if ( !empty( $errors->errors) ) {
		if ( isset( $errors->errors['username_exists'] ) ) {
			wp_redirect( home_url('/login/') . '?action=register&failed=username_exists' );
		} else if ( isset( $errors->errors['email_exists'] ) ) {
			wp_redirect( home_url('/login/') . '?action=register&failed=email_exists' );
		} else if ( isset( $errors->errors['invalid_username'] ) ) {
			wp_redirect( home_url('/login/') . '?action=register&failed=invalid_username' );
			
		} else if ( isset( $errors->errors['invalid_email'] ) ) {
+
+			wp_redirect( home_url('/login/') . '?action=register&failed=invalid_email' );
		} else if ( isset( $errors->errors['empty_username'] ) || isset( $errors->errors['empty_email'] ) ) {
			wp_redirect( home_url('/login/') . '?action=register&failed=empty' );
		} else {
			wp_redirect( home_url('/login/') . '?action=register&failed=generic' );
		}
		exit;
	}
	return $errors;
}
add_filter('registration_errors', 'cubiq_registration_redirect', 10, 3);
/**
 * Login page redirect
 */
function cubiq_login_redirect ($redirect_to, $url, $user) {
	if ( !isset($user->errors) ) {
		return $redirect_to;
	}
	wp_redirect( home_url('/login/') . '?action=login&failed=1');
	exit;
}
add_filter('login_redirect', 'cubiq_login_redirect', 10, 3);
/**
 * Password reset redirect
 */
function cubiq_reset_password () {
	$user_data = '';
	if ( !empty( $_POST['user_login'] ) ) {
		if ( strpos( $_POST['user_login'], '@' ) ) {
			$user_data = get_user_by( 'email', trim($_POST['user_login']) );
		} else {
			$user_data = get_user_by( 'login', trim($_POST['user_login']) );
		}
	}
	if ( empty($user_data) ) {
		wp_redirect( home_url('/login/') . '?action=forgot&failed=1' );
		exit;
	}
}
add_action( 'lostpassword_post', 'cubiq_reset_password');
/**
 * Validate password reset
 */
function cubiq_validate_password_reset ($errors, $user) {
	// passwords don't match
	if ( $errors->get_error_code() ) {
		wp_redirect( home_url('/login/?action=resetpass&failed=nomatch') );
		exit;
	}
	// wp-login already checked if the password is valid, so no further check is needed
	if ( !empty( $_POST['pass1'] ) ) {
		reset_password($user, $_POST['pass1']);
		wp_redirect( home_url('/login/?action=resetpass&success=1') );
		exit;
	}
	// redirect to change password form
	wp_redirect( home_url('/login/?action=resetpass') );
	exit;
}
add_action('validate_password_reset', 'cubiq_validate_password_reset', 10, 2);

function hide_instant_messaging( $contactmethods ) {
unset($contactmethods['aim']);
unset($contactmethods['yim']);
return $contactmethods;
}
add_filter('user_contactmethods','hide_instant_messaging',10,1);


add_action( 'init', 'codex_book_init' );

function codex_book_init() {
	$labels = array(
		'name'               => _x( 'Books', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Book', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Books', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'book', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Book', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Book', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Book', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Book', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Books', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Books', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Books:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No books found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No books found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'book', $args );
}
