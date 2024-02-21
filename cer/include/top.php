<?php require("config.inc.php"); ?><?php
$list_ignore = array ('.','..');
$handle=opendir("./functions");


while ($file = readdir($handle)) {
	if (!in_array($file,$list_ignore)) {
		include("functions/$file");
	}
}
closedir($handle);
//$id = $_GET["id"];
//$PIN = $_GET["PIN"];


?>