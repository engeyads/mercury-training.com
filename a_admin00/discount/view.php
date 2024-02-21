<?php if($level_admin > 3){ exit; } ?>
<?php
$integer =30;
if ( isset($_GET['start'] )){
	$start = $_GET["start"];
}else{
	$start = 0;
};
$start ;
$end = $integer + $start ;
// Query the database
$sql_course_ar_c1 = "SELECT * FROM `discount` ";
$result_course_ar_c1 = mysql_query($sql_course_ar_c1, $conn);
$numrows = mysql_num_rows($result_course_ar_c1);

// Query the database
$sql_course_ar_c = "$sql_course_ar_c1 LIMIT $start , $integer";
$result_course_ar_c = mysql_query($sql_course_ar_c, $conn);
?>




            




              <!-- basic table start -->
              <div class="col-lg-12 mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="header-title">discount</h4>
                          <div class="single-table">
                              <div class="table-responsive">
                                  <table class="table text-center table-hover">
                                      <thead class="text-uppercase">
                                          <tr>
                                              
                                              <th scope="col">Code</th>
                                              <th scope="col">Course Id</th>
                                              <th scope="col">City</th>
                                              <th scope="col">Percentage<th>
                                              <th scope="col">Amount<th>
                                              <th scope="col">Count<th>
                                              <th scope="col">Used<th>
                                              <th scope="col">Expiry Date<th>
                                              <th scope="col">Admin Note<th>
                                              <th scope="col">View Note<th>
                                              <th scope="col">Edit<th>
                                              <th scope="col">Delete<th>                                                
                                          </tr>
                                          <?php
                                            if ($result_course_ar_c && (mysql_num_rows($result_course_ar_c) > 0)) {
                                                while ($row_course_ar_c = mysql_fetch_assoc($result_course_ar_c)){
                                                    
                                                    $id =htmlspecialchars($row_course_ar_c['id']);
                                                    $code =htmlspecialchars($row_course_ar_c['code']);
                                                    $course_id =htmlspecialchars($row_course_ar_c['course_id']);
                                                    $city =htmlspecialchars($row_course_ar_c['city']);
                                                    $percentage =htmlspecialchars($row_course_ar_c['percentage']);
                                                    $amount =htmlspecialchars($row_course_ar_c['amount']);
                                                    $count =htmlspecialchars($row_course_ar_c['count']);
                                                    $used =htmlspecialchars($row_course_ar_c['used']);
                                                    $expiry =htmlspecialchars($row_course_ar_c['expiry_date']);
                                                    $admin_not =htmlspecialchars($row_course_ar_c['admin_not']);
                                                    $view_not =htmlspecialchars($row_course_ar_c['view_note']);
                                                    ?>
                                      </thead>
                                      <tbody>
                                          <tr>
                                             
                                              <td><?php echo $code ; ?> <?php 
                                              $sql_code_log = "SELECT * FROM `code_log` WHERE `code` LIKE '{$row_course_ar_c['code']}'";
                                              $result_code_log = mysql_query($sql_code_log, $conn);
                                              $code_log_numrows = mysql_num_rows($result_code_log);
                                              if($code_log_numrows > 0){ echo '<strong style="color:#F00">('.$code_log_numrows.')</strong>'; }
                                              ?></td>
                                              <td><?php echo $course_id ; ?></td>
                                              <td><?php echo $city ; ?></td>
                                              <td><?php echo $percentage; ?></td>
                                              <td></td>
                                              <td><?php echo $amount; ?></td>
                                              <td></td>
                                              <td><?php echo $count; ?></td>
                                              <td></td>
                                              <td><?php echo $used; ?></td>
                                              <td></td>
                                              <td><?php echo $expiry; ?></td>
                                              <td></td>
                                              <td><?php echo $admin_not; ?></td>
                                              <td></td>
                                              <td><?php echo $view_not; ?></td>
                                              <td></td>
                                              <td><a href="?page=discount-edit&id=<?php echo $id ;?>"><i class="fa fa-edit"></i></a></td>
                                              <td></td>
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
                                                    <span class="b-remove"><a type="button" class="btn btn-primary" href="?page=discount-del&amp;id=<?php echo $id ;?>">Yes</a></span>
                                                    </div>
                                                </div>
                                                </div>
                                            </div><button class="button-del" type="button" data-toggle="modal" data-target="#exampleModal<?php echo $id ;?>"><i class="ti-trash"></i></button>
                                            </td>
                                          </tr>
                                          		<?php
                                            }
                                        };
                                         ?>
                                         
                                         
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- basic table end -->






