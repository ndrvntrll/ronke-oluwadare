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
define( 'DB_NAME', 'ronke-oluwadare' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'FKY5W>iafqi  ]CjggTU#dZQq^c+}<BZiK*Lac $0@<!R5Mw`sZhKd`,{F?T?675' );
define( 'SECURE_AUTH_KEY',  '4*f.F2gKdq2W5-d PKGy?(hxbaxd?@GUE.&meVK#s41!L*eGN7W[ed-NZdF0`:BG' );
define( 'LOGGED_IN_KEY',    'iT=f`laJcwGhFMG/P~#.6SJNaQW92m2m&>,YU1 ~K[zP=pxAHP7hj0xs))cEf8eb' );
define( 'NONCE_KEY',        'L?IiM-pE@sv%#|GQJ(E1VxW@n0!m`i-cW1QKYDD:lN9NE=LH{Id;$ES`0-z:Ie1v' );
define( 'AUTH_SALT',        'n2wp8PZ9qfTHc^gMy],6qVTue:|t0]daEfT*n,V;42@j:6Om|_/HYk!>W;RL3.{k' );
define( 'SECURE_AUTH_SALT', 'ykFGEN?UICI./#5-ovgzf5{f)qy)YEpFo[*wSN*Y17..Woi +UO@d*fDr6l*I3N6' );
define( 'LOGGED_IN_SALT',   'Labli@]y|2)vUy8R}9iAw7$;_=,9So/8YZ;c_0v$Q*x{}c!km/Dvl_FH1:Ds>@*X' );
define( 'NONCE_SALT',       'OZV<!~v7;/$xZQvW0A;d8 r4t[k|%y9zcD@J./q{QOE`}Vt#2PO,,djrGOC]8>xE' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
