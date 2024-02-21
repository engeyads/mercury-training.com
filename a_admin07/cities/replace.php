<?php
if($level_admin > 3){ exit; }
$table = 'cities';

$id = $_GET['id'];
$row_history = $mysqli -> query("SELECT * FROM `$table` where `id` = '$id' ")-> fetch_assoc();
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
	$row_history = $mysqli -> query("SELECT * FROM `{$table}` ORDER BY `{$table}`.`id` DESC
LIMIT 0 , 1")-> fetch_assoc();
	$aa = "INSERT INTO `$table` (`id` $add1) VALUES (NULL $add2)";
	$mysqli -> query($aa);	
	$id = $mysqli->insert_id;
	topnotification('The city has been added');
	admin_history('Add City',$admin_history_add,$row_history['id']);
}else{
	$aa ="UPDATE `$table` SET `id` ='$id' $edit WHERE `$table`.`id` =$id LIMIT 1";
	$mysqli -> query($aa);
	topnotification('The city has been Updated');
	admin_history('Update City',$admin_history_edit,$row_history['id']);
};

$link = "?page={$table}-view{$get}{$topnotificationAddToLinke}";
replace_aa();
?>