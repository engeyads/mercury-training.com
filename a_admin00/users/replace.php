<?php if($level_admin !=1){ exit; }?><?php
$table = 'user_name';
require("function.php");

$add = $_POST['add'];
$user_name_ch = $_POST[user_name_ch];

add_edit('user_name',1,0,$user_name_ch);
$pass1 = $_POST[pass1];
$pass2 = $_POST[pass2];
if($pass1 == $pass2){
	$pass1 = md5($pass1);
	$pass1.=anas101;
	$pass1 = md5($pass1);
	$pass1="anas101".$pass1;
	$pass1 = md5($pass1);
}else{
	echo '<h1>Password and RE Password does not much</h1>';
	exit;
	}
add_edit('pass_world',1,0,$pass1);
add_edit('level',1,1,'');
add_edit('activ',1,1,'');
if($add==""){
	$aa = "INSERT INTO `$table` (`mob` $add1) VALUES ('' $add2)";
	mysql_query($aa, $conn);

}else{
	$aa ="UPDATE `$table` SET `mob` ='' $edit WHERE `$table`.`user_name` ='$user_name_ch' LIMIT 1";
	mysql_query($aa, $conn);
};
?>

<meta http-equiv="refresh" content="0;url=?page=users-view<?php echo $get; ?>" />
