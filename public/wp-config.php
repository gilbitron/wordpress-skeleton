<?php

// ======================
// Hide errors by default
// ======================
@ini_set( 'display_errors', 0 );

// ===================================================
// Load database info and local development parameters
// ===================================================
if ( file_exists( dirname( __FILE__ ) . '/../production-config.php' ) ) {
    define( 'WP_LOCAL_DEV', false );
    include( dirname( __FILE__ ) . '/../production-config.php' );
} else {
    define( 'WP_LOCAL_DEV', true );
    include( dirname( __FILE__ ) . '/../local-config.php' );
}

// ==================
// Default DB Charset
// ==================
if ( ! defined( 'DB_CHARSET' ) ) {
    define( 'DB_CHARSET', 'utf8' );   
}

// ========================
// Custom Content Directory
// ========================
if ( ! defined( 'WP_CONTENT_DIR' ) ) {
    define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
}

// ==================
// Custom Content URL
// ==================
if ( ! defined( 'WP_CONTENT_URL' ) && ! empty( $_SERVER['HTTP_HOST'] ) ) {
    $protocol = ( ( ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] !== 'off' ) || ( isset( $_SERVER['SERVER_PORT'] ) && $_SERVER['SERVER_PORT'] == 443 ) ) ? 'https://' : 'http://';
    define( 'WP_CONTENT_URL', $protocol . $_SERVER['HTTP_HOST'] . '/wp-content' );
}

// ===========================
// Disable WP_DEBUG by default
// ===========================
if ( ! defined( 'WP_DEBUG' ) ) {
    define( 'WP_DEBUG', false );
}

// =========================
// Disable automatic updates
// =========================
if ( ! defined( 'AUTOMATIC_UPDATER_DISABLED' ) ) {
    define( 'AUTOMATIC_UPDATER_DISABLED', false );
}

// =======================
// Load WordPress Settings
// =======================
$table_prefix = 'wp_';

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
}
require_once( ABSPATH . 'wp-settings.php' );
