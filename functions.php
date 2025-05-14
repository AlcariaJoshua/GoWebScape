<?php
/**
 * gowebscape functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gowebscape
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gowebscape_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on gowebscape, use a find and replace
		* to change 'gowebscape' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'gowebscape', get_template_directory() . '/languages' );

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
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'gowebscape' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'gowebscape_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'gowebscape_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gowebscape_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gowebscape_content_width', 640 );
}
add_action( 'after_setup_theme', 'gowebscape_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gowebscape_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'gowebscape' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'gowebscape' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'gowebscape_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gowebscape_scripts() {
	wp_enqueue_style( 'gowebscape-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'gowebscape-style', 'rtl', 'replace' );

	wp_enqueue_script( 'gowebscape-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gowebscape_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



//webscape menu
if (!function_exists('gowebscape_theme_setup')):

    function gowebscape_theme_setup()
    {

        add_theme_support('post-thumbnails');

        add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));

        register_nav_menus(
            array(

                'primary' => __('Primary Menu', 'gowebscape Header')

            )
        );

        add_theme_support('woocommerce');

        add_theme_support('wc-product-gallery-zoom');

        add_theme_support('wc-product-gallery-lightbox');

        add_theme_support('wc-product-gallery-slider');

    }

endif;

add_action('after_setup_theme', 'gowebscape_theme_setup');


//app development form
// Handle form submission
function handle_custom_contact_form() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cf-submitted'])) {

        // Honeypot anti-spam check
        if (!empty($_POST['cf-website'])) {
            return;
        }

        // SAFELY access and sanitize input
        $fname    = sanitize_text_field($_POST['cf-fname'] ?? '');
        $lname    = sanitize_text_field($_POST['cf-lname'] ?? '');
        $email    = sanitize_email($_POST['cf-email'] ?? '');
        $phone    = sanitize_text_field($_POST['cf-phone'] ?? '');
        $message  = esc_textarea($_POST['cf-message'] ?? '');

        // Combine all into post_content
        $full_message = "First Name: $fname\n";
        $full_message .= "Last Name: $lname\n";
        $full_message .= "Email: $email\n";
        $full_message .= "Phone: $phone\n";
        $full_message .= "Message:\n$message";

        // Save to custom post type
        $post_data = array(
            'post_title'   => wp_strip_all_tags("$fname $lname"),
            'post_content' => $full_message,
            'post_type'    => 'submitted-form',
            'post_status'  => 'private',
        );

        $post_id = wp_insert_post($post_data);

        if ($post_id) {
            update_post_meta($post_id, 'fname', $fname);
            update_post_meta($post_id, 'lname', $lname);
            update_post_meta($post_id, 'email', $email);
            update_post_meta($post_id, 'phone', $phone);
        }

        // Send email
        $to      = get_option('admin_email');
        $subject = "New Contact Message from $fname $lname";
        $body    = "Name: $fname $lname\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";
        $headers = array('Content-Type: text/plain; charset=UTF-8', "Reply-To: $email");

        $mail_sent = wp_mail($to, $subject, $body, $headers);

        // Redirect after POST to avoid resubmission warning
        if ($mail_sent) {
			wp_redirect(home_url('/thank-you'));
		} else {
			wp_redirect(add_query_arg('form_status', 'error', esc_url($_SERVER['REQUEST_URI'])));
		}		
        exit;
    }
}
add_action('wp', 'handle_custom_contact_form');

// Shortcode to display the form
function custom_contact_form_shortcode() {
    ob_start();
    ?>

    <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post" class="custom-contact-form">
        <div class="input-con">
            <p>
                <label for="cf-fname">First Name</label>
                <input type="text" id="cf-fname" name="cf-fname" placeholder="Your first name" required>
            </p>
            <p>
                <label for="cf-lname">Last Name</label>
                <input type="text" id="cf-lname" name="cf-lname" placeholder="Your last name" required>
            </p>
        </div>
        <div class="input-con">
            <p>
                <label for="cf-email">Email</label>
                <input type="email" id="cf-email" name="cf-email" placeholder="Your email" required>
            </p>
            <p>
                <label for="cf-phone">Phone</label>
                <input type="tel" id="cf-phone" name="cf-phone" placeholder="Your phone number" required>
            </p>
        </div>
        <p class="message-area" >
            <label for="cf-message">Message</label>
            <textarea id="cf-message" name="cf-message" placeholder="Write your message..." rows="5" required></textarea>
        </p>
        <p class="submit-btn" >
            <input type="submit" name="cf-submitted" value="Submit" class="cta" >
        </p>
        <input type="text" name="cf-website" style="display:none" autocomplete="off">
    </form>

	<!-- <?php
		 // Show success or error message
		 if (isset($_GET['form_status']) && $_GET['form_status'] === 'success') {
			echo '<div class="contact-success">Thanks for contacting us!</div>';
		} elseif (isset($_GET['form_status']) && $_GET['form_status'] === 'error') {
			echo '<div class="contact-error">There was a problem sending your message.</div>';
		}
	?> -->

    <?php
    return ob_get_clean();
}
add_shortcode('custom_contact_form', 'custom_contact_form_shortcode');




  
