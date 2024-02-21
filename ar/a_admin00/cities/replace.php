<?php
if($level_admin > 3){ exit; }
$table = 'cities';
require("function.php");
$id = $_GET[id];
$row_history = mysql_fetch_assoc(mysql_query("SELECT * FROM `$table` where `id` = '$id' ", $conn));
add_edit('name',1,1,'');
add_edit('s_alias',1,1,'');
add_edit('hotel_name',1,1,'');
add_edit('hotel_photo',1,1,'');
add_edit('hotel_link',1,1,'');
add_edit('w1_p',1,1,'');
add_edit('w2_p',1,1,'');
add_edit('w3_p',1,1,'');
add_edit('w4_p',1,1,'');
add_edit('x',1,1,'');

add_edit('w1_p_b',1,1,'');
add_edit('w2_p_b',1,1,'');
add_edit('w3_p_b',1,1,'');
add_edit('w4_p_b',1,1,'');
add_edit('x_b',1,1,'');

add_edit('w1_p_c',1,1,'');
add_edit('w2_p_c',1,1,'');
add_edit('w3_p_c',1,1,'');
add_edit('w4_p_c',1,1,'');
add_edit('x_c',1,1,'');

add_edit('About',1,1,'');
add_edit('Things_to_do_and_places_to_visit',1,1,'');
add_edit('hotel_address',1,1,'');
add_edit('embed_map',1,1,'');
add_edit('hotel_logo',1,1,'');
add_edit('monday',1,1,'');
add_edit('continental',1,1,'');

if($id==""){
	$row_history = mysql_fetch_assoc(mysql_query("SELECT * FROM `{$table}` ORDER BY `{$table}`.`id` DESC
LIMIT 0 , 1", $conn));
	$aa = "INSERT INTO `$table` (`id` $add1) VALUES (NULL $add2)";
	mysql_query($aa, $conn);	
	admin_history('Add City',$admin_history_add,$row_history[id]);
}else{
	$aa ="UPDATE `$table` SET `id` ='$id' $edit WHERE `$table`.`id` =$id LIMIT 1";
	mysql_query($aa, $conn);
	admin_history('Update City',$admin_history_edit,$row_history[id]);
};
//echo $aa; exit;
?>

<?php include "add.alias.php"; ?>

<meta http-equiv="refresh" content="0;url=?page=<?php echo $table; ?>-view<?php echo $get; ?>" />