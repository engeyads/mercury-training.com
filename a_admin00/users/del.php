<?php if($level_admin !=1){ exit; }?><?php
$id = addslashes($_GET['id']);
$user_name_ch = addslashes($_GET['user_name_ch']);
$pass_wordA_1 = addslashes($_POST['pass_word_1']);


$pass_wordA_1 = md5($pass_wordA_1);
$pass_wordA_1 .=anas101;
$pass_wordA_1 = md5($pass_wordA_1);
$pass_wordA_1 ="anas101".$pass_wordA_1;
$pass_wordA_1 = md5($pass_wordA_1);

$sql_admin = "SELECT * 
FROM `user_name` 
WHERE (1 AND `user_name` LIKE '$user_nameA' 
AND `pass_world` LIKE '$pass_wordA_1' AND (`level` =1 or `level` =2 ))
 LIMIT 0 , 1 ";


$result_admin = mysql_query($sql_admin, $conn);
if ($result_admin && (mysql_num_rows($result_admin)> 0)) {
mysql_query("DELETE FROM `user_name` WHERE `user_name` = '" . $user_name_ch . "' LIMIT 1", $conn);

?><meta http-equiv="refresh" content="0;URL=?page=users-view" /><?php
}else{
	?>
<form action="index.php?page=<?php echo $_GET[page]; ?>&amp;user_name_ch=<?php echo $_GET[user_name_ch]; ?>" method="post">
    <label>Pass Word</label>
    <input type="password" class="form-control" id="pass_word_1" value="" placeholder="Enter Pass Word" name="pass_word_1">
    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Delete</button>
</form><?php
}

?>