<?php
/**
 * The layout for authenticated or guest pages
 *
 * @package memberpress-pro-template
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">


  <?php
    nectar_meta_viewport();

    // Shortcut icon fallback.
    if ( ! empty( $nectar_options['favicon'] ) && ! empty( $nectar_options['favicon']['url'] ) ) {
      echo '<link rel="shortcut icon" href="'. esc_url( nectar_options_img( $nectar_options['favicon'] ) ) .'" />';
    }
  ?>

  

  <?php wp_head(); ?>
</head>

<body <?php body_class( 'tww-mepr mepr-pro-template mepr-app-layout' ); ?> <?php nectar_body_attributes(); ?>>
  <?php 
    nectar_hook_after_body_open();
    nectar_hook_before_header_nav(); 
  ?>

<div id="header-outer" <?php nectar_header_nav_attributes(); ?>>
    <?php 
    /**
  * This header is the outer header that contains the logo and the main navigation.
  *
  */
    get_template_part( 'includes/header-search' );
    get_template_part('includes/partials/header/header-menu-member'); ?>
  
    </div> <!-- header-outer -->

  <div id="page" class="site app-layout">
    <main id="primary" class="site-main <?php echo $wrapper_classes ?>">
      <?php the_content() ?>

    </main>

    <?php get_footer(); ?>
</body>

</html>