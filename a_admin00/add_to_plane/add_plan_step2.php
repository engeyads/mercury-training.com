<?php
require("config.inc.php");

if(empty($_SESSION['courses_numS2'])){
    $sql_course = "SELECT `id` FROM `temp-course` ";
    $sql_course = $mysqli -> query($sql_course);
    $TotalCourses_numS2 = mysqli_num_rows($sql_course);
    $_SESSION['courses_numS2'] = $TotalCourses_numS2;
}else{
    $TotalCourses_numS2 = $_SESSION['courses_numS2'];
}

$sql_course = "SELECT `id` FROM `temp-course` ";
$sql_course = $mysqli -> query($sql_course);
$restCourses_num = mysqli_num_rows($sql_course);
$effectidCourses_num = $TotalCourses_numS2-$restCourses_num;


echo "{$effectidCourses_num} from {$TotalCourses_numS2} courses has been added";
echo '... :)';
$percentage = floor($effectidCourses_num*100/$TotalCourses_numS2);
echo ' '.$percentage.' %';
echo '<br>';
?>
<div class="container">
<div class="row"><div class="progress col-12">
<div class="progress-bar" role="progressbar" style="width: <?php echo $percentage; ?>%;" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $percentage; ?>%</div>
</div></div>
</div><?php

$sql_course = "SELECT * FROM `temp-course` ORDER BY RAND() LIMIT 0,1000 ";
$sql_course = $mysqli -> query($sql_course);
if ($sql_course && (mysqli_num_rows($sql_course) > 0)) {
	while ($row_course = $sql_course-> fetch_assoc()){
		$id    = $row_course['id'];
		$c_id  = $row_course['c_id'];
		$d1    = $row_course['d1'];
		$m1    = $row_course['m1'];
		$y1    = $row_course['y1'];
		$d2    = $row_course['d2'];
		$m2    = $row_course['m2'];
		$y2    = $row_course['y2'];
		$city  = $row_course['city'];
		$price = $row_course['price'];
		$city  = $row_course['city'];

		$aa =  "INSERT INTO `course` (`id`, `c_id`   , `d1`  , `m1`  , `y1`    , `d2`   , `m2`   , `y2`   , `city`   , `price`   , `visible`) 
        VALUES                       (NULL, '{$c_id}', '{$d1}', '{$m1}', '{$y1}', '{$d2}', '{$m2}', '{$y2}', '{$city}', '{$price}', 'on'     );";
        // echo $aa;exit;
        $result = $mysqli -> query($aa);

        if (!$result) {
            ?><div class="alert alert-danger" role="alert">
          <?php
            echo $aa; echo '<br>';
            echo $err = $mysqli->error;
            ?></div><?php
            exit;
        }

		$aaDELETE =  "DELETE FROM `temp-course` WHERE `temp-course`.`id` = '{$id}'";
        $mysqli -> query($aaDELETE);
        
	}
}

//exit; 


if($restCourses_num > 0){ ?><meta http-equiv="refresh" content="0;URL=?page=add_to_plane-add_plan_step2&nn=<?php echo rand(); ?>&amp;percentage=<?php echo $percentage; ?>" /><?php }else{ ?>HHHHHHH :) <br />
<br />
<br />
<br />
<h1 style="text-align:center;color:#900;font-size:72px">All is done <br />
Go to your home happy</h1><?php
$_SESSION['sum_x_class_A']   = null;
$_SESSION['sum_x_class_B']   = null;
$_SESSION['sum_x_class_C']   = null;
$_SESSION['class_A_array']   = null;
$_SESSION['class_B_array']   = null;
$_SESSION['class_C_array']   = null;
$_SESSION['main_class_A']    = null;
$_SESSION['main_class_B']    = null;
$_SESSION['main_class_C']    = null;
$_SESSION['courses_num']     = '';
$_SESSION['courses_add_num'] = '';
$_SESSION['acceptednn'] = '';
$_SESSION['rejectednn'] = '';
$_SESSION['courses_numS2'] = '';

?><?php 


$aa = "ALTER TABLE `temp-course` AUTO_INCREMENT = 0;";
$mysqli -> query($aa);
}
?>