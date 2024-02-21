<?php
//$page = $_GET['page'];
//$page = str_replace('/','',$page);
$page = str_replace('-','/',$page);
if(!isset($id)){$id = $_POST['id'];}
if($PIN == '') {$PIN= $_POST['PIN'];}
// booking_history('View certificate','MER',"$id");
$main = '';

function to10( $num, $b=62) {
  $base='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $limit = strlen($num);
  $res=strpos($base,$num[0]);
  for($i=1;$i<$limit;$i++) {
    $res = $b * $res + strpos($base,$num[$i]);
  }
  return $res;
}
$pin_len = 5;
$aa = to10($page,62);
$PIN = substr($aa,-$pin_len);
$id = substr($aa,0,-$pin_len);

$sql_evaluation = "SELECT `booking_id`,`Full_Name`,`Course_L1`,`Course_L2`,`VENUE`,`DATES` FROM `certificates` WHERE 1 AND `id`='$id' AND `PIN`='$PIN'";
$sql_evaluation = mysqli_query($conn, $sql_evaluation);
if ($sql_evaluation && (mysqli_num_rows($sql_evaluation) > 0)){ 
	$row_evaluation = mysqli_fetch_assoc($sql_evaluation);
  $booking_id = $row_evaluation['booking_id'];
  booking_history('Certificate Verification',"MER Id:{$id}, PIN:{$PIN}","$booking_id");
	?>
    <div class="all">
      <div class="d1">
        <h1>CERTIFICATE</h1>
        <h2>OF COMPLETION</h2>
        <p>This is To Certify That</p>
        <p class="g"><?php echo $row_evaluation['Full_Name']; ?></p>
        <p>Has Successfully Completed The</p>
        <p class="g"><?php echo $row_evaluation['Course_L1']; ?> <?php echo $row_evaluation['Course_L2']; ?></p>
        <p><?php echo $row_evaluation['VENUE']; ?> - <?php echo $row_evaluation['DATES']; ?></p>
        <div class="a">
          <img src="c3.png" alt="">
        </div>
      </div>
      <div class="d2">
        <img src="logo.svg" alt="">
      </div>
    </div>
	<?php
}else{
  booking_history('Err in Certificate Verification',"MER Id:{$id}, PIN:{$PIN}",'');
	?><h1>Please check the certificates PNR</h1><?php
	//exit;
};
?>