<?php if($level_admin !=1){ exit; }?><?php

$integer =30;
if ( isset($_GET['start'] )){
	$start = $_GET["start"];
}else{
	$start = 0;
};
$start ;
$end = $integer + $start ;
// Query the database
$sql_course_ar_c1 = "SELECT * FROM `user_name` where `user_name` !='{$user_nameA}'";
$result_course_ar_c1 = mysql_query($sql_course_ar_c1, $conn);
$numrows = mysql_num_rows($result_course_ar_c1);

// Query the database
$sql_course_ar_c = "$sql_course_ar_c1 LIMIT $start , $integer";
$result_course_ar_c = mysql_query($sql_course_ar_c, $conn);
?>
<br />
<br />





            <div class="main-content-inner">
              <!-- BUtton viwe start -->
              <div class="but-head">
                <a href="index.php?page=users-edit" class="btn btn-outline-primary font-weight-bold linlk">Add User</a>
              </div>
              <!-- BUtton viwe end -->
              <!-- basic table start -->
              <div class="col-lg-12 mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="header-title">All Users</h4>
                          <div class="single-table">
                              <div class="table-responsive  table-hover">
                                  <table class="table text-center">
                                      <thead class="text-uppercase">
                                          <tr>

                                              <th scope="col">User Name</th>
                                              <th scope="col">Change Password</th>
                                              <th scope="col">Privilege</th>
																							<th scope="col">Active</th>
                                              <th scope="col">Edit</th>
                                              <th scope="col">Delete</th>
                                          </tr>
                                          <?php
                                            if ($result_course_ar_c && (mysql_num_rows($result_course_ar_c) > 0)) {
                                                while ($row_course_ar_c = mysql_fetch_assoc($result_course_ar_c)){
                                                    $id =htmlspecialchars($row_course_ar_c['id']);
                                                    $user_name =htmlspecialchars($row_course_ar_c['user_name']);
                                                    ?>
                                      </thead>
                                      <tbody>
                                          <tr>

                                              <td><a href="?page=users-edit&user_name=<?php echo $user_name ;?>" ><?php echo $user_name ; ?></a></td>
                                              <td><a href="?page=users-change&user_name=<?php echo $user_name ;?>"><i class="fa fa-refresh fa-lg"></i></a></td>
                                              <td><?php echo $row_course_ar_c[level]?></td>
																							<td><?php echo $row_course_ar_c[activ]?></td>
                                              <td><a href="?page=users-edit&user_name=<?php echo $user_name ;?>"><i class="fa fa-edit"></i></a></td>
                                              <td><div class="modal fade" id="exampleModal<?php echo $user_name ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <span class="b-remove"><a type="button" class="btn btn-primary" href="?page=users-del&amp;user_name_ch=<?php echo $user_name ;?>">Yes</a></span>
                </div>
              </div>
            </div>
          </div><button class="button-del" type="button" data-toggle="modal" data-target="#exampleModal<?php echo $user_name ;?>"><i class="ti-trash"></i></button></td>

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
                                                    ?><a href="?page=users-view&start=<?php echo $start - $integer ; ?>
                                                        <?php if ( isset($_GET['id_course_ar_c_c'] )){ echo "&id_course_ar_c_c=$id_course_ar_c_c"; }; ?>
                                                        <?php if ( isset($_GET['id_course_ar_c'] )){ echo "&id_course_ar_c=$id_course_ar_c"; }; ?>"  class="linlk">Previous</a>
                                                    <?php
                                                };
                                            if($numrows>$end and $start>0){ echo " - ";};
                                                if($numrows>$end){
                                                ?><a href="?page=users-view&start=<?php echo $integer + $start; ?>
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
              <!-- basic table end -->
            </div>
        <!-- main content area end -->


<br><br><br>
