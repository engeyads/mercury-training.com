<?php
if($level_admin > 1){ exit; }
require("config.inc.php");
$sql_sum_a = "TRUNCATE `temp-course`";
$sql_sum_a = $mysqli -> query($sql_sum_a);
?> Done .... ;)