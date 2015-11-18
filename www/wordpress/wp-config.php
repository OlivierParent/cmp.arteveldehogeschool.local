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

define('AUTH_KEY',         'wP.8+Xlr6;6VV.$WPQ<0d4o8h cv|ZW7c3Jq8e(aOC;/kaP }M-ga82^M|#f84oT');
define('SECURE_AUTH_KEY',  'va2I8f(1r)0g-@imcG+*UM;TSy{tz.-M#rP_fx/t9G6#Ft~O9Xq  <d<9hLpNTUU');
define('LOGGED_IN_KEY',    '~h/Cm*Y4:a~Su?YR}b>CKhY.q+vN,-(xaSLnmaP=7VmZXV6iBh0K>UB?9e%r9|8g');
define('NONCE_KEY',        '(oIK5K%ox.Ux]G }P+r4/}[pTj2H)x?F~w?M3djiU:p!q:QSsbi:=d+p|?kHh<,Y');
define('AUTH_SALT',        '#|-9v%M;|9]%I<6T;mDPIrZbMA+mz[IMWsrAV5?6J Jx~n2=aSSE13*dv7_Fz-%1');
define('SECURE_AUTH_SALT', 'F*0+-+V]2@W#fG~2bHI0]U5i;E}`-eFK2DAoE*1K 35]h6:y[]:}=,|VJ`vLx(7k');
define('LOGGED_IN_SALT',   'Kyi|esg<jK%(ePnK^q{CY/}AAKecHaS*aS7|)6-rnGHkBKXhh-*9t#=A@-wn-`uo');
define('NONCE_SALT',       '-lE=uWAZ;QP1|g=Kx8Z8Ma{`{e:mkO#Wv*N|Z[}NTSh|8yti`!]>N ~[1s{<0.W>');


$table_prefix = 'wp_';





/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
