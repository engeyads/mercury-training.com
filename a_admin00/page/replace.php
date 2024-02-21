<?php
if($level_admin > 3){ exit; }
$table = 'course_c';
require("function.php");
$id = $_POST['id'];
$row_history = mysql_fetch_assoc(mysql_query("SELECT * FROM `$table` where `id` = '$id' ", $conn));
add_edit('name',1,1,'');
add_edit('sh',1,1,'');
add_edit('glyphicon',1,1,'');
add_edit('color',1,1,'');
add_edit('s_alias',1,1,'');
add_edit('class',1,1,'');


if($id==""){
	$row_history = mysql_fetch_assoc(mysql_query("SELECT * FROM `{$table}` ORDER BY `{$table}`.`id` DESC
LIMIT 0 , 1", $conn));
	$aa = "INSERT INTO `$table` (`id` $add1) VALUES (NULL $add2)";
	mysql_query($aa, $conn);
	admin_history('Add Category',$admin_history_add,$row_history[id]);
	$en_name = $_POST['name'];
	$alias = str_replace(' ', '-', $en_name);
	echo $aa = "INSERT INTO `page` (`id`, `show_title`, `en_name`, `alias`, `en_text`, `type`, `same_win`, `mainmenu`, `template`, `level`, `p_id`, `url`, `en_key_word`, `order`, `publish`, `trash`, `photo`, `photo_mini`, `file`, `video`, `flash`, `breafinpage`, `date`, `fulldate`, `time`, `end_time`, `end_date`, `share`, `comment`, `rss`, `argent`, `newsbar`, `hits`, `vote`, `startin`, `endin`, `lastmod`) VALUES (
		NULL, '1', '$en_name', '$alias', '', 'programs', '', '0', '', '1', '6965', '', '', '1', '1', '0', '', '', '', '', '', '0', '0000-00-00', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0000-00-00', '0000-00-00', '0000-00-00');";
	mysql_query($aa, $conn);

	
}else{
	$aa ="UPDATE `$table` SET `id` ='$id' $edit WHERE `$table`.`id` =$id LIMIT 1";
	mysql_query($aa, $conn);
	admin_history('Update Category',$admin_history_edit,$row_history[id]);
	$en_name = $_POST['name'];

	
	$row_cat = mysql_fetch_assoc(mysql_query("SELECT * FROM `page` where `en_name` = $en_name LIMIT 0 , 1", $conn));
	$aa ="UPDATE `page` SET `en_name` = '$en_name' WHERE `page`.`id` = '$row_cat[id]';	";
	mysql_query($aa, $conn);

	
};
?>

<meta http-equiv="refresh" content="0;url=?page=<?php echo $table; ?>-view<?php echo $get; ?>" />