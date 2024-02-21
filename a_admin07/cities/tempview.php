<?php

include('cities/autoChange.php');
include('cities/myFunctions.php');
$table = 'cities';
$tableNAme ='City';
?><script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script><?php if($level_admin > 3){ exit; } ?><?php
$integer =50;
if ( isset($_GET['start'] )){
	$start = $_GET["start"];
}else{
	$start = 0;
};
$start ;
$end = $integer + $start ;
// Query the database
if(isset($_GET['sort_by_price']) and $_GET['sort_by_price'] == 1){
  $order = "ORDER BY `w1_p` ASC, `name` ASC";
}else{
  $order = "ORDER BY `name` ASC";
}


$sql_course_ar_c1 = "SELECT * FROM `cities` $main $order";
$result_course_ar_c1 = $mysqli -> query($sql_course_ar_c1);
if($result_course_ar_c1 && mysqli_num_rows($result_course_ar_c1) >0){ $numrows = mysqli_num_rows($result_course_ar_c1); }else{ $numrows =  0; }

// Query the database
$sql_course_ar_c = "$sql_course_ar_c1 LIMIT $start , $integer";
$result_course_ar_c = $mysqli -> query($sql_course_ar_c);
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
              $result_sum_repeat = $mysqli -> query($sql_sum_repeat);
			  if($result_sum_repeat and mysqli_num_rows($result_sum_repeat) > 0){ 
				  $numrows_sum_repeat = mysqli_num_rows($result_sum_repeat);
				  $row_sum_repeat = $result_sum_repeat-> fetch_assoc();
				  echo $row_sum_repeatSum_repeat = $row_sum_repeat['sum_repeat'];			  
			  }else{$numrows_sum_repeat = 0; $row_sum_repeatSum_repeat = 0; }
              
              
              ?>
              </strong>
            </div>
        

          <div class="">
            <div class="icon b">B</div> Class : Total Repeat 
            
            <strong>

            <?php
            $sql_sum_repeat_b = "SELECT sum(`x_b`) as 'sum_repeat_b' FROM `cities` $main";
            $result_sum_repeat_b = $mysqli -> query($sql_sum_repeat_b);
			if($result_sum_repeat_b and mysqli_num_rows($result_sum_repeat_b) >0){
				$numrows_sum_repeat_b = mysqli_num_rows($result_sum_repeat_b);
				$row_sum_repeat_b = $result_sum_repeat_b-> fetch_assoc();
				echo $row_sum_repeat_bSum_repeat_b = $row_sum_repeat_b['sum_repeat_b'];
			}else{
				$row_sum_repeat_bSum_repeat_b = 0;
			}
            ?>
            </strong>
          </div>
        

          <div class="">
          <div class="icon c">C</div> Class : Total Repeat 
            
            <strong>

            <?php
            $sql_sum_repeat_c = "SELECT sum(`x_c`) as 'sum_repeat_c' FROM `cities` $main";
            $result_sum_repeat_c = $mysqli -> query($sql_sum_repeat_c);
			if($result_sum_repeat_c and mysqli_num_rows($result_sum_repeat_c) >0){
				$numrows_sum_repeat_c = mysqli_num_rows($result_sum_repeat_c);
				$row_sum_repeat_c = $result_sum_repeat_c-> fetch_assoc();
				echo $row_sum_repeat_cSum_repeat_c = $row_sum_repeat_c['sum_repeat_c'];
			}else{
				$row_sum_repeat_cSum_repeat_c = '0';
			}
            ?>
            </strong>
          </div>

        <div class="">
          <div class="icon n"><i class="fa fa-repeat" aria-hidden="true"></i></div> Total repeat: 
          <strong>
            <?php echo $row_sum_repeatSum_repeat+$row_sum_repeat_bSum_repeat_b+$row_sum_repeat_cSum_repeat_c ;?>
          </strong>
        </div>

            </div>
        
          </div>


      </div>
        
    </div>

    <div class="col-md-4">

          <!-- BUtton viwe start -->
          <div class="but-head  h-100 d-flex align-items-end justify-content-end">
            <?php if(isset($_GET['sort_by_price']) and $_GET['sort_by_price'] == 1){
              ?><a href="?page=cities-view" class="btn btn-primary font-weight-bold"> <i class="fa fa-sort" ></i> Sort by name</a><?php
            }else{
              ?><a href="?page=cities-view&sort_by_price=1" class="btn btn-primary font-weight-bold"> <i class="fa fa-sort" ></i> Sort by Price</a><?php
            }?>
            <a href="?page=cities-edit" class="btn btn-primary font-weight-bold ml-2"><i class="fa fa-plus-square fa-fw "></i> Add City</a>
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
                                            if ($result_course_ar_c && (mysqli_num_rows($result_course_ar_c) > 0)) {
                                                while ($row_course_ar_c = $result_course_ar_c-> fetch_assoc()){
                                                    $break = 0;
                                                    $break1 = 0;
                                                    $id =htmlspecialchars($row_course_ar_c['id']);
                                                    $name =htmlspecialchars($row_course_ar_c['name']);
                                                    if(isset($w1_p) and $w1_p != htmlspecialchars($row_course_ar_c['w1_p'])){ $break = 1; }
                                                    if(isset($w2_p) and $w2_p != htmlspecialchars($row_course_ar_c['w2_p'])){ $break1 = 1; }
                                                    if(isset($w3_p) and $w3_p != htmlspecialchars($row_course_ar_c['w3_p'])){ $break1 = 1; }
                                                    if(isset($w4_p) and $w4_p != htmlspecialchars($row_course_ar_c['w4_p'])){ $break1 = 1; }

                                                    $w1_p =htmlspecialchars($row_course_ar_c['w1_p']);
                                                    $w2_p =htmlspecialchars($row_course_ar_c['w2_p']);
                                                    $w3_p =htmlspecialchars($row_course_ar_c['w3_p']);
                                                    $w4_p =htmlspecialchars($row_course_ar_c['w4_p']);
													
                                                    
                                                    ?>
                                      </thead>
                                      <tbody>
                                      <?php
                                              if(isset($_GET['sort_by_price']) and $_GET['sort_by_price'] == 1){
                                                if($break == 1){ ?><tr><td colspan="19"></td></tr><?php }
                                                if($break == 0 and $break1 == 1){ ?><tr><td colspan="19" class="alert-danger"></td></tr><?php }
                                              }
                                              ?>
                                          <tr>
                                              <th scope="row"><?php echo $id ; ?></th>
                                                  
                                              <td class="inputcontainer">
                                              <?php autoChange('City Name','name',$row_course_ar_c,'textarea'); ?>
<?php if(isset($monday) and $monday == 1){ ?><span class="badge badge-secondary ml-2" style="background-color:darkgoldenrod">Monday</span><?php } ?>
                                              </td>

                                              <td><?php viewPageEdit(); ?></td>
                                              <td><?php viewPageDelet(); ?>
                                                
                                </td>
                                
                                  <td class="alert-success"><?php autoChange('A Class 1 Week price' ,'w1_p',$row_course_ar_c,''); ?></td>
                                  <td class="alert-success"><?php autoChange('A Class 2 Weeks price','w2_p',$row_course_ar_c,''); ?></td>
                                  <td class="alert-success"><?php autoChange('A Class 3 Weeks price','w3_p',$row_course_ar_c,''); ?></td>
                                  <td class="alert-success"><?php autoChange('A Class 4 Weeks price','w4_p',$row_course_ar_c,''); ?></td>
                                  <td class="alert-success"><?php autoChange('A Class Repeat','x',$row_course_ar_c,''); ?></td>
                                  
                                  <td class="alert-warning"><?php autoChange('B Class 1 Week price' ,'w1_p_b',$row_course_ar_c,''); ?></td>
                                  <td class="alert-warning"><?php autoChange('B Class 2 Weeks price','w2_p_b',$row_course_ar_c,''); ?></td>
                                  <td class="alert-warning"><?php autoChange('B Class 3 Weeks price','w3_p_b',$row_course_ar_c,''); ?></td>
                                  <td class="alert-warning"><?php autoChange('B Class 4 Weeks price','w4_p_b',$row_course_ar_c,''); ?></td>
                                  <td class="alert-warning"><?php autoChange('B Class Repeat','x_b',$row_course_ar_c,''); ?></td>
                                  
                                  <td class="alert-info"><?php autoChange('C Class 1 Week price' ,'w1_p_c',$row_course_ar_c,''); ?></td>
                                  <td class="alert-info"><?php autoChange('C Class 2 Weeks price','w2_p_c',$row_course_ar_c,''); ?></td>
                                  <td class="alert-info"><?php autoChange('C Class 3 Weeks price','w3_p_c',$row_course_ar_c,''); ?></td>
                                  <td class="alert-info"><?php autoChange('C Class 4 Weeks price','w4_p_c',$row_course_ar_c,''); ?></td>
                                  <td class="alert-info"><?php autoChange('C Class Repeat','x_c',$row_course_ar_c,''); ?></td>
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
