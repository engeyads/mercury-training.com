<div class="row">
<div class="col-12">
    <div class="d-block"><?php
require("config.inc.php");
echo 'DB Name: '.$dbname.'<br>';
$sql_withOutDone = "SELECT  `id` from `course_main` WHERE  $main_weeks ";
$sql_withOutDone = $mysqli -> query($sql_withOutDone);
echo 'With Out Done: '.mysqli_num_rows($sql_withOutDone).'<br>';

$sql_withDone = "SELECT  `id` from `course_main` WHERE  $main_weeksWithDone ";
$sql_withDone = $mysqli -> query($sql_withDone);
echo 'With Done: '.mysqli_num_rows($sql_withDone).'<br>';

$sql_tempCourse = "SELECT  `id` from `temp-course`";
$sql_tempCourse = $mysqli -> query($sql_tempCourse);
echo 'temp-course: '.mysqli_num_rows($sql_tempCourse).'<br>';
echo 'Year: '.$year.'<br>';
?>
    </div>
  </div>
  <div class="col-12">
    <div class="d-block">
    Change Year
    <form action="" method="get">
    <input type="hidden" name='page' value="add_to_plane-2019"/>
<input type="text" name='year' value="<?php echo $year;?>"/>
<button type="submit" class="btn btn-primary">Change</button>
</form>
</div>
  </div>



  <div class="col-12">
    <div class="d-block">
      <a href="?page=add_to_plane-empty_SESSION" class="btn btn-block btn-primary m-3"><i class="fa fa-plus" aria-hidden="true"></i> Add <?php echo $year; ?> Plane</a>
    </div>
  </div>


  <div class="col-12">
    <div class="d-block">
      <a href="?page=add_to_plane-tempCourseCheck" class="btn btn-block btn-primary m-3">Temp Course Check</a>
    </div>
  </div>

  <?php if(!empty($_SESSION['sum_x_class_A'])){ ?>
  <div class="col-12">
    <div class="d-block">
      <a href="?page=add_to_plane-add_plan_step1" class="btn btn-block btn-primary m-3">Continuo</a>
    </div>
  </div>
  
  <?php }?>
  
</div>


