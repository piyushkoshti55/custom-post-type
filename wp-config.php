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
define( 'DB_NAME', 'wppb' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'aZP(3=n$aFt;X6{YXRHpbpK+q:,qa[58i$I@joHZKj,+$P;J z QMhv_smHMo`U.' );
define( 'SECURE_AUTH_KEY',  'k#Mq1vK528dn<.>jJL`2_CIe=7P3{29-KwtPDjeEr_c|Z)j;^J69cs%1?m0EWfI`' );
define( 'LOGGED_IN_KEY',    'c*r7OpZ<)ua1KP?C*VxUygyI_|(7.n1c=JO)~s,>ioprhQZs)@:Ap;0Gi<n]W/zp' );
define( 'NONCE_KEY',        'kr@*?:#V&!#7eamb]k3CA(:Dp/H`O~=8pcJ9 )N)~+zr+8Z?;RtiF?inx(eK3i/>' );
define( 'AUTH_SALT',        '#C&$KZR@;sbxmdT2E4g1i.;K$&$5h:o6X%QHc!-a;~E/p@G;R)PhOWf{|M2z!Cb}' );
define( 'SECURE_AUTH_SALT', '!7FrAJ74CXa IQ>Nw|tGK2.j?,K}bZL!fC ]%F{`y_9-R1m*[phv6of4<4,r?9G7' );
define( 'LOGGED_IN_SALT',   '@:>_y&/Pv5s<rW]m<97W2D&yg+hN&!7*<U,&*eM_RQy3WX}3PPne<aQKFbl(9|9<' );
define( 'NONCE_SALT',       'QJH@DC?sB1R8J?x<3OOP`*#jrFpL+H mRvaqylHU?0&mUsb?5MF/HA3Rpx@1M6gi' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wppb_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
