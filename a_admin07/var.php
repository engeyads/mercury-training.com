<?php
if(!isset($get)){ $get = ''; }
if(!isset($view_aa)){ $view_aa = ''; }
if(!isset($numberOfRows_get)){ $numberOfRows_get = ''; }
if(!isset($topnotificationAddToLinke)){ $topnotificationAddToLinke = ''; }
$y = date('Y');
$m = date('m');
$d = date('d');
$oldUpcomming = "( `course`.`y1` > '$y' or (`course`.`y1` = '$y' and `course`.`m1` > '$m') or (`course`.`y1` = '$y' and `course`.`m1` = '$m' and `course`.`d1` >= '$d') )";
$month_a = array('','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
?>