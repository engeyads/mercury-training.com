<?php
if(isset($_GET['sort_by_name']) and $_GET['sort_by_name'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
    $order = 'ORDER BY `name` DESC'; $get .= "&sort_by_name=1&desc=1";
  }elseif(isset($_GET['sort_by_name']) and $_GET['sort_by_name'] == 1){
    $order = 'ORDER BY `name` ASC'; $get .= "&sort_by_name=1";
  }elseif(isset($_GET['sort_by_City']) and $_GET['sort_by_City'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
    $order = 'ORDER BY `cityName` DESC'; $get .= "&sort_by_City=1&desc=1";
  }elseif(isset($_GET['sort_by_City']) and $_GET['sort_by_City'] == 1){
    $order = 'ORDER BY `cityName` ASC'; $get .= "&sort_by_City=1";
  }elseif(isset($_GET['sort_by_Start_Date']) and $_GET['sort_by_Start_Date'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
    $order = 'ORDER BY `y1` DESC,`m1` DESC,`d1` DESC'; $get .= "&sort_by_Start_Date=1&desc=1";
  }elseif(isset($_GET['sort_by_Start_Date']) and $_GET['sort_by_Start_Date'] == 1){
    $order = 'ORDER BY `y1`,`m1`,`d1` ASC'; $get .= "&sort_by_Start_Date=1";
  }elseif(isset($_GET['sort_by_End_Date']) and $_GET['sort_by_End_Date'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
    $order = 'ORDER BY `y2` DESC,`m2` DESC,`d2` DESC'; $get .= "&sort_by_End_Date=1&desc=1";
  }elseif(isset($_GET['sort_by_End_Date']) and $_GET['sort_by_End_Date'] == 1){
    $order = 'ORDER BY `y2`,`m2`,`d2` ASC'; $get .= "&sort_by_End_Date=1";
  }else{

    $order='';
  }
  $OrderPage='course';
  $OrderPage1 = 'upcomming';

$sql_course = "SELECT `t`.`id`,`t`.`c_id`,`t`.`d1`,`t`.`m1`,`t`.`y1`,`t`.`d2`,`t`.`m2`,`t`.`y2`,`t`.`city`,`t`.`price`,`t`.`certain`,`t`.`name`,`cities`.`name` as 'cityName', `t`.`course_mainID`, `t`.`courseID` from ( SELECT `course`.`id`,`course`.`c_id`,`course`.`d1`,`course`.`m1`,`course`.`y1`,`course`.`d2`,`course`.`m2`,`course`.`y2`,`course`.`city`,`course`.`price`,`course`.`certain`,`course_main`.`name`,`course_main`.`id` as 'course_mainID',`course`.`id` as 'courseID' FROM `course` JOIN `course_main` on `course_main`.`c_id` = `course`.`c_id` where `course`.`certain` = 'on' and {$oldUpcomming} ) as `t` join `cities` on `t`.`city`=`cities`.`id` $order ";


$result_course = $mysqli -> query($sql_course);
if($view_aa == 1){ 
  $numrows = mysqli_num_rows($result_course);
	?>
    <div class="alert alert-primary" role="alert">
      <h4 class="alert-heading">MSQL</h4>
      <p><?php echo $sql_course; ?></p>
      <p>Numrows: Total: <?php echo $numrows; ?></p>
    <?php if($mysqli->error){
          ?>
          <hr>
      <p class="mb-0"><?php printf("Error message: %s\n", $mysqli->error); ?></p>
          <?php
       } ?>    
    </div>
    <?php
}
?>                    <!-- upcaming table start -->
<div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Upcomming Course Rows ( <?php echo mysqli_num_rows($result_course); ?>)</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table text-center table-hover table-bordered table table-striped">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col"><?php SortBy('sort_by_name','Course Name'); ?></th>
                                <th scope="col"><?php SortBy('sort_by_City','City'); ?></th>
                                <th scope="col"><?php SortBy('sort_by_Start_Date','Start Date'); ?></th>
                                <th scope="col"><?php SortBy('sort_by_End_Date','End Date'); ?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody><?php
if ($result_course && (mysqli_num_rows($result_course) > 0)) {
	while ($row_course = $result_course-> fetch_assoc()){
		?><tr class="table-remove">
        <td><a href="?page=course_main-edit&id=<?php echo $row_course['course_mainID']; ?>"><?php echo $row_course['name']; ?></a></td>
        <td><?php echo $row_course['cityName']; ?></td>
                                                    
                                                    <td><?php echo $row_course['d1'];?>/<?php echo $month_a[$row_course['m1']*1];?>/<?php echo $row_course['y1'];?></td>
                                                    <td><?php echo $row_course['d2'];?>/<?php echo $month_a[$row_course['m2']*1];?>/<?php echo $row_course['y2'];?></td>
                                                    <td>
                                                    
                                                    <ul class="d-flex justify-content-center">
                                                            <li>
                                                            <a href="?page=course-certain&id=<?php echo $row_course['id'] ;?>&course_main=<?php echo $row_course['course_mainID']; ?>&certain=<?php if($row_course['certain']!="on"){ ?>on<?php }else{ ?> <?php }; ?>&returnPage=course-upcomming" class="text-danger"><i class="fa fa-toggle-<?php if($row_course['certain']=="on"){ ?>on<?php }else{ ?>off<?php }; ?> fa-lg"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr><?php
	}
};
?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- upcaming table end -->