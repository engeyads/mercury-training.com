<?php
if($level_admin > 3){ exit; }
$table = 'alias';
require("function.php");
$id = $_POST['id'];
$row_history = mysql_fetch_assoc(mysql_query("SELECT * FROM `$table` where `id` = '$id' ", $conn));
add_edit('id',1,1,'');
add_edit('alias',1,1,'');
add_edit('url',1,1,'');
add_edit('keywords',1,1,'');
add_edit('description',1,1,'');
add_edit('title',1,1,'');
add_edit('date',1,1,'');
add_edit('ip',1,1,'');


if($id==""){
	$row_history = mysql_fetch_assoc(mysql_query("SELECT * FROM `{$table}` ORDER BY `{$table}`.`id` DESC
LIMIT 0 , 1", $conn));
	$aa = "INSERT INTO `$table` (`id` $add1) VALUES (NULL $add2)";
	mysql_query($aa, $conn);
	admin_history('Add alias',$admin_history_add,$row_history[id]);
}else{
	$aa ="UPDATE `$table` SET `id` ='$id' $edit WHERE `$table`.`id` =$id LIMIT 1";
	mysql_query($aa, $conn);
	admin_history('Update Alias',$admin_history_edit,$row_history[id]);
};
?>

<meta http-equiv="refresh" content="0;url=?page=<?php echo $table; ?>-view<?php echo $get; ?>" />