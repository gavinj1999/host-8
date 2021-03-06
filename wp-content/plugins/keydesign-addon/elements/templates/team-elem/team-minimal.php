<?php
/*
* Template: Team Members Minimal
*/

if(!function_exists('kd_team_set_minimal')) {
  function kd_team_set_minimal($atts,$content = null){
  	extract(shortcode_atts(array(
      'title' => '',
      'title_color' => '',
      'position' => '',
      'position_color' => '',
      'description' => '',
      'description_color' => '',
      'image_source' => '',
      'image' => '',
      'ext_image' => '',
      'ext_image_size' => '',
      'team_bg_color' => '',
      'facebook_url' => '',
      'twitter_url' => '',
      'google_url' => '',
      'linkedin_url' => '',
      'social_color' => '',
      'css_animation' => '',
      'elem_animation_delay' => '',
      'team_extra_class' => '',
  	),$atts));

    $link_target_fb = $link_title_fb = $link_target_tw = $link_title_tw = $link_target_go = $link_title_go = $link_target_li = $link_title_li = $href_facebook = $href_twitter = $href_google = $href_linkedin = $animation_delay = $default_src = $dimensions = $hwstring = '';

    $image  = wpb_getImageBySize($params = array(
        'post_id' => NULL,
        'attach_id' => $image,
        'thumb_size' => 'full',
        'class' => ""
    ));

    $default_src = vc_asset_url( 'vc/no_image.png' );
    $dimensions = vcExtractDimensions( $ext_image_size );
    $hwstring = $dimensions ? image_hwstring( $dimensions[0], $dimensions[1] ) : '';

    $link_target_fb = $link_target_go = $link_target_li = $link_target_tw = '';

    $href_facebook = vc_build_link($facebook_url);
    if($href_facebook['url'] !== '') {
      $link_target_fb = (isset($href_facebook['target']) && ($href_facebook['target'] != '')) ? 'target="'.$href_facebook['target'].'"' : '';
      $link_title_fb = (isset($href_facebook['title'])) ? 'title="'.$href_facebook['title'].'"' : '';
    }

    $href_twitter = vc_build_link($twitter_url);
    if($href_twitter['url'] !== '') {
      $link_target_tw = (isset($href_twitter['target']) && ($href_twitter['target'] != '')) ? 'target="'.$href_twitter['target'].'"' : '';
      $link_title_tw = (isset($href_twitter['title'])) ? 'title="'.$href_twitter['title'].'"' : '';
    }

    $href_google = vc_build_link($google_url);
    if($href_google['url'] !== '') {
      $link_target_go = (isset($href_google['target']) && ($href_google['target'] != '')) ? 'target="'.$href_google['target'].'"' : '';
      $link_title_go = (isset($href_google['title'])) ? 'title="'.$href_google['title'].'"' : '';
    }

    $href_linkedin = vc_build_link($linkedin_url);
    if($href_linkedin['url'] !== '') {
      $link_target_li = (isset($href_linkedin['target']) && ($href_linkedin['target'] != '')) ? 'target="'.$href_linkedin['target'].'"' : '';
      $link_title_li = (isset($href_linkedin['title'])) ? 'title="'.$href_linkedin['title'].'"' : '';
    }

    //CSS Animation
    if ($css_animation == "no_animation") {
        $css_animation = "";
    }

    // Animation delay
    if ($elem_animation_delay) {
        $animation_delay = 'data-animation-delay='.$elem_animation_delay;
    }

    $output = '<div class="team-member design-minimal '.$css_animation.' '.$team_extra_class.'" '.$animation_delay.'>
                    <div class="team-content" '.(!empty($team_bg_color) ? 'style="background-color: '.$team_bg_color.';"' : '').'>
                    <div class="team-image">';

                    if ($image_source == 'external_link') {
                      if (!$ext_image) {
                        $output .='<img src="'.$default_src.'" class="vc_img-placeholder" />';
                      } else {
                        $output .='<img src="'.$ext_image.'" '.$hwstring.' />';
                      }
                    } else {
                      if (!$image) {
                        $output .='<img src="'.$default_src.'" class="vc_img-placeholder" />';
                      } else {
                        $output .= $image['thumbnail'];
                      }
                    }

                    $output .= '<div class="team-content-hover">
                        <h4 '.(!empty($title_color) ? 'style="color: '.$title_color.';"' : '').'>'.$title.'</h4>
                        <span class="team-subtitle" '.(!empty($position_color) ? 'style="color: '.$position_color.';"' : '').'>'.$position.'</span>
                        <p '.(!empty($description_color) ? 'style="color: '.$description_color.';"' : '').'>'.$description.'</p>
                        <div class="team-socials">';
                          if(isset($facebook_url) && $facebook_url !== '' && $href_facebook['url'] !== '') {
                            $output .='<a href="'.$href_facebook['url'].'" '.$link_target_fb.' '.$link_title_fb.'><span class="fa fa-facebook" '.(!empty($social_color) ? 'style="color: '.$social_color.';"' : '').'></span></a>';
                            }
                          if(isset($twitter_url) && $twitter_url !== '' && $href_twitter['url'] !== '') {
                            $output .='<a href="'.$href_twitter['url'].'" '.$link_target_tw.' '.$link_title_tw.'><span class="fa fa-twitter" '.(!empty($social_color) ? 'style="color: '.$social_color.';"' : '').'></span></a>';
                            }
                          if(isset($google_url) && $google_url !== '' && $href_google['url'] !== '') {
                            $output .='<a href="'.$href_google['url'].'" '.$link_target_go.' '.$link_title_go.'><span class="fa fa-google-plus" '.(!empty($social_color) ? 'style="color: '.$social_color.';"' : '').'></span></a>';
                            }
                          if(isset($linkedin_url) && $linkedin_url !== '' && $href_linkedin['url'] !== '') {
                            $output .='<a href="'.$href_linkedin['url'].'" '.$link_target_li.' '.$link_title_li.'><span class="fa fa-linkedin" '.(!empty($social_color) ? 'style="color: '.$social_color.';"' : '').'></span></a>';
                            }
                        $output .='</div>
                    </div></div>
                    </div>
                </div>';
    return $output;
  }
}
