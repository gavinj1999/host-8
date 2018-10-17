<?php
if(!class_exists('KEYDESIGN_Attach_Image_Param'))
{
	class KEYDESIGN_Attach_Image_Param
	{
		function __construct()
		{
			if(defined('WPB_VC_VERSION') && version_compare(WPB_VC_VERSION, 4.8) >= 0) {
				if(function_exists('vc_add_shortcode_param'))
				{
					vc_add_shortcode_param('kd_attach_image' , array($this, 'kd_param_attach_image_callback'));
				}
			}
			else {
				if(function_exists('add_shortcode_param'))
				{
					add_shortcode_param('kd_attach_image' , array($this, 'kd_param_attach_image_callback'));
				}
			}
		}

		function kd_param_attach_image_callback($settings, $value)
		{
			$output = '';
			$output .= '<input type="hidden" class="wpb_vc_param_value gallery_widget_attached_images_ids '
			           . $settings['param_name'] . ' '
			           . $settings['type'] . '" name="' . $settings['param_name'] . '" value="' . $value . '"/>';
			$output .= '<div class="gallery_widget_attached_images">';
			$output .= '<ul class="gallery_widget_attached_images_list">';

			if( strpos( $value, "http://" ) !== false || strpos( $value, "https://" ) !== false ) {
				$output .= '<li class="added">
								<img src="' . esc_url( $value ) . '" />
								<a href="#" class="vc_icon-remove"><i class="vc-composer-icon vc-c-icon-close"></i></a>
							</li>';

			} else {
				$output .= ( '' !== $value ) ? fieldAttachedImages( explode( ',', $value ) ) : '';
			}
			$output .= '</ul>';
			$output .= '</div>';
			$output .= '<div class="gallery_widget_site_images">';
			$output .= '</div>';
			$output .= '<a class="gallery_widget_add_images" href="#" use-single="true" title="'
				. esc_html__( 'Add image', 'keydesign' ) . '"><i class="vc-composer-icon vc-c-icon-add"></i>' . esc_html__( 'Add image', 'keydesign' ) . '</a>'; //class: button

			return $output;
		}

	}
}

if(class_exists('KEYDESIGN_Attach_Image_Param'))
{
	$KEYDESIGN_Attach_Image_Param = new KEYDESIGN_Attach_Image_Param();
}
