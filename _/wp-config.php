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
define( 'DB_NAME', 'wp_samtravel' );

/** Database username */
define( 'DB_USER', 'wp_samtravel' );

/** Database password */
define( 'DB_PASSWORD', '_lQS!E4T484wm&kj' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

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
define('AUTH_KEY', '&!7Tr9EG|_0Z[9S3!6Oj~35]LOh()D3S1UlE49/lFoMUUd6h8[[rD(ld%16MUjq2');
define('SECURE_AUTH_KEY', '7g)4%UW(L(arJwGbKm@Gx122tnkA!#99q@K7WaHVC/4JE*KAxYi6UNJL_Dd02B0Q');
define('LOGGED_IN_KEY', '-~+HE+qLgs*;z[)43cYJb13*I[73X1Z-EPFEi6onmlrhJ@&lFH9m)%V];Xi]xC*|');
define('NONCE_KEY', '&37M80n:U/[&a~93V)#2j9[uBxJ~13~7g6]p2*abBFD@8~n068*a(oMQB9q7I4:7');
define('AUTH_SALT', 'S5B7xr6z5!A;W7[~bJLjp)xyK~7DoD5N*Nc657;F8%b6E&y9I[b*9S3qEr&hnzF/');
define('SECURE_AUTH_SALT', '/l4r@V)|#fz13NB2(0pe9M]Oqu2yq~Q59@seNKdi3YNEMw0ihg_4WNZrmIB)tic[');
define('LOGGED_IN_SALT', 'l/35s47O8DggChz@0])qU5iDYgiyhPg07L5lr9fQhVDy01@e+Jsw7UM31R*Q&j7;');
define('NONCE_SALT', 'o0E+|+ctbQS4-WQO@16P6#P_ML9@vqOrJ%3*d~5:eWetMOinYCQxmNB*NBiFh;dI');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'sam_';


/* Add any custom values between this line and the "stop editing" line. */

define('WP_ALLOW_MULTISITE', true);
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
