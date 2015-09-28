<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'mb_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * @return void
 */
function mb_register_meta_boxes( $meta_boxes )
{
	/**
	 * Prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'mb_';






//Meta box for Slider Post Types
$meta_boxes[] = array(
	'id' => 'slide_options',							// meta box id, unique per meta box
	'title' => 'Slide Options',			// meta box title
	'pages' => array('slides'),	// post types, accept custom post types as well, default is array('post'); optional
	'context' => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
	'priority' => 'low',						// order of meta box: high (default), low; optional

	'fields' => array(							// list of meta fields
		array(
			'name' => __( 'Link', 'shophistic-lite' ),					// field name
			'desc' => 'If you want the slide has a link, if not leave it empty',	// field description, optional
			'id' => $prefix . 'slide_link',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',					// default value, optional
			'style' => '',				// custom style for field, added in v3.1
			'validate_func' => ''			// validate function, created below, inside RW_Meta_Box_Validate class
		),
		array(
				'name'     => __( 'Display Title and Description', 'shophistic-lite' ),
				'id'       => "{$prefix}slide_caption",
				'type'     => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'  => array(
					'0' => __( 'No', 'shophistic-lite' ),
					'1' => __( 'Yes', 'shophistic-lite' ),
				),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => '0',
				'placeholder' => '',
		),
		array(
			'name' => __( 'Video', 'shophistic-lite' ),					// field name
			'desc' => 'URL to the Video File. If you want a video in this slide.<br>YouTube example: http://www.youtube.com/watch?v=uelHwf8o7_U <br>Vimeo example: http://vimeo.com/27973852',	// field description, optional
			'id' => $prefix . 'slide_video',				// field id, i.e. the meta key
			'type' => 'text',						// text box
			'std' => '',					// default value, optional
			'style' => '',				// custom style for field, added in v3.1
			'validate_func' => ''			// validate function, created below, inside RW_Meta_Box_Validate class
		)
	)
);








	return $meta_boxes;
}


