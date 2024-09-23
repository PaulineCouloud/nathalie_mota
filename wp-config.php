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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'Ie8- Cne8[4r*L&QrC[2tVcoHH^9Ia~`:SmS-i^Sjm.APHw-Pv7q2GAX90}5I.?M' );
define( 'SECURE_AUTH_KEY',   '!Qs$6cw>&u3uR,gI+}WWNsac]/g!EaD}LABN>4WWI-1V mXK*Q(1h2i=H9]J]Qb9' );
define( 'LOGGED_IN_KEY',     '4_eIizo9^;oH 8FXXtBy`QeMJBMXd$66g%;tt2g6rO,4oG13);ZO?K4,-T+N3o_h' );
define( 'NONCE_KEY',         '4^(jPFil,FqNp CytN(KEL$5`BTSp*hwG{sfq9q;A?MeXDej:kHXv}~71($V}J$+' );
define( 'AUTH_SALT',         'C!7Rq8)qL5=-rT6Lt&>-{=y&,LOXg5?)BhT/[?j8}mLlBh>mMo}3MOssGl3|GI8}' );
define( 'SECURE_AUTH_SALT',  '=SVO-BC!*_#b~j9n;BxGNTF%n^PV;7^8x^sWkVvXHw_fUE+x3#6ky@}0fT`.NKDs' );
define( 'LOGGED_IN_SALT',    'g>b{tm[SB6=$Ul|5[BWgorv<xveUQfxrrQdUk)$?Z=6|R}#MNAFiX{$Z{ {1E!M,' );
define( 'NONCE_SALT',        'vP&+YH- ZgUsEwo~WM)lGIkSmq5l){x~]2/!P0:?(j) OkFpG&xs{f3+QQJzWGpv' );
define( 'WP_CACHE_KEY_SALT', '>PLx6U/P;INPs<67aj:UQk@,.Zry0KRbTeRC*1R))rg&ckh^n^9b Gk|3MPx~`hj' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
