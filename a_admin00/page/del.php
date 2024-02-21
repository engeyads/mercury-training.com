<?php
if($level_admin > 3){ exit; }
$id = addslashes($_GET['id']);
$c_id = addslashes($_GET['c_id']);
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
mysql_query("DELETE FROM `course_c` WHERE `id` = '" . $id . "' LIMIT 1", $conn);

?><meta http-equiv="refresh" content="0;URL=?page=course_c-view" /><?php
}else{
	?>
<form action="index.php?page=<?php echo $_GET[page]; ?>&amp;id=<?php echo $_GET[id]; ?>&amp;c_id=<?php echo $_GET[c_id]; ?>" method="post">
    <label>Pass Word</label>
    <input type="password" class="form-control" id="pass_word_1" value="" placeholder="Enter Pass Word" name="pass_word_1">
    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Delete</button>
</form><?php
}

?>