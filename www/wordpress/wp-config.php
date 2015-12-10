<?php


// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cmp_arteveldehogeschool_be');

/** MySQL database username */
define('DB_USER', 'cmp_db_user');

/** MySQL database password */
define('DB_PASSWORD', 'cmp_db_password');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         'RPnJ.C7[{0u&?V{OU<]r#b(9Y|85]LoNrQ~.Yh$G[02WKMr0iP~m4)B[|/3jn;eR');
define('SECURE_AUTH_KEY',  'MOp,<-iZH~SD.~+/tkVrM<!-|rRq{TN+~IP768]OcR^:VLzwP{x#Xmm%W~kjZ&BQ');
define('LOGGED_IN_KEY',    'l6]#nd+o@lLA/]-u_|/^S{ME/:ByKJAq|l+{#`Okm&3?5d2;av_ozW1HUkI&w$7F');
define('NONCE_KEY',        '^<q)rQ(7^)ZTuB.g@ZwtDh+wm=>;3.s|+|{E9@R}0lsG$>I4)!/0/fY$x0DyNp_1');
define('AUTH_SALT',        ')J@#fxGp/>jFpH*oZC`ao<7YCAY8(A+B7cG`TJ|I45jSrI|SC6!$!E$zE9D-bsRa');
define('SECURE_AUTH_SALT', 'eY_4O/zsSb:i`u|Vzv+%`^0O+2>EO|f2o%B{;0XtDK`p{>3_df6u|nd*91-96_&;');
define('LOGGED_IN_SALT',   'UBw5Fb$t6Z5>N<b)yy h|l2 `I-|V&}Mlhce$sK6?rAL$PC%-.rof^o}U-dXSq15');
define('NONCE_SALT',       '*%wkNO:9I}0e:c!9v5s,#?L^(mWA!?Wci~X0K-A*48ut;Sk+Ij`^)U!.(c=:N$`X');


$table_prefix = 'wp_';





/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
