<?php
require("config.inc.php");



$integer =200;

if (isset($_GET['start'] ) and $_GET['start'] !=''){
	$start = addslashes($_GET["start"]);
	$start_get = "&start={$start}";
}else{
	$start = 0;
	$start_get = '';
};
$end = $integer + $start ;
$pageName = 'add_to_plane-tempCourseCheck';

if (isset($_GET['course_c']) and $_GET['course_c'] != '' ){
	$course_c = addslashes($_GET['course_c']);
	$main .= "AND `course_c` ='$course_c'";
	$main_get .= "&amp;course_c=$course_c";
};

if (isset($_GET['city']) and $_GET['city'] != '' ){
	$city = addslashes($_GET['city']);
	$main .= "AND `city` ='$city'";
	$main_get .= "&amp;city=$city";
};

if (isset($_GET['price']) and $_GET['price'] != '' ){
	$price = addslashes($_GET['price']);
	$main .= "AND `price` ='$price'";
	$main_get .= "&amp;price=$price";
};

if (isset($_GET['c_id']) and $_GET['c_id'] != '' ){
	$c_id = addslashes($_GET['c_id']);
	$main .= "AND `c_id` ='$c_id'";
	$main_get .= "&amp;c_id=$c_id";
};

if (isset($_GET['d1']) and $_GET['d1'] != '' ){
	$d1 = addslashes($_GET['d1']);
	$main .= "AND `d1` ='$d1'";
	$main_get .= "&amp;d1=$d1";
};

if (isset($_GET['d2']) and $_GET['d2'] != '' ){
	$d2 = addslashes($_GET['d2']);
	$main .= "AND `d2` ='$d2'";
	$main_get .= "&amp;d2=$d2";
};

if (isset($_GET['m1']) and $_GET['m1'] != '' ){
	$m1 = addslashes($_GET['m1']);
	$main .= "AND `m1` ='$m1'";
	$main_get .= "&amp;m1=$m1";
};

if (isset($_GET['m2']) and $_GET['m2'] != '' ){
	$m2 = addslashes($_GET['m2']);
	$main .= "AND `m2` ='$m2'";
	$main_get .= "&amp;m2=$m2";
};

if (isset($_GET['y1']) and $_GET['y1'] != '' ){
	$y1 = addslashes($_GET['y1']);
	$main .= "AND `y1` ='$y1'";
	$main_get .= "&amp;y1=$y1";
};

if (isset($_GET['y2']) and $_GET['y2'] != '' ){
	$y2 = addslashes($_GET['y2']);
	$main .= "AND `y2` ='$y2'";
	$main_get .= "&amp;y2=$y2";
};



?>
<div class="row">
  <div class="col-12">
    <div class="d-block">
      <a href="?page=add_to_plane-add_plan_step2" class="btn btn-block btn-primary m-3">Next Step</a>
    </div>
  </div>  
</div>
<form action="" method="get">
<input type="hidden" name='page' value="<?php echo $pageName; ?>"/>
<table width="100" class="table">
<tr>
<th>c_id</th>
<th>d1</th>
<th>m1</th>
<th>y1</th>
<th>d2</th>
<th>m2</th>
<th>y2</th>
<th>city</th>
<th>price</th>
</tr>
<tr>
<td><input type="text" name='c_id' value="<?php if(!empty($_GET['c_id'])){ echo $_GET['c_id']; } ?>"/></td>
<td><input type="text" name='d1' value="<?php if(!empty($_GET['d1'])){echo $_GET['d1']; }; ?>"/></td>
<td><input type="text" name='m1' value="<?php if(!empty($_GET['m1'])){echo $_GET['m1']; }; ?>"/></td>
<td><input type="text" name='y1' value="<?php if(!empty($_GET['y1'])){echo $_GET['y1']; }; ?>"/></td>
<td><input type="text" name='d2' value="<?php if(!empty($_GET['d2'])){echo $_GET['d2']; }; ?>"/></td>
<td><input type="text" name='m2' value="<?php if(!empty($_GET['m2'])){echo $_GET['m2']; }; ?>"/></td>
<td><input type="text" name='y2' value="<?php if(!empty($_GET['y2'])){echo $_GET['y2']; }; ?>"/></td>
<td><input type="text" name='city' value="<?php if(!empty($_GET['city'])){echo $_GET['city']; };; ?>"/></td>
<td><input type="text" name='price' value="<?php if(!empty($_GET['price'])){echo $_GET['price']; };; ?>"/></td>
</tr>
</table>
<button type="submit" class="btn btn-primary">Search</button>
</form>
<table width="100" class="table">
<tr>
<th>Course Name</th>
<th>course_c Name</th>
<th>Start Date</th>
<th>End Date</th>
<th>Duration</th>
<th>City</th>
<th>Price</th>
<th>Est price</th>
<th>Def price</th>
<th>Def Duration</th>
<th>Day in weak</th>
<th></th>
</tr><?php

// echo $sql_course = "SELECT * FROM `temp-course` where 1 $main ORDER BY `id`";




// Query the database
$sql_course = "SELECT * FROM `temp-course` where 1 $main ORDER BY `id`";
$result_course1 = $mysqli -> query($sql_course);
$numrows = mysqli_num_rows($result_course1);
pagination();
// Query the database
echo $pagination;
$sql_course = "$sql_course LIMIT $start , $integer";



$sql_course = $mysqli -> query($sql_course);
if ($sql_course && (mysqli_num_rows($sql_course) > 0)) {
	while ($row_course = $sql_course-> fetch_assoc()){
		$id = $row_course['id'];
			?>


<?php 
$sql_course_main = "SELECT `name`,`c_id`,`{$weaksColumnsName}` as 'weeks',`course_c` FROM `course_main` WHERE `c_id` = '{$row_course['c_id']}' ";
$sql_course_main = $mysqli -> query($sql_course_main);
if ($sql_course_main && (mysqli_num_rows($sql_course_main) > 0)) {
	$row_course_main = $sql_course_main-> fetch_assoc();
	$weeks = $row_course_main['weeks'];
	$days = ($weeks * 7) -2;
	$date1 = "{$row_course['y1']}-{$row_course['m1']}-{$row_course['d1']}";
	$date2 = "{$row_course['y2']}-{$row_course['m2']}-{$row_course['d2']}";
	$diff = abs(strtotime($date2) - strtotime($date1));
	$duration = floor($diff / (60*60*24))+1;
	$defDays = $duration-$days;
	$thePrice =$row_course['price'];
	$sql_course_c = "SELECT `name`,`class` FROM `course_c` WHERE `id` = '{$row_course_main['course_c']}' ";
	$sql_course_c = $mysqli -> query($sql_course_c);
	if ($sql_course_c && (mysqli_num_rows($sql_course_c) > 0)) {
		$row_course_c = $sql_course_c-> fetch_assoc();
		$class = $row_course_c['class'];
		
	}
	if($class == 'B'){
		$classEx = '_b';
	}elseif($class == 'C'){
		$classEx = '_c';
	}else{
		$classEx = '';
	}
}
$w4_p_b = 'w'.$weeks.'_p'.$classEx;
$sql_cities = "SELECT `id`,`name`,`monday`,`{$w4_p_b}` as 'c_price' FROM `cities` where `id` = '{$row_course['city']}'";
$sql_cities = $mysqli -> query($sql_cities);
if ($sql_cities && (mysqli_num_rows($sql_cities) > 0)) {
	$row_cities = $sql_cities-> fetch_assoc();
	$estPrice = $row_cities['c_price'];
	$priceDEF = $thePrice - $estPrice;
	$monday = $row_cities['monday'];
	$monSun = date("D", strtotime("{$row_course['y1']}-{$row_course['m1']}-{$row_course['d1']}")); 
}
$tableDanger = 0;
if($defDays != 0 or !(($monSun == 'Sun' and $monday == 0) or ($monSun == 'Mon' and $monday == 1)) or $priceDEF!=0){ $tableDanger = 1; }
?>

<tr <?PHP if($tableDanger ==1){ ?>class="table-danger"<?php }?>>
	<td><?php echo $row_course_main['name']; ?> (<?php echo $weeks; ?> weaks) - <?php echo $row_course['c_id']; ?></td><?php
	?><td><?php echo $row_course_c['name']; ?> (<?php echo $row_course_main['course_c']; ?>) 

	<span class="badge badge-secondary ml-2" style="background-color:darkgoldenrod"><?php echo $class; ?></span></td>
	<td><?php echo $date1; ?></td>
	<td><?php echo $date2; ?></td>
	<td><?php echo $duration; ?></td>
	<td><?php echo $row_cities['name']; ?> - <?php echo $row_course['city']; echo ' '; if($monday == 1){ ?><span class="badge badge-secondary ml-2" style="background-color:darkgoldenrod">Monday</span><?php }?></td>
	<td><?php echo $estPrice; ?></td>
	<td><?php echo $thePrice; ?></td>
	<td><?php echo $priceDEF; ?></td>

	<td <?php if($defDays != 0){ ?>class="text-danger"<?php }; ?>><?php echo $duration-$days; ?></td>			
	<td <?php if(!(($monSun == 'Sun' and $monday == 0) or ($monSun == 'Mon' and $monday == 1))){ ?>class="text-danger"<?php }; ?>><?php echo $monSun; ?></td>


	<td>
                                            <div class="modal fade" id="exampleModa<?php echo $id ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delet Course</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body text-danger">
                      Are you sure you want to delete course
                    </div>
                    <div class="modal-footer">
                      <button type="button " class="btn btn-secondary btn-no" data-dismiss="modal">NO</button>
                      <span class="b-remove"><a type="button" class="btn btn-primary" href="?page=temp-course-del&id=<?php
					  
					  echo $id.$main_get.$order_get.$ASC_get.$numberOfRows_get.$start_get;
					     ?>" target="_blank">Yes</a></span>
                    </div>
                  </div>
                </div>
              </div>
             								<button type="button table-remove" data-toggle="modal" data-target="#exampleModa<?php echo $id ;?>"><i class="ti-trash"></i></button></td>
</tr><?php
	}

?>
</table>
<?php echo $pagination; ?>
<div class="row">
  <div class="col-12">
    <div class="d-block">
      <a href="?page=add_to_plane-add_plan_step2" class="btn btn-block btn-primary m-3">Next Step</a>
    </div>
  </div>  
</div>
<?php }
?>

