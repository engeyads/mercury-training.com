<?php
require_once('constants.php');
$err_max_connections_per_hour = 1;
	
 
    $dbserver="localhost";
    $dbuser=DB_USER;
    $dbpass=DB_PASS;
    $dbname= DB_NAME;
	$config_corrector = 1;
 
// mysql_connect($dbserver,$dbuser,$dbpass);
$conn = mysqli_connect($dbserver, $dbuser, $dbpass);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_select_db($conn, $dbname);
mysqli_query($conn, "SET NAMES 'utf8'");
//echo mysql_errno();
$ip = $_SERVER["REMOTE_ADDR"];

 
		
		

if($_SERVER['HTTP_HOST'] == 'test.mercury-training.com' or $_SERVER['HTTP_HOST'] == 'www.test.mercury-training.com'){
	$site_url= 'https://test.mercury-training.com';
	$addtocitytablename = '';
	
}elseif($_SERVER['HTTP_HOST'] == 'localhost'){
	$site_url= 'http://localhost/mercury-training.com/';
	//$addtocitytablename = '_d';
}elseif($_SERVER['HTTP_HOST'] == 'mercury-training.test'){
	$site_url= 'https://mercury-training.test';
}else{
	$addtocitytablename = '';
	//$addtocitytablemain = ' and `id` != 1';
	$site_url= 'http://mercury-training.com';
}


$site_dir= '';




$request = str_replace("$site_dir",'',urldecode($_SERVER['REQUEST_URI']));
$request = str_replace("print/",'',$request);
$request = str_replace("outlinsfrombooking/",'',$request);
$query_string_get = '?'.urldecode($_SERVER['QUERY_STRING']);
$request = str_replace("$query_string_get",'',$request);
$parts = explode ( "/", $request );



$page = isset($parts[0+$config_corrector]) ? $parts[0+$config_corrector] : '';
$sub_page = isset($parts[1+$config_corrector]) ? $parts[1+$config_corrector] : '';
$sub_page1 = isset($parts[2+$config_corrector]) ? $parts[2+$config_corrector] : '';
$sub_page2 = isset($parts[3+$config_corrector]) ? $parts[3+$config_corrector] : '';
$sub_page3 = isset($parts[4+$config_corrector]) ? $parts[4+$config_corrector] : '';






if($page=='' and $_GET[page] ==''){ $home =1; };


if (!function_exists('ip_info')){
function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}
}
$ip = $_SERVER["REMOTE_ADDR"];
// $sql_select_ip = "SELECT * FROM `ip_country` WHERE `ip` = '$ip'";
// $result_select_ip = mysql_query($sql_select_ip, $conn);
// if ($result_select_ip && (mysql_num_rows($result_select_ip) > 0)) {
// 	$row_select_ip = mysql_fetch_assoc($result_select_ip);
// 	$country = $row_select_ip['country'];
// }else{
// 	$country = ip_info("Visitor", "Country Code");
// 	$aa = "INSERT INTO `ip_country` ( `ip` , `country`) VALUES ('{$ip}', '{$country}');";
// 	mysql_query($aa, $conn);
// }
// $allow_country = array('SA','TR','KW','OM','QA','EG','LY','SD');
// if(in_array($country,$allow_country)){
// 	$addtocitytablename = '_d';
// }else{
// 	$addtocitytablename = '_d';
// 	//$addtocitytablemain = ' and `id` != 1';
// }

$site_course_link_a = 'https://mercury-training.com/ar/p/';
$site_course_link_b = '.html';
$site_course_link_b_admin_link = 'https://mercury-training.com/ar/a_admin00/';
$site_course_link_pdf = 'https://mercury-training.com/ar/pdfb/index.php?id=';
$site_course_link_pdf_course = '#';
$site_course_link_pdf_b = '';
$admin_title = 'Admin mercury arabic';
$adminweeks = 'week';

?>