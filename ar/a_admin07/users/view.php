<?php if($level_admin !=1){ exit; }?><?php

$integer =30;
if ( isset($_GET['start'] )){
	$start = $_GET["start"];
}else{
	$start = 0;
};
$start ;
$end = $integer + $start ;
$OrderPage='users';


$OrderPage='users';


if(isset($_GET['sort_by_user_name']) and $_GET['sort_by_user_name'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `user_name` DESC'; $get .= "&sort_by_user_name=1&desc=1";
}elseif(isset($_GET['sort_by_user_name']) and $_GET['sort_by_user_name'] == 1){
  $order = 'ORDER BY `user_name` ASC'; $get .= "&sort_by_user_name=1";
}elseif(isset($_GET['sort_by_level']) and $_GET['sort_by_level'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `level` DESC'; $get .= "&sort_by_level=1&desc=1";
}elseif(isset($_GET['sort_by_level']) and $_GET['sort_by_level'] == 1){
  $order = 'ORDER BY `level` ASC'; $get .= "&sort_by_level=1";
}elseif(isset($_GET['sort_by_activ']) and $_GET['sort_by_activ'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `activ` DESC'; $get .= "&sort_by_activ=1&desc=1";
}elseif(isset($_GET['sort_by_activ']) and $_GET['sort_by_activ'] == 1){
  $order = 'ORDER BY `activ` ASC'; $get .= "&sort_by_activ=1";
}
elseif(isset($_GET['sort_by_log']) and $_GET['sort_by_log'] == 1 and isset($_GET['desc']) and $_GET['desc'] == 1){
  $order = 'ORDER BY `view_log` DESC'; $get .= "&sort_by_log=1&desc=1";
}elseif(isset($_GET['sort_by_log']) and $_GET['sort_by_log'] == 1){
  $order = 'ORDER BY `view_log` ASC'; $get .= "&sort_by_log=1";
}
else{
  $order = 'ORDER BY `user_name` ASC';
}


// Query the database
$sql_course_ar_c1 = "SELECT * FROM `user_name`";
$result_course_ar_c1 = $mysqli -> query($sql_course_ar_c1);
$numrows = mysqli_num_rows($result_course_ar_c1);

// Query the database
$sql_course_ar_c = "$sql_course_ar_c1 $order LIMIT $start , $integer";
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
            <div class="main-content-inner">
              <!-- BUtton viwe start -->
              <div class="but-head">
                <a href="?page=users-edit" class="btn btn-outline-primary font-weight-bold linlk"><i class="fa fa-plus" aria-hidden="true"></i> Add User</a>
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

                                              <th scope="col"><?php SortBy('sort_by_user_name','User Name'); ?></th>
                                              <th scope="col">Change Password</th>
                                              <th scope="col"><?php SortBy('sort_by_level','Privilege'); ?></th>
																							<th scope="col"><?php SortBy('sort_by_activ','Active'); ?></th>
                                              <th scope="col"><?php SortBy('sort_by_log','View Log'); ?></th>
                                              <th scope="col">Edit</th>
                                              <th scope="col">Delete</th>
                                          </tr>
                                          <?php
                                            if ($result_course_ar_c && (mysqli_num_rows($result_course_ar_c) > 0)) {
                                                while ($row_course_ar_c = $result_course_ar_c-> fetch_assoc()){
                                                    $user_name =htmlspecialchars($row_course_ar_c['user_name']);
                                                    $myUserNameClass ='';
                                                    if($user_name == $user_nameA){ $myUserNameClass = ' class="bg-success text-white"'; }
                                                    ?>
                                      </thead>
                                      <tbody>
                                          <tr>

                                              <td<?php echo $myUserNameClass; ?>><a href="?page=users-edit&user_name=<?php echo $user_name ;?>" ><?php echo $user_name ; ?></a></td>
                                              <td<?php echo $myUserNameClass; ?>><a href="?page=users-change&user_name=<?php echo $user_name ;?>"><i class="fa fa-refresh fa-lg"></i></a></td>
                                              <td<?php echo $myUserNameClass; ?>><?php echo $row_course_ar_c['level']?></td>
                                              <td<?php echo $myUserNameClass; ?>><?php echo $row_course_ar_c['activ']?></td>
                                              <td<?php echo $myUserNameClass; ?>><?php echo $row_course_ar_c['view_log']?></td>
                       
                                              <td<?php echo $myUserNameClass; ?>><a href="?page=users-edit&user_name=<?php echo $user_name ;?>"><i class="fa fa-edit"></i></a></td>
                                              <td<?php echo $myUserNameClass; ?>><div class="modal fade" id="exampleModal<?php echo $user_name ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                          <span class="b-remove"><a type="button" class="btn btn-primary" href="?page=users-del&amp;id=<?php echo $user_name ;?>">Yes</a></span>
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
<div class="col-lg-12 mt-5 level">

								<?php include('users/Privilege.php'); ?>
							</div>