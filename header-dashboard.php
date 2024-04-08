<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php
	
	$nectar_options = get_nectar_theme_options();
	
	nectar_meta_viewport();
	
	// Shortcut icon fallback.
	if ( ! empty( $nectar_options['favicon'] ) && ! empty( $nectar_options['favicon']['url'] ) ) {
		echo '<link rel="shortcut icon" href="'. esc_url( nectar_options_img( $nectar_options['favicon'] ) ) .'" />';
	}
	
	wp_head();
?>
</head><?php

$nectar_header_options = nectar_get_header_variables();

?><body <?php body_class(); ?> <?php nectar_body_attributes(); ?>>

<header class="header--dashboard">
    <div class="full-width">
        <div class="flex-container">
            <div id="sidebar-buddy" class="sidebar-buddy sidebar-buddy--is-open">
                <div class="logo-container">
                    <div class="logo-wrapper">
                        <a href="<?php echo home_url(); ?>">
                            <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/twwlogo70.webp" alt="Logo">
                        </a>
                    </div>
                    <div id="dash-ham-container" class="dash-ham-container dash-ham-container--is-open">
                        <div id="ham-open" class="dash-ham-menu">
                                <div class="fill-grey">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve" class="injected-svg" data-src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/menu.svg'; ?>>
                                    <style type="text/css">
                                        .st0{fill:none;stroke:#000000;stroke-width:5;stroke-miterlimit:10;}
                                    </style>
                                    <g>
                                        <path d="M5.5,31.7h89c1.5,0,2.8-1.2,2.8-2.8s-1.2-2.8-2.8-2.8h-89c-1.5,0-2.8,1.2-2.8,2.8S4,31.7,5.5,31.7z"/>
                                        <path d="M94.5,47.3h-89c-1.5,0-2.8,1.2-2.8,2.8s1.2,2.8,2.8,2.8h89c1.5,0,2.8-1.2,2.8-2.8S96,47.3,94.5,47.3z"/>
                                        <path d="M94.5,68.3h-89c-1.5,0-2.8,1.2-2.8,2.8s1.2,2.8,2.8,2.8h89c1.5,0,2.8-1.2,2.8-2.8S96,68.3,94.5,68.3z"/>
                                    </g>
                                    </svg>

                                    </g>
                                    </svg>
                                </div>
                        </div>
                        <div id="ham-close" class="dash-ham-close">
                                <div class="fill-grey">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve" class="injected-svg" data-src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/user.svg'; ?>>
                                    <style type="text/css">
                                        .st0{fill:none;stroke:#000000;stroke-width:5;stroke-miterlimit:10;}
                                    </style>
                                    <path class="st0" d="M8.5,87.7"></path>
                                    <g>
                                    <path d="M53.9,50L96.9,6.9c1.1-1.1,1.1-2.8,0-3.9c-1.1-1.1-2.8-1.1-3.9,0L50,46.1L6.9,3.1C5.9,2,4.1,2,3.1,3.1C2,4.1,2,5.9,3.1,6.9
                                        L46.1,50L3.1,93.1c-1.1,1.1-1.1,2.8,0,3.9c0.5,0.5,1.2,0.8,1.9,0.8s1.4-0.3,1.9-0.8L50,53.9l43.1,43.1c0.5,0.5,1.2,0.8,1.9,0.8
                                        s1.4-0.3,1.9-0.8c1.1-1.1,1.1-2.8,0-3.9L53.9,50z"/>
                                    </svg>

                                    </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <!-- <nav>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav> -->
            </div>
        </div>
    </div>
</header>