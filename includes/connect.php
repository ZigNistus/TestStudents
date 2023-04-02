<?php
$host     = 'localhost';
$db       = 'for_test_site';
$user     = 'root';
$password = '';
$port     = 3306;
$charset  = 'utf8mb4';


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$db = new mysqli($host, $user, $password, $db, $port);
$db->set_charset($charset);
$db->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
