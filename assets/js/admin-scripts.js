/**
 * File admin-scripts.js.
 *
 * The code for your theme admin JavaScript
 * source should reside in this file.
 */

( function( $ ) {
	'use strict';

	// Check if DOM is ready.
	$(function() {
		/* Shortcode Generator */
		$('#scwd-generator-form')
		.on('change', '[name="variable"]', function (e) {
			e.preventDefault();

			var val = $(this).val();

			$('#variable-value').val( val );
		})
		.on('change', '[name="wrapper"]', function (e) {
			e.preventDefault();
			var wclass = $('#wrapper-class').parent();

			if ( $(this).val() )  {
				wclass.show();
			} else {
				wclass.hide();
			}
		})
		.on('change', '[name="type"]', function (e) {
			e.preventDefault();
			var val = $(this).val();

			$('.additional-fields').hide();

			if ( val === 'image' )  $('#img-fields').show();
			else if ( val === 'link' )  $('#link-fields').show();
		})
		.on('click', '.submit-btn',function(e) {
			e.preventDefault();
			var variable	= $('[name="variable"] option:selected').val() ? $('[name="variable"] option:selected').text() : '',
				wrapper 	= $('[name="wrapper"]').val() ? 'wrapper="'+$('[name="wrapper"]').val()+'"' : '',
				wclass 		= $('[name="wrapper_class"]').val() ? 'wclass="'+$('[name="wrapper_class"]').val()+'"' : '',
				type 		= $('[name="type"]').val() ? $('[name="type"]').val() : '',
				atts 		= 'var="' + variable + '" type="' + type + '" ' + wrapper + ' ' + wclass + ' ';

			if ( type === 'link' ) {
				var text_link 	= $('[name="text_link"]').val() ? $('[name="text_link"]').val() : '',
					target 		= $('[name="target"]').val() ? 'target="'+$('[name="target"]').val()+'"' : '',
					link_class 	= $('[name="link_class"]').val() ? 'class="'+$('[name="link_class"]').val()+'"' : '';

				atts += ' text="' + text_link + '" ' + target + ' ' +  link_class;
			} else if ( type === 'image' ) {
				var alttext 	= $('[name="alttext"]').val() ? $('[name="alttext"]').val() : '',
					img_class 	= $('[name="img_class"]').val() ? 'class="'+$('[name="img_class"]').val()+'"' : '';

				atts += ' text="'+alttext+'" ' +  img_class;
			}

			var shortcode 	= '[scwd_option ' + $.trim( atts )  + ']',
				tpl_code	= '';

			tpl_code += '&lt;?php if ( checkoption( \'' + variable + '\' ) ): ?&gt\n';
			tpl_code += '&lt;?php echo do_shortcode(\'' + shortcode + '\'); ?&gt\n';
			tpl_code += '&lt;?php endif; ?&gt';

			$('#shortcode-result').show();
			$('#generated-shortcode').val( $.trim( shortcode ) );
			$('#tpl-code').html( tpl_code );
		})
		.on('click', '#generated-shortcode, #tpl-code', function (e) {
			e.preventDefault();
			$(this).select();
			document.execCommand("copy");
		});
	});

} )( jQuery );