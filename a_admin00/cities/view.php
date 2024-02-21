
    <div id="show"></div>

    
    
    <!-- <script>
      
      function anas() {
        
            $('input').on('blur', function(){
      
                 // var val = $(this).parent().val();
              //   alert(val);
              $.ajax({
                  method : "POST",
                  url : 'anas.php',
                  data : {  comment: $(this).val() },
              
                  success : function(data, status, xhr){
                    console.log(data);
                    console.log(status);
                    $("#show").html(data);
                  },
                  
                  error : function(xhr, status, error){
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                  },
                
                });
      
            });
      }
      
          </script> -->
    
    
    
    
    <?php if($level_admin > 3){ exit; } ?><?php
$integer =50;
if ( isset($_GET['start'] )){
	$start = $_GET["start"];
}else{
	$start = 0;
};
$start ;
$end = $integer + $start ;
// Query the database
if($_GET[sort_by_price] == 1){
  $order = "ORDER BY `w1_p` ASC, `name` ASC";
}else{
  $order = "ORDER BY `name` ASC";
}


$sql_course_ar_c1 = "SELECT * FROM `cities` $main $order";
$result_course_ar_c1 = mysql_query($sql_course_ar_c1, $conn);
$numrows = mysql_num_rows($result_course_ar_c1);

// Query the database
$sql_course_ar_c = "$sql_course_ar_c1 LIMIT $start , $integer";
$result_course_ar_c = mysql_query($sql_course_ar_c, $conn);
?>





<div class="main-content-inner">


  <div class="row">

    <div class="col-md-8">


      <div class="card  w-100">
        
          <div class="card-body">
          
            <div class="mb-5 tit-head-in">
              <h4> Total Cities  <div> <?php echo $numrows; ?></div> </h4> 
            </div>

            <div class="state d-flex justify-content-between mb-3">
            
            <div class="">
              <div class="icon a">A</div> Class : Total Repeat 
              
              <strong>

              <?php
              $sql_sum_repeat = "SELECT sum(`x`) as 'sum_repeat' FROM `cities` $main";
              $result_sum_repeat = mysql_query($sql_sum_repeat, $conn);
              $numrows_sum_repeat = mysql_num_rows($result_sum_repeat);
              $row_sum_repeat = mysql_fetch_assoc($result_sum_repeat);
              echo $row_sum_repeat[sum_repeat];
              ?>
              </strong>
            </div>
        

          <div class="">
            <div class="icon b">B</div> Class : Total Repeat 
            
            <strong>

            <?php
            $sql_sum_repeat_b = "SELECT sum(`x_b`) as 'sum_repeat_b' FROM `cities` $main";
            $result_sum_repeat_b = mysql_query($sql_sum_repeat_b, $conn);
            $numrows_sum_repeat_b = mysql_num_rows($result_sum_repeat_b);
            $row_sum_repeat_b = mysql_fetch_assoc($result_sum_repeat_b);
            echo $row_sum_repeat_b[sum_repeat_b];
            ?>
            </strong>
          </div>
        

          <div class="">
          <div class="icon c">C</div> Class : Total Repeat 
            
            <strong>

            <?php
            $sql_sum_repeat_c = "SELECT sum(`x_c`) as 'sum_repeat_c' FROM `cities` $main";
            $result_sum_repeat_c = mysql_query($sql_sum_repeat_c, $conn);
            $numrows_sum_repeat_c = mysql_num_rows($result_sum_repeat_c);
            $row_sum_repeat_c = mysql_fetch_assoc($result_sum_repeat_c);
            echo $row_sum_repeat_c[sum_repeat_c];
            ?>
            </strong>
          </div>

        <div class="">
          <div class="icon n"><i class="fa fa-repeat" aria-hidden="true"></i></div> Total repeat: 
          <strong>
            <?php echo $row_sum_repeat[sum_repeat]+$row_sum_repeat_b[sum_repeat_b]+$row_sum_repeat_c[sum_repeat_c] ;?>
          </strong>
        </div>

            </div>
        
          </div>


      </div>
        
    </div>

    <div class="col-md-4">

          <!-- BUtton viwe start -->
          <div class="but-head  h-100 d-flex align-items-end justify-content-end">
            <?php if($_GET[sort_by_price] == 1){
              ?><a href="index.php?page=cities-view" class="btn btn-primary font-weight-bold"> <i class="fa fa-sort" ></i> Sort by name</a><?php
            }else{
              ?><a href="index.php?page=cities-view&sort_by_price=1" class="btn btn-primary font-weight-bold"> <i class="fa fa-sort" ></i> Sort by Price</a><?php
            }?>
            <a href="index.php?page=cities-edit" class="btn btn-primary font-weight-bold ml-2"><i class="fa fa-plus-square fa-fw "></i> Add City</a>
          </div>
          <!-- BUtton viwe end -->
    </div>



  <!-- basic table start -->
  <div class="col-lg-12 mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="header-title">control city</h4>
                          <div class="single-table">
                              <div class="table-responsive">
                                  <table class="table text-center table-hover">
                                      <thead class="text-uppercase">
                                      <tr>
                                        <th scope="col" colspan="4"></th>
                                        <th scope="col" colspan="5" class="alert-success"><strong>A Class</strong></th>
                                        <th scope="col" colspan="5" class="alert-warning"><strong>B Class</strong></th>
                                        <th scope="col" colspan="5" class="alert-info"><strong>C Class</strong></th>
                                        
                                        
                                        
                                      </tr>
                                      <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>

                                        <th scope="col" class="alert-success">1 Week</th>
                                        <th scope="col" class="alert-success">2 Weeks</th>
                                        <th scope="col" class="alert-success">3 Weeks</th>
                                        <th scope="col" class="alert-success">4 Weeks</th>
                                        <th scope="col" class="alert-success">Repeat</th>

                                        <th scope="col" class="alert-warning">1 Week</th>
                                        <th scope="col" class="alert-warning">2 Weeks</th>
                                        <th scope="col" class="alert-warning">3 Weeks</th>
                                        <th scope="col" class="alert-warning">4 Weeks</th>
                                        <th scope="col" class="alert-warning">Repeat</th>

                                        <th scope="col" class="alert-info">1 Week</th>
                                        <th scope="col" class="alert-info">2 Weeks</th>
                                        <th scope="col" class="alert-info">3 Weeks</th>
                                        <th scope="col" class="alert-info">4 Weeks</th>
                                        <th scope="col" class="alert-info">Repeat</th>
                                      </tr>
                                          <?php
                                            if ($result_course_ar_c && (mysql_num_rows($result_course_ar_c) > 0)) {
                                                while ($row_course_ar_c = mysql_fetch_assoc($result_course_ar_c)){
                                                    $break = 0;
                                                    $break1 = 0;
                                                    $id =htmlspecialchars($row_course_ar_c['id']);
                                                    $name =htmlspecialchars($row_course_ar_c['name']);
                                                    if($w1_p != htmlspecialchars($row_course_ar_c['w1_p'])){ $break = 1; }
                                                    if($w2_p != htmlspecialchars($row_course_ar_c['w2_p'])){ $break1 = 1; }
                                                    if($w3_p != htmlspecialchars($row_course_ar_c['w3_p'])){ $break1 = 1; }
                                                    if($w4_p != htmlspecialchars($row_course_ar_c['w4_p'])){ $break1 = 1; }

                                                    $w1_p =htmlspecialchars($row_course_ar_c['w1_p']);
                                                    $w2_p =htmlspecialchars($row_course_ar_c['w2_p']);
                                                    $w3_p =htmlspecialchars($row_course_ar_c['w3_p']);
                                                    $w4_p =htmlspecialchars($row_course_ar_c['w4_p']);
                                                    $x =htmlspecialchars($row_course_ar_c['x']);
                                                    $w1_p_b =htmlspecialchars($row_course_ar_c['w1_p_b']);
                                                    $w2_p_b =htmlspecialchars($row_course_ar_c['w2_p_b']);
                                                    $w3_p_b =htmlspecialchars($row_course_ar_c['w3_p_b']);
                                                    $w4_p_b =htmlspecialchars($row_course_ar_c['w4_p_b']);
                                                    $x_b =htmlspecialchars($row_course_ar_c['x_b']);
                                                    $w1_p_c =htmlspecialchars($row_course_ar_c['w1_p_c']);
                                                    $w2_p_c =htmlspecialchars($row_course_ar_c['w2_p_c']);
                                                    $w3_p_c =htmlspecialchars($row_course_ar_c['w3_p_c']);
                                                    $w4_p_c =htmlspecialchars($row_course_ar_c['w4_p_c']);
                                                    $x_c =htmlspecialchars($row_course_ar_c['x_c']);
													$monday =htmlspecialchars($row_course_ar_c['monday']);
                                                    ?>
                                      </thead>
                                      <tbody>
                                      <?php
                                              if($_GET[sort_by_price] == 1){
                                                if($break == 1){ ?><tr><td colspan="19"></td></tr><?php }
                                                if($break == 0 and $break1 == 1){ ?><tr><td colspan="19" class="alert-danger"></td></tr><?php }
                                              }
                                              ?>
                                          <tr>
                                              <th scope="row"><?php echo $id ; ?></th>
                                                  
                                              <td>
                                                <a href="?page=cities-edit&id=<?php echo $id ;?>" ><?php echo $name ; if($monday == 1){ ?><span class="badge badge-secondary ml-2" style="background-color:darkgoldenrod">Monday</span><?php } ?></a>
                                              </td>

                                              <td><a href="?page=cities-edit&id=<?php echo $id ;?>"><i class="fa fa-edit"></i></a></td>
                                              <td>
                                                <button class="button-del" type="button" data-toggle="modal" data-target="#exampleModal<?php echo $id ;?>"><i class="ti-trash text-danger"></i></button>
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
                                                      <span class="b-remove"><a type="button" class="btn btn-primary" href="?page=cities-del&amp;id=<?php echo $id ;?>">Yes</a></span>
                                                    </div>
                                                  </div>
                                                </div>
                                                </div>
                                </td>
                                
                                  <td class="alert-success">
                                    
                                  <!-- <input onblur="anas()" class="comment-me" type="text" class="w1_p_id<?php echo $id; ?>" value="<?php  if($w1_p !=''){ echo $w1_p; }; ?>"> -->
                                  <a href="?page=cities-edit&id=<?php echo $id ;?>" ><?php  if($w1_p !=''){ echo $w1_p; }else{ ?><span class="text-danger">X</span><?php }; ?></a>
                                  
                                
                                
                                </td>
                                  <td class="alert-success"><a href="?page=cities-edit&id=<?php echo $id ;?>" ><?php  if($w2_p !=''){ echo $w2_p; }else{ ?><span class="text-danger">X</span><?php }; ?></a></td>
                                  
                                  <td class="alert-success"><a href="?page=cities-edit&id=<?php echo $id ;?>" ><?php  if($w3_p !=''){ echo $w3_p; }else{ ?><span class="text-danger">X</span><?php }; ?></a></td>
                                  <td class="alert-success"><a href="?page=cities-edit&id=<?php echo $id ;?>" ><?php  if($w4_p !=''){ echo $w4_p; }else{ ?><span class="text-danger">X</span><?php }; ?></a></td>
                                  <td class="alert-success"><a href="?page=cities-edit&id=<?php echo $id ;?>" ><?php  if($x !=''){ echo $x; }else{ ?><span class="text-danger">X</span><?php }; ?></a></td>
                                  <td class="alert-warning"><a href="?page=cities-edit&id=<?php echo $id ;?>" ><?php  if($w1_p_b !=''){ echo $w1_p_b; }else{ ?><span class="text-danger">X</span><?php }; ?></a></td>
                                  <td class="alert-warning"><a href="?page=cities-edit&id=<?php echo $id ;?>" ><?php  if($w2_p_b !=''){ echo $w2_p_b; }else{ ?><span class="text-danger">X</span><?php }; ?></a></td>
                                  
                                  <td class="alert-warning"><a href="?page=cities-edit&id=<?php echo $id ;?>" ><?php  if($w3_p_b !=''){ echo $w3_p_b; }else{ ?><span class="text-danger">X</span><?php }; ?></a></td>
                                  <td class="alert-warning"><a href="?page=cities-edit&id=<?php echo $id ;?>" ><?php  if($w4_p_b !=''){ echo $w4_p_b; }else{ ?><span class="text-danger">X</span><?php }; ?></a></td>
                                  <td class="alert-warning"><a href="?page=cities-edit&id=<?php echo $id ;?>" ><?php  if($x_b !=''){ echo $x_b; }else{ ?><span class="text-danger">X</span><?php }; ?></a></td>
                                  <td class="alert-info"><a href="?page=cities-edit&id=<?php echo $id ;?>" ><?php  if($w1_p_c !=''){ echo $w1_p_c; }else{ ?><span class="text-danger">X</span><?php }; ?></a></td>
                                  <td class="alert-info"><a href="?page=cities-edit&id=<?php echo $id ;?>" ><?php  if($w2_p_c !=''){ echo $w2_p_c; }else{ ?><span class="text-danger">X</span><?php }; ?></a></td>
                                  
                                  <td class="alert-info"><a href="?page=cities-edit&id=<?php echo $id ;?>" ><?php  if($w3_p_c!=''){ echo $w3_p_c; }else{ ?><span class="text-danger">X</span><?php }; ?></a></td>
                                  <td class="alert-info"><a href="?page=cities-edit&id=<?php echo $id ;?>" ><?php  if($w4_p_c !=''){ echo $w4_p_c; }else{ ?><span class="text-danger">X</span><?php }; ?></a></td>
                                  <td class="alert-info"><a href="?page=cities-edit&id=<?php echo $id ;?>" ><?php  if($x_c !=''){ echo $x_c; }else{ ?><span class="text-danger">X</span><?php }; ?></a></td>
                              </tr>
                                              <?php
                                            }
                                        }else{ echo " There are no Items to display "; };
                                        ?>
                                          <tr>
                                            <td colspan="5" background="background.jpg" class="row"></td>
                                          </tr>
                                          <tr>
                                            <td>
                                                <div align="center">
                                                <?php
                                            if($start>0){
                                                    ?>
                                                    <a href="?page=cities-view&start=<?php echo $start - $integer ; ?>
                                                            <?php if ( isset($_GET['id_course_ar_c_c'] )){ echo "&id_course_ar_c_c=$id_course_ar_c_c"; }; ?>
                                                            <?php if ( isset($_GET['id_course_ar_c'] )){ echo "&id_course_ar_c=$id_course_ar_c"; }; ?>"  class="linlk">Previous</a>
                                                    <?php
                                                };
                                            if($numrows>$end and $start>0){ echo " - ";};
                                                if($numrows>$end){
                                                ?><a href="?page=cities-view&start=<?php echo $integer + $start; ?>
                                                        <?php if ( isset($_GET['id_course_ar_c_c'] )){ echo "&id_course_ar_c_c=$id_course_ar_c_c"; }; ?><?php if ( isset($_GET['id_course_ar_c'] )){ echo "&id_course_ar_c=$id_course_ar_c"; }; ?>"  class="linlk">Next</a>
                                                <?php
                                            };
                                            ?>
                                                </div>
                                            </td>
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

</div>

<br><br><br>
