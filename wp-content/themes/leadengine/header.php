<?php
/**
 * Theme header
 * @package leadEngine
 * by KeyDesign
 */
 ?>

<?php
  $redux_ThemeTek = get_option( 'redux_ThemeTek' );
  $hide_title_section_class = $disable_animations_class = '';
  $themetek_page_showhide_title_section = get_post_meta( get_the_ID(), '_themetek_page_showhide_title_section', true );
  if ($themetek_page_showhide_title_section && !is_search()) {
    $hide_title_section_class = 'hide-title-section';
  }

  if (isset($redux_ThemeTek['tek-disable-animations']) && $redux_ThemeTek['tek-disable-animations'] == true ) {
    $disable_animations_class = 'no-mobile-animation';
  }
?>
<!DOCTYPE html>
<html <?php language_attributes( 'html' ); ?>>
   <head>
      <meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <?php if (isset($redux_ThemeTek['tek-main-color']) && $redux_ThemeTek['tek-main-color'] != '' ) : ?>
        <meta name="theme-color" content="<?php echo esc_attr($redux_ThemeTek['tek-main-color']); ?>" />
      <?php endif; ?>
      <link rel="profile" href="http://gmpg.org/xfn/11">
      <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) : ?>
        <link href="<?php echo esc_url($redux_ThemeTek['tek-favicon']['url']); ?>" rel="icon">
      <?php endif; ?>
      <link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>" />
      <?php wp_head(); ?>
   </head>
    <body <?php body_class();?>>
      <?php if( !empty($redux_ThemeTek['tek-preloader']) && $redux_ThemeTek['tek-preloader'] == 1 ) : ?>
        <div id="preloader">
           <div class="spinner"></div>
        </div>
      <?php endif; ?>

      <!-- Contact Modal template -->
      <?php
      if (isset($redux_ThemeTek['tek-header-button'])) {
        if ($redux_ThemeTek['tek-header-button'] && ($redux_ThemeTek['tek-header-button-action'] == '1')) {
          get_template_part( 'core/templates/header/content', 'contact-modal' );
        }
      }
      ?>
      <!-- END Contact Modal template -->

      <nav class="navbar navbar-default navbar-fixed-top <?php if (isset($redux_ThemeTek['tek-menu-style'])) { if ($redux_ThemeTek['tek-menu-style'] == '2') { echo esc_html('full-width'); }} ?> <?php if (isset($redux_ThemeTek['tek-menu-behaviour'])) { if ($redux_ThemeTek['tek-menu-behaviour'] == '2') { echo esc_html('fixed-menu'); }} ?> <?php if (isset($redux_ThemeTek['tek-topbar'])) { if ($redux_ThemeTek['tek-topbar'] == '1') { echo esc_html('with-topbar '); }} if (isset($redux_ThemeTek['tek-topbar-sticky'])) { if ($redux_ThemeTek['tek-topbar-sticky'] == '1') { echo esc_html('with-topbar-sticky '); }} ?>
      <?php if (isset($redux_ThemeTek['tek-sticky-nav-logo'])) { if ($redux_ThemeTek['tek-sticky-nav-logo'] == 'nav-secondary-logo') { echo esc_html('nav-secondary-logo'); }} ?>
      <?php if (isset($redux_ThemeTek['tek-transparent-nav-logo'])) { if ($redux_ThemeTek['tek-transparent-nav-logo'] == 'nav-secondary-logo' && $redux_ThemeTek['tek-transparent-homepage-menu'] == true ) { echo esc_html('nav-transparent-secondary-logo'); }} ?> " >
        <!-- Topbar template -->
        <?php if( !empty($redux_ThemeTek['tek-topbar']) && $redux_ThemeTek['tek-topbar'] == 1 ) {
          get_template_part( 'core/templates/header/content', 'topbar' );
        } ?>
        <!-- END Topbar template -->

        <div class="menubar">
          <div class="container">
           <div id="logo">
             <?php if (isset($redux_ThemeTek['tek-logo-style']) && $redux_ThemeTek['tek-logo-style'] != '' ) : ?>
               <?php if ($redux_ThemeTek['tek-logo-style'] == '1') : ?>
                 <!-- Image logo -->
                 <a class="logo" href="<?php echo esc_url(home_url()); ?>">
                   <?php if (isset($redux_ThemeTek['tek-logo']['url'])) { ?>
                     <img class="fixed-logo" src="<?php echo esc_url($redux_ThemeTek['tek-logo']['url']); ?>"  width="<?php echo esc_html($redux_ThemeTek['tek-logo-size']['width']);?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />

                     <?php if (isset($redux_ThemeTek['tek-logo2']['url']) && $redux_ThemeTek['tek-logo2']['url'] != '' ) { ?>
                     <img class="nav-logo" src="<?php echo esc_url($redux_ThemeTek['tek-logo2']['url']); ?>"  width="<?php echo esc_html($redux_ThemeTek['tek-logo-size']['width']);?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
                     <?php } ?>

                   <?php } else { ?>
                     <img class="fixed-logo" src="<?php echo esc_url(get_template_directory_uri() . '/core/assets/images/logo.png'); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
                     <img class="nav-logo" src="<?php echo esc_url(get_template_directory_uri() . '/core/assets/images/logo-2.png'); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
                   <?php } ?>
                 </a>
               <?php elseif ($redux_ThemeTek['tek-logo-style'] == '2') : ?>
                 <!-- Text logo -->
                 <a class="logo" href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html($redux_ThemeTek['tek-text-logo']);?></a>
               <?php endif; ?>
             <?php endif; ?>
             <?php if (!isset($redux_ThemeTek['tek-logo']['url']) && !isset($redux_ThemeTek['tek-text-logo']) ) : ?>
                <a class="logo blog-info-name" href="<?php echo esc_url(site_url()); ?>"><?php bloginfo( 'name' ); ?></a>
             <?php endif; ?>
           </div>
           <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <div class="mobile-cart">
                        <?php
                          if( !class_exists( 'WooCommerce' ))  {
                              function is_woocommerce() {}
                          }
                          if (isset($redux_ThemeTek['tek-woo-hide-cart-icon']) && ($redux_ThemeTek['tek-woo-hide-cart-icon'] == '1')) {

                          }
                          else if( class_exists( 'WooCommerce' ) && (isset($redux_ThemeTek['tek-topbar'])) && ($redux_ThemeTek['tek-topbar'] == '1')) {
                              $keydesign_minicart = '';
                              $keydesign_minicart = keydesign_add_cart_in_menu();
                              echo do_shortcode( shortcode_unautop( $keydesign_minicart ) );
                          }
                        ?>
                    </div>
            </div>
            <div id="main-menu" class="collapse navbar-collapse  navbar-right">
               <?php
                  wp_nav_menu( array( 'theme_location' => 'header-menu', 'depth' => 3, 'container' => false, 'menu_class' => 'nav navbar-nav', 'fallback_cb' => 'wp_bootstrap_navwalker::fallback', 'walker' => new wp_bootstrap_navwalker()) );
               ?>
               <?php if (isset($redux_ThemeTek['tek-header-button'])){
                   get_template_part( 'core/templates/header/content', 'header-button' );
               } ?>
            </div>
            </div>
         </div>
      </nav>

      <div id="wrapper" class="<?php echo esc_html( $hide_title_section_class ).' '.esc_html( $disable_animations_class ); ?>">
        <?php get_template_part( 'core/templates/header/content', 'title-bar' ); ?>
