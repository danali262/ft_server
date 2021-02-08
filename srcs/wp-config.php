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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password' );

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
define('AUTH_KEY',         'Luhb-=ci:-J|$+/RwXhhly%X%0/K)l]~+CapU88P**qCIqLeK~RQ.#PwvjqF Z!j');
define('SECURE_AUTH_KEY',  'KaO6#:KV>Laf;H{hxd+{s0)@)sx?L|gI6mcOmVQ/D1v6gA|~EGT{T=6D-l<`UZn1');
define('LOGGED_IN_KEY',    'B:EOul4zV+F$<Lg+1&SCjT-|0[7R+[DmxZJ6fiXDyU^`E+C%z~P]t=/.@bgT mfh');
define('NONCE_KEY',        'a{:;-*tY$e{K5oh&;CMYJY}34R}G-ck_b !Y7l(-MdsZAnX Q^?^?H~OT}EKJ.rD');
define('AUTH_SALT',        '-i:2-t/G@8+gJ`%g_Cl_vYR6R6p7B7/18oneV5)Yi7XLJ?q;a9j~@ftStdI+[Oi(');
define('SECURE_AUTH_SALT', 'y)vccq^=k{_& 17L?/K|W#rDV?^(uDbDAA2<-o+A|||i#pxg.pd1^bR bv]<N~8Y');
define('LOGGED_IN_SALT',   '|w@?<UaX3P:.}qUx6?xJ2cR18%6`Ye$@GK-rw<H(Xr|`6hooQ5gs[|s;AV||tZ&^');
define('NONCE_SALT',       'w!(e62,,IO=0Q^92+V2go}i$zNu#(+-vRb*aG2ZE`Uxvj7s1A8c~cPtEkiPizCd|');

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
        define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );