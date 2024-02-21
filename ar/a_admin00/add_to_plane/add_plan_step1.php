<?php
require("config.inc.php");

$start_date = "1-1-{$year}";
$start = strtotime($start_date); // your start/end dates here
$end = strtotime("$start_date + 1 years");
$firstDayInYear = date("D", strtotime("{$start_date}")); echo '<br>';
$sundayCorect = 0;
if($firstDayInYear == 'Fri' or $firstDayInYear == 'Sat' or $firstDayInYear == 'Sun'){
	$sundayCorect = 1;
}
// echo '<br>$sundayCorect: '.$sundayCorect.'<br>';
$mondayCorect = 0;
if($firstDayInYear == 'Mon' or $firstDayInYear == 'Sat' or $firstDayInYear == 'Sun'){
	$mondayCorect = 1;
}

$main_weeks = "(`{$weaksColumnsName}` = '1' or `{$weaksColumnsName}` = '2' or `{$weaksColumnsName}` = '3' or `{$weaksColumnsName}` = '4')  and `done` !='{$year}'";

if(is_null($_SESSION['acceptednn'])){ $_SESSION['acceptednn'] = ''; }
if(is_null($_SESSION['rejectednn'])){ $_SESSION['rejectednn'] = ''; }

if(is_null($_SESSION['sum_x_class_A']) or is_null($_SESSION['sum_x_class_B']) or is_null($_SESSION['sum_x_class_C'])){
	// sum_x_class_A,sum_x_class_B,sum_x_class_C
	$sql_sum = "SELECT sum( `x` ) AS 'sum_x', sum( `x_b` ) AS 'sum_x_b', sum( `x_c` ) AS 'sum_x_c'  FROM `cities` ";
	$sql_sum = $mysqli -> query($sql_sum);
	if ($sql_sum && (mysqli_num_rows($sql_sum) > 0)) {
		$row_sum = $sql_sum-> fetch_assoc();
		$sum_x_class_A = $row_sum['sum_x'];
		$sum_x_class_B = $row_sum['sum_x_b'];
		$sum_x_class_C = $row_sum['sum_x_c'];
	}

	$_SESSION['sum_x_class_A'] = $sum_x_class_A;
	$_SESSION['sum_x_class_B'] = $sum_x_class_B;
	$_SESSION['sum_x_class_C'] = $sum_x_class_C;
}else{
	 $sum_x_class_A = $_SESSION['sum_x_class_A'];
	 $sum_x_class_B = $_SESSION['sum_x_class_B'];
	 $sum_x_class_C = $_SESSION['sum_x_class_C'];
}

if(
	empty($_SESSION['class_A_array']) or 
	empty($_SESSION['class_B_array']) or 
	empty($_SESSION['class_C_array']) or 
	empty($_SESSION['main_class_A']) or 
	empty($_SESSION['main_class_B']) or 
	empty($_SESSION['main_class_C'])
){
	//Courses Num class_A
	$sql_course_c_class_A = "SELECT  `id` FROM `course_c` where `class` = 'A' ";
	$sql_course_c_class_A = $mysqli -> query($sql_course_c_class_A);
	$class_A_array = array();
	$main_class_A = '1=2 ';
	if ($sql_course_c_class_A && (mysqli_num_rows($sql_course_c_class_A) > 0)) {
		while ($row_course_c_class_A = $sql_course_c_class_A-> fetch_assoc()){
			$main_class_A .= " or `course_c` = '{$row_course_c_class_A['id']}'";
			$class_A_array[] = $row_course_c_class_A['id'];
		}
	}


	//Courses Num class_B
	$sql_course_c_class_B = "SELECT  `id` FROM `course_c` where `class` = 'B' ";
	$sql_course_c_class_B = $mysqli -> query($sql_course_c_class_B);
	$main_class_B = '1=2 ';
	$class_B_array = array();
	if ($sql_course_c_class_B && (mysqli_num_rows($sql_course_c_class_B) > 0)) {
		while ($row_course_c_class_B = $sql_course_c_class_B-> fetch_assoc()){
			$main_class_B .= " or `course_c` = '{$row_course_c_class_B['id']}'";
			$class_B_array[] = $row_course_c_class_B['id'];
		}
	}


	//Courses Num class_C
	$sql_course_c_class_C = "SELECT  `id` FROM `course_c` where `class` = 'C' ";
	$sql_course_c_class_C = $mysqli -> query($sql_course_c_class_C);
	$main_class_C = '1=2 ';
	$class_C_array = array();
	if ($sql_course_c_class_C && (mysqli_num_rows($sql_course_c_class_C) > 0)) {
		while ($row_course_c_class_C = $sql_course_c_class_C-> fetch_assoc()){
			$main_class_C .= " or `course_c` = '{$row_course_c_class_C['id']}'";
			$class_C_array[] = $row_course_c_class_C['id'];
		}
	}
	$_SESSION['main_class_A']  = $main_class_A ;
	$_SESSION['main_class_B']  = $main_class_B ;
	$_SESSION['main_class_C']  = $main_class_C ;
	$_SESSION['class_A_array'] = $class_A_array;
	$_SESSION['class_B_array'] = $class_B_array;
	$_SESSION['class_C_array'] = $class_C_array;
}else{
	$main_class_A  = $_SESSION['main_class_A'] ;
	$main_class_B  = $_SESSION['main_class_B'] ;
	$main_class_C  = $_SESSION['main_class_C'] ;
	$class_A_array = $_SESSION['class_A_array'];
	$class_B_array = $_SESSION['class_B_array'];
	$class_C_array = $_SESSION['class_C_array'];
}
if(empty($_SESSION['courses_num'])){
	//number of courses in class A
	$num_rows_all_courses_class_A = mysqli_num_rows($mysqli -> query("SELECT `id` FROM `course_main` WHERE $main_weeks and ($main_class_A) "));
	$courses_num_class_A = $sum_x_class_A * $num_rows_all_courses_class_A;
	//number of courses in class B
	$num_rows_all_courses_class_B = mysqli_num_rows($mysqli -> query("SELECT `id` FROM `course_main` WHERE $main_weeks and ($main_class_B) "));
	$courses_num_class_B = $sum_x_class_B * $num_rows_all_courses_class_B;
	//number of courses in class B
	$num_rows_all_courses_class_C = mysqli_num_rows($mysqli -> query("SELECT `id` FROM `course_main` WHERE $main_weeks and ($main_class_C) "));
	$courses_num_class_C = $sum_x_class_C * $num_rows_all_courses_class_C;
	//Total courses num
	$courses_num = $courses_num_class_A + $courses_num_class_B + $courses_num_class_C;
	$_SESSION['courses_num'] = $courses_num;
}else{ 
	$courses_num = $_SESSION['courses_num'];
}

if(!empty($_SESSION['courses_add_num'])){
	$totalNumberOfAddCoursesToDB = $_SESSION['courses_add_num']*1;
}else{
	$totalNumberOfAddCoursesToDB = 0;
}
// echo $totalNumberOfAddCoursesToDB = $_SESSION['courses_add_num']; exit;




if(
	is_null($_SESSION['sum_x_class_A']) or 
	is_null($_SESSION['sum_x_class_B']) or 
	is_null($_SESSION['sum_x_class_C']) or
	is_null($_SESSION['class_A_array']) or 
	is_null($_SESSION['class_B_array']) or 
	is_null($_SESSION['class_C_array']) or 
	is_null($_SESSION['main_class_A']) or 
	is_null($_SESSION['main_class_B']) or 
	is_null($_SESSION['main_class_C']) or
	is_null($_SESSION['courses_num']) or
	is_null($_SESSION['acceptednn']) or
	is_null($_SESSION['rejectednn'])
){
	echo 'Err in _SESSION'; exit;
}
echo "{$totalNumberOfAddCoursesToDB} from {$courses_num} courses has been added";
echo '... :)';
$percentage = floor($totalNumberOfAddCoursesToDB*100/$courses_num);
echo ' '.$percentage.' %';
echo '<br>';
?><div class="container">
<div class="row"><div class="progress col-12">
<div class="progress-bar" role="progressbar" style="width: <?php echo $percentage; ?>%;" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $percentage; ?>%</div>
</div></div>
</div><?php
echo 'Accepted: '.$_SESSION['acceptednn'].'<br>';
echo 'Rejected: '.$_SESSION['rejectednn'].'<br>';

// exit; 
// echo $courses_num ;exit;
//course_main start
$sql_course_main = "SELECT `c_id`,`{$weaksColumnsName}` as 'weeks',`id`,`done`,`course_c` FROM `course_main` WHERE $main_weeks ORDER BY RAND() LIMIT 0, 50";
$sql_course_main = $mysqli -> query($sql_course_main);
$nn = 0;
$rejectednn = 0;
$acceptednn = 0;
if ($sql_course_main && (mysqli_num_rows($sql_course_main) > 0)) {
	while ($row_course_main = $sql_course_main-> fetch_assoc()){
		$c_id      = $row_course_main['c_id'];
		$course_id = $row_course_main['id'];
		$weeks     = $row_course_main['weeks'];
		$course_c  = $row_course_main['course_c'];
		
		$addToX = '';
		if (in_array($course_c, $class_A_array)) {
			$addToX = '';
		}elseif (in_array($course_c, $class_B_array)) {
			$addToX = '_b';
		}elseif (in_array($course_c, $class_C_array)) {
			$addToX = '_c';
		}
		
			
		//cities
		$sql_cities = "SELECT `id`,`w1_p{$addToX}` as 'w1_p',`w2_p{$addToX}` as 'w2_p',`w3_p{$addToX}` as 'w3_p',`w4_p{$addToX}` as 'w4_p' ,`x{$addToX}` as 'x', `monday` FROM `cities` where `x{$addToX}` != '0' ORDER BY RAND() ";
		$sql_cities = $mysqli -> query($sql_cities);
		if ($sql_cities && (mysqli_num_rows($sql_cities) > 0)) {
			while ($row_cities = $sql_cities-> fetch_assoc()){
				$cities_id  = $row_cities['id'];
				$x          = $row_cities['x'];
				$price_name = 'w'.$weeks.'_p';
				$the_price  = $row_cities["$price_name"];
				$monday     = $row_cities['monday'];

				//UPDATE `course_main` SET `done` = year
				$aa = "UPDATE `course_main` SET `done` = '{$year}' WHERE `course_main`.`id` = {$course_id}; ";
				$mysqli -> query($aa);
				
				//weaks array
				$bassel_6 = array('0-8','9-17','18-25','26-33','34-43','44-51');
				$bassel_5 = array('0-10','11-20','21-30','31-40','41-51');	
				$bassel_4 = array('0-13','14-26','27-40','40-51');		
				$bassel_3 = array('0-17','18-34','35-51');			
				$bassel_2 = array('0-26','27-51');				
				$bassel_1 = array('0-51');	
				
				$the_bassel = 'bassel_'.$x;
				echo '<br>';
				foreach ($$the_bassel as $value) {
					
					$exp = explode('-',$value);
					//start start Weak Day end Weak Day
					$rand = rand($exp[0],$exp[1]);
					


					//remove here
					// $rand = 9;
					// $weeks = 1;
					// $monday = 0;
					//end remove

					$rand_plus = $rand+$weeks;
					//Monday
					if($monday == 0){
						$startWeakDay = strtotime("Sunday", $start);
						$endWeakDay = strtotime("Thursday", $start);
						$rand_plus = $rand_plus-$sundayCorect;
					}else{
						$startWeakDay = strtotime("monday", $start);
						$endWeakDay = strtotime("Friday", $start);
						$rand_plus = $rand_plus-$mondayCorect;
					}
					
					$startWeakDay = strtotime("+$rand weeks", $startWeakDay);
					$endWeakDay = strtotime("+$rand_plus weeks", $endWeakDay);
					
					
					$s_day   = date("d", strtotime("+0 days", $startWeakDay));
					$s_month = date("m", strtotime("+0 days", $startWeakDay));
					$s_year  = date("Y", strtotime("+0 days", $startWeakDay));
					
					//echo '<br />';
					
					
					$e_day   = date("d", strtotime("+0 days", $endWeakDay));
					$e_month = date("m", strtotime("+0 days", $endWeakDay));
					$e_year  = date("Y", strtotime("+0 days", $endWeakDay));
					//start start Weak Day end Weak Day
					$d = date('d');
					$m = date('m');
					$y = date('y');
					
					$today = date('Y-m-d');
					$coursedate = "{$s_year}-{$s_month}-{$s_day}";
					// $diff = abs(strtotime($today) - strtotime($coursedate));
					// echo '$today: '.$today; echo '<br>';
					// echo '$coursedate: '.$coursedate; echo '<br>';
					if($today > $coursedate) { 
						$rejectednn++;
					}else{
						$aa =  "INSERT INTO `temp-course` (`id`, `c_id`, `d1`, `m1`, `y1`, `d2`, `m2`, `y2`, `city`, `price`, `visible`) VALUES (NULL, '{$c_id}', '{$s_day}', '{$s_month}', '{$s_year}', '{$e_day}', '{$e_month}', '{$e_year}', '{$cities_id}', '{$the_price}', 'on'); ";
						//echo '<br />';
						$mysqli -> query($aa);
						
						$acceptednn++;
					}
					$nn++;
					//remove here
					// echo 'Start Day:'; echo date("d-m-Y", strtotime("+0 days", $startWeakDay));echo '<br>';
					// echo 'End Day:'; echo date("d-m-Y", strtotime("+0 days", $endWeakDay));echo '<br>';
					// echo '<br>';
					// echo 'Monday: '.$monday; echo '<br>';
					// echo 'Cities: '.$cities_id; echo '<br>';
					// echo 'weeks: '.$weeks; echo '<br>';
					// echo $aa; 
					// exit;
					//end remove
				}
			}
		}
		//end cities
	}
}
//course_main end

$_SESSION['courses_add_num'] = $totalNumberOfAddCoursesToDB + $nn;
$_SESSION['acceptednn'] = $_SESSION['acceptednn']  + $acceptednn;
$_SESSION['rejectednn'] = $_SESSION['rejectednn']  + $rejectednn;


if($nn > 0){ ?><meta http-equiv="refresh" content="0;URL=?page=add_to_plane-add_plan_step1&amp;nn=<?php echo rand(); ?>&amp;percentage=<?php echo $percentage; ?>" /><?php }else{
	// echo 'HHHHHHH :) all is done <br /> go to your home happy<br /><br /><br />';




	?><table width="100" class="table"><tr><th>C ID</th><th>Count</th></tr><?php

	$sql_course = "SELECT `c_id`,count(`id`) as 'a'  FROM `temp-course` WHERE `y1` = '{$year}' group by `c_id` ORDER BY `a` DESC ";
	$sql_course = $mysqli -> query($sql_course);
	if ($sql_course && (mysqli_num_rows($sql_course) > 0)) {
		while ($row_course = $sql_course-> fetch_assoc()){
				?><tr><td><?php echo $row_course['c_id']; ?></td><td><?php echo $row_course['a']; ?></td></tr><?php
		}
	}
	?></table>
	
	
	<br />
	<br />
	<br /><?php
	include('tempCourseCheck.php');
}
?>

