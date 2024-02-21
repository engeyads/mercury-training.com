
<?php
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
    include ('includes/general.php');
    include ('includes/config.php');
    include ('includes/routing.php');
    // include('pages/home.php');
?>
<?php include ($thePage); ?>