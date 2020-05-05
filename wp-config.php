<?php
# Database Configuration
define( 'DB_NAME', 'wp_rebranded' );
define( 'DB_USER', 'rebranded' );
define( 'DB_PASSWORD', 'Fm6D0PPvYqEw2H3oqM4U' );
define( 'DB_HOST', 'cr1rbe046e00rwk.cqdjm3y3tgzs.us-east-1.rds.amazonaws.com' );
define( 'DB_HOST_SLAVE', 'cr1rbe046e00rwk.cqdjm3y3tgzs.us-east-1.rds.amazonaws.com' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wst_';
# Security Salts, Keys, Etc
define('AUTH_KEY',         'v<0p*x1A+z@lYzb<D/1X(GE_-CFV0]+PRihAMm-8lphWm%V`QTR{AP!z_u#*R}_R');
define('SECURE_AUTH_KEY',  '-N~+mwu^yetGq-(,f|z] =s%m5YRdR~`|JI&F?+2|]0YU7mf1kpdZf>eM+@&[6r3');
define('LOGGED_IN_KEY',    'yI~PES<|:CTjIU>3<&q:K8+z-i,@sW+0`bI)7`nouB.7No|]#Xm`tk}8i]T{;$R4');
define('NONCE_KEY',        'swFN1AE&y7BY`!(|v%1MO=Z[c`E+3LP$bwu>b?M?FSx;3yKJ6?P :#Cbr3BEDX*:');
define('AUTH_SALT',        'bMR6K3YyxrTw+^#|_|WejJ:]+dX<|v-6 Cr9bYEj00|*rKABUNkIMCKowG H$bCt');
define('SECURE_AUTH_SALT', ')C/|dY6o))kEP:%4ryu[r9d1_hDdrqm/d< !YH.9f/Tz%+xqpr__g1tnc,.*.]|r');
define('LOGGED_IN_SALT',   'w@5SRqR+-A+*g~pac;J|&/^ir79x- 8M%k|X@5xHx,heiI2p]7JV@:h+7bBh(T a');
define('NONCE_SALT',       'kHd]L3gk[Z&+No!Z{/[ynZN@ME.TI$mcoR+@dQ=Mv5nJ6Au@UgBHWFc}i0I[voa$');
# Localized Language Stuff
define( 'WP_AUTO_UPDATE_CORE', false );
define( 'PWP_NAME', 'rebranded' );
define( 'FS_METHOD', 'direct' );
define( 'FS_CHMOD_DIR', 0775 );
define( 'FS_CHMOD_FILE', 0664 );
define( 'PWP_ROOT_DIR', '/nas/wp' );
define( 'WPE_APIKEY', 'f17e008f9115a7b6e997345dd2abfb1e1f10a43c' );
define( 'WPE_FOOTER_HTML', "" );
define( 'WPE_CLUSTER_ID', '96262' );
define( 'WPE_CLUSTER_TYPE', 'utility' );
define( 'WPE_ISP', false );
define( 'WPE_BPOD', false );
define( 'WPE_RO_FILESYSTEM', false );
define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );
define( 'WPE_SFTP_PORT', 22 );
define( 'WPE_LBMASTER_IP', '' );
define( 'WPE_CDN_DISABLE_ALLOWED', false );
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
umask(0002);
$wpe_cdn_uris=array ( );
$wpe_no_cdn_uris=array ( );
$wpe_content_regexs=array ( );
$wpe_all_domains=array ( 0 => 'rebranded.wpengine.com', );
$wpe_varnish_servers=array ( 0 => 'varnish-96262.wpestorage.net', );
$wpe_special_ips=array ( 0 => '3.216.94.107', 1 => '34.232.64.202', 2 => '100.24.115.83', 3 => '3.227.246.155', 4 => 'varnish-96262.wpestorage.net', 5 => '10.1.16.21', 6 => '3.216.132.137', );
$wpe_ec_servers=array ( );
$wpe_largefs=array ( );
$wpe_netdna_domains=array ( 0 =>  array ( 'match' => 'rebranded.wpengine.com', 'secure' => false, 'dns_check' => '0', 'zone' => '12v8m613k5ob34rovu1kfh1e', ), );
$wpe_netdna_domains_secure=array ( );
$wpe_netdna_push_domains=array ( );
$wpe_domain_mappings=array ( );
$memcached_servers=array ( );
define( 'WP_CACHE', TRUE );
//define( 'WP_SITEURL', 'http://www.next-insurance.com' );
//define( 'WP_HOME', 'http://www.next-insurance.com' );
# WP Engine ID
# WP Engine Settings
define('WP_DEBUG', false);
# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');



















