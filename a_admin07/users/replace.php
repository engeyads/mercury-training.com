<?php if($level_admin !=1){ exit; }?><?php
$table = 'user_name';



if(isset($_POST['add'])){ $add = $_POST['add']; }else{ $add = ''; }
$user_name_ch = $_POST['user_name_ch'];

add_edit('user_name',1,0,$user_name_ch);
if(isset($_POST['pass1'])){ $pass1 = $_POST['pass1']; }else{ $pass1 = ''; }
if(isset($_POST['pass2'])){ $pass2 = $_POST['pass2']; }else{ $pass2 = ''; }


if($pass1 == $pass2){
	$pass1 = md5($pass1);
	$pass1.='anas101';
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
add_edit('view_log',1,1,'');
add_edit('mob',1,1,'');
add_edit('last_name',1,1,'');
add_edit('email',1,1,'');



if($add==""){
	$aa = "INSERT INTO `$table` (`tel` $add1) VALUES ('' $add2)";
	$mysqli -> query($aa);
	topnotification('The User information has been added.');

}else{
	$aa ="UPDATE `$table` SET `tel` ='' $edit WHERE `$table`.`user_name` ='$user_name_ch' LIMIT 1";
	$mysqli -> query($aa);
	topnotification('The User information has been Updated.');
};
$link = "?page=users-view{$get}{$topnotificationAddToLinke}";
replace_aa();
?>