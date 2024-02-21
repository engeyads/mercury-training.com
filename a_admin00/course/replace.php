<?php
$id = $_POST['id'];
$course_main = $_POST['course_main'];
$table = 'course';
require("function.php");
$row_history = mysql_fetch_assoc(mysql_query("SELECT * FROM `course` where `id` = '$id' ", $conn));

add_edit('c_id',1,0,'');
add_edit('d1',1,1,'');
add_edit('m1',1,1,'');
add_edit('y1',1,1,'');
add_edit('d2',1,1,'');
add_edit('m2',1,1,'');
add_edit('y2',1,1,'');
add_edit('city',1,1,'');
add_edit('address',1,1,'');
add_edit('certain',1,1,'');
add_edit('price',1,1,'');
add_edit('visible',1,1,'');
$admin_id1 = $course_main;
if($id==""){
	$row_history = mysql_fetch_assoc(mysql_query("SELECT * FROM `course` ORDER BY `course`.`id` DESC
LIMIT 0 , 1", $conn));
	$aa = "INSERT INTO `$table` (`id` $add1) VALUES (NULL $add2)";
$sql_course = "SELECT * FROM `course` ORDER BY `id` DESC ";
	$result_course = mysql_query($sql_course, $conn);
	$row_course = mysql_fetch_assoc($result_course);
	$id = $row_course[id];
	mysql_query($aa, $conn);
	admin_history('Add Date',$admin_history_add,$row_history[id]);
}else{
	$aa ="UPDATE `$table` SET `id` ='$id' $edit WHERE `$table`.`id` =$id LIMIT 1";
	mysql_query($aa, $conn);
	admin_history('Update Date',$admin_history_edit,$row_history[id]);
};


?>
<?php if($course_main == ""){ ?><meta http-equiv="refresh" content="0;URL=?page=course_main-view" /><?php }else{ ?><meta http-equiv="refresh" content="0;URL=?page=course_main-edit&id=<?php echo $course_main; ?>&amp;course=<?php echo $id; ?>#course_<?php echo $id; ?>" /><?php };?>
