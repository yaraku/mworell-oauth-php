<?php

namespace OAuth1\store\mysql;

/**
 * Installs all tables in the mysql.sql file, using the default mysql connection
 */

/* Change and uncomment this when you need to: */

/*
mysql_connect('localhost', 'root');
if (mysql_errno())
{
	die(' Error '.mysql_errno().': '.mysql_error());
}
mysql_select_db('test');
*/

$sql = file_get_contents(__DIR__ . '/mysql.sql');
$ps = explode('#--SPLIT--', $sql);

foreach ($ps as $p) {
    $p = preg_replace('/^\s*#.*$/m', '', $p);

    mysqli_query($p);
    if (mysqli_errno()) {
        die(' Error ' . mysqli_errno() . ': ' . mysqli_error());
    }
}


