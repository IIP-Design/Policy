<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

/** autoload files **/
require_once(__DIR__ . '/vendor/autoload.php');

// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('POLICY_DB_NAME'));

/** MySQL database username */
define('DB_USER', getenv('POLICY_DB_USER'));

/** MySQL database password */
define('DB_PASSWORD', getenv('POLICY_DB_PASSWORD'));

/** MySQL hostname */
define('DB_HOST', getenv('POLICY_DB_HOST'));

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         getenv('POLICY_AUTH_KEY'));
define('SECURE_AUTH_KEY',  getenv('POLICY_SECURITY_AUTH_KEY'));
define('LOGGED_IN_KEY',    getenv('POLICY_LOGGED_IN_KEY'));
define('NONCE_KEY',        getenv('POLICY_NONCE_KEY'));
define('AUTH_SALT',        getenv('POLICY_AUTH_SALT'));
define('SECURE_AUTH_SALT', getenv('POLICY_SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT',   getenv('POLICY_LOGGED_IN_SALT'));
define('NONCE_SALT',       getenv('POLICY_NONCE_SALT'));

/** AWS S3 Uploads directory **/
if ( isset( $_SERVER['POLICY_S3_UPLOADS_BUCKET'] ) ) {
  define('S3_UPLOADS_BUCKET', getenv('POLICY_S3_UPLOADS_BUCKET'));
}
if ( isset( $_SERVER['POLICY_S3_UPLOADS_BUCKET_URL'] ) ) {
  define('S3_UPLOADS_BUCKET_URL', getenv('POLICY_S3_UPLOADS_BUCKET_URL'));
}
if ( isset( $_SERVER['POLICY_S3_UPLOADS_KEY'] ) ) {
  define('S3_UPLOADS_KEY', getenv('POLICY_S3_UPLOADS_KEY'));
}
if ( isset( $_SERVER['POLICY_S3_UPLOADS_SECRET'] ) ) {
  define('S3_UPLOADS_SECRET', getenv('POLICY_S3_UPLOADS_SECRET'));
}
if ( isset( $_SERVER['POLICY_S3_UPLOADS_REGION'] ) ) {
  define('S3_UPLOADS_REGION', getenv('POLICY_S3_UPLOADS_REGION'));
}

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

// Tells Wordpress to look for the wp-content directory in a non-standard location
define('WP_CONTENT_DIR', __DIR__ . '/wp-content');

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) and $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  define('WP_CONTENT_URL', 'https://' . $_SERVER['SERVER_NAME'] . '/wp-content');
  define('WP_SITEURL', 'https://' . $_SERVER['SERVER_NAME'] . '/');
  define('WP_HOME', 'https://' . $_SERVER['SERVER_NAME']);
      $_SERVER['HTTPS']='on';
} else {
  define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/wp-content');
  define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/');
  define('WP_HOME', 'http://' . $_SERVER['SERVER_NAME']);
}

/* That's all, stop editing! Happy publishing. */

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true);
define( 'MULTISITE', true);
define( 'SUBDOMAIN_INSTALL', true);
define( 'DOMAIN_CURRENT_SITE', getenv('POLICY_DOMAIN_CURRENT_SITE' ));
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

define( 'SUNRISE', 'on' ); // wordpress-mu-domain-mapping activation*/

define( 'WP_DEFAULT_THEME', 'corona' );

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
