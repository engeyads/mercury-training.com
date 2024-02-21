<?php
$user_nameA = addslashes($HTTP_COOKIE_VARS['user_nameA']);
$user_nameA1 = addslashes($HTTP_COOKIE_VARS['user_nameA']);
Setcookie ("user_nameA" , "aa", time()-86400,'/');
Setcookie ("pass_wordA" , "aa", time()-86400,'/');
Setcookie ("id" , "1000000", time()-86400,'/');
require("../config.inc.php"); 
$ip = getenv("REMOTE_ADDR"); 
$date = date("Y-m-d");
$time = date("H:i:s");
$aa ="INSERT INTO `log` ( `id` , `in_out` , `user` , `ip` , `date` , `time` ) VALUES ('' , 'o', '$user_nameA1', '$ip', '$date', '$time')";
mysql_query($aa, $conn);
?>
<meta http-equiv="refresh" content="0;URL=index.php?<?php echo date('ymdhis'); ?>" />