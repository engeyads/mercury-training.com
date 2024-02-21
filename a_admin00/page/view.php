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
$sql_course_ar_c1 = "SELECT * FROM `page` ";
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
                                  <table class="table  table-hover">
                                      <thead class="text-uppercase">
                                          <tr>
                                              
                                              <th scope="col">id</th>
                                               <th scope="col">show_title	</th>
                                              <th scope="col">name</th>
                                              <th scope="col">alias</th>
                                              <th scope="col">text</th>
                                              <th scope="col">type</th>
                                              <th scope="col">p_id</th>
                                              <th scope="col"> publish	  </th>
                                              <th scope="col">  trash	</th>
                                                <th scope="col"> edit	  </th>
                                              <th scope="col">  delete	</th>                           
                                          </tr>
                                          <?php
                                            if ($result_course_ar_c && (mysql_num_rows($result_course_ar_c) > 0)) {
                                                while ($row_course_ar_c = mysql_fetch_assoc($result_course_ar_c)){
                                                    
                                                    $id =htmlspecialchars($row_course_ar_c['id']);
                                                    $show_title =htmlspecialchars($row_course_ar_c['show_title']);
                                                    $en_name =htmlspecialchars($row_course_ar_c['en_name']);
                                                    $alias =htmlspecialchars($row_course_ar_c['alias']);
                                                    $en_text =htmlspecialchars($row_course_ar_c['en_text']);
                                                    $type =htmlspecialchars($row_course_ar_c['type']);
                                                    $p_id =htmlspecialchars($row_course_ar_c['p_id']);
                                                    $publish =htmlspecialchars($row_course_ar_c['publish']);
                                                    $trash =htmlspecialchars($row_course_ar_c['trash']);
                                     
                                                    ?>
                                      </thead>
                                      <tbody>
                                          <tr>
                                             
                                         
                                              <td><?php echo $id ; ?></td>
                                              <td><?php echo $show_title ; ?></td>
                                              <td><?php echo $en_name; ?></td>
                                              
                                              <td><?php echo $alias; ?></td>
                                           
                                              <td><?php //echo $en_text; ?> 0 </td>
                                               
                                              <td><?php echo $type; ?></td>
                                              
                                            <td><?php echo $p_id; ?></td>
                                              
                                                 <td><?php echo $publish; ?></td>
                                             
                                              <td><?php echo $trash; ?></td>
                                                                                       
                                              
                                              
                                              <td><a href="?page=discount-edit&id=<?php echo $id ;?>"><i class="fa fa-edit"></i></a></td>
                                             
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






