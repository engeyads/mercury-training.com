<?php
$table = 'course_main';
require("function.php");
$id = $_POST['id'];
$row_history = mysql_fetch_assoc(mysql_query("SELECT * FROM `$table` where `id` = '$id' ", $conn));
add_edit('name',1,1,'');
add_edit('sub_title',1,1,'');
add_edit('course_c',1,1,'');
add_edit('c_id',1,1,'');
add_edit('overview',1,1,'');
add_edit('broshoure',1,1,'');
add_edit('objective',1,1,'');
add_edit('out_lines',1,1,'');
add_edit('weeks',1,1,'');
add_edit('week',1,1,'');
add_edit('who_should_attend',1,1,'');
if($_POST[hidden] == ''){ $_POST[hidden] = '0'; }
add_edit('hidden',1,1,'');



if($id==''){
	$row_history = mysql_fetch_assoc(mysql_query("SELECT * FROM `{$table}` ORDER BY `{$table}`.`id` DESC
LIMIT 0 , 1", $conn));
	// Check C_ID	
	$sql_course = "SELECT `c_id` FROM `course_main` where `c_id` = '{$_POST[c_id]}' ";
	$result_course = mysql_query($sql_course, $conn);
	if (($result_course && (mysql_num_rows($result_course) > 0)) or $_POST[c_id] =='') {
		?><h1 style="color:#F00;font-weight:bold;font-size:48px">ERR IN C_ID</h1><?php
	}elseif ($_POST[name] =='') {
		?><h1 style="color:#F00;font-weight:bold;font-size:48px">Name is Empty</h1><?php
	}else{
		// GET New Id
		$sql_course = "SELECT * FROM `course_main` ORDER BY `id` DESC ";
		$result_course = mysql_query($sql_course, $conn);
		$row_course = mysql_fetch_assoc($result_course);
		$id = $row_course[id];
		
		$aa = "INSERT INTO `$table` (`id` $add1) VALUES (NULL $add2)";
		mysql_query($aa, $conn);
		admin_history('Add Course',$admin_history_add,$row_history[id]);
		//echo $aa; exit;
		?><meta http-equiv="refresh" content="0;URL=?page=course_main-view" /><?php
	}

}else{
	$aa ="UPDATE `$table` SET `id` ='$id' $edit WHERE `$table`.`id` =$id LIMIT 1";
	mysql_query($aa, $conn);
	admin_history('Update Course',$admin_history_edit,$row_history[id]);
	//echo $aa; exit;
	?><meta http-equiv="refresh" content="0;URL=?page=course_main-edit&id=<?php echo $id; ?>" /><?php
};
?>