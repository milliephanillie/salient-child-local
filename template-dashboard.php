<?php
/**
 * Template Name: Dashboard
 * 
 * 
 * Building a dashboard template for the Salient theme. It will have a sidebar on the left with various profile links and a main content area on the right.
 *
 */

get_header(); ?>

<?php
$page_id = get_the_ID();
$page_title = get_the_title($page_id); ?>

<div class="full-width full-size">
    <div class="flex-container h-100">
        <div id="dashboard-sidebar" class="dashboard-sidebar dashboard-sidebar--is-open">
            <sidebar class="dashboard-sidebar shadow-theme">
            
            <nav>
                <div class="nav-group">
                    <div class="nav-group-header">
                        <h3>
                            <div class="fill-grey-light">
                                <svg enable-background="new 0 0 100 100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" data-src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/cog.svg'; ?>>
                                    <style type="text/css">
                                        .st0{fill:none;stroke:#000000;stroke-width:5;stroke-miterlimit:10;}
                                    </style>
                                    <path class="st0" d="M8.5,87.7"></path>
                                    <g>
                                        <path d="M67.8,49c0-0.3,0-0.5-0.1-0.8c0-0.3-0.1-0.6-0.1-0.9c0-0.3-0.1-0.7-0.2-1c0-0.2-0.1-0.3-0.1-0.5c0-0.1,0-0.1-0.1-0.2
                                            c-0.1-0.3-0.2-0.7-0.3-1c-0.1-0.2-0.1-0.5-0.2-0.7c-0.1-0.2-0.2-0.5-0.3-0.7c-0.1-0.3-0.3-0.6-0.4-1c-0.1-0.2-0.2-0.3-0.2-0.5
                                            c-0.2-0.4-0.4-0.8-0.6-1.1c0,0,0-0.1-0.1-0.1c-0.1-0.1-0.1-0.2-0.2-0.2c-0.2-0.4-0.5-0.7-0.7-1.1c-0.1-0.2-0.3-0.3-0.4-0.5
                                            c-0.2-0.3-0.4-0.5-0.7-0.8c-0.2-0.2-0.5-0.5-0.7-0.7c-0.1-0.1-0.3-0.3-0.4-0.4c-0.3-0.3-0.7-0.6-1.1-0.9c-0.1,0-0.1-0.1-0.2-0.1
                                            c-0.4-0.3-0.9-0.7-1.4-0.9c0,0,0,0,0,0c0,0,0,0,0,0c-0.5-0.3-0.9-0.6-1.4-0.8c0,0-0.1,0-0.1-0.1c-0.4-0.2-0.8-0.4-1.3-0.6
                                            c-0.1-0.1-0.3-0.1-0.4-0.2c-0.3-0.1-0.7-0.2-1.1-0.3c-0.2-0.1-0.4-0.1-0.7-0.2c-0.1,0-0.2-0.1-0.3-0.1c-0.2-0.1-0.5-0.1-0.7-0.1
                                            c-0.2,0-0.5-0.1-0.7-0.1c-0.4-0.1-0.8-0.1-1.2-0.1c-0.1,0-0.3,0-0.4,0c-0.5,0-1.1,0-1.6,0c0,0,0,0,0,0c-3.1,0.1-6.1,1-8.7,2.6
                                            c-3.8,2.4-6.6,6-7.8,10.4c0,0.1,0,0.1,0,0.2c0,0.2-0.1,0.3-0.1,0.5c-0.1,0.3-0.1,0.6-0.2,0.9c0,0.1,0,0.2-0.1,0.3
                                            c-0.1,0.5-0.1,0.9-0.2,1.4c0,0.1,0,0.2,0,0.3c0,0.5,0,1,0,1.5c0,0.1,0,0.2,0,0.2c0,0.5,0.1,1.1,0.1,1.6c0,0,0,0.1,0,0.1
                                            c0.1,0.6,0.2,1.1,0.3,1.7c0,0,0,0.1,0,0.1c0,0,0,0,0,0c0.1,0.4,0.2,0.8,0.3,1.2c0,0.2,0.1,0.3,0.2,0.5c0.1,0.3,0.2,0.6,0.3,0.9
                                            c0.1,0.3,0.2,0.5,0.3,0.7c0.1,0.2,0.2,0.4,0.3,0.6c0.2,0.3,0.3,0.6,0.5,1c0.1,0.1,0.1,0.2,0.2,0.3c0,0,0.1,0.1,0.1,0.1
                                            c0.2,0.4,0.5,0.7,0.7,1.1c0.1,0.1,0.1,0.2,0.2,0.3c0.3,0.4,0.7,0.8,1,1.2c0.2,0.2,0.4,0.4,0.6,0.6c0.2,0.1,0.3,0.3,0.5,0.4
                                            c0.3,0.2,0.5,0.4,0.8,0.7c0.1,0.1,0.3,0.2,0.4,0.3c0.3,0.2,0.6,0.4,0.8,0.6c0.2,0.1,0.3,0.2,0.5,0.3c0.3,0.2,0.6,0.3,0.8,0.5
                                            c0.2,0.1,0.5,0.2,0.7,0.4c0.2,0.1,0.4,0.2,0.7,0.3c1,0.5,2.1,0.8,3.2,1.1c0,0,0,0,0,0c0,0,0,0,0,0c0.6,0.2,1.3,0.3,2,0.3
                                            c0,0,0,0,0.1,0c0.7,0.1,1.3,0.1,2,0.1c1.3,0,2.7-0.2,4.1-0.5c4.5-1.1,8.3-3.8,10.8-7.6c0,0,0,0,0,0c0.1-0.1,0.1-0.2,0.2-0.3
                                            c0.2-0.3,0.3-0.5,0.4-0.8c0.1-0.1,0.1-0.2,0.2-0.3c0.2-0.4,0.4-0.7,0.5-1.1c0-0.1,0.1-0.2,0.1-0.3c0.2-0.4,0.3-0.9,0.5-1.3
                                            c0,0,0,0,0-0.1c0.5-1.6,0.8-3.2,0.9-4.9c0-0.1,0-0.2,0-0.4C67.8,49.9,67.8,49.5,67.8,49z M62.3,50.4c0,0.8-0.1,1.6-0.3,2.4
                                            c-0.3,1.2-0.7,2.3-1.3,3.3c0,0,0,0.1-0.1,0.1c-0.2,0.3-0.4,0.6-0.6,0.9c0,0,0,0.1-0.1,0.1c-0.9,1.3-2.1,2.4-3.5,3.2
                                            c-1,0.6-2.1,1.1-3.3,1.4c0,0,0,0,0,0c-0.3,0.1-0.7,0.2-1.1,0.2c0,0-0.1,0-0.1,0c-0.4,0.1-0.7,0.1-1.1,0.1c0,0-0.1,0-0.1,0
                                            c-1.2,0.1-2.4,0-3.6-0.3c-0.4-0.1-0.7-0.2-1.1-0.3c0,0-0.1,0-0.1,0c-0.3-0.1-0.6-0.2-0.8-0.3c-0.1-0.1-0.2-0.1-0.4-0.2
                                            c-0.2-0.1-0.4-0.2-0.6-0.3c-0.2-0.1-0.4-0.2-0.5-0.3c-0.1-0.1-0.3-0.2-0.4-0.2c-0.2-0.1-0.4-0.3-0.6-0.4c-0.1-0.1-0.2-0.2-0.3-0.2
                                            c-0.2-0.2-0.4-0.3-0.6-0.5c-0.1-0.1-0.2-0.2-0.3-0.3c-0.2-0.2-0.3-0.3-0.5-0.5c-0.1-0.1-0.3-0.3-0.4-0.5c-0.1-0.1-0.2-0.3-0.4-0.4
                                            c-0.1-0.2-0.3-0.4-0.4-0.6c-0.1-0.1-0.2-0.3-0.3-0.4c-0.1-0.2-0.2-0.4-0.3-0.6c-0.1-0.2-0.2-0.4-0.3-0.5c-0.1-0.1-0.1-0.2-0.2-0.4
                                            c-0.1-0.3-0.2-0.5-0.3-0.8c0,0,0-0.1,0-0.1c-0.1-0.4-0.2-0.7-0.3-1.1c0,0,0,0,0,0C38,52.4,38,52,37.9,51.6c0,0,0,0,0,0
                                            c-0.1-0.4-0.1-0.8-0.1-1.2c0,0,0,0,0-0.1c0-0.4,0-0.8,0-1.1c0,0,0-0.1,0-0.1c0-0.4,0.1-0.7,0.1-1.1c0,0,0-0.1,0-0.1
                                            c0.8-4.7,4.3-8.7,9.3-9.8c1.1-0.3,2.3-0.4,3.4-0.3c0.1,0,0.3,0,0.4,0c0.3,0,0.5,0.1,0.8,0.1c0.2,0,0.4,0.1,0.6,0.1
                                            c0.2,0,0.5,0.1,0.7,0.2c0.1,0,0.2,0.1,0.3,0.1c0.3,0.1,0.6,0.2,0.9,0.3c0,0,0.1,0,0.1,0.1c0.7,0.3,1.4,0.6,2.1,1
                                            c0.3,0.2,0.7,0.4,1,0.7c0,0,0,0,0,0c0.3,0.2,0.6,0.4,0.8,0.7c0.1,0.1,0.2,0.2,0.3,0.2c0.2,0.2,0.4,0.4,0.5,0.5
                                            c0.1,0.2,0.3,0.3,0.4,0.5c0.1,0.1,0.2,0.2,0.3,0.4c0.2,0.2,0.3,0.5,0.5,0.7c0.1,0.1,0.1,0.2,0.2,0.3c0.2,0.3,0.3,0.5,0.4,0.8
                                            c0.1,0.1,0.1,0.2,0.2,0.3c0.1,0.2,0.2,0.4,0.3,0.7c0.1,0.2,0.1,0.3,0.2,0.5c0.1,0.2,0.1,0.4,0.2,0.5c0.1,0.2,0.1,0.4,0.2,0.7
                                            c0,0.2,0.1,0.3,0.1,0.5c0,0.2,0.1,0.4,0.1,0.6c0,0.2,0.1,0.5,0.1,0.7c0,0.1,0,0.3,0,0.4C62.3,49.6,62.3,50,62.3,50.4
                                            C62.3,50.4,62.3,50.4,62.3,50.4z"/>
                                        <path d="M94.1,61l-9.2-5.2c0.3-2.1,0.5-4,0.5-5.7c0-2-0.2-4-0.5-5.8l9.3-5.3c0.9-0.5,1.5-1.3,1.8-2.3c0.3-1,0.1-2-0.4-2.9
                                            l-8.7-15.1c-1-1.8-3.3-2.4-5.1-1.4l-9.3,5.3c-2.9-2.4-6.3-4.3-9.9-5.7V6.2c0-2.1-1.7-3.8-3.8-3.8H41.4c-2.1,0-3.8,1.7-3.8,3.8V17
                                            c-3.7,1.4-7,3.4-9.9,5.7l-9.3-5.3c-1.8-1-4.1-0.4-5.1,1.4L4.5,33.9c-0.5,0.9-0.6,1.9-0.4,2.9c0.3,1,0.9,1.8,1.8,2.3l9.3,5.2
                                            C14.9,46,14.7,48,14.7,50c0,1.9,0.1,3.9,0.4,5.7l-9.4,5.4c-0.9,0.5-1.5,1.3-1.8,2.3c-0.3,1-0.1,2,0.4,2.8l8.7,15.1
                                            c1,1.8,3.3,2.4,5.1,1.4l9.3-5.3c2.9,2.4,6.3,4.3,9.9,5.7v10.7c0,2.1,1.7,3.8,3.8,3.8h17.4c2.1,0,3.8-1.7,3.8-3.8V83
                                            c3.7-1.4,7-3.4,9.9-5.7l9.3,5.3c1.8,1,4.1,0.4,5.1-1.4l8.7-15.1c0.5-0.9,0.6-1.9,0.4-2.9S95,61.5,94.1,61z M82.9,77l-11.3-6.5
                                            l-1.5,1.4c-3.1,2.9-7,5.2-11.3,6.6l-1.9,0.6v13H43V79.2l-1.9-0.6c-4.3-1.4-8.2-3.7-11.3-6.6l-1.5-1.4L17,77.1L10,65l11.2-6.4
                                            l-0.4-1.9c-0.4-2.1-0.6-4.3-0.6-6.6c0-2.4,0.2-4.6,0.7-6.5l0.5-2l-11.3-6.4L17.1,23l11.3,6.5l1.5-1.4c3.1-2.9,7-5.2,11.3-6.6
                                            l1.9-0.6v-13H57v12.9l1.9,0.6c4.3,1.4,8.2,3.7,11.3,6.6l1.5,1.4L83,22.9L90,35l-11.3,6.5l0.5,2c0.5,1.9,0.7,4.1,0.7,6.5
                                            c0,1.9-0.2,4-0.8,6.6l-0.4,1.9l11.1,6.3L82.9,77z"/>
                                    </g>
                                </svg>
                            </div>
                            <span class="dash-setting-item">overall settings</span>
                        </h3>
                    </div>
                    <div class="dashboard-menu-list-group">
                        <a href="<?php echo home_url() . '/dashboard/my-profile'; ?>" class="list-group-item list-group-item-action <?php echo $page_title === 'My Profile' ? 'is-open' : ''; ?>">
                            <div class="fill-grey">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve" class="injected-svg" data-src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/user.svg'; ?>>
                                <style type="text/css">
                                    .st0{fill:none;stroke:#000000;stroke-width:5;stroke-miterlimit:10;}
                                </style>
                                <path class="st0" d="M8.5,87.7"></path>
                                <g>
                                    <path d="M50,57c13.2,0,24-10.8,24-24S63.2,9,50,9C36.8,9,26,19.7,26,33S36.8,57,50,57z M50,14.5c10.2,0,18.5,8.3,18.5,18.5   S60.2,51.5,50,51.5S31.5,43.2,31.5,33S39.8,14.5,50,14.5z"></path>
                                    <path d="M97.9,86.2C84.7,74.5,67.7,68,50,68S15.3,74.5,2.1,86.2c-1.1,1-1.2,2.7-0.2,3.9c1,1.1,2.7,1.2,3.9,0.2   C17.9,79.5,33.7,73.5,50,73.5s32.1,6,44.3,16.8c0.5,0.5,1.2,0.7,1.8,0.7c0.8,0,1.5-0.3,2.1-0.9C99.2,89,99.1,87.2,97.9,86.2z"></path>
                                </g>
                                </svg>
                            </div>
                            <span class="dash-setting-item">My Profile</span>
                        </a>
                        <a href="<?php echo home_url() . '/dashboard/payments'; ?>" class="list-group-item list-group-item-action <?php echo $page_title === 'Payments' ? 'is-open' : ''; ?>">
                            <div class="fill-grey">
                                <svg enable-background="new 0 0 100 100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" data-src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/wallet.svg'; ?>>
                                    <style type="text/css">
                                        .st0{fill:none;stroke:#000000;stroke-width:5;stroke-miterlimit:10;}
                                    </style>
                                    <path class="st0" d="M8.5,87.7"></path>
                                    <g>
                                        <path d="m92.5 31.7h-11.3v-17.9c0-1.2-.6-2.3-1.5-3s-2.2-.9-3.3-.6l-71.2 20.8c-.9.2-1.4 1-1.4 1.9v27.9 25.3c0 2.1 1.7 3.8 3.8 3.8h85c2.1 0 3.8-1.7 3.8-3.8v-50.6c-.1-2.1-1.8-3.8-3.9-3.8zm-16.8 0h-53.4l53.4-15.6zm-66.4 52.7v-47.2h81.5v13.3h-25.1c-6.5 0-11.8 5.3-11.8 11.8s5.3 11.8 11.8 11.8h25.1v10.3zm81.5-28.3v12.5h-25.1c-3.4 0-6.3-2.8-6.3-6.3s2.8-6.3 6.3-6.3h25.1z"/>
                                    </g>
                                </svg>
                            </div>
                            <span class="dash-setting-item">Payments</span> 
                        </a>
                        <a href="<?php echo home_url() . '/dashboard/subscriptions'; ?>" class="list-group-item list-group-item-action <?php echo $page_title === 'Subscriptions' ? 'is-open' : ''; ?>">
                            <div class="fill-grey">
                                <svg enable-background="new 0 0 100 100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" data-src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/wallet.svg'; ?>>
                                    <style type="text/css">
                                        .st0{fill:none;stroke:#000000;stroke-width:5;stroke-miterlimit:10;}
                                    </style>
                                    <path class="st0" d="M8.5,87.7"></path>
                                    <g>
                                        <path d="M25.7,96.8c-0.7,0-1.4-0.1-2-0.4c-1.9-0.9-3.2-2.8-3.2-5.1V8.6c0-2.9,2.3-5.3,5.2-5.3h48.6c2.8,0,5.2,2.4,5.2,5.3v82.6
                                            c0.2,2-0.8,3.9-2.5,4.9c-1.8,1-4.1,0.8-5.8-0.5L71,95.4l-20.9-19l-20.9,19C28.2,96.3,27,96.8,25.7,96.8z M26,8.7l0,82.1l20.7-18.8
                                            c2-1.6,4.8-1.6,6.8,0l0.1,0.1L74,90.6V8.7H26z"/>
                                    </g>
                                </svg>
                            </div>
                            <span class="dash-setting-item">Subscriptions</span>
                        </a>
                    </div>
                </div>
            </nav>
            </sidebar>
        </div>
        <div class="dashboard-content sidebar-is-open">
            <div class="dashboard-header">
                <div class="flex-container">
                    <div class="dashboard-header-icon">
                    <div class="fill-grey">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve" class="injected-svg" data-src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/user.svg'; ?>>
                            <style type="text/css">
                                .st0{fill:none;stroke:#000000;stroke-width:5;stroke-miterlimit:10;}
                            </style>
                            <path class="st0" d="M8.5,87.7"></path>
                            <g>
                                <path d="M50,57c13.2,0,24-10.8,24-24S63.2,9,50,9C36.8,9,26,19.7,26,33S36.8,57,50,57z M50,14.5c10.2,0,18.5,8.3,18.5,18.5   S60.2,51.5,50,51.5S31.5,43.2,31.5,33S39.8,14.5,50,14.5z"></path>
                                <path d="M97.9,86.2C84.7,74.5,67.7,68,50,68S15.3,74.5,2.1,86.2c-1.1,1-1.2,2.7-0.2,3.9c1,1.1,2.7,1.2,3.9,0.2   C17.9,79.5,33.7,73.5,50,73.5s32.1,6,44.3,16.8c0.5,0.5,1.2,0.7,1.8,0.7c0.8,0,1.5-0.3,2.1-0.9C99.2,89,99.1,87.2,97.9,86.2z"></path>
                            </g>
                            </svg>
                        </div>
                    </div>
                    <div class="dashboard-header-title">
                        <h1>My Profile</h1>
                        <p>Welcome to your profile dashboard. 
                    </div>
                </div>
            </div>

            <main class="dashboard-main <?php echo $page_title === 'My Profile' ? 'active-content' : ''; ?>">

            <div class="dashboard-card dashboard-card--sm shadow-theme">
                <nav class="tab-nav">
                    <ul>
                        <li><a href="#" class="is-active">General</a></li>
                        <li><a href="#">Password Information</a></li>
                        <li><a class="is-active" href="#">Billing Details</a></li>
                    </ul>
                </nav>
            </div>

            <div class="dashboard-card dashboard-card--sm shadow-theme">
                <div class="tab-content">
                    <h3>General Information</h3>
                    <p>Update your general information here.</p>

                    <div class="form-wrapper">
                        <form class="flex-form">
                            <div class="form-fields">
                            <div class="form-group">
                                <label for="first-name">First Name</label>
                                <input placeholder="First Name" type="text" id="first-name" name="first-name">
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last Name</label>
                                <input placeholder="Last Name" type="text" id="last-name" name="last-name">     
                            </div>
                            <div class="form-group ">
                                <label for="display_name">Display Name</label>
                                <input placeholder="Display Name" type="text" id="display_name" name="display_name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input placeholder="Email" type="email" id="email" name="email">    
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input placeholder="Phone" type="text" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input placeholder="Website" type="text" id="website" name="website">
                            </div>
                            <div class="form-group form-group--span-2  profile-picture">
                                <label for="profile-picture"><span class="text-sm">Profile Picture <span class="text-light">(allowed formats JPG, PNG and maximum 5mb)</span></span></label>
                                <button class="upload-profile-picture" placeholder="Profile Picture" id="profile-picture" name="profile-picture">Upload Picture</button>
                            </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="dash-button btn-brand-green">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            </main>

            <main class="dashboard-main <?php echo $page_title === 'Payments' ? 'active-content' : ''; ?>">
                <div class="dashboard-card shadow-theme">
                    <h3>Payments</h3>
                    <p>View your payment history here.</p>
                </div>
            </main>

            <main class="dashboard-main <?php echo $page_title === 'Subscriptions' ? 'active-content' : ''; ?>">
                <div class="dashboard-card shadow-theme">
                    <h3>Subscriptions</h3>
                    <p>View your subscription details here.</p>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>