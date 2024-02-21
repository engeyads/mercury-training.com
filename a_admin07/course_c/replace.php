<?php
if($level_admin > 3){ exit; }
$table = 'course_c';

$id = $_POST['id'];
$row_history = $mysqli -> query("SELECT * FROM `$table` where `id` = '$id' ")-> fetch_assoc();
add_edit('name',1,1,'');
add_edit('sh',1,1,'');
add_edit('glyphicon',1,1,'');
add_edit('color',1,1,'');
add_edit('s_alias',1,1,'');
add_edit('class',1,1,'');

if($id==""){
	$row_history = $mysqli -> query("SELECT * FROM `{$table}` ORDER BY `{$table}`.`id` DESC
LIMIT 0 , 1")-> fetch_assoc();
	$aa = "INSERT INTO `$table` (`id` $add1) VALUES (NULL $add2)";
	$mysqli -> query($aa);
	topnotification('The Category has been added');
	admin_history('Add Category',$admin_history_add,$row_history['id']);
}else{
	$aa ="UPDATE `$table` SET `id` ='$id' $edit WHERE `$table`.`id` =$id LIMIT 1";
	$mysqli -> query($aa);
	topnotification('The Category has been Updated');
	admin_history('Update Category',$admin_history_edit,$row_history['id']);
};

$link = "?page={$table}-view{$get}{$topnotificationAddToLinke}";
replace_aa();
?>