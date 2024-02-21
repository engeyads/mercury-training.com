<?php
if($level_admin > 3){ exit; }
$table = 'search';

$id = $_POST['id'];
$row_history = $mysqli -> query("SELECT * FROM `$table` where `id` = '$id' ")-> fetch_assoc();
add_edit('id',1,1,'');
add_edit('Month',1,1,'');
add_edit('Category',1,1,'');
add_edit('City',1,1,'');
add_edit('ref',1,1,'');
add_edit('Date',1,1,'');
add_edit('ip',1,1,'');
add_edit('Find',1,1,'');
add_edit('country',1,1,'');



if($id==""){
	$row_history = $mysqli -> query("SELECT * FROM `{$table}` ORDER BY `{$table}`.`id` DESC
LIMIT 0 , 1")-> fetch_assoc();
	$aa = "INSERT INTO `$table` (`id` $add1) VALUES (NULL $add2)";
	$mysqli -> query($aa);
	admin_history('Add alias',$admin_history_add,$row_history['id']);
}else{
	$aa ="UPDATE `$table` SET `id` ='$id' $edit WHERE `$table`.`id` =$id LIMIT 1";
	$mysqli -> query($aa);
	admin_history('Update Search',$admin_history_edit,$row_history['id']);
};
?>

<meta http-equiv="refresh" content="0;url=?page=<?php echo $table; ?>-view<?php echo $get; ?>" />