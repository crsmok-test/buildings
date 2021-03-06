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
define( 'DB_NAME', "buildings" );

/** MySQL database username */
define( 'DB_USER', "root" );

/** MySQL database password */
define( 'DB_PASSWORD', "" );

/** MySQL hostname */
define( 'DB_HOST', "localhost" );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'Dwm,iE]{p6iG1tppO{l,1+Qcf-TLbh^o$?SFgDJs+8kwC~o,1tEJz[I75PRGGD!~' );
define( 'SECURE_AUTH_KEY',   '^Y/yDU2J/qNSjy<K+CTz*B5Q/Q] ``#Z.Z-@T]lE&;qP>,xV)qvg.FpYEt!t8%bc' );
define( 'LOGGED_IN_KEY',     'X<3Qj=:[{O^[PvxkxHk!EPpZ7L?~7,Vw4k=w^Y}.nyzhz)#~:Yp-A$.|,&>pV$)!' );
define( 'NONCE_KEY',         '}>KPzp/Nm-PQ;cMwp=3h}N^zVX>W@*Z?=l%q*bCJ]b,qW1_M1_>q%X(-@1z>pNen' );
define( 'AUTH_SALT',         '#dxONy>e-H)uG)teO<b=AQ-sb);QN!-pM]FLc29{33N1,3zVbD!!NV{&>3BP(@=T' );
define( 'SECURE_AUTH_SALT',  '~knA*[eA($gmzMbfLNGJQwJ,<aJhsLQeR#dD]^ qIo9oxmf[GP]7+ ]wD/x!?+s-' );
define( 'LOGGED_IN_SALT',    'CB2dW{w83Zp7]%T+QHJ_3_)T}d1/)~K)t4je<%%lQvV_GQ/W^J?X3c!opR<)|lh,' );
define( 'NONCE_SALT',        'LsILKS7E*Cuzn|i8a3c:9t#J%&W(?aJl%IcK<`2-|0G7./SjZd0WV]U1{R&gkLhM' );
define( 'WP_CACHE_KEY_SALT', 'MGWEpG-Zgv,?1E#F*Oo|[dO#JILJ/KBRjR$D+ }Jn[iJIt0adoId}bwk/VywT.pq' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
