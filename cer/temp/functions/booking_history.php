<?php
$user_nameA = 'website';
function booking_history($booking_history_type,$booking_history_Text,$id){
	global $conn,$user_nameA,$aa,$notifications,$only_me;
	$aa = str_replace("'",'"',$aa);
	//$aa='';
	$date_now = date('Y-m-d');
	$time_now = date('H:i:s');
	if($id == ''){ $id = $_GET[id]; }
	$booking_history ="INSERT INTO `booking_history` ( `id` , `user_name` , `booking_id` , `Date` , `time` , `type` , `Text` , `ip`,`sql` )
	VALUES (
	NULL , '$user_nameA', '{$id}', '$date_now', '$time_now', '$booking_history_type', '$booking_history_Text', '{$_SERVER['REMOTE_ADDR']}','{$aa}'
	)";
	mysqli_query($conn,$booking_history);
	
	
	

	$sql_user = "SELECT * FROM `user_name` WHERE `user_name` != '$user_nameA'";
	$sql_user = mysqli_query($conn, $sql_user);
	if ($sql_user && (mysqli_num_rows($sql_user) > 0)) {
		while ($row_user = mysql_fetch_assoc($sql_user)){
			$num = mysqli_num_rows(mysqli_query($conn, "SELECT *
	FROM `user_name_notifications`
	WHERE `user_name` LIKE '{$row_user[user_name]}'  AND `notifications_name` LIKE '{$booking_history_type}' LIMIT 0 , 1" ));
			
			if($num == 1){ $notifications_sql ="INSERT INTO `notifications` ( `id` , `user_name` , `booking_id` , `Date` , `time` , `type` , `Text` , `user`)
			VALUES (
			NULL , '$user_nameA', '{$id}', '$date_now', '$time_now', '$booking_history_type', '$booking_history_Text', '{$row_user[user_name]}')";
			
			if($notifications_sql !=''){
				mysqli_query($conn, $notifications_sql);
				$notifications_sql='';
			}
			
			
			};
			 
		}
	}


}
?>