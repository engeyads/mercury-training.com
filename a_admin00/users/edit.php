<?php if($level_admin !=1){ exit; }?><?php
$user_name_ch = $_GET["user_name"];
// Query the database
$sql_user_name_ch = "SELECT * FROM `user_name` WHERE 1 AND `user_name` LIKE '" . $user_name_ch . "' ";
$result_user_name_ch = mysql_query($sql_user_name_ch, $conn);
if ($result_user_name_ch && (mysql_num_rows($result_user_name_ch) > 0)) {
	$row_user_name_ch = mysql_fetch_assoc($result_user_name_ch);
	$user_name_ch =$row_user_name_ch['user_name'];
	$level =$row_user_name_ch['level'];
	$activ =$row_user_name_ch['activ'];
};
$row_function = $row_user_name_ch;
$table = 'user_name';
require("function.php");
?>


          <!-- page title area end -->
            <div class="main-content-inner row">
              <div class="col-lg-6 mt-5">
                  <div class="card">
                      <div class="card-body"><br/><br/><br/>
                          <h4 class="header-title"><?php if(isset( $_GET['id'] )){ echo"Edit Users: ".$name ; }else{ echo "Add New Users";}; ?></h4>
                          <form method="post" action="index.php?page=users-replace">


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
                                    <option value="1" <?php if($level == 1){ ?> selected="selected"<?php }?>>1</option>
                                    <option value="2" <?php if($level == 2){ ?> selected="selected"<?php }?>>2</option>
                                    <option value="3" <?php if($level == 3){ ?> selected="selected"<?php }?>>3</option>
                                    <option value="4" <?php if($level == 4){ ?> selected="selected"<?php }?>>4</option>
                                    <option value="5" <?php if($level == 5){ ?> selected="selected"<?php }?>>5</option>
                                </select>
                              </div>

																<div class="user-radio">
                                  <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" checked id="customRadio4" class="custom-control-input" name="activ" value="1" <?php if($activ == 1){ ?> checked<?php }?>>
                                    <label class="custom-control-label" for="customRadio4">Active</label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadio5" class="custom-control-input" name="activ" value="0" <?php if($activ == 0){ ?> checked<?php }?>>
                                    <label class="custom-control-label" for="customRadio5">Not Active</label>
                                  </div>
																</div>


                              <br/><br/><br/>
                              <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#exampleModalCenter"><?php if(isset( $_GET['user_name'] )){ echo"Edit"; }else{ echo "Add";}; ?></button>
                              <br/><br/><br/>
                          </form>
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalCenterTitle"></h5>

                                </div>
                                <div class="modal-body text-center font-weight-bold text-primary">
                                  The Group Has Been Added
                                </div>
                                <div class="modal-footer">

                                </div>
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
							<div class="col-lg-4 mt-5 level">

								<div>
									<h3 class="text-primary">Level 1 :</h3>
									<ul>
										<li>Add User / Change User</li>
										<li>Add City / Change Category</li>
										<li>Add Course / Change Course</li>
										<li>See History</li>
										<li>Add date / Change Date</li>
									</ul>
								</div>

								<div>
									<h3 class="text-primary">Level 2 :</h3>
									<ul>
										<li>Add City / Change Category</li>
										<li>Add Course / Change Course</li>
										<li>See History</li>
										<li>Add date / Change Date</li>
									</ul>
								</div>

								<div>
									<h3 class="text-primary">Level 3 :</h3>
									<ul>
										<li>Add Course / Change Course</li>
										<li>See History</li>
										<li>Add date / Change Date</li>
									</ul>
								</div>

								<div>
									<h3 class="text-primary">Level 4 :</h3>
									<ul>
										<li>See History</li>
										<li>Add date / Change Date</li>
									</ul>
								</div>
								<div>
									<h3 class="text-primary">Level 5 :</h3>
									<ul>
										<li>Add date / Change Date</li>
									</ul>
								</div>










							</div>
            </div>




        <!-- main content area end -->
