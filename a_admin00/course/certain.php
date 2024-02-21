<?php
$id = $_GET['id'];
$course_main = $_GET['course_main'];
$certain = $_GET['certain'];
$aa ="UPDATE `course` SET 
`certain` = '$certain' WHERE `id` ='$id' LIMIT 1";
mysql_query($aa, $conn);
?>
<meta http-equiv="refresh" content="0;URL=?page=course_main-edit&id=<?php echo $course_main; ?>&amp;course=<?php echo $id; ?>#course_<?php echo $id; ?>" />