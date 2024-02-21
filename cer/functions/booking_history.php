<?php
$user_nameA = 'website';
function booking_history($booking_history_type,$booking_history_Text,$id){
	global $conn,$user_nameA,$aa;
	$aa = str_replace("'",'"',$aa);
	$date_now = date('Y-m-d');
	$time_now = date('H:i:s');
	if(!isset($id)){ $id = $_GET['id']; }
	$booking_history ="INSERT INTO `booking_history` ( `id` , `user_name` , `booking_id` , `Date` , `time` , `type` , `Text` , `ip`,`sql` )
	VALUES (
	NULL , '$user_nameA', '{$id}', '$date_now', '$time_now', '$booking_history_type', '$booking_history_Text', '{$_SERVER['REMOTE_ADDR']}','{$aa}'
	)";
	mysqli_query($conn, $booking_history);
}
?>