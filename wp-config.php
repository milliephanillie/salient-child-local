<?php
# Database Configuration
define( 'DB_NAME', 'wp_thewellnessway' );
define( 'DB_USER', 'thewellnessway' );
define( 'DB_PASSWORD', 'e1EO1FvQ3VQJGK3eRbud' );
define( 'DB_HOST', '127.0.0.1:3306' );
define( 'DB_HOST_SLAVE', '127.0.0.1:3306' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', 'utf8_unicode_ci' );
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '|=k{hh#XW%k)qER9YGt1tK-iI1[|,VxL=n+qZw5J$#p~+uMiMU?4}#&c+6K;/y1B');
define('SECURE_AUTH_KEY',  ' v6+fWN>Nv_~hp<uGU.,eXK$ S(T_5yp+J!Brr>b+g{yCK<++2ido?nw--+S#<e5');
define('LOGGED_IN_KEY',    'yD=eU-^9okm9|*M!g?Rd]5^-noJD6X1d||3;.2zQ_G@.YZW%%gm}7LZsE#&eR1K/');
define('NONCE_KEY',        'MS<nwAO+ipuZG(rrP-:@eRM7reXz5l|? WV4CGG>*m1~cc Sa{2p^VaIO>ZF-P5{');
define('AUTH_SALT',        'qbN.(d/Lcc?l%NtfI~;i#+;s59APb|]verA v1-uNv.%zwbw|QUIuP!TM>vv(@9h');
define('SECURE_AUTH_SALT', '$^=E H>1_;#{:781k9_FVG)dD}j(pS-D>cj$<kU^+Bv]+qBh*{r;I%G6=|ra;u*V');
define('LOGGED_IN_SALT',   's]!G4nhG[|%u?OO}:0&@EN,|e@AMX<;l[7:I$R[D=&Sbl:)BvX|p;G;vJ[#1z2~N');
define('NONCE_SALT',       'K(,~1=]L7Px5%8`RIJOml*+vh|O.A*Xw>-dCJ?+QG{5jqD1WlbQm9VZA%!UK}_ae');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'thewellnessway' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'WPE_APIKEY', '0b1c57bb2b2f8fa491c71d67cfce4b549d1fc023' );

define( 'WPE_CLUSTER_ID', '100937' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_SFTP_ENDPOINT', '' );

define( 'WPE_LBMASTER_IP', '' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'thewellnessway.wpengine.com', 1 => 'thewellnessway.wpenginepowered.com', );

$wpe_varnish_servers=array ( 0 => 'pod-100937', );

$wpe_special_ips=array ( 0 => '104.198.109.247', );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings





# That's It. Pencils down
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');



