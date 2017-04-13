<?php
/**
 * WP Default Options Shortcode Generator
 *
 * @package WP_Default
 */

/**
 * Adds the Theme Options menu to the WordPress admin appearance section.
 */
function scwd_options_shortcode_generator() {
	add_theme_page( 'Theme Options Shortcode Generator', 'Shortcode Generator', 'edit_theme_options', 'scwd_shortcode_generator','scwd_shortcode_generator_page' );
}
add_action( 'admin_menu', 'scwd_options_shortcode_generator' );
/**
 * Will display theme options shortcode generator page.
 */
function scwd_shortcode_generator_page() { ?>
	<div class="wrap">
		<h1>Shortcode Generator</h1>
		<br>
		<div class="bootstrap-iso">
			<form id="scwd-generator-form" action="" method="post" class="container-fluid scwd-form">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="variable">Variable</label>
							<select name="variable" id="variable" class="form-control">
								<option value="">Select Option</option>
								<?php foreach ( get_theme_mods() as $key => $option ):
									if ( $option ): ?>
										<option value="<?php _e( $option ); ?>"><?php _e( $key ); ?></option>
									<?php endif;
								endforeach ?>
							</select>
						</div>
						<div class="form-group">
							<label for="variable-value">Variable Value</label>
							<input type="text" name="variable_value" id="variable-value" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label for="wrapper">Wrapper</label>
							<select name="wrapper" id="wrapper" class="form-control">
								<option value="">Select Option</option>
								<option value="p">p</option>
								<option value="div">div</option>
								<option value="li">li</option>
								<option value="span">span</option>
								<option value="strong">strong</option>
								<option value="del">del</option>
								<option value="ins">ins</option>
							</select>
						</div>
						<div class="form-group collapse">
							<label for="wrapper-class">Wrapper Class</label>
							<input type="text" name="wrapper_class" id="wrapper-class" class="form-control">
						</div>
						<div class="form-group">
							<label for="type">Type</label>
							<select name="type" id="type" class="form-control">
								<option value="text">text</option>
								<option value="link">link</option>
								<option value="image">image</option>
							</select>
						</div>

						<div id="link-fields" class="additional-fields collapse">
							<div class="form-group">
								<label for="link-class">Class</label>
								<input type="text" name="link_class" id="link-class" class="form-control">
							</div>
							<div class="form-group">
								<label for="text-link">Text Link</label>
								<input type="text" name="text_link" id="text-link" class="form-control">
							</div>
							<div class="form-group">
								<label for="target">Target</label>
								<select name="target" id="target" class="form-control">
									<option value="">None</option>
									<option value="_blank">blank</option>
									<option value="_self">self</option>
									<option value="_parent">parent</option>
									<option value="_top">top</option>
								</select>
							</div>
						</div>

						<div id="img-fields" class="additional-fields collapse">
							<div class="form-group">
								<label for="img-class">Class</label>
								<input type="text" id="img-class" name="img_class" class="form-control">
							</div>
							<div class="form-group">
								<label for="alttext">Alt Text</label>
								<input type="text" name="alttext" id="alttext" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary submit-btn">Generate Shortcode</button>
						</div>
					</div>
					<div class="col-sm-6">
						<div id="shortcode-result" class="collapse">
							<div class="form-group">
								<label for="shortcode">Shortcode</label>
								<input type="text" name="shortcode" id="generated-shortcode" class="form-control" readonly>
							</div>
							<div class="form-group">
								<label for="tpl-code">Template Code</label>
								<textarea class="form-control" name="tpl-code" id="tpl-code" rows="5" readonly></textarea>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
<?php }

function scwd_shortcode_generator_enqueue_scripts() {
	wp_register_script( 'scwd-admin-scripts', get_template_directory_uri() .'/assets/js/admin-scripts.js', array('jquery') );

	if ( 'appearance_page_scwd_shortcode_generator' == get_current_screen()->id ) {
		wp_enqueue_script('scwd-admin-scripts');

		//Enqueue the jQuery UI theme css file from google:
		wp_enqueue_style('scwd-bootstrao-iso', get_template_directory_uri() .'/assets/css/bootstrap-iso.css');
		wp_enqueue_style('scwd-admin-styles', get_template_directory_uri() .'/assets/css/admin-styles.css');
	}

}
add_action('admin_enqueue_scripts', 'scwd_shortcode_generator_enqueue_scripts');