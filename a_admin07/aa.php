<?php
$aaPage = 1;
require("../config.inc.php"); require("configAdmin.php"); require("login.php"); 
if($level_admin ==1){
	$view_aa  =1;
}else{
	$view_aa  =0;
}
require("index.php"); 
?>