<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'u452418890_hra');

/** MySQL database username */
define('DB_USER', 'u452418890_root');

/** MySQL database password */
define('DB_PASSWORD', 'cricket');

/** MySQL hostname */
define('DB_HOST', 'mysql.1freehosting.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'AP Rk%~KPk-p.2.s7+IT/>{}10,?<%i.?a<3<>f]rha[uj|m-j1p*Y-CV[7@1qyR');
define('SECURE_AUTH_KEY',  ']%-,u63XzFK-WvbasXQa%%CKb5RZf(Gi8,Q|X#2}E*#! 0_oc]%a.qX||>>i51%=');
define('LOGGED_IN_KEY',    'S-VGVm6wYM=US4aM`Ei/dz)eYz,w}fjk H|n+G*6;^|_(SdB!KPuUKRs[F`gE0{_');
define('NONCE_KEY',        'Yu&&o3DD,)cSf(0Pf?U&#3Cs&>Ny!R&N$KeWLr4lI-OR}|EURII$woB0qeUmLM3y');
define('AUTH_SALT',        'I[d_XJ-mv25{XfT_|AZ=4~`D[T3[xZ~rbeb4~;9oF@q`9`#6<sw?zB@bk+Pz4M[5');
define('SECURE_AUTH_SALT', '2}=mg[xN+<rMSt:@&30ZXFI+-5tgx4-PY^NHtF)zM-f9Eq9&(UGHh~o0g|4r:HRE');
define('LOGGED_IN_SALT',   'j;z_||)CeNpL:|._KzEfp;!#lrMY2]nXwDo hd99^gahcAJ4lJ)G?zf(7yXwYd G');
define('NONCE_SALT',       'E]Wu26HV`KJI%7O+>~{*Fn@2AqznX|{o<h8|x8 elu~N]+Fz;Z*9dO; K-$,=HAH');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
define( 'WP_ALLOW_MULTISITE', true );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
