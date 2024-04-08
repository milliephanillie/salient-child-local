<?php

namespace TwwGlossary\Admin;

class AdminMenu {
    public function __construct()
    {
        add_action('admin_menu', [$this, 'add_menu']);
    }

    public function add_menu() {
        add_menu_page(
            'TWW Glossary',
            'Research',
            'manage_options',
            'tww-glossary',
            null,
            'dashicons-book-alt',
            20
        );

        add_submenu_page(
            'tww-glossary',
            'Studies',
            'Studies',
            'edit_posts',
            'edit.php?post_type=tww_study'
        );
    }
}