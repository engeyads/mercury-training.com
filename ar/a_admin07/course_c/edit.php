<?php
if($level_admin > 3){ exit; }
if(isset($_GET['id'])){ $id = $_GET['id']; }else{ $id = ''; }

// Query the database
$sql_course_ar_c = "SELECT * FROM `course_c` WHERE 1 AND `id` LIKE '" . $id . "' ";
$result_course_ar_c = $mysqli -> query($sql_course_ar_c);
if($view_aa == 1){ 
	?>
    <div class="alert alert-primary" role="alert">
      <h4 class="alert-heading">MSQL</h4>
      <p><?php echo $sql_course_ar_c; ?></p>

    <?php if($mysqli->error){
          ?>
          <hr>
      <p class="mb-0"><?php printf("Error message: %s\n", $mysqli->error); ?></p>
          <?php
       } ?>    
    </div>
    <?php
}
if ($result_course_ar_c && (mysqli_num_rows($result_course_ar_c) > 0)) {
	$row_course_ar_c = $result_course_ar_c-> fetch_assoc();
	$id =$row_course_ar_c['id'];
	$name =$row_course_ar_c['name'];
	$home =$row_course_ar_c['home'];
	$class =$row_course_ar_c['class'];
}else{
	$class='';
};
if(isset($row_course_ar_c)){ $row_function = $row_course_ar_c; }else{ $row_function = ''; }
$table = 'course_c';

?>


          <!-- page title area end -->
            <div class="main-content-inner row

                        ">
              <div class="col-lg-6 mt-5">
                  <div class="card">
                      <div class="card-body"><br/><br/><br/>
                          <h4 class="header-title"><?php if(isset( $_GET['id'] )){ echo"Edit Category: ".$name ; }else{ echo "Add New Category";}; ?></h4>
                          <form method="post" action="?page=course_c-replace"><input name="id" type="hidden" id="id" value="<?php echo $id  ?>"/>
                              <div class="form-group"><?php form_edit('Category Name','name'); ?></div>
                              <div class="form-group"><?php form_edit('Shortcut','sh'); ?></div>
                              <div class="form-group"><?php form_edit('glyphicon','glyphicon'); ?></div>
                              <div class="form-group"><?php form_edit('color','color'); ?></div>
                              <div class="form-group"><?php form_edit('Alias','s_alias'); ?></div>
                              <div class="form-group">
							  	<label class="col-form-label">Class</label>
                                <select class="form-control" name="class">
                                	<option>Select Class</option>
                                	<option value="A" <?php if($class == 'A'){ ?> selected="selected"<?php }; ?>>A</option>
                                	<option value="B" <?php if($class == 'B'){ ?> selected="selected"<?php }; ?>>B</option>
                                	<option value="C" <?php if($class == 'C'){ ?> selected="selected"<?php }; ?>>C</option>
                            	</select>
							  </div>

                          <br/><br/><br/>
                          <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#exampleModalCenter"><?php if(isset( $_GET['id'] )){ echo"<i class=\"fa fa-pencil\" aria-hidden=\"true\"></i> Edit"; }else{ echo "<i class=\"fa fa-pencil\" aria-hidden=\"true\"></i> Add";}; ?></button>
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

            </div>
        <!-- main content area end -->


				<?php
				if($id !='' and $level_admin <= 2){
				// Query the database
				$main .="WHERE `table` = 'course_c' AND `admin_id` = '{$id}'";
				$sql_admin_history1 = "SELECT * FROM `admin_history` $main ORDER BY `id` DESC";
				$result_admin_history1 = $mysqli -> query($sql_admin_history1);
				$numrows = mysqli_num_rows($result_admin_history1);

				// Query the database
				$sql_admin_history = "$sql_admin_history1";
				$result_admin_history = $mysqli -> query($sql_admin_history);
				?>
				<!-- page title area end -->


			<div class="main-content-inner">
				<div class="col-12 mt-5">
				<p class="mb-2">
				<a class="btn btn-outline-primary font-weight-bold" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">View History</a>
				</p>
				    <div class="card">
				        <div class="card-body card-hidd">
				            <div class="collapse" id="collapseExample">
				                <div class="card card-body">
				                    <div class="single-table">
				                        <div class="table-responsive">
											<table class="table table-striped table-hover">
												<thead class="text-uppercase">
													<tr>
														<th scope="col">user</th>
														<th scope="col">Date</th>
														<th scope="col">time</th>
														<th scope="col">type</th>
														<th scope="col">text</th>
														<th scope="col">IP</th>
													</tr>
												</thead>
												<tbody> <?php
													if ($result_admin_history && (mysqli_num_rows($result_admin_history) > 0)) {
														while ($row_admin_history = $result_admin_history-> fetch_assoc()){
														$id =htmlspecialchars($row_admin_history['id']);
														?>
														<tr>
															<td scope="row"><?php echo $row_admin_history['user_name']; ?></td>
															<td><?php echo $row_admin_history['Date']; ?></td>
															<td><?php echo $row_admin_history['time']; ?></td>
															<td><?php echo $row_admin_history['type']; ?></td>
															<td><?php echo $row_admin_history['Text']; ?></td>
															<td><?php echo $row_admin_history['ip']; ?></td>
														</tr>
														<?php
														}
														}else{ echo " There are no Items to display "; };
														?>
												</tbody>
											</table>
				                        </div>
				                    </div>
				                </div>
				            </div>
				        </div>
					</div>
				</div>
			</div>
		<?php }; ?>
