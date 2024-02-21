<?php
if($level_admin > 3){ exit; }
$id = $_GET["id"];
// Query the database
$sql_course_ar_c = "SELECT * FROM `alias` WHERE 1 AND `id` LIKE '" . $id . "' ";
$result_course_ar_c = mysql_query($sql_course_ar_c, $conn);
if ($result_course_ar_c && (mysql_num_rows($result_course_ar_c) > 0)) {
	$row_course_ar_c = mysql_fetch_assoc($result_course_ar_c);
	

	$id =htmlspecialchars($row_course_ar_c['id']);
    $alias =htmlspecialchars($row_course_ar_c['alias']);
    $url =htmlspecialchars($row_course_ar_c['url']);
    $keywords =htmlspecialchars($row_course_ar_c['keywords']);
    $description =htmlspecialchars($row_course_ar_c['description']);
    $title =htmlspecialchars($row_course_ar_c['title']);
    $date =htmlspecialchars($row_course_ar_c['date']);
    $ip =htmlspecialchars($row_course_ar_c['ip']);
};
$row_function = $row_course_ar_c;
$table = 'alias';
require("function.php");
?>


          <!-- page title area end -->
            <div class="main-content-inner row">
              <div class="col-lg-6 mt-5">
                  <div class="card">
                      <div class="card-body"><br/><br/><br/>
                         
                          <form method="post" action="index.php?page=advalias-replace"><input name="id" type="hidden" id="id" value="<?php echo $id  ?>"/>
                              <div class="form-group"><?php form_edit('id','id'); ?></div>
                              <div class="form-group"><?php form_edit('alias','alias'); ?></div>
                              <div class="form-group"><?php form_edit('url','url'); ?></div>
                              <div class="form-group"><?php form_edit('keywords','keywords'); ?></div>
                              <div class="form-group"><?php form_edit('description','description'); ?></div>
                              <div class="form-group"><?php form_edit('title','title'); ?></div>
                              <div class="form-group"><?php form_edit('date','date'); ?></div>
                              <div class="form-group"><?php form_edit('ip','ip'); ?></div>
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
				$main .="WHERE `table` = 'alias' AND `admin_id` = '{$id}'";
				$sql_admin_history1 = "SELECT * FROM `admin_history` $main ORDER BY `id` DESC";
				$result_admin_history1 = mysql_query($sql_admin_history1, $conn);
				$numrows = mysql_num_rows($result_admin_history1);

				// Query the database
				$sql_admin_history = "$sql_admin_history1";
				$result_admin_history = mysql_query($sql_admin_history, $conn);
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
													if ($result_admin_history && (mysql_num_rows($result_admin_history) > 0)) {
														while ($row_admin_history = mysql_fetch_assoc($result_admin_history)){
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
