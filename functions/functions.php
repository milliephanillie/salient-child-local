<?php 

add_action( 'wp_enqueue_scripts', 'salient_child_enqueue_styles', 100);

function salient_child_enqueue_styles() {
		$nectar_theme_version = nectar_get_theme_version();

		wp_enqueue_style( 'salient-child-style', get_stylesheet_directory_uri() . '/style.css', '', $nectar_theme_version );


    if ( is_rtl() ) {
   		wp_enqueue_style(  'salient-rtl',  get_template_directory_uri(). '/rtl.css', array(), '1', 'screen' );
	}
}

function add_twss_plus() {
	global $post;

	$output = '';

	if(has_term('tww+', 'post_tag', $post)) {
		$output = '<div class="tww-plus">TWW+</div>';
	}

	echo $output;
}

class MeprCheck {
	private $has_membership = false;

	public function __construct() {
		if(class_exists('MeprUser')	) {
			// add_action('wp_loaded', [$this, 'check_has_membership']);
			// add_action('template_redirect', [$this, 'redirect_to_join_page']);
			add_filter('mepr-rule-redirect-unauthorized-url', function( $redirect_url, $delim, $uri){
				global $post;

				$user_id = get_current_user_id();

				$active_memberships = [];

				if($user_id) {
					$user = new \MeprUser( $user_id );
					if( (int)$user->ID !== 0 ) { 
						$active_memberships = array_unique( $user->active_product_subscriptions( 'ids' ), true );
					}
				}

				if($active_memberships && count($active_memberships) > 0) {
					$this->has_membership = true;
				} 

				if($post->ID === 38447 && !$this->has_membership) {
					$redirect_url = site_url('/join');
				}
				
				return $redirect_url;
		   }, 10, 3);
		}
	}

	public static function get_active_subscription_id() {
		global $post;
		$user_id = get_current_user_id();

		$active_memberships = [];

		if($user_id) {
			$user = new \MeprUser( $user_id );

			if( (int)$user->ID !== 0 ) { 
				$active_memberships = array_unique( $user->active_product_subscriptions( 'ids' ), true );
			}
		}

		return $active_memberships[0] ?? 'No Active Memberships';
	}

	public function check_has_membership() {
		global $post;

		$user_id = get_current_user_id();

		$active_memberships = [];

		if($user_id) {
			$user = new \MeprUser( $user_id );
			if( (int)$user->ID !== 0 ) { 
				$active_memberships = array_unique( $user->active_product_subscriptions( 'ids' ), true );
				}
		}   

		if($active_memberships && count($active_memberships) > 0) {
			$this->has_membership = true;
		} 
	}

	public function redirect_to_join_page() {
		global $post;

		$tww_plus_page_id = 38447;

		if(!$this->has_membership && is_page($tww_plus_page_id) ) {
			wp_redirect(site_url('/join'));
			exit;
		}
	}
}

$check_membership = new MeprCheck();

class TWW_Login {
	public function __construct() {
		remove_filter('login_redirect', 'MeprProductsCtrl::track_and_override_login_redirect_wp', 999999, 3);
		add_action('login_redirect', [$this, 'redirect_to_referer'], 9999999999, 1);
	}

	public function redirect_to_referer($redirect_to) {
        $referer = $_SERVER['HTTP_REFERER'] ?? null;
    
        if ($referer && filter_var($referer, FILTER_VALIDATE_URL) && strpos($referer, 'thewellnessway.com') !== false) {
            if (strpos($referer, 'login') === false) {
                $redirect_to = $referer;
            }
        }
    
        return $redirect_to;
    }

}

add_action('plugins_loaded', 'tww_login');
function tww_login() {
	$login = new TWW_Login();
}

class TWW_THEME {
	const ENQUEUE_VERSION = '1.0.30';
	const SHOW_ADMIN_BAR_MEPR = true;

	private $allowed_page_ids = [];

	public function remove_dropdown_arrows_from_menu_for_account_and_login_pages($dropdownArrows, $element, $children_elements, $max_depth, $depth, $args, $output) {	
		if($element->object_id == 38099 && $args[0]->theme_location == 'top_nav') {
			$dropdownArrows = false;
		}

		return $dropdownArrows;
	}

	public function __construct() {
		add_filter('nectar_dropdown_arrows', [$this, 'remove_dropdown_arrows_from_menu_for_account_and_login_pages'], 10, 7);
		add_action('init', [$this, 'enqueue_styles']);
		add_action( 'init', [$this, 'register_menus'] );
		add_action('show_admin_bar', [$this, 'show_for_mepr_account_page'], 10, 15);
		add_action('check_admin_referer', [$this, 'logout_without_confirm'], 10, 2);
		add_action('template_redirect', [$this, 'check_login']);
		add_filter('mepr_design_style_handles', [$this, 'extend_mepr_styles']);
		add_filter('mepr_design_style_handle_prefixes', [$this, 'extend_mepr_prefixes']);
		add_filter('mepr-grace-init-days', function() {
			return 14;
	   });

	 //  add_filter('tww_redirect_to', [$this, 'redirect_to_referer'], 10, 1);
	   
		$thank_you_page_id = get_option('mepr_options')['thankyou_page_id'] ?? null;

		if($thank_you_page_id) {
			array_push($this->allowed_page_ids, $thank_you_page_id);
		}

		
		add_filter('body_class', function($classes) {
			global $post;

			if(has_term('tww+', 'post_tag', $post)) {
				$classes[] = 'tww-plus';
			}

			$post_types = [
				'memberpressgroup',
				'memberpressproduct',
				'memberpressrule',
				'memberpresstransaction',
				'memberpresssubscription',
				'memberpresspage',
				'memberpresscoupon',
				'memberpresspayment',
				'memberpressmembership',
			];
			
			if(class_exists('MeprUser') && (MeprUser::is_account_page($post) || in_array(get_post_type(), $post_types))) {
				$classes[] = 'tww-mepr';
			}

			return $classes;
		});
	}

	/**
	 * Add a redirect to the referer if it exists, this is applied in the memberpress login form
	 * located in wp-content/themes/salient-child/memberpress/login/form.php
	 * 
	 */
	public function redirect_to_referer($redirect_to) {
		$referer = $_SERVER['HTTP_REFERER'] ?? null;
	
		if ($referer && filter_var($referer, FILTER_VALIDATE_URL) && strpos($referer, site_url()) !== false) {
			if (strpos($referer, 'login') === false) {
				$redirect_to = $referer;
			}
		}
	
		return $redirect_to;
	}

	public function extend_mepr_prefixes($allowed_prefixes) {
		$allowed_prefixes[] = 'salient-wp-menu-dynamic';
		$allowed_prefixes[] = 'dynamic-css';

		return $allowed_prefixes;
	}

	public function extend_mepr_styles($allowed_handles) {
		$allowed_handles[] = 'admin-bar';
		$allowed_handles[] = 'salient-wp-menu-dynamic';
		$allowed_handles[] = 'main-styles';
		$allowed_handles[] = 'skin-material';
		$allowed_handles[] = 'dynamic-css';
		$allowed_handles[] = 'dynamic-css-min';
		$allowed_handles[] = 'salient-child';
		$allowed_handles[] = 'responsive';
		$allowed_handles[] = 'nectar-frontend';
		$allowed_handles[] = 'nectar-ocm-core';
		$allowed_handles[] = 'nectar-ocm-slide-out-right-hover';
		$allowed_handles[] = 'nectar-ocm-fullscreen-legacy';
		$allowed_handles[] = 'nectar-ocm-fullscreen-split';
		$allowed_handles[] = 'nectar-ocm-simple';
		$allowed_handles[] = 'nectar-ocm-slide-out-right-material';

		$allowed_handles[] = 'nectar-header-layout-left-aligned';
		$allowed_handles[] = 'nectar-header-layout-centered-bottom-bar';
		$allowed_handles[] = 'ectar-header-layout-centered-menu-under-logo';
		$allowed_handles[] = 'nectar-header-layout-centered-menu';
		$allowed_handles[] = 'nectar-header-layout-centered-logo-between-menu';
		$allowed_handles[] = 'nectar-header-layout-centered-logo-between-menu-alt';

		return $allowed_handles;
	}

	public function check_login() {
		global $post;

		if(class_exists('MeprUser') && MeprUser::is_account_page($post) && !is_user_logged_in()) {
			wp_redirect(site_url('/login'));
			exit;
		}
	}

	public function register_menus() {
		register_nav_menus(
			array(
			'member-menu-location' => __( 'Member Menu Location', 'tww-plus' ),
			)
		);
	}

	public function logout_without_confirm($action, $result) {
    /**
     * Allow logout without confirmation
     */
    if ($action == "log-out" && !isset($_GET['_wpnonce'])) {
        $redirect_to = isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : home_url();
        $location = str_replace('&amp;', '&', wp_logout_url($redirect_to));
        header("Location: $location");
        die;
    }
}
	
	public function enqueue_styles() {
		add_action('wp_enqueue_scripts', [$this, 'add_twss_plus_styles_new'], 15);
	}

	public function show_for_mepr_account_page($show) {
		global $post;

		if(class_exists('MeprUser') && MeprUser::is_account_page($post)) {
			$show = self::SHOW_ADMIN_BAR_MEPR;
		}

		$user = wp_get_current_user();
		$user_roles = (array) $user->roles;
		if ( in_array( 'subscriber', $user_roles) && count($user_roles) === 1 ) {
			$show = false;
		}

		return $show;
	}

	public function add_twss_plus_styles_new() {
		wp_register_style('salient-child', trailingslashit(get_stylesheet_directory_uri()) . 'css/salient-child.css', [], self::ENQUEUE_VERSION, 'all');
		wp_enqueue_style('salient-child');

		$post_types = [
			'memberpressgroup',
			'memberpressproduct',
			'memberpressrule',
			'memberpresstransaction',
			'memberpresssubscription',
			'memberpresspage',
			'memberpresscoupon',
			'memberpresspayment',
			'memberpressmembership',
		];


		global $post;
		if(in_array(get_post_type(), $post_types) || in_array($post->ID, $this->allowed_page_ids)) {

			if(self::SHOW_ADMIN_BAR_MEPR) {
				if(current_user_can('manage_options')) {
					wp_enqueue_style('admin-bar', includes_url('css/admin-bar.min.css'), array(), false, 'all');
				}
			}

			$custom_css = `
				#footer-outer {
						display: none;
				}`
			;
			wp_add_inline_style( 'main-styles', $custom_css );
		}
	}


	public function add_twss_plus_styles() {
		global $post;
		global $nectar_options;
		global $nectar_get_template_directory_uri;
		global $nectar_theme_version;
		
		// var_dump(get_option('mepr_options'));
		// die();
		
		$src_dir =  'src';
		$dynamic_css_version_num = ( !get_option('salient_dynamic_css_version') ) ? $nectar_theme_version : get_option('salient_dynamic_css_version');

		$display_swap_str = '&display=swap';
		wp_enqueue_style( 'mepr-nectar_default_font_open_sans', 'https://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C600%2C700&subset=latin%2Clatin-ext'.$display_swap_str, false, null, 'all' );

		wp_register_style( 'mepr-main-styles', $nectar_get_template_directory_uri . '/css/build/main-styles.min.css', '', self::ENQUEUE_VERSION );
		wp_register_style( 'mepr-skin-material', $nectar_get_template_directory_uri . '/css/'.$src_dir.'/skin-material.css', '', $nectar_theme_version );
		wp_register_style( 'mepr-dynamic-css', $nectar_get_template_directory_uri . '/css/salient-dynamic-styles.css', '', $dynamic_css_version_num);
		wp_register_style( 'mepr-dynamic-css-min', $nectar_get_template_directory_uri . '/css/dynamic-css.min.css', '', self::ENQUEUE_VERSION);
		wp_register_style( 'mepr-custom-salient-child', get_stylesheet_directory_uri() . '/css/salient-child.css', '', self::ENQUEUE_VERSION);
		wp_register_style( 'mepr-responsive', $nectar_get_template_directory_uri . '/css/'.$src_dir.'/responsive.css', '', $nectar_theme_version );

		
		wp_register_script( 'mepr-nectar-frontend', $nectar_get_template_directory_uri . '/js/build/init.js', array( 'jquery', 'superfish', 'nectar-waypoints', 'nectar-transit' ), $nectar_theme_version, true );

		wp_register_style( 'custom-one-salient-child', get_stylesheet_directory_uri() . '/css/salient-child.css', '', self::ENQUEUE_VERSION);

		wp_register_style( 'mepr-nectar-ocm-core', $nectar_get_template_directory_uri . '/css/'.$src_dir.'/off-canvas/core.css', '', $nectar_theme_version );
		wp_register_style( 'mepr-nectar-ocm-slide-out-right-hover', $nectar_get_template_directory_uri . '/css/'.$src_dir.'/off-canvas/slide-out-right-hover.css', '', $nectar_theme_version );
		wp_register_style( 'mepr-nectar-ocm-fullscreen-legacy', $nectar_get_template_directory_uri . '/css/'.$src_dir.'/off-canvas/fullscreen-legacy.css', '', $nectar_theme_version );
	//	wp_register_style( 'mepr-nectar-ocm-fullscreen-split', $nectar_get_template_directory_uri . '/css/'.$src_dir.'/off-canvas/fullscreen-split.css', '', $nectar_theme_version );
		wp_register_style( 'mepr-nectar-ocm-simple', $nectar_get_template_directory_uri . '/css/'.$src_dir.'/off-canvas/simple-dropdown.css', '', $nectar_theme_version );
		wp_register_style( 'mepr-nectar-ocm-slide-out-right-material', $nectar_get_template_directory_uri . '/css/'.$src_dir.'/off-canvas/slide-out-right-material.css', '', $nectar_theme_version );

		$post_types = [
			'memberpressgroup',
			'memberpressproduct',
			'memberpressrule',
			'memberpresstransaction',
			'memberpresssubscription',
			'memberpresspage',
			'memberpresscoupon',
			'memberpresspayment',
			'memberpressmembership',
		];


		if(class_exists('MeprUser') && (MeprUser::is_account_page($post) || in_array(get_post_type(), $post_types) || in_array($post->ID, $this->allowed_page_ids))) {

			if(self::SHOW_ADMIN_BAR_MEPR) {
				wp_enqueue_style('admin-bar', includes_url('css/admin-bar.min.css'), array(), false, 'all');
			}

			 $header_format = ( ! empty( $nectar_options['header_format'] ) ) ? $nectar_options['header_format'] : 'default';
	
			 if( $header_format === 'left-header' ) {
				 wp_enqueue_style( 'nectar-header-layout-left' );
			 }
			else if( $header_format === 'menu-left-aligned' ) {
				wp_enqueue_style( 'nectar-header-layout-left-aligned' );
			}
			 else if( $header_format === 'centered-menu-bottom-bar' ) {
				 wp_enqueue_style( 'nectar-header-layout-centered-bottom-bar' );
			 }
			 else if ( $header_format === 'centered-menu-under-logo' ) {
				 wp_enqueue_style( 'nectar-header-layout-centered-menu-under-logo' );
			 }
			 else if ( $header_format === 'centered-menu' ) {
				 wp_enqueue_style( 'nectar-header-layout-centered-menu' );
			 }
			 else if( $header_format === 'centered-logo-between-menu' ) {
				 wp_enqueue_style( 'nectar-header-layout-centered-logo-between-menu' );
			 }
			 else if( $header_format === 'centered-logo-between-menu-alt' ) {
				 wp_enqueue_style( 'nectar-header-layout-centered-logo-between-menu-alt' );
			 }

			 	wp_enqueue_style( 'mepr-main-styles' );
				wp_enqueue_style( 'mepr-dynamic-css' );
				wp_enqueue_style( 'mepr-dynamic-css-min' );
				wp_enqueue_style( 'mepr-skin-material' );
				wp_enqueue_style( 'mepr-nectar-ocm-core' );
				wp_enqueue_style( 'mepr-nectar-ocm-slide-out-right-hover' );
				wp_enqueue_style( 'mepr-nectar-ocm-fullscreen-legacy' );
				wp_enqueue_style( 'mepr-nectar-ocm-fullscreen-split' );
				wp_enqueue_style( 'mepr-nectar-ocm-simple' );
				wp_enqueue_style( 'mepr-nectar-ocm-slide-out-right-material' );
				wp_enqueue_style( 'mepr-custom-salient-child' );
				wp_enqueue_style( 'mepr-responsive' );

				/// i want to inline css here. add wp inline style function on next line
				$custom_css = `
			 		a:visited {
					}
					#footer-outer {
							display: none;
					}`
				;
				wp_add_inline_style( 'mepr-main-styles', $custom_css );

				//wp_enqueue_script( 'mepr-nectar-frontend' );

				// wp_enqueue_script( 'admin-bar' );
				wp_enqueue_style( 'admin-bar' );

				if(current_user_can('manage_options')) {
					wp_enqueue_style('mepr-admin-bar', includes_url('css/admin-bar.min.css'), array(), false, 'all');
				}
		} else {
			wp_enqueue_style('custom-one-salient-child');
		}
	}
}

$tww_theme = new TWW_THEME();

require_once('src/TWW_Single.php');
require_once('src/TWW_MEPR_Checkout.php');

?>