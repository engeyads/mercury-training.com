<?php if($level_admin > 3){ exit; } ?><?php
include('cities/autoChange.php');
$integer =150;
if ( isset($_GET['start'] )){
	$start = $_GET["start"];
}else{
	$start = 0;
};
$start ;
$end = $integer + $start ;
$OrderPage = 'cities';
// Query the database
if(isset($_GET['sort_by_id']) and $_GET['sort_by_id'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `id` DESC'; $get .= "&sort_by_id=1&desc=1";
}elseif(isset($_GET['sort_by_id']) and $_GET['sort_by_id'] == 1){
  $order = 'ORDER BY `id` ASC'; $get .= "&sort_by_id=1";
}elseif(isset($_GET['sort_by_Name']) and $_GET['sort_by_Name'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `name` DESC'; $get .= "&sort_by_Name=1&desc=1";
}elseif(isset($_GET['sort_by_Name']) and $_GET['sort_by_Name'] == 1){
  $order = 'ORDER BY `name` ASC'; $get .= "&sort_by_Name=1";
}elseif(isset($_GET['sort_by_a_1_Week']) and $_GET['sort_by_a_1_Week'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `w1_p` DESC'; $get .= "&sort_by_a_1_Week=1&desc=1";   $brakElement = "w1_p";
}elseif(isset($_GET['sort_by_a_1_Week']) and $_GET['sort_by_a_1_Week'] == 1){
  $order = 'ORDER BY `w1_p` ASC'; $get .= "&sort_by_a_1_Week=1";           $brakElement = "w1_p";
}elseif(isset($_GET['sort_by_a_2_Week']) and $_GET['sort_by_a_2_Week'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `w2_p` DESC'; $get .= "&sort_by_a_2_Week=1&desc=1";   $brakElement = "w2_p";
}elseif(isset($_GET['sort_by_a_2_Week']) and $_GET['sort_by_a_2_Week'] == 1){
  $order = 'ORDER BY `w2_p` ASC'; $get .= "&sort_by_a_2_Week=1";           $brakElement = "w2_p";
}elseif(isset($_GET['sort_by_a_3_Week']) and $_GET['sort_by_a_3_Week'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `w3_p` DESC'; $get .= "&sort_by_a_3_Week=1&desc=1";   $brakElement = "w3_p";
}elseif(isset($_GET['sort_by_a_3_Week']) and $_GET['sort_by_a_3_Week'] == 1){
  $order = 'ORDER BY `w3_p` ASC'; $get .= "&sort_by_a_3_Week=1";           $brakElement = "w3_p";
}elseif(isset($_GET['sort_by_a_4_Week']) and $_GET['sort_by_a_4_Week'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `w4_p` DESC'; $get .= "&sort_by_a_4_Week=1&desc=1";   $brakElement = "w4_p";
}elseif(isset($_GET['sort_by_a_4_Week']) and $_GET['sort_by_a_4_Week'] == 1){
  $order = 'ORDER BY `w4_p` ASC'; $get .= "&sort_by_a_4_Week=1";           $brakElement = "w4_p";
}elseif(isset($_GET['sort_by_a_Repeat']) and $_GET['sort_by_a_Repeat'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `x` DESC'; $get .= "&sort_by_a_Repeat=1&desc=1";
}elseif(isset($_GET['sort_by_a_Repeat']) and $_GET['sort_by_a_Repeat'] == 1){
  $order = 'ORDER BY `x` ASC'; $get .= "&sort_by_a_Repeat=1";
}elseif(isset($_GET['sort_by_b_1_Week']) and $_GET['sort_by_b_1_Week'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `w1_p_b` DESC'; $get .= "&sort_by_b_1_Week=1&desc=1"; $brakElement = "w1_p_b";
}elseif(isset($_GET['sort_by_b_1_Week']) and $_GET['sort_by_b_1_Week'] == 1){
  $order = 'ORDER BY `w1_p_b` ASC'; $get .= "&sort_by_b_1_Week=1";         $brakElement = "w1_p_b";
}elseif(isset($_GET['sort_by_b_2_Week']) and $_GET['sort_by_b_2_Week'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `w2_p_b` DESC'; $get .= "&sort_by_b_2_Week=1&desc=1"; $brakElement = "w2_p_b";
}elseif(isset($_GET['sort_by_b_2_Week']) and $_GET['sort_by_b_2_Week'] == 1){
  $order = 'ORDER BY `w2_p_b` ASC'; $get .= "&sort_by_b_2_Week=1";         $brakElement = "w2_p_b";
}elseif(isset($_GET['sort_by_b_3_Week']) and $_GET['sort_by_b_3_Week'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `w3_p_b` DESC'; $get .= "&sort_by_b_3_Week=1&desc=1"; $brakElement = "w3_p_b";
}elseif(isset($_GET['sort_by_b_3_Week']) and $_GET['sort_by_b_3_Week'] == 1){
  $order = 'ORDER BY `w3_p_b` ASC'; $get .= "&sort_by_b_3_Week=1";         $brakElement = "w3_p_b";
}elseif(isset($_GET['sort_by_b_4_Week']) and $_GET['sort_by_b_4_Week'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `w4_p_b` DESC'; $get .= "&sort_by_b_4_Week=1&desc=1"; $brakElement = "w4_p_b";
}elseif(isset($_GET['sort_by_b_4_Week']) and $_GET['sort_by_b_4_Week'] == 1){
  $order = 'ORDER BY `w4_p_b` ASC'; $get .= "&sort_by_b_4_Week=1";         $brakElement = "w4_p_b";
}elseif(isset($_GET['sort_by_b_Repeat']) and $_GET['sort_by_b_Repeat'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `x_b` DESC'; $get .= "&sort_by_b_Repeat=1&desc=1";
}elseif(isset($_GET['sort_by_b_Repeat']) and $_GET['sort_by_b_Repeat'] == 1){
  $order = 'ORDER BY `x_b` ASC'; $get .= "&sort_by_b_Repeat=1";
}elseif(isset($_GET['sort_by_c_1_Week']) and $_GET['sort_by_c_1_Week'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `w1_p_c` DESC'; $get .= "&sort_by_c_1_Week=1&desc=1"; $brakElement = "w1_p_c";
}elseif(isset($_GET['sort_by_c_1_Week']) and $_GET['sort_by_c_1_Week'] == 1){
  $order = 'ORDER BY `w1_p_c` ASC'; $get .= "&sort_by_c_1_Week=1";         $brakElement = "w1_p_c";
}elseif(isset($_GET['sort_by_c_2_Week']) and $_GET['sort_by_c_2_Week'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `w2_p_c` DESC'; $get .= "&sort_by_c_2_Week=1&desc=1"; $brakElement = "w2_p_c";
}elseif(isset($_GET['sort_by_c_2_Week']) and $_GET['sort_by_c_2_Week'] == 1){
  $order = 'ORDER BY `w2_p_c` ASC'; $get .= "&sort_by_c_2_Week=1";         $brakElement = "w2_p_c";
}elseif(isset($_GET['sort_by_c_3_Week']) and $_GET['sort_by_c_3_Week'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `w3_p_c` DESC'; $get .= "&sort_by_c_3_Week=1&desc=1"; $brakElement = "w3_p_c";
}elseif(isset($_GET['sort_by_c_3_Week']) and $_GET['sort_by_c_3_Week'] == 1){
  $order = 'ORDER BY `w3_p_c` ASC'; $get .= "&sort_by_c_3_Week=1";         $brakElement = "w3_p_c";
}elseif(isset($_GET['sort_by_c_4_Week']) and $_GET['sort_by_c_4_Week'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `w4_p_c` DESC'; $get .= "&sort_by_c_4_Week=1&desc=1"; $brakElement = "w4_p_c";
}elseif(isset($_GET['sort_by_c_4_Week']) and $_GET['sort_by_c_4_Week'] == 1){
  $order = 'ORDER BY `w4_p_c` ASC'; $get .= "&sort_by_c_4_Week=1";         $brakElement = "w4_p_c";
}elseif(isset($_GET['sort_by_c_Repeat']) and $_GET['sort_by_c_Repeat'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `x_c` DESC'; $get .= "&sort_by_c_Repeat=1&desc=1";
}elseif(isset($_GET['sort_by_c_Repeat']) and $_GET['sort_by_c_Repeat'] == 1){
  $order = 'ORDER BY `x_c` ASC'; $get .= "&sort_by_c_Repeat=1";
}elseif(isset($_GET['sort_by_Monday']) and $_GET['sort_by_Monday'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `monday` DESC'; $get .= "&sort_by_Monday=1&desc=1";
}elseif(isset($_GET['sort_by_Monday']) and $_GET['sort_by_Monday'] == 1){
  $order = 'ORDER BY `monday` ASC'; $get .= "&sort_by_Monday=1";
}elseif(isset($_GET['sort_by_Old']) and $_GET['sort_by_Old'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `countB` DESC'; $get .= "&sort_by_Old=1&desc=1";
}elseif(isset($_GET['sort_by_Old']) and $_GET['sort_by_Old'] == 1){
  $order = 'ORDER BY `countB` ASC'; $get .= "&sort_by_Old=1";
}elseif(isset($_GET['sort_by_Upcomming']) and $_GET['sort_by_Upcomming'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `countA` DESC'; $get .= "&sort_by_Upcomming=1&desc=1";
}elseif(isset($_GET['sort_by_Upcomming']) and $_GET['sort_by_Upcomming'] == 1){
  $order = 'ORDER BY `countA` ASC'; $get .= "&sort_by_Upcomming=1";
}else{
  $order = "ORDER BY `name` ASC";
}

$sql_course_ar_c1 = "

SELECT * FROM `cities` left JOIN (

  SELECT * from 
  (SELECT `city` as 'cityA',count(`city`) as 'countA' FROM `course` WHERE {$oldUpcomming} group by `city`) as `A` 
  left join 
  (SELECT `city` as 'cityB',count(`city`) as 'countB' FROM `course` WHERE !{$oldUpcomming} group by `city`) as `B` 
  
  on `A`.`cityA` = `B`.`cityB` 

) as `t` on `t`.`cityA` = `cities`.`id`
$main $order";
$result_course_ar_c1 = $mysqli -> query($sql_course_ar_c1);
$numrows = mysqli_num_rows($result_course_ar_c1);

// Query the database
$sql_course_ar_c = "$sql_course_ar_c1 LIMIT $start , $integer";
$result_course_ar_c = $mysqli -> query($sql_course_ar_c);
$numrowsView = mysqli_num_rows($result_course_ar_c);
if($view_aa == 1){ 
	?>
    <div class="alert alert-primary" role="alert">
      <h4 class="alert-heading">MSQL</h4>
      <p><?php echo $sql_course_ar_c; ?></p>
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


<div class="main-content-inner">
  <div class="row">
    <div class="col-md-8">
      <div class="card  w-100">
          <div class="card-body">
            <div class="mb-5 tit-head-in">
              <h4> Total Cities  <div> <?php echo $numrows; ?></div> </h4> 
            </div>
            <div class="state d-flex justify-content-between mb-3">
            <div class="">
              <div class="icon a">A</div> Class : Total Repeat 
              <strong>
              <?php
              $sql_sum_repeat = "SELECT sum(`x`) as 'sum_repeat' FROM `cities` $main";
              $result_sum_repeat = $mysqli -> query($sql_sum_repeat);
              $numrows_sum_repeat = mysqli_num_rows($result_sum_repeat);
              $row_sum_repeat = $result_sum_repeat-> fetch_assoc();
              echo $row_sum_repeat['sum_repeat'];
              ?>
              </strong>
            </div>
          <div class="">
            <div class="icon b">B</div> Class : Total Repeat 
            <strong>
            <?php
            $sql_sum_repeat_b = "SELECT sum(`x_b`) as 'sum_repeat_b' FROM `cities` $main";
            $result_sum_repeat_b = $mysqli -> query($sql_sum_repeat_b);
            $numrows_sum_repeat_b = mysqli_num_rows($result_sum_repeat_b);
            $row_sum_repeat_b = $result_sum_repeat_b-> fetch_assoc();
            echo $row_sum_repeat_b['sum_repeat_b'];
            ?>
            </strong>
          </div>
          <div class="">
          <div class="icon c">C</div> Class : Total Repeat 
            <strong>
            <?php
            $sql_sum_repeat_c = "SELECT sum(`x_c`) as 'sum_repeat_c' FROM `cities` $main";
            $result_sum_repeat_c = $mysqli -> query($sql_sum_repeat_c);
            $numrows_sum_repeat_c = mysqli_num_rows($result_sum_repeat_c);
            $row_sum_repeat_c = $result_sum_repeat_c-> fetch_assoc();
            echo $row_sum_repeat_c['sum_repeat_c'];
            ?>
            </strong>
          </div>
        <div class="">
          <div class="icon n"><i class="fa fa-repeat" aria-hidden="true"></i></div> Total repeat: 
          <strong>
            <?php echo $row_sum_repeat['sum_repeat']+$row_sum_repeat_b['sum_repeat_b']+$row_sum_repeat_c['sum_repeat_c'] ;?>
          </strong>
        </div>
            </div>
          </div>
      </div>
    </div>
    <div class="col-md-4">
          <!-- BUtton viwe start -->
          <div class="but-head  h-100 d-flex align-items-end justify-content-end">
            <a href="?page=cities-edit" class="btn btn-primary font-weight-bold ml-2"><i class="fa fa-plus-square fa-fw "></i> Add City</a>
          </div>
          <!-- BUtton viwe end -->
    </div>



  <!-- basic table start -->
  <div class="col-lg-12 mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="header-title">control city</h4>
                          <div class="single-table">
                              <div class="table-responsive">
                                  <table class="table text-center table-hover">
                                      <thead class="text-uppercase">
                                      <tr>
                                        <th scope="col" colspan="7"></th>
                                        <th scope="col" colspan="5" class="alert-success"><strong>A Class</strong></th>
                                        <th scope="col" colspan="5" class="alert-warning"><strong>B Class</strong></th>
                                        <th scope="col" colspan="5" class="alert-info"><strong>C Class</strong></th>              
                                      </tr>
                                      <tr>
                                        <th scope="col"><?php SortBy('sort_by_id','ID'); ?></th>
                                        <th scope="col"><?php SortBy('sort_by_Name','Name'); ?></th>
                                        <th scope="col"><?php SortBy('sort_by_Monday','Monday'); ?></th>
                                        
                                        <th scope="col"><?php SortBy('sort_by_Upcomming','Upcomming Courses'); ?></th>
                                        <th scope="col"><?php SortBy('sort_by_Old','Old Courses'); ?></th>

                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>

                                        <th scope="col" class="alert-success"><?php SortBy('sort_by_a_1_Week','1 Week'); ?></th>
                                        <th scope="col" class="alert-success"><?php SortBy('sort_by_a_2_Week','2 Weeks'); ?></th>
                                        <th scope="col" class="alert-success"><?php SortBy('sort_by_a_3_Week','3 Weeks'); ?></th>
                                        <th scope="col" class="alert-success"><?php SortBy('sort_by_a_4_Week','4 Weeks'); ?></th>
                                        <th scope="col" class="alert-success"><?php SortBy('sort_by_a_Repeat','Repeat'); ?></th>

                                        <th scope="col" class="alert-warning"><?php SortBy('sort_by_b_1_Week','1 Week'); ?></th>
                                        <th scope="col" class="alert-warning"><?php SortBy('sort_by_b_2_Week','2 Weeks'); ?></th>
                                        <th scope="col" class="alert-warning"><?php SortBy('sort_by_b_3_Week','3 Weeks'); ?></th>
                                        <th scope="col" class="alert-warning"><?php SortBy('sort_by_b_4_Week','4 Weeks'); ?></th>
                                        <th scope="col" class="alert-warning"><?php SortBy('sort_by_b_Repeat','Repeat'); ?></th>

                                        <th scope="col" class="alert-info"><?php SortBy('sort_by_c_1_Week','1 Week'); ?></th>
                                        <th scope="col" class="alert-info"><?php SortBy('sort_by_c_2_Week','2 Weeks'); ?></th>
                                        <th scope="col" class="alert-info"><?php SortBy('sort_by_c_3_Week','3 Weeks'); ?></th>
                                        <th scope="col" class="alert-info"><?php SortBy('sort_by_c_4_Week','4 Weeks'); ?></th>
                                        <th scope="col" class="alert-info"><?php SortBy('sort_by_c_Repeat','Repeat'); ?></th>
                                      </tr>
                                          <?php
                                            if ($result_course_ar_c && (mysqli_num_rows($result_course_ar_c) > 0)) {
                                                $firstLinke =1;
                                                while ($row_course_ar_c = $result_course_ar_c-> fetch_assoc()){
                                                    $break = 0;
                                                    $break1 = 0;
                                                    $id =htmlspecialchars($row_course_ar_c['id']);
                                                    $name =htmlspecialchars($row_course_ar_c['name']);
                                                    if(isset($brakElement) and $brakElement !='' and isset($$brakElement) and $$brakElement != htmlspecialchars($row_course_ar_c["$brakElement"])){ $break = 1; }
                                                    if(
                                                      $firstLinke !=1 and isset($brakElement) and $brakElement !='' and 
                                                      (
                                                        $w1_p   !=htmlspecialchars($row_course_ar_c['w1_p'])   or
                                                        $w2_p   !=htmlspecialchars($row_course_ar_c['w2_p'])   or
                                                        $w3_p   !=htmlspecialchars($row_course_ar_c['w3_p'])   or
                                                        $w4_p   !=htmlspecialchars($row_course_ar_c['w4_p'])   or
                                                        $w1_p_b !=htmlspecialchars($row_course_ar_c['w1_p_b']) or
                                                        $w2_p_b !=htmlspecialchars($row_course_ar_c['w2_p_b']) or
                                                        $w3_p_b !=htmlspecialchars($row_course_ar_c['w3_p_b']) or
                                                        $w4_p_b !=htmlspecialchars($row_course_ar_c['w4_p_b']) or
                                                        $w1_p_c !=htmlspecialchars($row_course_ar_c['w1_p_c']) or
                                                        $w2_p_c !=htmlspecialchars($row_course_ar_c['w2_p_c']) or
                                                        $w3_p_c !=htmlspecialchars($row_course_ar_c['w3_p_c']) or
                                                        $w4_p_c !=htmlspecialchars($row_course_ar_c['w4_p_c'])
                                                      )
                                                    ){
                                                      $break1 = 1;
                                                    }
                                                    $w1_p =htmlspecialchars($row_course_ar_c['w1_p']);
                                                    $w2_p =htmlspecialchars($row_course_ar_c['w2_p']);
                                                    $w3_p =htmlspecialchars($row_course_ar_c['w3_p']);
                                                    $w4_p =htmlspecialchars($row_course_ar_c['w4_p']);
                                                    $x =htmlspecialchars($row_course_ar_c['x']);
                                                    $w1_p_b =htmlspecialchars($row_course_ar_c['w1_p_b']);
                                                    $w2_p_b =htmlspecialchars($row_course_ar_c['w2_p_b']);
                                                    $w3_p_b =htmlspecialchars($row_course_ar_c['w3_p_b']);
                                                    $w4_p_b =htmlspecialchars($row_course_ar_c['w4_p_b']);
                                                    $x_b =htmlspecialchars($row_course_ar_c['x_b']);
                                                    $w1_p_c =htmlspecialchars($row_course_ar_c['w1_p_c']);
                                                    $w2_p_c =htmlspecialchars($row_course_ar_c['w2_p_c']);
                                                    $w3_p_c =htmlspecialchars($row_course_ar_c['w3_p_c']);
                                                    $w4_p_c =htmlspecialchars($row_course_ar_c['w4_p_c']);
                                                    $x_c =htmlspecialchars($row_course_ar_c['x_c']);
                                                    $monday =htmlspecialchars($row_course_ar_c['monday']);
                                                    $countB =htmlspecialchars($row_course_ar_c['countB']);
                                                    $countA =htmlspecialchars($row_course_ar_c['countA']);

                                                    $firstLinke=0;
                                                    ?>
                                      </thead>
                                      <tbody>
                                      <?php
                                                if($break == 1){ ?><tr><td colspan="22" class="bg-secondary"></td></tr><?php }elseif($break1 == 1){ ?><tr><td colspan="22" class="bg-danger"></td></tr><?php }
                                              
                                              ?>
                                          <tr>
                                              <th scope="row"><?php echo $id ; ?></th>
                                                  
                                              <td>
                                                <a href="?page=cities-edit&id=<?php echo $id ;?>" ><?php echo $name; ?></a>
                                              </td>
                                              <td><?php if($monday == 1){ ?><span class="badge badge-secondary ml-2" style="background-color:darkgoldenrod">Monday</span><?php }else{ ?>&nbsp<?php } ?>
                                              </td>
                                              <td><a href="?page=course-table&city=<?php echo $id; ?>&ucOnly=1"><?php echo $countA ; ?></a></td>
                                              <td><a href="?page=course-table&city=<?php echo $id; ?>&oldOnly=1"><?php echo $countB ; ?></a></td>

                                              <td><a href="?page=cities-edit&id=<?php echo $id ;?>"><i class="fa fa-edit"></i></a></td>
                                              <td>
                                                <button class="button-del" type="button" data-toggle="modal" data-target="#exampleModal<?php echo $id ;?>"><i class="ti-trash text-danger"></i></button>
                                                <div class="modal fade" id="exampleModal<?php echo $id ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Delet City</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body text-danger">
                                                      Are you sure you want to delete city: <strong>"<?php echo $name; ?>"</strong> and all related course dates.
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                                      <span class="b-remove"><a type="button" class="btn btn-primary" href="?page=cities-del&amp;id=<?php echo $id ;?>">Yes</a></span>
                                                    </div>
                                                  </div>
                                                </div>
                                                </div>
                                </td>
                                
                                  <td class="alert-success"><?php autoChange('A Class 1 Week price' ,'w1_p',$row_course_ar_c,''); ?></td>
                                  <td class="alert-success"><?php autoChange('A Class 2 Weeks price','w2_p',$row_course_ar_c,''); ?></td>
                                  <td class="alert-success"><?php autoChange('A Class 3 Weeks price','w3_p',$row_course_ar_c,''); ?></td>
                                  <td class="alert-success"><?php autoChange('A Class 4 Weeks price','w4_p',$row_course_ar_c,''); ?></td>
                                  <td class="alert-success"><?php autoChange('A Class Repeat','x',$row_course_ar_c,''); ?></td>
                                  
                                  <td class="alert-warning"><?php autoChange('B Class 1 Week price' ,'w1_p_b',$row_course_ar_c,''); ?></td>
                                  <td class="alert-warning"><?php autoChange('B Class 2 Weeks price','w2_p_b',$row_course_ar_c,''); ?></td>
                                  <td class="alert-warning"><?php autoChange('B Class 3 Weeks price','w3_p_b',$row_course_ar_c,''); ?></td>
                                  <td class="alert-warning"><?php autoChange('B Class 4 Weeks price','w4_p_b',$row_course_ar_c,''); ?></td>
                                  <td class="alert-warning"><?php autoChange('B Class Repeat','x_b',$row_course_ar_c,''); ?></td>
                                  
                                  <td class="alert-info"><?php autoChange('C Class 1 Week price' ,'w1_p_c',$row_course_ar_c,''); ?></td>
                                  <td class="alert-info"><?php autoChange('C Class 2 Weeks price','w2_p_c',$row_course_ar_c,''); ?></td>
                                  <td class="alert-info"><?php autoChange('C Class 3 Weeks price','w3_p_c',$row_course_ar_c,''); ?></td>
                                  <td class="alert-info"><?php autoChange('C Class 4 Weeks price','w4_p_c',$row_course_ar_c,''); ?></td>
                                  <td class="alert-info"><?php autoChange('C Class Repeat','x_c',$row_course_ar_c,''); ?></td>
                              </tr>
                                              <?php
                                            }
                                        }else{ echo " There are no Items to display "; };
                                        ?>
                                          <tr>
                                            <td colspan="5" background="background.jpg" class="row"></td>
                                          </tr>
                                          <tr>
                                            <td>
                                                <div align="center">
                                                <?php
                                            if($start>0){
                                                    ?>
                                                    <a href="?page=cities-view&start=<?php echo $start - $integer ; ?>
                                                            <?php if ( isset($_GET['id_course_ar_c_c'] )){ echo "&id_course_ar_c_c=$id_course_ar_c_c"; }; ?>
                                                            <?php if ( isset($_GET['id_course_ar_c'] )){ echo "&id_course_ar_c=$id_course_ar_c"; }; ?>"  class="linlk">Previous</a>
                                                    <?php
                                                };
                                            if($numrows>$end and $start>0){ echo " - ";};
                                                if($numrows>$end){
                                                ?><a href="?page=cities-view&start=<?php echo $integer + $start; ?>
                                                        <?php if ( isset($_GET['id_course_ar_c_c'] )){ echo "&id_course_ar_c_c=$id_course_ar_c_c"; }; ?><?php if ( isset($_GET['id_course_ar_c'] )){ echo "&id_course_ar_c=$id_course_ar_c"; }; ?>"  class="linlk">Next</a>
                                                <?php
                                            };
                                            ?>
                                                </div>
                                            </td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- basic table end -->



  </div>

</div>

<br><br><br>
