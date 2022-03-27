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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'aura-network_insights' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'q4wU%^Gx%inrCVjuJx@U$R$] .dh-48lN},k^y=PjQ9NIqz|d:uPw2j4PU)^mDdz' );
define( 'SECURE_AUTH_KEY',  '37wQl%}kL_55uXXaM2=kAJ~Xgm&s48BEhF8e2pAe8;BH79-O35{CnTs%H^b{b(l:' );
define( 'LOGGED_IN_KEY',    'S1wp}:% ]i9xP~?1+Wakc5ZRNurXX(L3Ul0/qgsqr2m2BW`za~5IlBhRSp8*|9SH' );
define( 'NONCE_KEY',        'c&>=V$h3n5e?P>V&n3[[cli};$TfuqpY{]OuO8=X9})[k}9,SV6}8H1#V;Gp!qc1' );
define( 'AUTH_SALT',        ';l}yuD9xd#q~kh.aG@SKNI BbWDQ,!l:rgI=wzx]O$w.pTaeCoYE!?N}YkqK+(;9' );
define( 'SECURE_AUTH_SALT', 'gX6zkYz.9;jGc!v9JB)JIKr|fJCG$HA;=)K=%dt$c&]1Sf4l>r&i] s@Nm>b)J71' );
define( 'LOGGED_IN_SALT',   'dp#+G4F[!( <T_$,|CO9$dG(un7~HR0.<Z!v$RExt9J8Z]_G8a5M[~F37C4W#-Cr' );
define( 'NONCE_SALT',       'SGmN]e.10R.U%nSxnfzL0WT6zQw(tM(DRP2uX:1JQm4CQSO@=){&[6>(N[3Giu9h' );

/**#@-*/
// Remove wp_cf7 auto add <p> tag
define( 'WPCF7_AUTOP', false );
// show response of cf7
define( 'WPCF7_LOAD_JS', false );

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'aura_';

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
