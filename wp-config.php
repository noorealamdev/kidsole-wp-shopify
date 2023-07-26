<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'kidsole' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'lJ>/IPBFHb0*0el]!tD7oF?#s!I{uPZ.0FZzyX Pg2K{2-VL+]G$=w+UD/._y+q-' );
define( 'SECURE_AUTH_KEY',  'N_-XS}c/jWSh$ k;uxTl0Q+1DVhJ*j &gD8yM+]KQp7_0[3W ~hfgnOR_Z?c_VAi' );
define( 'LOGGED_IN_KEY',    'd^~we|+Cw]([_-!%bKZm%9e@=uy3Og6:7aE#I%>U]cWTI5PS{XZ8-C>J iIJl>=z' );
define( 'NONCE_KEY',        '/ &Tu/kW87sb0,(>i1fVcUTcJ2&P]}$^F$[B<*WrITtS5wM^B2)A+kqXuGO_C|OO' );
define( 'AUTH_SALT',        'k[;]O{RmI_UzysiO|e2]~ww7[E-&|MS|g/o#!MiCZjIDxz}7ne-3dIi7qo^t#GH?' );
define( 'SECURE_AUTH_SALT', '3/j:_P/dhe3;/_HWec~mT4.iT-o`#w]pwF6P.QI>>9Z-?GZzw_P*{y!Ofc|]5N5C' );
define( 'LOGGED_IN_SALT',   ',1.g{W{Ki{Tr$=@M{]3YWGt>W.t$7hTopZ}q6?/@dY5R~HB(&1#Z<p!&J,J#?N5Z' );
define( 'NONCE_SALT',       '2xWC{-Z%v ~_>mXG9XFzFM2iwrOKSwf,A@h`lQcu[RC-M|DPtVZ~y:IPI|.yoJ. ' );

/**#@-*/

/**
 * WordPress database table prefix.
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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
