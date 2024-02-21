<?php
if($level_admin > 3){ exit; }
$table = 'cities';
$id = $_GET["id"];
// Query the database
$sql_course_ar_c = "SELECT * FROM `cities` WHERE 1 AND `id` LIKE '" . $id . "' ";
$result_course_ar_c = mysql_query($sql_course_ar_c, $conn);
if ($result_course_ar_c && (mysql_num_rows($result_course_ar_c) > 0)) {
	$row_course_ar_c = mysql_fetch_assoc($result_course_ar_c);
	$id =htmlspecialchars($row_course_ar_c['id']);
	$name =htmlspecialchars($row_course_ar_c['name']);
};
$row_function = $row_course_ar_c;
require("function.php");

?>





          <!-- page title area end -->
            <div class="main-content-inner">

              <div class="col-12 mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="header-title">Add New City</h4>
                          <form method="post" action="?page=cities-replace&amp;id=<?php echo $id; ?>">
                              <div class="form-row">
                                <div class="col-6 mb-3"><?php form_edit('City Name','name'); ?></div>
                                <div class="col-6 mb-3"><?php form_edit('Alias','s_alias'); ?></div>
                              </div>

                              <div class="form-row">
                                <div class="col-4 mb-3"><?php form_edit('Hotel Name','hotel_name'); ?></div>
                                <div class="col-4 mb-3"><?php form_edit('Hotel Link','hotel_link'); ?></div>
                                <div class="col-4 mb-3"><?php form_edit('Hotel Photo','hotel_photo'); ?></div>
                              </div>
                              
                              <h4 class="tit-class">Class (A)</h4>
                              <div class="form-row alert-success  py-3">
                                <div class="col-2 mb-2"><?php $currency_function='&euro;'; form_edit('One Week Price','w1_p'); ?></div>
                                <div class="col-2 mb-2"><?php $currency_function='&euro;'; form_edit('Tow Week Price','w2_p'); ?></div>
                                <div class="col-2 mb-2"><?php $currency_function='&euro;'; form_edit('Three Week Price','w3_p'); ?></div>
                                <div class="col-2 mb-2"><?php $currency_function='&euro;'; form_edit('Four Week Price','w4_p'); ?></div>
                                <div class="col-2 mb-2"><?php form_edit('Repeat per year','x'); ?></div>
                                <div class="col-2 mb-2"><?php check_box_edit('Start Day monday','monday'); ?></div>
                              </div>

                              <h4 class="tit-class">Class (B)</h4>
                              <div class="form-row alert-warning  py-3">
                                <div class="col-2 mb-2"><?php $currency_function='&euro;'; form_edit('One Week Price','w1_p_b'); ?></div>
                                <div class="col-2 mb-2"><?php $currency_function='&euro;'; form_edit('Tow Week Price','w2_p_b'); ?></div>
                                <div class="col-2 mb-2"><?php $currency_function='&euro;'; form_edit('Three Week Price','w3_p_b'); ?></div>
                                <div class="col-2 mb-2"><?php $currency_function='&euro;'; form_edit('Four Week Price','w4_p_b'); ?></div>
                                <div class="col-2 mb-2"><?php form_edit('Repeat per year','x_b'); ?></div>
                                </div>
                            

                                <h4 class="tit-class">Class (C)</h4>
                              <div class="form-row alert-info py-3">
                                <div class="col-2 mb-2"><?php $currency_function='&euro;'; form_edit('One Week Price','w1_p_c'); ?></div>
                                <div class="col-2 mb-2"><?php $currency_function='&euro;'; form_edit('Tow Week Price','w2_p_c'); ?></div>
                                <div class="col-2 mb-2"><?php $currency_function='&euro;'; form_edit('Three Week Price','w3_p_c'); ?></div>
                                <div class="col-2 mb-2"><?php $currency_function='&euro;'; form_edit('Four Week Price','w4_p_c'); ?></div>
                                <div class="col-2 mb-2"><?php form_edit('Repeat per year','x_c'); ?></div>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="col-6 mb-3">
                                  <div class="form-group"><?php textarea_edit('About','About'); ?></div>
                                </div>
                                <div class="col-6 mb-3">
                                  <div class="form-group"><?php textarea_edit('Things to do','Things_to_do_and_places_to_visit'); ?></div>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="col-6 mb-3">
                                  <div class="form-group"><?php textarea_edit('Hotel Address','hotel_address'); ?></div>
                                </div>
                                <div class="col-6 mb-3">
                                    <?php form_edit('Map Linke','embed_map'); ?><br />
                                    <?php form_edit('Hotel Logo','hotel_logo'); ?><br />
                                    <?php form_edit('Continental','continental'); ?>
                                </div>
                              </div>




                          <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php if($id==''){ echo 'Add'; }else{ echo 'Edit'; }; ?></button>
</form>

                      </div>
                  </div>
              </div>

            </div>





<?php
if($id !='' and $level_admin <= 2){
// Query the database
$main .="WHERE `table` = 'cities' AND `admin_id` = '{$id}'";
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
														        </tr><?php
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
