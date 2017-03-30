<?php
/**
 * WP Default - Components Theme Customizer
 *
 * @package WP_Default_-_Components
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function scwd_customize_register( $wp_customize ) {
/*	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';*/

	/**
	 * Extends controls class to add textarea with description
	 */
	class scwd_Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';
		public $description = '';
		public function render_content() { ?>

		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<div class="control-description"><?php echo esc_html( $this->description ); ?></div>
			<textarea rows="5" style="width:98%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
		</label>

		<?php }
	}

	/** ===============
	 * Extends controls class to add descriptions to text input controls
	 */
	class scwd_Customize_Text_Control extends WP_Customize_Control {
		public $type = 'customtext';
		public $description = '';
		public function render_content() { ?>

		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<div class="control-description"><?php echo esc_html( $this->description ); ?></div>
			<input type="text" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
		</label>

		<?php }
	}

	/**
	 * Site Title (Logo) & Tagline
	 */
	$wp_customize->get_section( 'title_tagline' )->title = __( 'Site Identity', 'scwd' );
	$wp_customize->get_section( 'title_tagline' )->priority = 10;

	/*// logo uploader
	$wp_customize->add_setting( 'scwd_logo', array( 'default' => null ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'scwd_logo', array(
		'label'		=> __( 'Custom Site Logo (replaces title)', 'scwd' ),
		'section'	=> 'title_tagline',
		'settings'	=> 'scwd_logo',
		'priority'	=> 10
	) ) );*/

	// site title
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_control( 'blogname' )->priority = 20;

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'scwd_customize_partial_blogname',
	) );

	// site tagline
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_control( 'blogdescription' )->priority = 30;

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'scwd_customize_partial_blogdescription',
	) );

	// hide the tagline?
	$wp_customize->add_setting( 'scwd_display_title_tagline', array(
		'default'			=> 1,
		'sanitize_callback'	=> 'scwd_sanitize_checkbox'
	) );
	$wp_customize->add_control( 'scwd_display_title_tagline', array(
		'label'		=> __( 'Display Site Title and Tagline', 'scwd' ),
		'section'	=> 'title_tagline',
		'priority'	=> 40,
		'type'		=> 'checkbox',
	) );

	/**
	 * Theme Options
	 */
	$wp_customize->add_section( 'scwd_content_section', array(
		'title'			=> __( 'Theme Options', 'scwd' ),
		'description'	=> 'Adjust the display of content on your website.',
		'priority'		=> 20,
	) );

	// phone number
	$wp_customize->add_setting( 'scwd_phone', array(
		'default' => null,
		'sanitize_callback' => 'scwd_sanitize_text'
	) );
	$wp_customize->add_control( 'scwd_phone', array(
		'label'		=> __( 'Phone Number', 'scwd' ),
		'section'	=> 'scwd_content_section',
		'settings'	=> 'scwd_phone',
		'priority'	=> 10,
	) );

	// email address
	$wp_customize->add_setting( 'scwd_email', array(
		'default' => null,
		'sanitize_callback' => 'scwd_sanitize_text'
	) );
	$wp_customize->add_control( 'scwd_email', array(
		'label'		=> __( 'Email Address', 'scwd' ),
		'section'	=> 'scwd_content_section',
		'settings'	=> 'scwd_email',
		'priority'	=> 20,
	) );

	// cards image uploader
	$wp_customize->add_setting( 'scwd_footer_logo', array( 'default' => null ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'scwd_footer_logo', array(
		'label'		=> __( 'Footer Logo', 'scwd' ),
		'section'	=> 'scwd_content_section',
		'settings'	=> 'scwd_footer_logo',
		'priority'	=> 80
	) ) );

	// cards image uploader
	$wp_customize->add_setting( 'scwd_cards', array( 'default' => null ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'scwd_cards', array(
		'label'		=> __( 'Payment Cards', 'scwd' ),
		'section'	=> 'scwd_content_section',
		'settings'	=> 'scwd_cards',
		'priority'	=> 90
	) ) );

	// credits & copyright
	$wp_customize->add_setting( 'scwd_credits_copyright', array(
		'default'			=> null,
		'sanitize_callback'	=> 'scwd_sanitize_textarea',
	) );

	$wp_customize->add_control( new scwd_Customize_Textarea_Control( $wp_customize, 'scwd_credits_copyright', array(
		'label'			=> __( 'Footer Credits & Copyright', 'scwd' ),
		'section'		=> 'scwd_content_section',
		'priority'		=> 100,
		'description'	=> __( 'Displays tagline, site title, copyright, and year by default. Allowed tags: <img>, <a>, <div>, <span>, <blockquote>, <p>, <em>, <strong>, <form>, <input>, <br>, <s>, <i>, <b>', 'scwd' ),
	) ) );

	$wp_customize->add_section( 'scwd_media_links_section', array(
		'title'			=> __( 'Media Links', 'scwd' ),
		'priority'		=> 30,
	) );

	// twitter url
	$wp_customize->add_setting( 'scwd_twitter', array(
		'default' => null,
		'sanitize_callback' => 'scwd_sanitize_text'
	) );
	$wp_customize->add_control( 'scwd_twitter', array(
		'label'		=> __( 'Twitter Profile URL', 'scwd' ),
		'section'	=> 'scwd_media_links_section',
		'settings'	=> 'scwd_twitter',
		'priority'	=> 10,
	) );

	// facebook url
	$wp_customize->add_setting( 'scwd_facebook', array(
		'default' => null,
		'sanitize_callback' => 'scwd_sanitize_text'
	) );
	$wp_customize->add_control( 'scwd_facebook', array(
		'label'		=> __( 'Facebook Profile URL', 'scwd' ),
		'section'	=> 'scwd_media_links_section',
		'settings'	=> 'scwd_facebook',
		'priority'	=> 20,
	) );

	// google plus url
	$wp_customize->add_setting( 'scwd_gplus', array(
		'default' => null,
		'sanitize_callback' => 'scwd_sanitize_text'
	) );
	$wp_customize->add_control( 'scwd_gplus', array(
		'label'		=> __( 'Google Plus Profile URL', 'scwd' ),
		'section'	=> 'scwd_media_links_section',
		'settings'	=> 'scwd_gplus',
		'priority'	=> 30,
	) );

	// linkedin url
	$wp_customize->add_setting( 'scwd_linkedin', array(
		'default' => null,
		'sanitize_callback' => 'scwd_sanitize_text'
	) );
	$wp_customize->add_control( 'scwd_linkedin', array(
		'label'		=> __( 'LinkedIn Profile URL', 'scwd' ),
		'section'	=> 'scwd_media_links_section',
		'settings'	=> 'scwd_linkedin',
		'priority'	=> 40,
	) );

	// youtube url
	$wp_customize->add_setting( 'scwd_youtube', array(
		'default' => null,
		'sanitize_callback' => 'scwd_sanitize_text'
	) );
	$wp_customize->add_control( 'scwd_youtube', array(
		'label'		=> __( 'Youtube Profile URL', 'scwd' ),
		'section'	=> 'scwd_media_links_section',
		'settings'	=> 'scwd_youtube',
		'priority'	=> 50,
	) );
}
add_action( 'customize_register', 'scwd_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @see scwd_customize_register()
 *
 * @return void
 */
function scwd_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @see scwd_customize_register()
 *
 * @return void
 */
function scwd_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Sanitize checkbox options
 */
function scwd_sanitize_checkbox( $input ) {
	if ( $input == 1 ) :
		return 1;
	else :
		return 0;
	endif;
}

/**
 * Sanitize text input
 */
function scwd_sanitize_text( $input ) {
	return strip_tags( stripslashes( $input ) );
}

/**
 * Sanitize textarea
 */
function scwd_sanitize_textarea( $input ) {
	$allowed = array(
		's'			=> array(),
		'br'		=> array(),
		'em'		=> array(),
		'i'			=> array(),
		'strong'	=> array(),
		'b'			=> array(),
		'a'			=> array(
			'href'			=> array(),
			'title'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'form'		=> array(
			'id'			=> array(),
			'class'			=> array(),
			'action'		=> array(),
			'method'		=> array(),
			'autocomplete'	=> array(),
			'style'			=> array(),
		),
		'input'		=> array(
			'type'			=> array(),
			'name'			=> array(),
			'class' 		=> array(),
			'id'			=> array(),
			'value'			=> array(),
			'placeholder'	=> array(),
			'tabindex'		=> array(),
			'style'			=> array(),
		),
		'img'		=> array(
			'src'			=> array(),
			'alt'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
			'height'		=> array(),
			'width'			=> array(),
		),
		'span'		=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'p'			=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'div'		=> array(
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
		'blockquote' => array(
			'cite'			=> array(),
			'class'			=> array(),
			'id'			=> array(),
			'style'			=> array(),
		),
	);
	return wp_kses( $input, $allowed );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function scwd_customize_preview_js() {
	wp_enqueue_script( 'scwd_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'scwd_customize_preview_js' );

/**
 * Adds the Theme Options page to the WordPress admin area
 */
function scwd_customizer_menu() {
	add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'customize.php' );
}
add_action( 'admin_menu', 'scwd_customizer_menu' );
