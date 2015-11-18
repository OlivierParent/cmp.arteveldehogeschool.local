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

define('AUTH_KEY',         ' R5|N8/U}V8mx72&C4<V/;tQ)Fgd#A]k8FjSX!m]gp%0z?=dg:vlh{2v=5A=Z)=n');
define('SECURE_AUTH_KEY',  'P<*7+#{@+qP=AtS/a-F^y>4 K9Mo1Z;$tU917GuP^oJbl4G.X!iy+CKXTtp`mZ;P');
define('LOGGED_IN_KEY',    '$j,L}=b:X5 o66UGe:_;oq0*Gg)7<eg. <Jimz*;}ycsU2s=qa{P$8FHV0FFebT]');
define('NONCE_KEY',        ';GKg<*59h4sB&T`R6B9,mwEV|`]9w+|sGzT9GFVPO+3|]+JJ|shb)*|`}(LwRwwP');
define('AUTH_SALT',        'N3~ZDqBry-*q43xUb|Q{qCI+b@]w^Fa;V$YCQqM_4B- aq!jXm=8|1=)fiiv59}%');
define('SECURE_AUTH_SALT', '}5<FfR=~gY8<A4Du1-4bT)y!< Kei3l_gK*Y#kIoUcbYePl8}2-eZTzx(x{,D0,o');
define('LOGGED_IN_SALT',   'Exs+Z%0b}nmzD4ZQp*&?.F-gdW~pJ}2Rj$~07aiDooH2pGU]o:{XmG(COx3{o|b/');
define('NONCE_SALT',       'Ou `0Z1CHXR9H]2,)jtF_MIv@?+5flN4cRf+sy%2PpljnFTLqr-1N_{ha[G%M1Hh');


$table_prefix = 'wp_';





/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
