<?php
$id = $_GET['id'];
if(isset($_GET['returnPage']) and $_GET['returnPage'] !=''){ $returnPage = $_GET['returnPage']; }else{ $returnPage = 'course_main-edit'; }

$course_main = $_GET['course_main'];
$certain = $_GET['certain'];
$aa ="UPDATE `course` SET 
`certain` = '$certain' WHERE `id` ='$id' LIMIT 1";
$mysqli -> query($aa);
topnotification('The course date & venue upcomming has been updated');
	$link = "?page={$returnPage}&id={$course_main}&amp;course={$id}{$topnotificationAddToLinke}&activeTab=Event#course_{$id}";
	replace_aa();
?>