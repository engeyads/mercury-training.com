<?php
//$page = $_GET['page'];
//$page = str_replace('/','',$page);
$page = str_replace('-','/',$page);
if($id == ''){$id = $_POST[id];}
if($PIN == '') {$PIN= $_POST[PIN];}
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
$aa = to10($page);
$PIN = substr($aa,-$pin_len);
$id = substr($aa,0,-$pin_len);

$sql_evaluation = "SELECT * FROM `certificates` WHERE 1 AND `id`='$id' AND `PIN`='$PIN'";
$sql_evaluation = mysqli_query($conn, $sql_evaluation);
if ($sql_evaluation && (mysqli_num_rows($sql_evaluation) > 0)){ 
	$row_evaluation = mysqli_fetch_assoc($sql_evaluation);
  $booking_id = $row_evaluation['booking_id'];
  booking_history('Certificate Verification',"MER Id:{$id}, PIN:{$PIN}","$booking_id");
	?>
    <div class="cer">
            <aside>
                 <img src="logo.svg" alt="">
            </aside>
            <div class="text">
                <h1>certificate</h1>
                <h2>of completion</h2>
                <div class="info">
                    <p class="info1">This is To Certify That</p>
                    <p class="s"><?php echo $row_evaluation['Full_Name']; ?></p>
                    <p class="info1">Has Successfully Completed The</p>
                    <p class="s"><?php echo $row_evaluation['Course_L1']; ?> <?php echo $row_evaluation['Course_L2']; ?></p>
                    <p class="info1"><?php echo $row_evaluation['VENUE']; ?> - <?php echo $row_evaluation['DATES']; ?></p>
                </div>
                <div class="e"> 
                    <img src="c3.png" alt="">
                </div>
            </div>
            

        </div>
	<?php
}else{
  booking_history('Err in Certificate Verification',"MER Id:{$id}, PIN:{$PIN}",'');
	?><h1>Please check the certificates PNR</h1><?php
	//exit;
};

?>