<?php
if($level_admin > 3){ exit; }
$integer =200;
if ( isset($_GET['start'] )){
	$start = $_GET["start"];
}else{
	$start = 0;
};
$start ;
$end = $integer + $start ;
$OrderPage='course_c';
// Query the database
if(!isset($get)){ $get = '';}
if(!isset($addToSqlJoin)){ $addToSqlJoin = '';}
if(isset($_GET['sort_by_class']) and $_GET['sort_by_class'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `class` DESC'; $get .= "&sort_by_class=1&desc=1";
}elseif(isset($_GET['sort_by_class']) and $_GET['sort_by_class'] == 1){
  $order = 'ORDER BY `class` ASC'; $get .= "&sort_by_class=1";
}elseif(isset($_GET['sort_by_id']) and $_GET['sort_by_id'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `id` DESC'; $get .= "&sort_by_id=1&desc=1";
}elseif(isset($_GET['sort_by_id']) and $_GET['sort_by_id'] == 1){
  $order = 'ORDER BY `id` ASC'; $get .= "&sort_by_id=1";
}elseif(isset($_GET['sort_by_name']) and $_GET['sort_by_name'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `name` DESC'; $get .= "&sort_by_name=1&desc=1";
}elseif(isset($_GET['sort_by_name']) and $_GET['sort_by_name'] == 1){
  $order = 'ORDER BY `name` ASC'; $get .= "&sort_by_name=1";
}
elseif(isset($_GET['sort_by_sh']) and $_GET['sort_by_sh'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `sh` DESC'; $get .= "&sort_by_sh=1&desc=1";
}elseif(isset($_GET['sort_by_sh']) and $_GET['sort_by_sh'] == 1){
  $order = 'ORDER BY `sh` ASC'; $get .= "&sort_by_sh=1";
}
elseif(isset($_GET['sort_by_View_courses']) and $_GET['sort_by_View_courses'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `COUNT` DESC'; $get .= "&sort_by_View_courses=1&desc=1"; $addToSqlJoin = 'JOIN (SELECT `course_c`,COUNT(`id`) as \'COUNT\' FROM `course_main` GROUP BY `course_c`) as `t` ON `t`.`course_c`= `course_c`.`id`';
}elseif(isset($_GET['sort_by_View_courses']) and $_GET['sort_by_View_courses'] == 1){
  $order = 'ORDER BY `COUNT` ASC'; $get .= "&sort_by_View_courses=1"; $addToSqlJoin = 'JOIN (SELECT `course_c`,COUNT(`id`) as \'COUNT\' FROM `course_main` GROUP BY `course_c`) as `t` ON `t`.`course_c`= `course_c`.`id`';
}
else{
  $order = 'ORDER BY `id` ASC';
}

$sql_course_ar_c1 = "SELECT * FROM `course_c` $addToSqlJoin $main $order";
$result_course_ar_c1 = $mysqli -> query($sql_course_ar_c1);
$numrows_course_c = mysqli_num_rows($result_course_ar_c1);


$sql_course_ar_c1_A = "SELECT * FROM `course_c` Where `class` = 'A'";
$result_course_ar_c1_A = $mysqli -> query($sql_course_ar_c1_A);
$numrows_A = mysqli_num_rows($result_course_ar_c1_A);

$sql_course_ar_c1_B = "SELECT * FROM `course_c` Where `class` = 'B'";
$result_course_ar_c1_B = $mysqli -> query($sql_course_ar_c1_B);
$numrows_B = mysqli_num_rows($result_course_ar_c1_B);

$sql_course_ar_c1_C = "SELECT * FROM `course_c` Where `class` = 'C'";
$result_course_ar_c1_C = $mysqli -> query($sql_course_ar_c1_C);
$numrows_C = mysqli_num_rows($result_course_ar_c1_C);

$sql_course_ar_c1_noclass = "SELECT * FROM `course_c` Where `class` = ''";
$result_course_ar_c1_noclass = $mysqli -> query($sql_course_ar_c1_noclass);
$numrows_noclass = mysqli_num_rows($result_course_ar_c1_noclass);

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
<br />
<br />






<!-- BUtton viwe start -->
            
            <!-- BUtton viwe end -->



            <div class="main-content-inner">
            <div class="row">
            <div class="col-md-8">
              <div class="card  w-100">
                <div class="card-body">
                  <div class="mb-5">
                  <h4 class="tit-head-in">   Total categories <div> <?php echo $numrows_course_c; ?>   </div>  </h4>
                  </div>
                  <div class="state d-flex justify-content-between mb-3">
                    <div class="">
                      <div class="icon a">A</div> Class :  <span> <strong><?php echo $numrows_A; ?></strong> Categories <?php echo $num_of_class_A; ?> </span> 
                    </div> 
                    <div  class="">
                      <div class="icon b">B</div>Class :  <span> <strong><?php echo $numrows_B; ?></strong> Categories <?php echo $num_of_class_B; ?> </span> 
                    </div> 
                    <div  class="">
                      <div class="icon c">c</div>Class :  <span> <strong><?php echo $numrows_C; ?></strong> Categories  <?php echo $num_of_class_C; ?> </span>
                    </div> 
                    <div  class="">
                      <div class="icon n">No</div>Class :  <span> <strong><?php echo $numrows_noclass; ?></strong> Categories <?php echo $num_of_class_no; ?> </span>
                    </div> 
                  </div>
                
                </div>
                
                </div>

            </div>

            <div class="col-md-4">
              <div class="but-head h-100 d-flex align-items-end justify-content-end">
                <a href="?page=course_c-edit" class="btn btn-primary   linlk ml-3"> <i class="fa fa-plus-square fa-fw "></i> Add Category </a>
              </div>
            </div>
            

              <!-- basic table start -->
              <div class="col-lg-12 mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="header-title">control Categories</h4>
                          <div class="single-table">
                              <div class="table-responsive  table-hover">
                                  <table class="table text-center">
                                      <thead class="text-uppercase">
                                          <tr>
                                              <th scope="col"><?php SortBy('sort_by_id','ID'); ?></th>
                                              <th scope="col" class="text-left"><?php SortBy('sort_by_name','Name of Categories'); ?></th>
                                              <th scope="col"><?php SortBy('sort_by_sh','Code'); ?></th>
                                              <th scope="col"><?php SortBy('sort_by_View_courses','courses'); ?></th>
                                              <th scope="col">Edit</th>
                                              <th scope="col">delete</th>
                                              <th scope="col"><?php SortBy('sort_by_class','Class'); ?></th>
                                          </tr>
                                          <?php
                                            if ($result_course_ar_c && (mysqli_num_rows($result_course_ar_c) > 0)) {
                                                while ($row_course_ar_c = $result_course_ar_c-> fetch_assoc()){
                                                    $id =htmlspecialchars($row_course_ar_c['id']);
                                                    $name =htmlspecialchars($row_course_ar_c['name']);
                                                    $home =htmlspecialchars($row_course_ar_c['home']);
                                                    $sh =htmlspecialchars($row_course_ar_c['sh']);
                                                    $class =htmlspecialchars($row_course_ar_c['class']);
                                                    ?>
                                      </thead>
                                      <tbody>
                                          <tr class="<?php if($class == 'A'){ echo 'alert-primary'; }elseif($class == 'B'){ echo 'alert-success'; }elseif($class == 'C'){ echo 'alert-info'; }else{ echo 'alert-danger'; }?>">
                                              <td scope="row"><?php echo $id ; ?></td>
                                              <td class="text-left"><a href="?page=course_c-edit&id=<?php echo $id ;?>" ><?php echo $name ; ?></a></td>
                                              <td><a href="?page=course_c-edit&id=<?php echo $id ;?>" ><?php echo $sh ; ?></a></td>
                                              <td><a href="?page=course_main-view&course_c=<?php echo $id ;?>" ><?php
                                              $sql_course_main_count = "SELECT `id` FROM `course_main` Where `course_c` = '{$id}'";
                                              $result_course_main_count = $mysqli -> query($sql_course_main_count);
                                              echo $numrows = mysqli_num_rows($result_course_main_count);
                                              if($class == 'A'){ $num_of_class_A += $numrows; }
                                              elseif($class == 'B'){ $num_of_class_B += $numrows; }
                                              elseif($class == 'C'){ $num_of_class_C += $numrows; }
                                              else{ $num_of_class_no += $numrows; }
                                              ?></a>
                                              </td>
                                              
                                              <td><a href="?page=course_c-edit&id=<?php echo $id ;?>"><i class="fa fa-edit"></i></a></td>
                                              <td>
                                                <div class="modal fade" id="exampleModal<?php echo $id ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delet Categories</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body text-danger">
                                                        Are you sure you want to delete
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                                        <span class="b-remove"><a type="button" class="btn btn-primary" href="?page=course_c-del&amp;id=<?php echo $id ;?>">Yes</a></span>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <button class="button-del" type="button" data-toggle="modal" data-target="#exampleModal<?php echo $id ;?>"><i class="ti-trash text-danger"></i></button>
                                          </td>
                                          <td><?php if($class !='' and $class !='S'){ ?><div class="icon <?php echo $class; ?>"><?php echo $class; ?></div><?php }else{ ?><div class="icon n">No</div><?php }; ?></td>
                                          </tr>
                                        <?php
                                            }
                                        }else{ echo " There are no Items to display "; };
                                        ?>
                                          <tr>
                                            <td colspan="5" background="background.jpg" class="row"></td>
                                          </tr>
                                          <tr>
                                            <td colspan="5" background="background.jpg">
                                                <div align="center">
                                                    <?php
                                            if($start>0){
                                                    ?><a href="?page=course_c-view&start=<?php echo $start - $integer; echo $get; ?>"  class="linlk">Previous</a>
                                                    <?php
                                                };
                                            if($numrows>$end and $start>0){ echo " - ";};
                                                if($numrows>$end){
                                                ?><a href="?page=course_c-view&start=<?php echo $integer + $start; echo $get; ?>"  class="linlk">Next</a>
                                                    <?php
                                            };
                                            ?></div></td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            
              <!-- basic table end -->
            </div>
            <!-- main content area end -->

          
