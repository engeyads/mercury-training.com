<?php

$dbserver="kh45730-001.dbaas.ovh.net:35784";
$dbuser="eurobooking";
$dbpass='Goo00euro15Rt';
$dbname="eurobookingcloud";
$config_corrector = 2;


//mysql_connect($dbserver,$dbuser,$dbpass);
$conn = mysqli_connect($dbserver, $dbuser, $dbpass);

mysqli_select_db($conn, $dbname);
mysqli_query($conn, "SET NAMES 'utf8'");
//echo mysql_errno();
$site_dir = '';
$site_url= 'https://mercury-training.com/cer/';
$site_url_ar= 'mercury-training.com/cer/';
$request = str_replace("$site_dir",'',urldecode($_SERVER['REQUEST_URI']));
$request = str_replace("print/",'',$request);
$request = str_replace("outlinsfrombooking/",'',$request);
$query_string_get = '?'.urldecode($_SERVER['QUERY_STRING']);
$request = str_replace("$query_string_get",'',$request);
$parts = explode ( "/", $request );
if(isset($parts[0+$config_corrector])){
    $page = $parts[0+$config_corrector];
}else{
    $page = '';
}
if(isset($parts[1+$config_corrector])){
    $id = $parts[1+$config_corrector];
}else{
    $id = '';
}
if(isset($parts[2+$config_corrector])){
    $PIN = $parts[2+$config_corrector];
}else{
    $PIN = '000';
}
$Suffix = 'MER10';
$center_color = '#13336d';
?>