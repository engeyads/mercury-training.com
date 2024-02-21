<meta charset="UTF-8"><?php
$main = '';
$addtocitytablename = '';

if($_GET['Max_Records'] !=''){
	$integer =$_GET['Max_Records']*$_GET['view_one_of'];
}else{
	$integer =1000000;
}

if($_GET["view_one_of"] !=''){ $view_one_of = $_GET["view_one_of"]; }else{ $view_one_of = 1;}

//if($_GET[Year_off] !=''){ $main .= " And `y1` = '{$_GET[Year_off]}' "; }
//if($_GET[Month_off] !=''){ $main .= " And `m1` = '{$_GET[Month_off]}' "; }

//if ($_GET['city'] != ''){ $city = $_GET['city'];$main .= "AND `city` ='$city'"; };

//Main Cities
$is_city = 0;
for ($i = 0; $i <= 11; $i++) {
    if($_GET['city_'.$i] !=''){
		if($is_city !=0){ $main .=' or '; }else{ $main .=' and ( '; }
		$main .=" `city` ='{$_GET['city_'.$i]}'";
		$is_city++;
	};
}
if($is_city !=0){ $main .=' )'; }
//End Main Cities


//Main Cities remove
$is_city_remove = 0;
for ($i = 0; $i <= 11; $i++) {
    if($_GET['Remove_city_remove_'.$i] !=''){
		$main .=" and `city` !='{$_GET['Remove_city_remove_'.$i]}'";
		$is_city_remove++;
	};
}
//End Main Cities remove


$exp_array = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','x','y','z');
//Main REF
$is_c_id = 0;
for ($i = 0; $i <= 11; $i++) {
    if($_GET['c_id_'.$i] !=''){
		if($is_c_id !=0){ $main .=' or '; }else{ $main .=' and ( '; }
		$ref_str = str_replace($exp_array,'',$_GET['c_id_'.$i]);
		$main .=" `course`.`c_id` ='{$ref_str}'";
		$is_c_id++;
	};
}
if($is_c_id !=0){ $main .=' )'; }
//End Main REF


//Main REF remove
$is_c_id_remove = 0;
for ($i = 0; $i <= 11; $i++) {
    if($_GET['Remove_c_id_remove_'.$i] !=''){
		$ref_str = str_replace($exp_array,'',$_GET['Remove_c_id_remove_'.$i]);
		$main .=" and `course`.`c_id` !='{$ref_str}'";
		$is_c_id_remove++;
	};
}
//End Main REF remove


//Main course_c
$is_course_c = 0;
for ($i = 0; $i <= 11; $i++) {
    if($_GET['course_c_'.$i] !=''){
		if($is_course_c !=0){ $main .=' or '; }else{ $main .=' and ( '; }
		$main .=" `course_c` ='{$_GET['course_c_'.$i]}'";
		$is_course_c++;
	};
}
if($is_course_c !=0){ $main .=' )'; }
//End Main course_c


//Main Cities remove
$is_course_c_remove = 0;
for ($i = 0; $i <= 11; $i++) {
    if($_GET['Remove_course_c_remove_'.$i] !=''){
		$main .=" and `course_c` !='{$_GET['Remove_course_c_remove_'.$i]}'";
		$is_course_c_remove++;
	};
}
//End Main Cities remove


//Main Month
$is_month = 0;
for ($i = 0; $i <= 11; $i++) {
    if($_GET['Month_'.$i] !=''){
		if($is_month !=0){ $main .=' or '; }else{ $main .=' and ( '; }
		$main .=" `m1` ='{$_GET['Month_'.$i]}'";
		$is_month++;
	};
}
if($is_month !=0){ $main .=' )'; }
//End Main Month

//Main Month remove
$is_Month_remove = 0;
for ($i = 0; $i <= 11; $i++) {
    if($_GET['Month_Remove_'.$i] !=''){
		$main .=" and `m1` !='{$_GET['Month_Remove_'.$i]}'";
		$is_Month_remove++;
	};
}
//End Main Month remove

//Main Year
$is_Year = 0;
for ($i = 0; $i <= 11; $i++) {
    if($_GET['Year_'.$i] !=''){
		if($is_Year !=0){ $main .=' or '; }else{ $main .=' and ( '; }
		$main .=" `y1` ='{$_GET['Year_'.$i]}'";
		$is_Year++;
	};
}
if($is_Year !=0){ $main .=' )'; }
//End Main Year


//Main Year remove
$is_Year_remove = 0;
for ($i = 0; $i <= 11; $i++) {
    if($_GET['Year_Remove_'.$i] !=''){
		$main .=" and `y1` !='{$_GET['Year_Remove_'.$i]}'";
		$is_Year_remove++;
	};
}
//End Main Year remove



//echo $main; exit;
//if ($_GET['m']!= ''){ $m = $_GET['m'];$main .= "AND `m1` ='$m'"; };
//if ($_GET['course_c'] != '' ){ $course_c = $_GET['course_c'];$main .= "AND `course_c` ='$course_c'"; };



require("../../config.inc.php");

if($arabic_month == 1){
	$months = array('','يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو', 'يوليو', 'اغسطس', 'سبتمبر', 'اكتوبر', 'نوفمبر', 'ديسمبر');
}else{
	$months = array('','Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
}


$cat=array('');
$sql_course_c = "SELECT * FROM `course_c`";
$result_course_c = mysql_query($sql_course_c, $conn);
if ($result_course_c && (mysql_num_rows($result_course_c) > 0)) {
	while ($row_course_c = mysql_fetch_assoc($result_course_c)){
		$cat = array_merge($cat,array("$row_course_c[id]"=> "$row_course_c[sh]"));
	}
}

$cat_name=array('');
$sql_course_c = "SELECT * FROM `course_c`";
$result_course_c = mysql_query($sql_course_c, $conn);
if ($result_course_c && (mysql_num_rows($result_course_c) > 0)) {
	while ($row_course_c = mysql_fetch_assoc($result_course_c)){
		$cat_name = array_merge($cat_name,array("$row_course_c[id]"=> "$row_course_c[name]"));
	}
}



$sql_course = "SELECT `course`.`id`, `course`.`price`,`course`.`c_id`, `course`.`d1`, `course`.`m1`, `course`.`y1`, `course`.`d2`, `course`.`m2`, `course`.`y2`, `course`.`city`, `course_main`.`name`, `course_main`.`week`, `course_main`.`course_c` ,`course`.`id` As a,'1' As b $field FROM `course` LEFT JOIN `course_main` ON `course_main`.`c_id` = `course`.`c_id`
WHERE `visible` ='on' $main  ORDER BY `y1` ASC , `m1` ASC , `d1` ASC ,`id` LIMIT 0 , $integer";
$result_course = mysql_query($sql_course, $conn) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql_course . "<br />\nError: (" . mysql_errno() . ") " . mysql_error()); 
$bb = 0;
$nnn = 0;
$m1 = 1;
if ($result_course && (mysql_num_rows($result_course) > 0)) {
	?><table><?php
	while ($row_course = mysql_fetch_assoc($result_course)){
		$nnn++;
		if($nnn >= $view_one_of){
			$id_course = $row_course['c_id'];
			$course_c = $row_course['course_c'];
			$id = $row_course['a'];
			$corse_name = $row_course['name'];
			$corse_name = str_replace('&','&amp;',$corse_name);
			$corse_name = str_replace('&&amp;','&amp;',$corse_name);
	
			if($row_course['city']!=''){ 
				$city = $row_course['city'];
				$sql_select_test1 = "SELECT * FROM `cities` WHERE 1 $addtocitytablemain AND `id` = '$city'";
				$result_select_test1 = mysql_query($sql_select_test1, $conn);
				if ($result_select_test1 && (mysql_num_rows($result_select_test1) > 0)) {
					$row_select_test1 = mysql_fetch_assoc($result_select_test1);
					$name_city = $row_select_test1['name'];
				};
			}else{ $name_city = '&nbsp;'; };
			if($_GET[v_full_city] ==1){
				$name_city1 = explode('******',$name_city);
			}else{
				$name_city1 = str_replace(" ",'',$name_city);		
				$name_city1 = explode('(',$name_city1);
			}
			
			
			
			
			if($_GET[v_s_e_date] ==1){
				$date = $row_course['d1'].' '.$months[$row_course['m1']];
				if($_GET[v_year] ==1){
					$date .=' '.$row_course['y1'];
				}
				$date .='&emsp;';
				$date .= $row_course['d2'].' '.$months[$row_course['m2']];
				if($_GET[v_year] ==1){
					$date .=' '.$row_course['y2'];
				}
			}else{
				if($row_course['m1'] == $row_course['m2']){ 
					$date = $row_course['d1'].' - '.$row_course['d2'].' '.$months[$row_course['m1']];
				}else{
					$date = $row_course['d1'].' '.$months[$row_course['m1']].' - '.$row_course['d2'].' '.$months[$row_course['m2']];
				}
				if($_GET[v_year] ==1){
					$date .=' '.$row_course['y1'];
				}
			}
			
			
			if($_GET[Month_separator] ==1){
				if($row_course['m1'] != $m1){ echo '<br /><br /><br /><br />';}
			}
			
			$course_ref = $cat[$row_course['course_c']];
			$course_cat = $cat_name[$row_course['course_c']];
			$course_ref .= $row_course['c_id'];
			$course_fees = $row_course['price'];
			$city_name = $name_city1[0];
			$city_full_name = $name_city;
			$date_year = $row_course['y1'];
			$corse_name_link = "<a href=\"{$site_course_link_a}{$id}{$site_course_link_b}#\" target=\"_blank\">".$corse_name.'</a>';
			$pdf_link = "<a href=\"{$site_course_link_pdf}{$id}{$site_course_link_pdf_b}#\" target=\"_blank\">".'PDF'.'</a>';
			if($_GET[format] == ''){
				?><tr><td><?php
				echo $name_city1[0];
				echo '</td><td>'; //echo '&emsp;';
				
				echo $date;
				echo '</td><td>'; //echo '&emsp;';
						
				echo $corse_name;
				if($_GET[v_ref] == 1){
					if($_GET[v_ref11] == 1){ echo ' ('; }else{
						echo '</td><td>'; //echo '&emsp;';
					}
					echo $cat[$row_course['course_c']];
					echo $row_course['c_id'];
					if($_GET[v_ref11] == 1){ echo ')'; }
				}
				
				if($_GET[v_fees] == 1){
					echo '</td><td>'; //echo '&emsp;';
					echo $row_course['price'];
					if($_GET[v_fees] == 1){
						echo '&nbsp;&euro;';
					}
				}
				?></td></tr><?php
			}else{
				?><tr><td><?php
				$format = $_GET[format];
                //$format = str_replace('!' ,'#', $format);
				//$format = str_replace(' ','&emsp;',$format);
				$search_array = array('^','CI','CC','CA','DA','RE','FE','NA','LN','PD','CR');
				$replace_array = array('</td><td>',$city_name,$city_full_name,$course_cat,$date,$course_ref,$course_fees,$corse_name,$corse_name_link,$pdf_link,'&nbsp;&euro;');
				
				$format = str_replace($search_array ,$replace_array, $format);
				/**
				$format = str_replace($format);
				$format = str_replace($format);
				$format = str_replace($format);
				$format = str_replace($format);
				$format = str_replace($format);
				$format = str_replace($format);
				$format = str_replace($format);
				$format = str_replace($format);
				$format = str_replace($format);
				$format = str_replace($format);
				$format = str_replace($format);
				**/
				
				
				
				echo $format;
				//echo '<br />';
				?></td></tr><?php
			}
			
			
			
			
			$nnn = 0;
			$bb++;
			
			$m1 = $row_course['m1'];
		}
		
	}
	?><table><?php
};
//echo $bb;
?>
<script type="text/javascript">
alert('<?php echo $bb; ?>');
</script>
