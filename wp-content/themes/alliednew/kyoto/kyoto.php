<?php 

/**
 * The Kyoto class launches the Kyoto Framework.
 */

if ( ! class_exists( 'Kyoto' ) ) {

	class Kyoto {

		/**
		 * The Kyoto Singleton Instance
		 * @var instance
		 */
		private static $instance = null;

		/**
		 * The Theme Name
		 * @var string
		 */
		private $themeName;

		/**
		 * The Constructor is Private
		 * You can only instantiate Kyoto once through the 
		 * get_instance method.
		 */
		private function __construct($themeName)
		{
			// set the themename
			$this->themeName = $themeName;

			// require underscores incs
			$this->underscores();

			// require classes
			$this->classes();

			// define the constants
			add_action( 'after_setup_theme', array( $this, 'constants' ), 1 );

			// enqueue the scripts
			add_action( 'wp_enqueue_scripts', array($this, 'enqueue') );

			// set up the theme
			add_action( 'after_setup_theme', array($this, 'setupTheme') );

			// content width
			add_action( 'after_setup_theme', array($this, 'contentWidth'), 0 );

			// widget area
			add_action( 'widgets_init', array($this, 'widgetRegister') );

		}

		/**
		 * Get the Kyoto Instance
		 * @return The Kyoto Singleton Instance
		 */
		public static function get_instance($themeName='')
		{
			$themeName = $themeName ?: strtolower(wp_get_theme());

			if (null == self::$instance) {
				self::$instance = new self($themeName);
			}
		
			return self::$instance;
		}

		/**
		 * Enqueue the Scripts & Styles
		 * @return void
		 */
		public function enqueue()
		{
			// set the style uris
			$style_css = get_stylesheet_uri();
			$theme_css = get_template_directory_uri() . '/css/theme.css';
		
			// enqueue the main styles & scripts
			wp_enqueue_style( 'style', $style_css);
			wp_enqueue_style( 'style-theme', $theme_css, array('style') );
		
		
			// enqueue the navigation etc.
			wp_enqueue_script( 'app', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'));
			wp_enqueue_script( 'navigation', get_template_directory_uri() . '/kyoto/js/navigation.js', array(), '20120206', true );
			wp_enqueue_script( 'skip-link-focus-fix', get_template_directory_uri() . '/kyoto/js/skip-link-focus-fix.js', array(), '20130115', true );

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		/**
		 * Set up the theme
		 * @return void
		 */
		public function setupTheme()
		{
			/*
			 * Make theme available for translation.
			 * Translations can be filed in the /languages/ directory.
			 */
			load_theme_textdomain( $this->themeName, get_template_directory() . '/languages' );

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
				'primary' => esc_html__( 'Primary Menu', $this->themeName ),
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
			add_theme_support( 'custom-background', apply_filters( $this->themeName . '_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			) ) );
		}

		/**
		 * Set the Content Width in Globals
		 * @return void
		 */
		public function contentWidth()
		{
			$GLOBALS['content_width'] = apply_filters( $this->themeName . '_content_width', 640 );
		}

		/**
		 * Register Widget Area
		 * @return void
		 */
		public function widgetRegister()
		{
			register_sidebar( array(
				'name'          => esc_html__( 'Sidebar', $this->themeName ),
				'id'            => 'sidebar-1',
				'description'   => '',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h1 class="widget-title">',
				'after_title'   => '</h1>',
			) );
		}

		/**
		 * Underscores Includes
		 * @return void
		 */
		public function underscores()
		{
			/**
			 * Implement the Custom Header feature.
			 */
			require __DIR__ . '/inc/custom-header.php';

			/**
			 * Custom template tags for this theme.
			 */
			require __DIR__ . '/inc/template-tags.php';

			/**
			 * Custom functions that act independently of the theme templates.
			 */
			require __DIR__ . '/inc/extras.php';

			/**
			 * Customizer additions.
			 */
			require __DIR__ . '/inc/customizer.php';

			/**
			 * Load Jetpack compatibility file.
			 */
			require __DIR__ . '/inc/jetpack.php';

		}

		public function classes()
		{
			/**
			 * helpers
			 */
			require __DIR__ . '/classes/helpers.php';
		}

		/**
		 * Contstants for use in the Kyoto Framework and Themes
		 * @return void
		 */
		public function constants()
		{
			// Set the version number
			define( 'KYOTO_VERSION', '0.0.1' );

			// Set the parent theme directory
			define( 'THEME_DIR', get_template_directory() );

			// Set the parent theme directory uri
			define( 'THEME_URI', get_template_directory_uri() );

			// Set the path to the childe theme directory
			define( 'CHILD_THEME_DIR', get_stylesheet_directory() );

			// Set the child theme directory uri
			define( 'CHILD_THEME_URI', get_stylesheet_directory_uri() );

			// Set the path to the core framework directory.
			if ( !defined( 'KYOTO_DIR' ) )
				define( 'KYOTO_DIR', trailingslashit( THEME_DIR ) . basename( dirname( __FILE__ ) ) );

			// Set the path to the core framework directory URI.
			if ( !defined( 'KYOTO_URI' ) )
				define( 'KYOTO_URI', trailingslashit( THEME_URI ) . basename( dirname( __FILE__ ) ) );

		}

		public function helpers()
		{
			return new Kyoto\Helpers;
		}

	}

}