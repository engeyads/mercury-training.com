<div align="center" class="title">
<p><strong>إدارة  البرامج </strong>
<?php
  
$integer =30;
if ( isset($_GET['start'] )){
	$start = $_GET["start"];
}else{
	$start = 0;
};
$start ;
$end = $integer + $start ;
// Query the database
$sql_course_ar_c1 = "SELECT * FROM `course` $main ORDER BY `id` ASC";
$result_course_ar_c1 = $mysqli -> query($sql_course_ar_c1);
$numrows = mysqli_num_rows($result_course_ar_c1);  
	  
// Query the database
$sql_course_ar_c = "$sql_course_ar_c1 LIMIT $start , $integer";
$result_course_ar_c = $mysqli -> query($sql_course_ar_c);
?>
<br />
<br />
<table width="100%" cellpadding="0" cellspacing="0" class="tt" dir="rtl">
  <tr>
    <td colspan="2" background="background.jpg"><div align="left">البرنامج</div></td>
    <td background="background.jpg">&nbsp;</td>
    <td width="6%" background="background.jpg"><div align="center"><img src="background.jpg" width="4" height="49"></div></td>
    <td width="2%" background="background.jpg"><div align="center"></div></td>
    <td width="2%" background="background.jpg"><input type="checkbox" name="all" id="all" onchange="
if(document.getElementById('all').checked==true){
<?php        
    for($i=1;$i<=$integer;$i++){
		$idi = "id".$i;
		$$idi = $_GET["id".$i];
	?>document.getElementById('checkbox<?php echo $$idi; ?>').checked=true;<?php
	};
    ?>
    
}else{
	<?php        
    for($i=1;$i<=$n;$i++){
		$idi = "id".$i;
		$$idi = $_GET["id".$i];
	?>document.getElementById('checkbox<?php echo $$idi; ?>').checked=false;<?php
	};
    ?>
}; " /></td>
  </tr>
<?php
if ($result_course_ar_c && (mysqli_num_rows($result_course_ar_c) > 0)) {
	while ($row_course_ar_c = $result_course_ar_c-> fetch_assoc()){
		$id =htmlspecialchars($row_course_ar_c['id']);
		$name =htmlspecialchars($row_course_ar_c['name']);
		?><tr>
  <tr <?php if($visible=="0"){ echo "bgcolor='#333333'"; }; ?>>
    <td height="30" colspan="2" class="row"><div align="left"><a href="?page=course/edit&id=<?php echo $id ;?>" ><?php echo $name ; ?></a></div></td>
    <td width="8%" class="row"><div align="center"><?php echo $id ; ?></div></td>
<td height="30" class="row"><div align="center"><a href="?page=course/edit&id=<?php echo $id ;?>">
			<img src="../images/edit.gif" alt="Edit" border="0" /></a></div></td>
    <td height="30" class="row"><div align="center"><a href="?page=course/del&id=<?php echo $id ;?>" onclick="return confirmcourse_ar_c(this, 'Delete Item <?php echo $name;?>')"><img src="../images/del.gif" alt="Del" width="10" height="10" border="0" /></a></div></td>
    <td height="30" class="row"><input type="checkbox" name="checkbox<?php echo $$idi; ?>" id="checkbox<?php echo $$idi; ?>" /></td>
  </tr>
		<?php
	}
}else{ echo " There are no Items to display "; };
 ?>
  <tr>
    <td colspan="6" background="background.jpg" class="row"></td>
  </tr>
  <tr>
    <td colspan="6" background="background.jpg"><div align="center"><?php 
	if($start>0){
			?><a href="?page=course/view&start=<?php echo $start - $integer ; ?><?php if ( isset($_GET['id_course_ar_c_c'] )){ echo "&id_course_ar_c_c=$id_course_ar_c_c"; }; ?><?php if ( isset($_GET['id_course_ar_c'] )){ echo "&id_course_ar_c=$id_course_ar_c"; }; ?>"  class="linlk">Previous</a>
			<?php
		};
	if($numrows>$end and $start>0){ echo " - ";};
		if($numrows>$end){
		?><a href="?page=course/view&start=<?php echo $integer + $start; ?><?php if ( isset($_GET['id_course_ar_c_c'] )){ echo "&id_course_ar_c_c=$id_course_ar_c_c"; }; ?><?php if ( isset($_GET['id_course_ar_c'] )){ echo "&id_course_ar_c=$id_course_ar_c"; }; ?>"  class="linlk">Next</a><?php
	};
	?></div>
</td>
  </tr>
</table><?php
$div = $numrows%$integer;
$totalPages=$numrows/$integer;
if($div != 0){ $totalPages = $totalPages+1; };
if($totalPages > 1) {
	for($i = 1; $i <= $totalPages; $i++) {
			$st = $integer*$i-$integer; $no =$i;
			$str .= " 
			<a href=\"?page=course/view&start={$st}{$main_get}{$order_get}{$ASC_get}\">$no</a>";
			$str .= $i != $totalPages ? "  " : "";
		}
}
echo  $str;
?>
<br><br><br>