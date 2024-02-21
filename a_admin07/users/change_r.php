<?php if($level_admin !=1){ exit; }?><?php 
$user_name_ch = $_POST['user_name_ch'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
if($pass1 == $pass2){
	$pass1 = md5($pass1);
	$pass1.='anas101';
	$pass1 = md5($pass1);
	$pass1="anas101".$pass1;
	$pass1 = md5($pass1);
	
	$aa ="UPDATE `user_name` SET `pass_world` ='$pass1'  WHERE `user_name` ='{$user_name_ch}' LIMIT 1";
	$mysqli -> query($aa);

	
	echo '<h1>The Password has been changed</h1>';
}else{
	echo '<h1>Password and RE Password does not much</h1>';
}
?>