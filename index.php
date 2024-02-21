<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'mercury-training.test'){
$starttime = microtime(true); // Top of page
}
include ('includes/general.php');
include ('includes/config.php');
include ('includes/routing.php');
// include('pages/home.php');
include ('includes/GACookie.php');
// if($thePage == 'pages/home.php'){   
// $aux = new GA_Parse($_COOKIE);
// $cookie_value = $aux;
// setcookie($ga_cookie_name, serialize($cookie_value));
// $ga_coookie_data = unserialize($_COOKIE[$ga_cookie_name]);
// // var_dump($ga_coookie_data);
// }
?>
<?php include ($thePage); 
if($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'mercury-training.test'){
$endtime = microtime(true); // Bottom of page
printf("Page loaded in %f seconds", $endtime - $starttime );
}
?>