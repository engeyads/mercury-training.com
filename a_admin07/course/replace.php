<?php
$id = $_POST['id'];
$course_main = $_POST['course_main'];
$table = 'course';

$row_history = $mysqli -> query("SELECT * FROM `course` where `id` = '$id' ")-> fetch_assoc();

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
add_edit('currency',1,1,'');
$admin_id1 = $course_main;
if($id==""){
	$row_history = $mysqli -> query("SELECT * FROM `course` ORDER BY `course`.`id` DESC
LIMIT 0 , 1")-> fetch_assoc();
	$aa = "INSERT INTO `$table` (`id` $add1) VALUES (NULL $add2)";
$sql_course = "SELECT * FROM `course` ORDER BY `id` DESC ";
	$result_course = $mysqli -> query($sql_course);
	$row_course = $result_course-> fetch_assoc();
	$id = $row_course['id'];
	$mysqli -> query($aa);
	admin_history('Add Date',$admin_history_add,$row_history['id']);
	topnotification('The course date & venue has been added');
}else{
	$aa ="UPDATE `$table` SET `id` ='$id' $edit WHERE `$table`.`id` =$id LIMIT 1";
	$mysqli -> query($aa);
	admin_history('Update Date',$admin_history_edit,$row_history['id']);
	topnotification('The course date & venue has been updated');
};


if($course_main == ""){ 
	$link = "?page=course_main-view";
}else{
	$link = "?page=course_main-edit&id={$course_main}&amp;course={$id}{$topnotificationAddToLinke}&activeTab=Event#course_{$id}";
};
replace_aa();
?>
<?php ?>
