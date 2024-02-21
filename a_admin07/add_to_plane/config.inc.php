<?php
require("../config.inc.php");
$weaksColumnsName = $adminweeks;


if(isset($_GET['year'])){
    $_SESSION['year'] = $_GET['year'];
};
if(isset($_SESSION['year'])){
    $year = $_SESSION['year'];
}else{
    $year = '2023';
};

$main_weeksWithoutDone = "(`{$weaksColumnsName}` = '1' or `{$weaksColumnsName}` = '2' or `{$weaksColumnsName}` = '3' or `{$weaksColumnsName}` = '4')  ";
$main_weeksWithDone = $main_weeksWithoutDone."and `done` ='{$year}'";
$main_weeks = $main_weeksWithoutDone."and `done` !='{$year}'";
?>