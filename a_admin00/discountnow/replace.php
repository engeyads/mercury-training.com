<?php

function toBase($num, $b=26) {
	global $the_code;
	$base='23456789ABCDEFGHJKMNPRSTXZ';
	$r = $num  % $b ;
	$res = $base[$r];
	$q = floor($num/$b);
	while ($q) {
		$r = $q % $b;
		$q =floor($q/$b);
		$res = $base[$r].$res;
	}
	$the_code ='BBC'.$res;
}
$table = 'discount_now';
require("function.php");
$id = $_POST['id'];
$row_history = mysql_fetch_assoc(mysql_query("SELECT * FROM `$table` where `id` = '$id' ", $conn));







if($id==''){
	
	$row_history = mysql_fetch_assoc(mysql_query("SELECT * FROM `{$table}` ORDER BY `{$table}`.`id` DESC
LIMIT 0 , 1", $conn));
	admin_history('Add Course',$admin_history_add,$row_history[id]);

// GET New Id
	$sql_course = "SELECT * FROM `$table` ORDER BY `id` DESC ";
	$result_course = mysql_query($sql_course, $conn);
	$row_course = mysql_fetch_assoc($result_course);
	$id = $row_course[id]+1;

	$random = rand(1000000,1999999);
	$random = $id.$random;
	
	toBase($random);
	add_edit('code',1,1,$the_code);
	$aa = "INSERT INTO `$table` (`id` $add1) VALUES (NULL $add2)";
	mysql_query($aa, $conn);
	

}else{

	$sql_course = "SELECT `code` FROM `$table` where `code` = '{$_POST[code]}' and `id` != $id ";
	$result_course = mysql_query($sql_course, $conn);
	if ($result_course && (mysql_num_rows($result_course) > 0)) {
		?><h1 style="color:#f00">The code has been used</h1><?php
		exit;
	}
	if ($_POST[code] == '') {
		?><h1 style="color:#f00">The code is empty</h1><?php
		exit;
	}


	add_edit('code',1,1,'');
	$aa ="UPDATE `$table` SET `id` ='$id' $edit WHERE `$table`.`id` =$id LIMIT 1";
	mysql_query($aa, $conn);
	admin_history('Update Course',$admin_history_edit,$row_history[id]);
	
};
?><meta http-equiv="refresh" content="0;URL=?page=discount-now-edit&id=<?php echo $id; ?>" /><?php
?>