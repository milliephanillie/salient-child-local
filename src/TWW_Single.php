<?php

class TWW_Single {
    const ENQUEUE_VERSION = '1.0.0';

	const GATED_MEMBERSHIPS = ['TWW+ (Monthly)', 'TWW+ (Yearly)'];

	public function __construct() {
		add_action('init', [$this, 'init_hooks']);
		//add_filter('the_content', [$this, 'tww_plus_gate_content']);
	}

	public function init_hooks() {
		add_action('nectar_single_post_header_before_title', [$this, 'before_title']);
		add_action('nectar_blog_page_header_categories', [$this, 'before_title_categories']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
	}

    public function enqueue_styles() {
        if(is_single()) {
            wp_register_style( 'tww-plus-styles', get_stylesheet_directory_uri() . '/css/tww-plus.css', '', self::ENQUEUE_VERSION );
		    wp_enqueue_style( 'tww-plus-styles' );
        }
    }

	public function before_title_categories($output) {
		global $post;
		$is_tww_plus = has_term('tww+', 'post_tag', $post);

		if($is_tww_plus) {
			$output = '';
		}

		return $output;
	}

	public function before_title() {
		global $post;
		$stylesheet_dir = get_stylesheet_directory_uri();

		$is_tww_plus = has_term('tww+', 'post_tag', $post);

        if($is_tww_plus) {
            echo '<div class="inner-wrap--tww-plus"><div class="tww-plus-badge"><img width="75" src="' . $stylesheet_dir . '/images/tww-plus-light.svg" alt="TWW+ Badge" /></div></div>';
        }
		
	}

	public function tww_plus_gate_content($content) {
		global $post;


		// if(has_term('tww+', 'post_tag', $post)) {	
		// 	add_filter( 'posts_where', 'filter_posts_by_titles', 10, 2 );

		// 	$membership_query = new WP_Query([
		// 		'post_type' => 'memberpressmembership',
		// 		'posts_per_page' => -1,
		// 		'fields' => 'ids', 
		// 	]);

		// 	remove_filter( 'posts_where', 'filter_posts_by_titles', 10 );

		// 	$user = new MeprUser(get_current_user_id());
    	// 	$ids = $user->active_product_subscriptions();

		// 	if(in_array($membership_query->posts, $ids)) {
		// 		return $content;
		// 	}

		// 	$content = wp_trim_words($content, 155, '...');

		// 	$content = '<div class="tww-plus-gate"><p>'.$content.' <a href="' . site_url('/login') . '">Login</a> or <a href="' . site_url('/register') . '">Register</a> to access this content.</p></div>';
		// }

		return $content;
	}

	function filter_posts_by_titles( $where, &$wp_query ) {
		global $wpdb;
	
		$titles = self::GATED_MEMBERSHIPS;
	
		$safe_titles = array_map( function( $title ) use ( $wpdb ) {
			return $wpdb->prepare( '%s', $title );
		}, $titles );
	
		if ( !empty( $safe_titles ) ) {
			$where .= " AND $wpdb->posts.post_title IN (" . implode( ',', $safe_titles ) . ")";
		}
	
		return $where;
	}
}

$templater = new TWW_Single();