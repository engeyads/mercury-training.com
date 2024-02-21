<?php 
$id = addslashes($_GET['id']);
$c_id = addslashes($_GET['c_id']);
$pass_wordA_1 = addslashes($_POST['pass_word_1']);
$course_c = addslashes($_POST['course_c']);
$start = addslashes($_POST['start']);
if($_GET[course_c] == ''){ $_GET[course_c] = addslashes($_POST['course_c']); }
if($_GET[start] == ''){ $_GET[start] = addslashes($_POST['start']); }

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
mysql_query("DELETE FROM `course_main` WHERE `id` = '" . $id . "' LIMIT 1", $conn);
mysql_query("DELETE FROM `course` WHERE `c_id` = '" . $c_id . "' ", $conn);
?><meta http-equiv="refresh" content="0;URL=?page=course_main-view<?php if($course_c !=''){ echo "&course_c={$course_c}"; }  if($start !=''){ echo "&start={$start}"; } ?>" /><?php
}else{
	?>
<form action="index.php?page=<?php echo $_GET[page]; ?>&amp;id=<?php echo $_GET[id]; ?>&amp;c_id=<?php echo $_GET[c_id]; ?>" method="post">
    <label>Pass Word</label>
    <input type="hidden" name="course_c" value="<?php echo $_GET[course_c]; ?>" />
    <input type="hidden" name="start" value="<?php echo $_GET[start]; ?>" />
    <input type="password" class="form-control" id="pass_word_1" value="" placeholder="Enter Pass Word" name="pass_word_1">
    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Delete</button>
</form><?php
}

?>