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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', "p2sdm_local");

/** MySQL database username */
define('DB_USER', "hksvuser");

/** MySQL database password */
define('DB_PASSWORD', "hksvserver");

/** MySQL hostname */
define('DB_HOST', "localhost");

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
define('AUTH_KEY',         '$jj}#}W:DK8s^!3nrS80*m be-}}as>Dzxxsy?keX@&|k+h#_xYTHu3}3-YN!(*5');
define('SECURE_AUTH_KEY',  'uSvpg,_{[zb~.2n>S,a>A@+ uO,Q$dua>;!5sr9>=WsB[s]wJ1RKi})Oi)mw!I*M');
define('LOGGED_IN_KEY',    'R-eW=T=*pfB4qV3K<8*5i,vH`*(<u<wB`U9NuAId8gE[xXP~)u!_$HLgpqjJjIqi');
define('NONCE_KEY',        '{9r;hlcr*aU0S?<9@0g_{_aAP)DP9vn0hA:mijJ 2kP8)y]hk-WD2b ;J;Pu(F6d');
define('AUTH_SALT',        '0{9Lnd9A,}I88LH<mRxrQAb>)lS/b/>-!elK~>Nydfzz/f6j^r~;y`l--2hr [:{');
define('SECURE_AUTH_SALT', 'N~DUv;*{Ra,5 =syEk5PzON?2GU2ML[@Jn`5E3jQO{{tcQ@eJQ:Z;.>_iC9[PDzV');
define('LOGGED_IN_SALT',   'dBv TEF^[O!^ca}hxtJL49<Lz?c=/7!]LBiI^EuL(mkUB3bzzJ7S;j Yp,0Kg&2V');
define('NONCE_SALT',       's|q6+jh3_I^~s#N2a=H}#OH%Z.~RXpe<w?Q](/zK*_$k6K2aaMm+25D%7,24RZt~');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);
define('FS_METHOD', 'direct');
/* define('WP_HOME','http://p2sdm.ipb.ac.id');
define('WP_SITEURL','http://p2sdm.ipb.ac.id'); */
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WsordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

if ($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') $_SERVER['HTTPS']='on';

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/** FORCE SSL ON WORDPRESS */
define( 'FORCE_SSL_ADMIN', true ); 


