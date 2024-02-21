<?php


if(!isset($mysqli)){
    $mysqli = new mysqli("$dbserver","$dbuser","$dbpass","$dbname");

    if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
    }
    $mysqli -> set_charset("utf8");
}
if(!isset($adminweeks)){ $adminweeks = 'weeks'; }
?>