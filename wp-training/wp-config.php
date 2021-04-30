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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp-training' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'JAF*ZE_Sg483g~/}q4~9:Z50=vPXnH$kzKZN=XcRBhiR=8N]bxc,}A+|Q?[yp* (' );
define( 'SECURE_AUTH_KEY',  '?=9V0s:w|kNm@Vs~]a~sTx`[`Hl}-{(:C?d;!_/DCj9).wA$dqR+7FaMVt}F@jwt' );
define( 'LOGGED_IN_KEY',    '4*3Y-XMp5#HLT~1P{<&mqkkT8JPW)o;(@_?73wfgB+ v1SsjonxVxEo;lbNFq@?7' );
define( 'NONCE_KEY',        '[oTcP2]>KaCP3:BDF$~XhG2d,G4f`F?MHa^/f=|yoh9loK5)bz(w23,AAWXf`em@' );
define( 'AUTH_SALT',        'd3k0^_A5;^QO/!l1K)^[$Q3RV$5HiQ%pPzKt64^Fh.A@~s>YS?d5]~T5]@a&;!rC' );
define( 'SECURE_AUTH_SALT', 't ju9V ZSYE*1bHQ0P7%x@]CLlls*n,!3.wFHJ(lQp$@qOwN?|Du3?>gOn<%(Gcz' );
define( 'LOGGED_IN_SALT',   '`LtxSUlWo@{(hvrFaFihM-WSH1`l%L.n+Od;syY6JbkeGYeE}3b]qJbbdD_L4mWL' );
define( 'NONCE_SALT',       'q,G-=Bb90sYf2k-#.OBB^SYJxm>Tlv_QLw$KLH-bEFd 9p}DG69E3_by0b(}}IV.' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
