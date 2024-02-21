<?php
if($level_admin > 3){ exit; }
$id = $_GET["id"];
// Query the database
$sql_course_ar_c = "SELECT * FROM `search` WHERE 1 AND `id` LIKE '" . $id . "' ";
$result_course_ar_c = $mysqli -> query($sql_course_ar_c);
if ($result_course_ar_c && (mysqli_num_rows($result_course_ar_c) > 0)) {
	$row_course_ar_c = $result_course_ar_c-> fetch_assoc();
	
	$id =htmlspecialchars($row_course_ar_c['id']);
    $Month =htmlspecialchars($row_course_ar_c['Month']);
    $Category =htmlspecialchars($row_course_ar_c['Category']);
    $City =htmlspecialchars($row_course_ar_c['City']);
    $ref =htmlspecialchars($row_course_ar_c['ref']);
    $Date =htmlspecialchars($row_course_ar_c['Date']);
    $ip =htmlspecialchars($row_course_ar_c['ip']);
	$Find =htmlspecialchars($row_course_ar_c['Find']);
	$country =htmlspecialchars($row_course_ar_c['country']);
	

};
$row_function = $row_course_ar_c;
$table = 'search';

?>


          <!-- page title area end -->
            <div class="main-content-inner row">
              <div class="col-lg-6 mt-5">
                  <div class="card">
                      <div class="card-body"><br/><br/><br/>
                         
                          <form method="post" action="?page=advsearch-replace"><input name="id" type="hidden" id="id" value="<?php echo $id  ?>"/>
                              <div class="form-group"><?php form_edit('id','id'); ?></div>
                              <div class="form-group"><?php form_edit('Month','Month'); ?></div>
                              <div class="form-group"><?php form_edit('Category','Category'); ?></div>
                              <div class="form-group"><?php form_edit('City','City'); ?></div>
                              <div class="form-group"><?php form_edit('ref','ref'); ?></div>
                              <div class="form-group"><?php form_edit('title','title'); ?></div>
                              <div class="form-group"><?php form_edit('Date','Date'); ?></div>
                              <div class="form-group"><?php form_edit('ip','ip'); ?></div>
                              <div class="form-group"><?php form_edit('Find','Find'); ?></div>
                              <div class="form-group"><?php form_edit('country','country'); ?></div>
                          <br/><br/><br/>
                          <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#exampleModalCenter"><?php if(isset( $_GET['id'] )){ echo"Edit"; }else{ echo "Add";}; ?></button>
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
				$main .="WHERE `table` = 'search' AND `admin_id` = '{$id}'";
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
