<?php
require("../config.inc.php");
$sql_course_ar_c = "SELECT `id` FROM  `course_main` WHERE `c_id` = '{$_GET[ref_number_only]}' ";


$result_course_ar_c = mysql_query($sql_course_ar_c, $conn);
if ($result_course_ar_c && (mysql_num_rows($result_course_ar_c) > 0)) {
	$row_course_ar_c = mysql_fetch_assoc($result_course_ar_c);
	$id1 =htmlspecialchars($row_course_ar_c['id']);
	?><?php

};



$_GET[CITY] = str_replace('andnbsp',' ',$_GET[CITY]);
$sql_course_ar_c = "SELECT `course`.`certain`,
`course`.`id`,`course`.`c_id`,`course`.`d1`,`course`.`m1`,`course`.`y1`,`course`.`d2`,`course`.`m2`,`course`.`y2`,`cities`.`name`
FROM  `course` join `cities` on `course`.`city` = `cities`.`id` WHERE `c_id` = '{$_GET[ref_number_only]}' and `d1` = '$_GET[start_d]' and `m1` = '$_GET[start_m]' and `y1` = '$_GET[start_y]' and `d2` = '$_GET[end_d]' and `m2` = '$_GET[end_m]' and `y2` = '$_GET[end_y]' and `name` = '$_GET[CITY]'";


$result_course_ar_c = mysql_query($sql_course_ar_c, $conn);
if ($result_course_ar_c && (mysql_num_rows($result_course_ar_c) > 0)) {
	$row_course_ar_c = mysql_fetch_assoc($result_course_ar_c);
	$id =htmlspecialchars($row_course_ar_c['id']);
	if($row_course_ar_c['certain'] == 'on'){ ?>
	<span style="font-weight:bold;color:#090">Upcoming</span>
	<?php }else{
		?><a href="<?php echo $site_course_link_b_admin_link; ?>index.php?page=course-edit&id=<?php echo $id; ?>&course_main=<?php echo $id1; ?>&amp;ch=1" target="_blank">Add To Upcoming</a><?php
    }

}else{
 ?><span style="color:#F00">not recognized</span><?php	
};


?>