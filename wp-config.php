<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpparallel' );

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
define( 'AUTH_KEY',         'g9DTar{Gxd<V,vC!%%UjdXnjEt`Gds_(LWK@rd~y;NcC]F;mr]2T?CT38)Aw fwh' );
define( 'SECURE_AUTH_KEY',  '@K?I3gGct?;=*z%*>KEM+G~@=EJ6?&6H8xn2tGNqf6p+V(0mr3UVvF6c6P/*aYdO' );
define( 'LOGGED_IN_KEY',    'vy0M&*s=~Uzi)q@ v&r|%M3D#r7/|/`Vo_(4>M9GFL*-g#Xt_tt/Ft4>nf=@Qp7l' );
define( 'NONCE_KEY',        'QEe6#;uZ~UFXl&}BG,[Jfzo5g3@c~_/$%MM)4?ADdrr?~t<I/Dh#IC:C?6{]J`oy' );
define( 'AUTH_SALT',        ';k)$YXcZjU@IOA.@j25L+,f|@E!@@lOMuyl[}CM^hlhA2~R1;~uES&=8HYz@!M-P' );
define( 'SECURE_AUTH_SALT', '`Xb|s/E#BbGF8<=r)vw44?iJjz+4,Sj5bJ$6@;x}jS&SifK&#AlJ8Acivam-,6nR' );
define( 'LOGGED_IN_SALT',   'pN%[`KT0g@eIAQdU}KRN aLBZ#}>n}O=Use1y(cCd6+<S`{bjM|Ub&Ud8]>?6*q@' );
define( 'NONCE_SALT',       '>OC|!au/3^o,a1WS^Dvp^@@g2j:a v<#>5AghqY~N]o[jKd:vei2h93OyQ6hTfor' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
