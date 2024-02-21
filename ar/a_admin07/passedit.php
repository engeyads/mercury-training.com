<?php
if(isset($_POST['Old_pass'])){ $Old_pass = addslashes($_POST['Old_pass']); }else{ $Old_pass = ''; }
if(isset($_POST['New_Pass'])){ $New_Pass = addslashes($_POST['New_Pass']); }else{ $New_Pass = ''; }
if(isset($_POST['RE_New_Pass'])){ $RE_New_Pass = addslashes($_POST['RE_New_Pass']); }else{ $RE_New_Pass = ''; }





$Old_pass = md5($Old_pass);
$Old_pass.='anas101';
$Old_pass = md5($Old_pass);
$Old_pass="anas101".$Old_pass;
$Old_pass = md5($Old_pass);

$New_Pass = md5($New_Pass);
$New_Pass.='anas101';
$New_Pass = md5($New_Pass);
$New_Pass="anas101".$New_Pass;
$New_Pass = md5($New_Pass);

$RE_New_Pass = md5($RE_New_Pass);
$RE_New_Pass.='anas101';
$RE_New_Pass = md5($RE_New_Pass);
$RE_New_Pass="anas101".$RE_New_Pass;
$RE_New_Pass = md5($RE_New_Pass);


  // Query the database
    $sql = "SELECT * 
FROM `user_name` 
WHERE 1 AND `user_name` 
LIKE '$user_nameA' LIMIT 0 , 1 ";
$result = $mysqli -> query($sql);

$row = $result-> fetch_assoc();
$pass_word = htmlspecialchars($row['pass_world']); 
/**
echo $pass_word; echo '<br />';
echo $Old_pass; echo '<br />';
echo $New_Pass; echo '<br />';
echo $RE_New_Pass;
exit;
**/
if($pass_word==$Old_pass & $New_Pass==$RE_New_Pass ){
$mysqli -> query("UPDATE `user_name` SET `pass_world` = '$New_Pass' WHERE `user_name` LIKE '$user_nameA' LIMIT 1");

?><meta http-equiv="refresh" content="0;URL=?" /><?php
}else{
 ?><meta http-equiv="refresh" content="0;URL=?page=reset_pass" /><?php
};
?>