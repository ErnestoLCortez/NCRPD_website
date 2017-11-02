<?php
if (isset($_SERVER["HTTP_X_FORWARDED_PROTO"]) && $_SERVER["HTTP_X_FORWARDED_PROTO"] == "https") $_SERVER["HTTPS"] = "on";
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
 
/** Site URL */
//define('WP_HOME', getenv('WP_HOME'));
//define('WP_SITEURL',getenv('WP_SITEURL'));
//echo getenv('WP_SITEURL');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'testncrpd');//getenv('DB_NAME'));
/** MySQL database username */
define('DB_USER', 'admin');//getenv('DB_USER'));
/** MySQL database password */
define('DB_PASSWORD', 'North1county2!');//getenv('DB_PASSWORD'));
/** MySQL hostname */
define('DB_HOST', 'testncrpd.cloyc13wouvz.us-east-2.rds.amazonaws.com');//getenv('DB_HOST'));
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');
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
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');
/*define('AUTH_KEY',         'm2%mJ+YUds99?~Nm|h-F(R0I%7+<+wZ-ydQDxZhcvbPs+HSP5z8q+LR+rx-Y8hom');
define('SECURE_AUTH_KEY',  'C1r0?kf|FyCy+GMo|l/V6Iy;X@SPn?qj8K1=<=Ms5s7ASBaH1X)S9FW19z|Skce2');
define('LOGGED_IN_KEY',    'bv>Yd.F_4n[LsAoE<o|GNc_^+I-i+C8[W=# +[7+3n]Q7Ny8+{YU:TC&DHygtX6u');
define('NONCE_KEY',        'iZ+%.OAxC_|o]&%7+V7Tb5WbslS~ef9|<:mCn+#]GOS8uYa<-4GH,P4ARrG+HbrK');
define('AUTH_SALT',        'L$55vo|AZN6CJmzN,:+;ZNqcAM{8;[Dq:TIHf%;s6c]CfO&RL:];^Et<&=`jw4 w');
define('SECURE_AUTH_SALT', '#M!3D;+Ux I_{4i~5a QJx.?|z9yHvvOu[;GOMg2uT<|OoXG`R!$I#VYa:qOxXiX');
define('LOGGED_IN_SALT',   't]EEI6/~&_}%|)ny%*=e<G&9V[ Ac3Z$x7JTSiCjf[;=@v*x||As==Aj^NsPdJ/c');
define('NONCE_SALT',       '%x;7+fw0TePA;UzE<<Q7)%ocoiq1[IO:7s )StT<S]V#Z4`2b{|b!!;fIjV:H^ >');*/
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
$_SERVER["HTTP_HOST"] = $_SERVER["SERVER_NAME"];
$_SERVER["HTTP_HOST"] = $_SERVER["SERVER_NAME"];
/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');