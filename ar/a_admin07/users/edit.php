<?php if($level_admin !=1){ exit; }?><?php
if(!isset($level)){ $level =5; }
if(isset($_GET['user_name'])){ $user_name_ch = $_GET['user_name']; }else{ $user_name_ch = ''; }
// Query the database
$sql_user_name_ch = "SELECT * FROM `user_name` WHERE 1 AND `user_name` LIKE '" . $user_name_ch . "' ";
$result_user_name_ch = $mysqli -> query($sql_user_name_ch);
if($view_aa == 1){ 
	?>
    <div class="alert alert-primary" role="alert">
      <h4 class="alert-heading">MSQL</h4>
      <p><?php echo $sql_user_name_ch; ?></p>

    <?php if($mysqli->error){
          ?>
          <hr>
      <p class="mb-0"><?php printf("Error message: %s\n", $mysqli->error); ?></p>
          <?php
       } ?>    
    </div>
    <?php
}
if ($result_user_name_ch && (mysqli_num_rows($result_user_name_ch) > 0)) {
	$row_user_name_ch = $result_user_name_ch-> fetch_assoc();
	$user_name_ch =$row_user_name_ch['user_name'];
	$level =$row_user_name_ch['level'];
	$activ =$row_user_name_ch['activ'];
	$view_log =$row_user_name_ch['view_log'];
	$mob =$row_user_name_ch['mob'];
	$ar_name =$row_user_name_ch['ar_name'];
	$last_name =$row_user_name_ch['last_name'];
	$email =$row_user_name_ch['email'];
};
if(isset($row_user_name_ch)){ $row_function = $row_user_name_ch; }else{ $row_function = ''; }

$table = 'user_name';

?>


          <!-- page title area end -->
            <div class="main-content-inner row">
              <div class="col-lg-6 mt-5">
                  <div class="card">
                      <div class="card-body"><br/><br/><br/>
                          <h4 class="header-title"><?php if(isset( $_GET['user_name'] )){ echo"Edit Users: ".$name ; }else{ echo "Add New Users";}; ?></h4>
                          <form method="post" action="?page=users-replace">


                             <div class="form-group"><?php if($user_name_ch ==''){ ?><input class="form-control" type="text" placeholder="Enter User Name" name="user_name_ch"/><?php }else{ echo $user_name_ch; ?><input name="user_name_ch" type="hidden"  value="<?php echo $user_name_ch; ?>"/><input type="hidden" name="add" value="1" /><?php }?> </div><?php if($user_name_ch ==''){ ?>
                              <div class="form-group">
                                <input  class="form-control" type="password" id="exampleInputPassword1" placeholder="Enter password" name="pass1"/>
                              </div>
                              <div class="form-group">
                                <input  class="form-control" type="password" id="exampleInputPassword1" placeholder="Enter RE Password" name="pass2">
                              </div><?php } ?>
                              <div class="form-group">
                                <select class="form-control form-control-lg" name="level">
                                    <option>Privilege</option>
                                    <option value="1" <?php if($level == 1){ ?> selected="selected"<?php }?>>1 Super Admin</option>
                                    <option value="2" <?php if($level == 2){ ?> selected="selected"<?php }?>>2 Admin</option>
                                    <option value="3" <?php if($level == 3){ ?> selected="selected"<?php }?>>3 Editor</option>
                                    <option value="4" <?php if($level == 4){ ?> selected="selected"<?php }?>>4 Sub Editor</option>
                                </select>
                              </div>

																<div class="user-radio">
                                  <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" <?php if(!isset( $_GET['user_name']) or $activ == 1){ ?>checked <?php }; ?> id="customRadio4" class="custom-control-input" name="activ" value="1" <?php if(isset($activ) and $activ == 1){ ?> checked<?php }?>>
                                    <label class="custom-control-label" for="customRadio4">Active</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                   <input type="radio" <?php if(isset( $_GET['user_name']) and $activ == 0){ ?>checked <?php }; ?> id="customRadio5" class="custom-control-input" name="activ" value="0" <?php if(isset($activ) and $activ == 0){ ?> checked<?php }?>>
                                    <label class="custom-control-label" for="customRadio5">Not Active</label>
                                  </div>
																</div>
                                                                
                               <div class="form-group"><input class="form-control" type="text" placeholder="Enter Full Name" name="last_name" value="<?php if(isset($last_name)){ echo $last_name; } ?>"/></div>
                               <div class="form-group"><input class="form-control" type="text" placeholder="Enter mobile number" name="mob" value="<?php if(isset($mob)){ echo $mob; } ?>"/></div>
                               <div class="form-group"><input class="form-control" type="text" placeholder="Enter E-mail address" name="email" value="<?php if(isset($email)){ echo $email; } ?>"/></div>
                                                                
                                                                
                                                                
                                                                <div class="user-radio">
                                  <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" <?php if(isset( $_GET['user_name']) and $view_log == 1){ ?>checked <?php }; ?>  id="view_log1" class="custom-control-input" name="view_log" value="1" <?php if(isset($view_log) and $view_log == 1){ ?> checked<?php }?>>
                                    <label class="custom-control-label" for="view_log1">View history log</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                   <input type="radio" <?php if(!isset( $_GET['user_name']) or $view_log == 0){ ?>checked <?php }; ?> id="view_log2" class="custom-control-input" name="view_log" value="0" <?php if(isset($activ) and $activ == 0){ ?> checked<?php }?>>
                                    <label class="custom-control-label" for="view_log2">Can not view history log</label>
                                  </div>
																</div>
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                


                              <br/><br/><br/>
                              <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#exampleModalCenter"><?php if(isset( $_GET['user_name'] )){ echo"Edit"; }else{ echo "Add";}; ?></button>
                              <br/><br/><br/>
                          </form>

                      </div>
                  </div>
              </div>
							<div class="col-lg-4 mt-5 level">

								<?php include('users/Privilege.php'); ?>
							</div>
            </div>




        <!-- main content area end -->
