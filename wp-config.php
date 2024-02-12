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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mindset' );

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
define('AUTH_KEY',         '<J|/53nz-D}(Li]iO`ka]|=9p5$.&-^={XRDqz-nI+jB}R:h78mHL1=6*R?dV+>@');
define('SECURE_AUTH_KEY',  'i( nVb6:3qFd=nR) -->Ai 5Uy5l^:0+`?5y-]2f!i+SXAjku +#2!Hd_^NZ(+c-');
define('LOGGED_IN_KEY',    'Xa*zD o@d*=[Y(DHmn`5}~C9a3JxZS|QOuE[Ce[!YH)7@>|T`{+x@e`*i[ETRRx.');
define('NONCE_KEY',        '!KHQq;J]s2wvI~6=R_]jE=X] D#)|lNbL,piPPS<Y}-t5Cf7=~C[dk>oZb}.?:~H');
define('AUTH_SALT',        '^C%kt- PQ=Ns];HfIjtHF6hg@,4vABpk&j&`&X[}2&,|tHiq*W)4--d?g9(j_x%|');
define('SECURE_AUTH_SALT', 'e8nMr5QJax<||eP*oIqN<?5JX`hZLUdimbhg;>f+-T`K_azuYR>9,O/OvOFTBp2R');
define('LOGGED_IN_SALT',   '+x-JXH{=xNOV4?e5Xs~.v$ioM8wjk)+%LCi@`=Z?/0I@*+wg4zdTb@=-*$sC2=gD');
define('NONCE_SALT',       '{--K^,Z*V~,+-/3XSkqGQR8`e+a0)tzmO?k$z..)UcdG`0rdr/SL-|EsWG*> 1g ');

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
