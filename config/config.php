<?php

define('PG_HOST', '127.0.0.1');
define('PG_PORT', 5432);
define('PG_DBNAME', 'sklep');
define('PG_USER', 'postgres');
define('PG_PASS', '');

$dbm = pg_connect("host=" . PG_HOST . " port=" . PG_PORT . " dbname=" . PG_DBNAME . " user=" . PG_USER . " password=" . PG_PASS);

// Base-2 logarithm of the iteration count used for password stretching
$hash_cost_log2 = 8;
// Do we require the hashes to be portable to older systems (less secure)?
$hash_portable = FALSE;