<?php

$host = 'localhost';
$db = 'auth';
$user = 'root';
$pass = '';
$port = 3306;

try {
    $mysqli = new mysqli($host, $user, $pass, $db, $port);
 
} catch (mysqli_sql_exception $e) {
    echo $e->getMessage();
}
