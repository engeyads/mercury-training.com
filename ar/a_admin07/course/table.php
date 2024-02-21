<?php
//order
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
}elseif(isset($_GET['sort_by_ref']) and $_GET['sort_by_ref'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `c_id` DESC'; $get .= "&sort_by_ref=1&desc=1";
}elseif(isset($_GET['sort_by_ref']) and $_GET['sort_by_ref'] == 1){
  $order = 'ORDER BY `c_id` ASC'; $get .= "&sort_by_ref=1";
}else{
  $order='';
}
$OrderPage='course';
$OrderPage1 = 'table';
//end order

//start end integer
$integer =20;
if (isset($_GET['start'] ) and $_GET['start'] !=''){
  $start = addslashes($_GET["start"]);
  $start_get = "&start={$start}";
}else{
  $start = 0;
  $start_get = '';
};
$end = $integer + $start ;
//end start end integer


//if $_GET
$main = '';
$main_get = '';
if (isset($_GET['city']) and $_GET['city'] !=''){
	$city = $_GET['city'];
	$main .= "AND `city` ='$city'";
	$main_get .= "&amp;city=$city";
};
if (isset($_GET['Keyword']) and $_GET['Keyword'] !=''){
	$Keyword = $_GET['Keyword'];
	$main .= "AND `name` like '%{$Keyword}%'";
	$main_get .= "&amp;Keyword=$Keyword";
};
if (isset($_GET['certain']) and $_GET['certain'] !=''){
	$certain = $_GET['certain'];
	$main .= "AND `course`.`certain` ='$certain'";
	$main_get .= "&amp;certain=$certain";
};
if (isset($_GET['course_c']) and $_GET['course_c'] !=''){
	$course_c = $_GET['course_c'];
	$main .= "AND `course_c` ='$course_c'";
	$main_get .= "&amp;course_c=$course_c";
}
if (isset($_GET['Ref']) and $_GET['Ref'] !=''){
  $Ref = $_GET['Ref'];
  $Ref = preg_replace("/[^a-zA-Z]/", "", $Ref);
	$main .= "AND `course`.`c_id` ='$Ref'";
	$main_get .= "&amp;Ref=$Ref";
}
if (isset($_GET['Year']) and $_GET['Year'] !=''){
	$Year = $_GET['Year'];
	$main .= "AND `y1` ='$Year'";
	$main_get .= "&amp;y=$Year";
};
if (isset($_GET['Month']) and $_GET['Month']!=''){
	$Month = $_GET['Month'];
	$main .= "AND `m1` ='$Month'";
	$main_get .= "&amp;Month=$Month";
};
if (isset($_GET['Day']) and $_GET['Day'] !=''){
	$Day = $_GET['Day'];
	$main .= "AND `d1` ='$Day'";
	$main_get .= "&amp;Day=$Day";
};


?>

<div class="col-sm-12">
<div class="">
<form action="?" method="get" >
<div class="form-row">
<input type="hidden" name="page" value="course-table" />


<div class="form-group col-4">
  <label for="InputKeyword">Keyword</label>
  <input type="Keyword" class="form-control" id="InputKeyword" name="Keyword" placeholder="Keyword" value="<?php if(isset($_GET['Keyword']) and $_GET['Keyword'] !=''){ echo $_GET['Keyword']; } ?>">
</div>
<div class="form-group col-4">
  <label for="InputRef">Ref</label>
  <input type="Ref" class="form-control" id="InputRef" name="Ref" placeholder="Ref" value="<?php if(isset($_GET['Ref']) and $_GET['Ref'] !=''){ echo $_GET['Ref']; } ?>">
</div>
<div class="form-group col-4"><br>
<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" id="customCheck1" name="certain" value="on" <?php if(isset($_GET['certain']) and $_GET['certain'] =='on'){ ?>checked<?php }?>>
  <label class="custom-control-label" for="customCheck1">Upcomming</label>
</div>
</div>

<div class="form-group col-4">
  <label for="InputDay">Day</label>
  <input type="Day" class="form-control" id="InputDay" name="Day" placeholder="Day" value="<?php if(isset($_GET['Day']) and $_GET['Day'] !=''){ echo $_GET['Day']; } ?>">
</div>
<div class="form-group col-4">
  <label for="InputMonth">Month</label>
  <input type="Month" class="form-control" id="InputMonth" name="Month" placeholder="Month" value="<?php if(isset($_GET['Month']) and $_GET['Month'] !=''){ echo $_GET['Month']; } ?>">
</div>
<div class="form-group col-4">
  <label for="InputYear">Year</label>
  <input type="Year" class="form-control" id="InputYear" name="Year" placeholder="Year" value="<?php if(isset($_GET['Year']) and $_GET['Year'] !=''){ echo $_GET['Year']; } ?>">
</div>
<div class="form-group col-md-6">
  <label for="inputCity">City</label>
  <select id="inputCity" class="form-control" name="city">
    <?php
    $sql_cities = "SELECT `id`,`name` FROM `cities` ";
    $result_cities = $mysqli -> query($sql_cities);
    if ($result_cities && (mysqli_num_rows($result_cities) > 0)) {
        ?><option value="">Select city</option><?php
        while ($row_cities = $result_cities-> fetch_assoc()){
            ?><option value="<?php echo $row_cities['id']; ?>" <?php if(isset($_GET['city']) and $row_cities['id'] == $_GET['city']){ ?>selected<?php }; ?>><?php echo $row_cities['name']; ?></option><?php
        }
    }
    ?>
  </select>
</div>


<div class="form-group col-md-6">
  <label for="inputcourse_c">Category</label>
  <select id="inputcourse_c" class="form-control" name="course_c">
    <?php
    $sql_course_c = "SELECT `id`,`name`,`sh` FROM `course_c` ";
    $result_course_c = $mysqli -> query($sql_course_c);
    if ($result_course_c && (mysqli_num_rows($result_course_c) > 0)) {
        ?><option value="">Select Category</option><?php
        $CategoryArray = array();
        while ($row_course_c = $result_course_c-> fetch_assoc()){
            
            $CategoryArray += [$row_course_c['id'] => $row_course_c['sh']];
            ?><option value="<?php echo $row_course_c['id']; ?>" <?php if(isset($_GET['course_c']) and $row_course_c['id'] == $_GET['course_c']){ ?>selected<?php }; ?>><?php echo $row_course_c['name']; ?></option><?php
        }
    }
    ?>
  </select>
</div>
</div>


  
  
  <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
  </div>
</form>
</div>
<br>
<div class="d-block col-12"><?php
if (!(isset($_GET['ucOnly']) and $_GET['ucOnly'] =='1')){
  ?><span type="button" class="btn btn-warning mt-4 pr-4 pl-4 text-bold ml-4">
<a href="?page=<?php echo $OrderPage; ?>-<?php echo $OrderPage1.$main_get; ?>&amp;ucOnly=1" class="text-white"> View Upcomming courses only</a></span><?php
};
if (!(isset($_GET['oldOnly']) and $_GET['oldOnly'] =='1')){
  ?><span type="button" class="btn btn-warning mt-4 pr-4 pl-4 text-bold ml-4">
<a href="?page=<?php echo $OrderPage; ?>-<?php echo $OrderPage1.$main_get; ?>&amp;oldOnly=1" class="text-white"> View Old courses only</a></span><?php
};
?><span type="button" class="btn btn-warning mt-4 pr-4 pl-4 text-bold ml-4">
<a href="?page=<?php echo $OrderPage; ?>-<?php echo $OrderPage1.$main_get; ?>" class="text-white"> View all courses</a></span></div>



<?php


if (isset($_GET['ucOnly']) and $_GET['ucOnly'] =='1'){
	$main .= "AND {$oldUpcomming}";
	$main_get .= "&amp;ucOnly=1";
};
if (isset($_GET['oldOnly']) and $_GET['oldOnly'] =='1'){
	$main .= "AND !({$oldUpcomming})";
	$main_get .= "&amp;oldOnly=1";
};
//End If $_GET



?>







<?php
$sql_course = " SELECT `t`.`id`,`t`.`c_id`,`t`.`d1`,`t`.`m1`,`t`.`y1`,`t`.`d2`,`t`.`m2`,`t`.`y2`,`t`.`city`,`t`.`price`,`t`.`certain`,`t`.`name`,`t`.`course_c`,`cities`.`name` as 'cityName' from ( SELECT `course`.`id`,`course`.`c_id`,`course`.`d1`,`course`.`m1`,`course`.`y1`,`course`.`d2`,`course`.`m2`,`course`.`y2`,`course`.`city`,`course`.`price`,`course`.`certain`,`course_main`.`name`,`course_main`.`course_c` FROM `course` JOIN `course_main` on `course_main`.`c_id` = `course`.`c_id` where 1 $main ) as `t` join `cities` on `t`.`city`=`cities`.`id` $order ";
$result_course = $mysqli -> query($sql_course);
$numrows = mysqli_num_rows($result_course);

$pageName = 'course-table';
pagination();
$sql_course = "$sql_course LIMIT $start , $integer";
$result_course = $mysqli -> query($sql_course);
$numrowsView = mysqli_num_rows($result_course);
if($view_aa == 1){ 
	?>
    <div class="alert alert-primary" role="alert">
      <h4 class="alert-heading">MSQL</h4>
      <p><?php echo $sql_course; ?></p>
      <p>Numrows: Total: <?php echo $numrows; ?></p>
      <p>Numrows: View: <?php echo $numrowsView; ?></p>

    <?php if($mysqli->error){
          ?>
          <hr>
      <p class="mb-0"><?php printf("Error message: %s\n", $mysqli->error); ?></p>
          <?php
       } ?>    
    </div>
    <?php
}
?>

<!-- table start -->
<div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Course (<?php echo $numrows; ?>)</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col"><?php SortBy('sort_by_name','Course Name'); ?></th>
                                <th scope="col"><?php SortBy('sort_by_ref','REF'); ?></th>
                                <th scope="col"><?php SortBy('sort_by_City','City'); ?></th>
                                <th scope="col"><?php SortBy('sort_by_Start_Date','Start Date'); ?></th>
                                <th scope="col"><?php SortBy('sort_by_End_Date','End Date'); ?></th>
                                <th scope="col">Edit</th>
                                
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                              // Query the database
                              
                              if ($result_course && (mysqli_num_rows($result_course) > 0)) {
                                  while ($row_course = $result_course-> fetch_assoc()){
                                      $id_course = $row_course['id'];
                                      $course_c = $row_course['course_c'];
                                      ?><tr>  
                                          <td><?php echo $row_course['name']; ?></td>
                                          <td><?php echo $CategoryArray["$course_c"] ?><?php echo $row_course['c_id']; ?></td>
                                          <td><?php echo $row_course['cityName']; ?></td>
                                          <td><?php echo $row_course['d1'];?>/<?php echo $month_a[$row_course['m1']*1];?>/<?php echo $row_course['y1'];?></td>
                                          <td><?php echo $row_course['d2'];?>/<?php echo $month_a[$row_course['m2']*1];?>/<?php echo $row_course['y2'];?></td>
                                          <td><a href="?page=course-edit&id=<?php echo $row_course['id']; ?>"><i class="fa fa-edit"></i></a></td>
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
<?php echo $pagination; ?>
<!-- table end -->