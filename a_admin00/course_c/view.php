<?php
if($level_admin > 3){ exit; }
$integer =30;
if ( isset($_GET['start'] )){
	$start = $_GET["start"];
}else{
	$start = 0;
};
$start ;
$end = $integer + $start ;
// Query the database
if($_GET[sort_by_class] == 1){
  $order = 'ORDER BY `class` ASC';
}else{
  $order = 'ORDER BY `id` ASC';
}
$sql_course_ar_c1 = "SELECT * FROM `course_c` $main $order";
$result_course_ar_c1 = mysql_query($sql_course_ar_c1, $conn);
$numrows_course_c = mysql_num_rows($result_course_ar_c1);


$sql_course_ar_c1_A = "SELECT * FROM `course_c` Where `class` = 'A'";
$result_course_ar_c1_A = mysql_query($sql_course_ar_c1_A, $conn);
$numrows_A = mysql_num_rows($result_course_ar_c1_A);

$sql_course_ar_c1_B = "SELECT * FROM `course_c` Where `class` = 'B'";
$result_course_ar_c1_B = mysql_query($sql_course_ar_c1_B, $conn);
$numrows_B = mysql_num_rows($result_course_ar_c1_B);

$sql_course_ar_c1_C = "SELECT * FROM `course_c` Where `class` = 'C'";
$result_course_ar_c1_C = mysql_query($sql_course_ar_c1_C, $conn);
$numrows_C = mysql_num_rows($result_course_ar_c1_C);

$sql_course_ar_c1_noclass = "SELECT * FROM `course_c` Where `class` = ''";
$result_course_ar_c1_noclass = mysql_query($sql_course_ar_c1_noclass, $conn);
$numrows_noclass = mysql_num_rows($result_course_ar_c1_noclass);

// Query the database
$sql_course_ar_c = "$sql_course_ar_c1 LIMIT $start , $integer";
$result_course_ar_c = mysql_query($sql_course_ar_c, $conn);
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
                      <div class="icon a">A</div> Class :  <span> <strong><?php echo $numrows_A; ?></strong>  Categories <?php echo $num_of_class_A; ?> </span> 
                    </div> 
                    <div  class="">
                      <div class="icon b">B</div>Class :  <span> <strong><?php echo $numrows_B; ?></strong>  Categories <?php echo $num_of_class_B; ?> </span> 
                    </div> 
                    <div  class="">
                      <div class="icon c">c</div>Class :  <span> <strong><?php echo $numrows_C; ?></strong>   Categories  <?php echo $num_of_class_C; ?> </span>
                    </div> 
                    <div  class="">
                      <div class="icon n">No</div>Class :  <span> <strong><?php echo $numrows_noclass; ?></strong>   Categories <?php echo $num_of_class_no; ?> </span>
                    </div> 
                  </div>
                
                </div>
                
                </div>

            </div>

            <div class="col-md-4">
              <div class="but-head h-100 d-flex align-items-end justify-content-end">
                <?php if($_GET[sort_by_class] == 1){
                  ?><a href="?page=course_c-view" class="btn btn-primary font-weight-bold"> <i class="fa fa-sort" ></i> Sort By ID </a><?php
                }else{
                  ?><a href="?page=course_c-view&sort_by_class=1" class="btn btn-primary"><i class="fa fa-sort" ></i> Sort By Class </a><?php
                }?>
                <a href="index.php?page=course_c-edit" class="btn btn-primary   linlk ml-3"> <i class="fa fa-plus-square fa-fw "></i> Add Category </a>
              </div>
            </div>
            

              <!-- basic table start -->
              <div class="col-lg-12 mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="header-title">control Group</h4>
                          <div class="single-table">
                              <div class="table-responsive  table-hover">
                                  <table class="table text-center">
                                      <thead class="text-uppercase">
                                          <tr>
                                              <th scope="col">ID</th>
                                              <th scope="col">Name of Group</th>
                                              <th scope="col">View courses</th>
                                              <th scope="col">Edit</th>
                                              <th scope="col">delete</th>
                                              <th scope="col">Class</th>
                                          </tr>
                                          <?php
                                            if ($result_course_ar_c && (mysql_num_rows($result_course_ar_c) > 0)) {
                                                while ($row_course_ar_c = mysql_fetch_assoc($result_course_ar_c)){
                                                    $id =htmlspecialchars($row_course_ar_c['id']);
                                                    $name =htmlspecialchars($row_course_ar_c['name']);
                                                    $home =htmlspecialchars($row_course_ar_c['home']);
                                                    $class =htmlspecialchars($row_course_ar_c['class']);
                                                    ?>
                                      </thead>
                                      <tbody>
                                          <tr class="<?php if($class == 'A'){ echo 'alert-success'; }elseif($class == 'B'){ echo 'alert-warning'; }elseif($class == 'C'){ echo 'alert-info
                                            '; }else?>">
                                              <th scope="row"><?php echo $id ; ?></th>
                                              <td><a href="?page=course_c/edit&id=<?php echo $id ;?>" ><?php echo $name ; ?></a></td>
                                              <td><a href="?page=course_main-view&course_c=<?php echo $id ;?>" >View (<?php
                                              $sql_course_main_count = "SELECT `id` FROM `course_main` Where `course_c` = '{$id}'";
                                              $result_course_main_count = mysql_query($sql_course_main_count, $conn);
                                              echo $numrows = mysql_num_rows($result_course_main_count);
                                              if($class == 'A'){ $num_of_class_A += $numrows; }
                                              elseif($class == 'B'){ $num_of_class_B += $numrows; }
                                              elseif($class == 'C'){ $num_of_class_C += $numrows; }
                                              else{ $num_of_class_no += $numrows; }
                                              ?>)</a>
                                              </td>
                                              
                                              <td><a href="?page=course_c/edit&id=<?php echo $id ;?>"><i class="fa fa-edit"></i></a></td>
                                              <td>
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
                                          <td><?php if($class !=''){ echo $class; }else{ ?><span class="status-p bg-danger">No Class</span><?php }; ?></td>
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
                                                    ?><a href="?page=course_c/view&start=<?php echo $start - $integer ; ?>
                                                        <?php if ( isset($_GET['id_course_ar_c_c'] )){ echo "&id_course_ar_c_c=$id_course_ar_c_c"; }; ?>
                                                        <?php if ( isset($_GET['id_course_ar_c'] )){ echo "&id_course_ar_c=$id_course_ar_c"; }; ?>"  class="linlk">Previous</a>
                                                    <?php
                                                };
                                            if($numrows>$end and $start>0){ echo " - ";};
                                                if($numrows>$end){
                                                ?><a href="?page=course_c/view&start=<?php echo $integer + $start; ?>
                                                        <?php if ( isset($_GET['id_course_ar_c_c'] )){ echo "&id_course_ar_c_c=$id_course_ar_c_c"; }; ?>
                                                        <?php if ( isset($_GET['id_course_ar_c'] )){ echo "&id_course_ar_c=$id_course_ar_c"; }; ?>"  class="linlk">Next</a>
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

          
