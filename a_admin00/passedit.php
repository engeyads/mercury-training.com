<?php
$user_name = addslashes($_POST['user_name0']);
$Old_pass = addslashes($_POST['Old_pass']);
$New_Pass = addslashes($_POST['New_Pass']);
$RE_New_Pass = addslashes($_POST['RE_New_Pass']);


$Old_pass = md5($Old_pass);
$Old_pass.=anas101;
$Old_pass = md5($Old_pass);
$Old_pass="anas101".$Old_pass;
$Old_pass = md5($Old_pass);

$New_Pass = md5($New_Pass);
$New_Pass.=anas101;
$New_Pass = md5($New_Pass);
$New_Pass="anas101".$New_Pass;
$New_Pass = md5($New_Pass);

$RE_New_Pass = md5($RE_New_Pass);
$RE_New_Pass.=anas101;
$RE_New_Pass = md5($RE_New_Pass);
$RE_New_Pass="anas101".$RE_New_Pass;
$RE_New_Pass = md5($RE_New_Pass);

require("../config.inc.php");
  // Query the database
    $sql = "SELECT * 
FROM `user_name` 
WHERE 1 AND `user_name` 
LIKE '$user_name' LIMIT 0 , 30 ";
$result = mysql_query($sql, $conn);

$row = mysql_fetch_assoc($result);
$pass_word = htmlspecialchars($row['pass_world']); 
/**
echo $pass_word; echo '<br />';
echo $Old_pass; echo '<br />';
echo $New_Pass; echo '<br />';
echo $RE_New_Pass;
exit;
**/
if($pass_word==$Old_pass & $New_Pass==$RE_New_Pass ){
mysql_query("UPDATE `user_name` SET `pass_world` = '$New_Pass' WHERE `user_name` LIKE '$user_name' LIMIT 1", $conn);

?><meta http-equiv="refresh" content="0;URL=index.php" /><?php
}else{
 ?><meta http-equiv="refresh" content="0;URL=reset-pass.html" /><?php
};
?>