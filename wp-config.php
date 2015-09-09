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
define('DB_NAME', 'moneymoves_pages');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '[!]zT^-eLu|Za2MXSba0%nLA&lS{n^RPAm+2ZD0YLFxL*<ZY`/^twf]KvtVg9@1P');
define('SECURE_AUTH_KEY',  'Tic8v-j,?<[lLcJx%%fXq(dDqE:fy/ 3GB6kUw+aU9im}*||@dH{zU:2@AC6]dSi');
define('LOGGED_IN_KEY',    'zt(f;d+#g_}p0b.oCT7_i`9(l)p]3[-:J]#G/Z]9|60zKp>tW{+]e,{=*d&g/e_M');
define('NONCE_KEY',        '1Fn#]j.B9J>HM%lN5zLgjZ)A)oJ`>{GmlS@@%[kv-VwXo_jEFhKS68)=Qk-88~4S');
define('AUTH_SALT',        '/N,[9~q-M?-x$=$lCRc@(tojEWz}#1r,AGDBsfTr%*|90IUNY BXPjO yZU `&p*');
define('SECURE_AUTH_SALT', '?B]V4,PBqnq7AzjpZdk-Q?,C~&?2<d/GI+P|M4,?IcE,J[u0<bErstPb/ZUd1!v(');
define('LOGGED_IN_SALT',   'o2Md9!nnShq?47.|9H--T=B 5o#K6?gX*(lhq_Fh&:Z^Mdf$b4N+%vN|;]w/z:cy');
define('NONCE_SALT',       'Y/xNqhzP!|Eot-ifDs~czbFk|fk?Xp)|EMvXYj]zW_R_|dv~!Z6`q[n!MZnS<`rC');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('SCRIPT_DEBUG', true);