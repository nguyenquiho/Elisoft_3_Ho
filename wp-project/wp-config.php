<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp-project' );

/** MySQL database username */
define( 'DB_USER', 'honq' );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'QZ33B$^9r=sDs>r!W8KFi#wT};amBZ|C~~Otk)zJ>busbtlUKg4PPf8!~<,sPb8F' );
define( 'SECURE_AUTH_KEY',  'NR`)O_G<*Ln>ULl5>BQm(k6(1<PF4Xk`cG*7NlwH(Hw)l8Zug/1y+{tN/Bfk)zEy' );
define( 'LOGGED_IN_KEY',    'nR;S!Gs#d(YVDyKRba`3_(#HeOlG W,|G~~M[.SZ`S;qU:0&GYSzdEksRbq6qt5e' );
define( 'NONCE_KEY',        '.:5_Wn@1(%ZPE;a>B*$ibqoZB-~Ym_2x{FhbBRI?f(ESrR-^jHaY}q5^Wzk9b<ab' );
define( 'AUTH_SALT',        '9dmk)b~~$JUb*3S(VRxGFq2:*el6F5t%r@*B#!5bjKoOZ^ joqND]b< */[IM5|0' );
define( 'SECURE_AUTH_SALT', 'e}BYCVrMv-s)Y-G20)Vx+WxdI4hp?TUsKruPy9lunD`g4Gjhqpix2WwtV%?/cu@[' );
define( 'LOGGED_IN_SALT',   'E%g~)c.kZABxyq=4Kp@z`:]c sG nE4VlRLbL{wCm/xSR81y?t>02dyuzEi`D||g' );
define( 'NONCE_SALT',       'IOqh^3f|TgY ,>4)**Ba~@I&fddM,Syr:.x<,!V Z7E:A_-b~BO#cvdv9g?yyHId' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */

ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define( 'WP_DEBUG', false );
define('WP_DEBUG_DISPLAY', false);
// define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

