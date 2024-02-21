<?php
$table = 'course_main';

$id = $_POST['id'];
$row_history = $mysqli -> query("SELECT * FROM `$table` where `id` = '$id' ")-> fetch_assoc();
add_edit('name',1,1,'');
add_edit('sub_title',1,1,'');
add_edit('course_c',1,1,'');
add_edit('c_id',1,1,'');

add_edit('weeks',1,1,'');
add_edit('week',1,1,'');
if(!isset($_POST['hidden']) or $_POST['hidden'] == ''){ $_POST['hidden'] = '0'; }
add_edit('keyword',1,1,'');
add_edit('description',1,1,'');
add_edit('tags',1,1,'');
add_edit('hidden',1,1,'');
add_edit('broshoure',1,1,'');
add_edit('overview',1,1,'');



if($id==''){
	$row_history = $mysqli -> query("SELECT * FROM `{$table}` ORDER BY `{$table}`.`id` DESC
LIMIT 0 , 1")-> fetch_assoc();
	// Check C_ID	
	$sql_course = "SELECT `c_id` FROM `course_main` where `c_id` = '{$_POST['c_id']}' ";
	$result_course = $mysqli -> query($sql_course);
	if (($result_course && (mysqli_num_rows($result_course) > 0)) or $_POST['c_id'] =='') {
		?><h1 style="color:#F00;font-weight:bold;font-size:48px">ERR IN C_ID</h1><?php
	}elseif (!isset($_POST['name']) or $_POST['name'] =='') {
		?><h1 style="color:#F00;font-weight:bold;font-size:48px">Name is Empty</h1><?php
	}else{
		// GET New Id
		$sql_course = "SELECT * FROM `course_main` ORDER BY `id` DESC ";
		$result_course = $mysqli -> query($sql_course);
		$row_course = $result_course-> fetch_assoc();
		$id = $row_course['id'];
		
		$aa = "INSERT INTO `$table` (`id` $add1) VALUES (NULL $add2)";
		$mysqli -> query($aa);
		$id = $mysqli->insert_id;
		topnotification('The course Information has been added');
		admin_history('Add Course',$admin_history_add,$row_history['id']);
		$link = "?page=course_main-edit&id={$id}{$topnotificationAddToLinke}";
		replace_aa();
	}

}else{
	$aa ="UPDATE `$table` SET `id` ='$id' $edit WHERE `$table`.`id` =$id LIMIT 1";
	$mysqli -> query($aa);
	topnotification('The course Information has been Updated');
	admin_history('Update Course',$admin_history_edit,$row_history['id']);
	$link = "?page=course_main-edit&id={$id}{$topnotificationAddToLinke}";
	replace_aa();
};
?>