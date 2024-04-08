<?php

class TWW_MEPR_Checkout {
    const TERMS = 'By purchasing this item you agree to our <a href="/terms-of-service" target="_blank">Terms of Service</a>';

    public function __construct()
    {
        add_action('mepr-checkout-before-submit', [$this, 'add_tww_plus_terms']);
    }

    public function add_tww_plus_terms() {
        $terms_page = new \WP_Query([
            'title' => 'Terms and Conditions',
            'post_type' => 'page',
            'fields' => 'ids'   
        ]);

        $terms_page_id = $terms_page->posts[0]->ID;
        $permalink = get_permalink($terms_page_id);

        echo '<p style="margin-bottom: 0; font-size: 13px; color: #414111; font-weight: 100;" >By purchasing this item you agree to our <a href="/terms-conditions" target="_blank">Terms of Service</a></p>';
    }
}

$c = new TWW_MEPR_Checkout();