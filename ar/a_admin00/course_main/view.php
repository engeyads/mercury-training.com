<?php
$cities_array = array();

$sql_cities_array = "SELECT * FROM `cities`";
$result_cities_array = mysql_query($sql_cities_array, $conn);
if ($result_cities_array && (mysql_num_rows($result_cities_array) > 0)) {
	while ($row_cities_array = mysql_fetch_assoc($result_cities_array)){
		$cities_array_v = array($row_cities_array['id'].'_city' => $row_cities_array['name']);
		$cities_array = array_merge($cities_array,$cities_array_v);

	}
};


function view_td($c_id,$m1,$conn){
	global $cities_array;
$y = date('Y');
$m = date('m');
	$sql_select_test = "SELECT * FROM `course` WHERE 1 AND `c_id` = '$c_id' AND `m1` = '$m1' and (`y1` > '$y' or (`y1` = '$y' and `m1` >= '$m' ))";
	$result_select_test = mysql_query($sql_select_test, $conn);
	if ($result_select_test && (mysql_num_rows($result_select_test) > 0)) {
		while ($row_select_test = mysql_fetch_assoc($result_select_test)){
			$city = explode(' ',$cities_array[$row_select_test['city'].'_city']);
			?><a href="?page=course-edit&id=<?php echo $row_select_test['id'];?>" title="<?php echo $city[0]; if($row_select_test['price'] != ""){ echo " "; echo $row_select_test['price']; };?>"><?php


				//echo "<br>";

			echo $row_select_test['d1'];
			echo substr($cities_array[$row_select_test['city'].'_city'],0,6);
			//echo "/"; echo $row_select_test['m1'];
			//echo "-";
			//echo $row_select_test['d2'];
			//if($row_select_test['m1'] != $row_select_test['m2']){ echo "/"; echo $row_select_test['m2']; } ;
			//echo "<br>";
			//echo $row_select_test['y2'];
			//if($row_select_test['address'] != ""){ echo "<br>"; echo $row_select_test['address']; };
			//
			?></a><br><?php
		}
	};
};





if ( $_GET['city'] != ''){
	$city = $_GET['city'];
	$main .= "AND `city` ='$city'";
	$main_get .= "&city=$city";
};
if ( $_GET['search'] != '' and $_GET['search'] != 'Search...'){
	$search = $_GET['search'];
	$search = strtolower($search);
	$main .= "AND LCASE( `name`) LIKE '%$search%'";
	$main_get .= "&amp;search=$search";
};

if ( $_GET['c_id'] != ''){
	$c_id = $_GET['c_id'];
	$leater = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',' ');
	echo $c_id = str_replace($leater,'',$c_id);


	$main .= "AND `c_id` LIKE '%$c_id%'";
	$main_get .= "&amp;c_id=$c_id";
};
if ($_GET['m']!= ''){
	$m = $_GET['m'];
	$main .= "AND `m1` ='$m'";
	$main_get .= "&amp;m=$m";
};
if ($_GET['y']!= ''){
	$y = $_GET['y'];
	$main .= "AND `y1` ='$y'";
	$main_get .= "&amp;y=$y";
};
if ($_GET['course_c'] != '' ){
	$course_c = $_GET['course_c'];
	$main .= "AND `course_c` ='$course_c'";
	$main_get .= "&amp;course_c=$course_c";
};
if ( isset($_GET['ASC'] )){
	$ASC = $_GET['ASC'];
	$ASC_get = "&amp;ASC=$ASC ";
}else{
	$ASC = "ASC";
};
if ( isset($_GET['order'] )){
	$order = $_GET['order'];
	$order_get = "&amp;order=$order";
	if($order == 'date1'){ $order= "y1` $ASC , `m1` $ASC , `d1";};
	if($order == 'date2'){ $order= "y2` $ASC , `m2` $ASC , `d2";};
	if($order != 'date2' and $order != 'date1'){ $order .= "` , `y1` $ASC , `m1` $ASC , `d1";};
}else{
	$order = "y1` $ASC , `m1` $ASC , `d1";
};
if ( $_GET['course_c'] != ''){
$course_c = $_GET['course_c'];
$sql_select_test1 = "SELECT * FROM `course_c` WHERE 1 AND `id` = '$course_c'";
$result_select_test1 = mysql_query($sql_select_test1, $conn);
if ($result_select_test1 && (mysql_num_rows($result_select_test1) > 0)) {
	$row_select_test1 = mysql_fetch_assoc($result_select_test1);
	$name = $row_select_test1[name];
	$name = str_replace('&','&amp;',$name);
	$name = str_replace('&&amp','&amp;',$name);
	$h1 .= $name;
};
$h1 .=' ';
};
if ( $_GET['m'] != ''){
$m = $_GET['m']; $h1 .='at ';
if($m =="1"){ echo 'January'; };
if($m =="2"){ echo 'February'; };
if($m =="3"){ echo 'March'; };
if($m =="4"){ echo 'April'; };
if($m =="5"){ echo 'May'; };
if($m =="6"){ echo 'June'; };
if($m =="7"){ echo 'July'; };
if($m =="8"){ echo 'August'; };
if($m =="9"){ echo 'September'; };
if($m =="10"){ echo 'October'; };
if($m =="11"){ echo 'November'; };
if($m =="12"){ echo 'December'; };
$h1 .=' '; };
if ( $_GET['city'] != ''){ $h1 .='in ';
$city = $_GET['city'];
$sql_select_test1 = "SELECT * FROM `cities` WHERE 1 AND `id` = '$city'";
$result_select_test1 = mysql_query($sql_select_test1, $conn);
if ($result_select_test1 && (mysql_num_rows($result_select_test1) > 0)) {
	$row_select_test1 = mysql_fetch_assoc($result_select_test1);
	echo $row_select_test1['name'];
};
};













$integer =30;
if ( isset($_GET['start'] )){
	$start = $_GET["start"];
}else{
	$start = 0;
};
$start ;
$end = $integer + $start ;
// Query the database
$sql_course_ar_c1 = "SELECT * FROM `course_main` WHERE 1 $main ORDER BY `id` DESC";
$result_course_ar_c1 = mysql_query($sql_course_ar_c1, $conn);
$numrows = mysql_num_rows($result_course_ar_c1);

// Query the database
$sql_course_ar_c = "$sql_course_ar_c1 LIMIT $start , $integer";
$result_course_ar_c = mysql_query($sql_course_ar_c, $conn);
?>
<br />
<br />

						<!-- BUtton viwe start -->
						<div class="but-head">
							<a href="index.php?page=course_main-edit" class="btn btn-outline-primary font-weight-bold linlk">Add Course</a>
						</div>
						<!-- BUtton viwe end -->


              <!-- table secondary start -->
              <div class="col-lg-12 mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="header-title"><?php
						if($_GET[course_c] !=''){
							// Query the database select_test
							$sql_select_test = "SELECT * FROM `course_c` WHERE 1 AND `id` = '{$_GET[course_c]}'";
							$result_select_test = mysql_query($sql_select_test, $conn);
							if ($result_select_test && (mysql_num_rows($result_select_test) > 0)) {
								$row_select_test = mysql_fetch_assoc($result_select_test);
								echo $row_select_test['name'];
							};
						}else{
							echo 'All Categories';
						} ?> (<?php echo $numrows; ?>) Programs</h4>
                          <div class="single-table">
                              <div class="table-responsive">
                                  <table class="table text-center table-hover table-bordered">
                                      <thead class="text-uppercase bg-secondary">
                                          <tr class="text-white">
                                              <th scope="col">C ID</th>
                                              <th scope="col">Name Course</th>
                                              <th scope="col">Category</th>
                                              <th scope="col">Edit</th>
                                              <th scope="col">Delet</th>
                                              <th scope="col">Jan</th>
                                              <th scope="col">Feb</th>
                                              <th scope="col">Mar</th>
                                              <th scope="col">Apr</th>
                                              <th scope="col">May</th>
                                              <th scope="col">Jun</th>
                                              <th scope="col">Jul</th>
                                              <th scope="col">Aug</th>
                                              <th scope="col">Sep</th>
                                              <th scope="col">Oct</th>
                                              <th scope="col">Nov</th>
                                              <th scope="col">Dec</th>
                                          </tr>
                                          <?php
                                            $nn = 2;
                                            if ($result_course_ar_c && (mysql_num_rows($result_course_ar_c) > 0)) {
                                                while ($row_course_ar_c = mysql_fetch_assoc($result_course_ar_c)){
                                                    $id =$row_course_ar_c['id'];
                                                    $c_id =$row_course_ar_c['c_id'];
                                                    $course_c =$row_course_ar_c['course_c'];
                                                    $name =$row_course_ar_c['name'];
                                                    $overview =$row_course_ar_c['overview'];
                                                    $objective =$row_course_ar_c['objective'];
                                                    $out_lines = $row_course_ar_c['out_lines'];
                                                    $who_should_attend =$row_course_ar_c['who_should_attend'];
                                                    $weeks =$row_course_ar_c['weeks'];
                                                    ?>
                                      </thead>

                                      <tbody>

                                          <tr class="table-remove">
                                            <th scope="row"><a href="?page=course_main-edit&id=<?php echo $id ;?>"><?php echo $c_id ; ?></a></th>
                                            <td><a href="?page=course_main-edit&id=<?php echo $id ;?>" ><strong><?php echo $name ; ?></strong></a></td>
                                            <td>
                                                <?php
                                                // Query the database select_test
                                                $sql_select_test = "SELECT * FROM `course_c` WHERE 1 AND `id` = '$course_c'";
                                                $result_select_test = mysql_query($sql_select_test, $conn);
                                                if ($result_select_test && (mysql_num_rows($result_select_test) > 0)) {
                                                    $row_select_test = mysql_fetch_assoc($result_select_test);
                                                    ?><a href="?page=course_main-view&course_c=<?php echo $row_select_test['id']; ?>"><?php echo $row_select_test['name']; ?></a><?php
                                                    
                                                };
                                                ?>

                                            </td>
                                            <td><a href="?page=course_main-edit&amp;id=<?php echo $id ;?>"><i class="fa fa-edit"></i></a></td>
                                            <td>



                                            <div class="modal fade" id="exampleModa<?php echo $id ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delet Course</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body text-danger">
                      Are you sure you want to delete
                    </div>
                    <div class="modal-footer">
                      <button type="button " class="btn btn-secondary btn-no" data-dismiss="modal">NO</button>
                      <span class="b-remove"><a type="button" class="btn btn-primary" href="?page=course_main-del&amp;id=<?php echo $id ;?>&amp;c_id=<?php echo $c_id ; if($_GET[course_c] !=''){ echo "&course_c={$_GET[course_c]}"; }  if($_GET[start] !=''){ echo "&start={$_GET[start]}"; }?>">Yes</a></span>
                    </div>
                  </div>
                </div>
              </div>




              <button type="button table-remove" data-toggle="modal" data-target="#exampleModa<?php echo $id ;?>"><i class="ti-trash"></i></button></td>
                                            <td><?php view_td($c_id,'1',$conn); ?></td>
                                            <td ><?php view_td($c_id,'2',$conn);?></td>
                                            <td ><?php view_td($c_id,'3',$conn);?></td>
                                            <td ><?php view_td($c_id,'4',$conn);?></td>
                                            <td ><?php view_td($c_id,'5',$conn);?></td>
                                            <td ><?php view_td($c_id,'6',$conn);?></td>
                                            <td ><?php view_td($c_id,'7',$conn);?></td>
                                            <td ><?php view_td($c_id,'8',$conn);?></td>
                                            <td ><?php view_td($c_id,'9',$conn);?></td>
                                            <td ><?php view_td($c_id,'10',$conn);?></td>
                                            <td ><?php view_td($c_id,'11',$conn);?></td>
                                            <td ><?php view_td($c_id,'12',$conn);?></td>
                                          </tr>

                                      </tbody>

                                        <?php
					                       }
                                            }else{ echo " There are no Items to display "; };
				                        ?>

                                  </table>
                              </div>
                          </div>
                      </div>
                      <nav aria-label="Page navigation example">
                          <ul class="pagination justify-content-start nt">
								<?php
								if($start>0){
										?>
										<span class="no">
											<a href="?page=course_main-view&start=<?php echo $start - $integer ; ?>
												<?php if ( isset($_GET['id_course_ar_c_c'] )){ echo "&id_course_ar_c_c=$id_course_ar_c_c"; }; ?>
												<?php if ( isset($_GET['id_course_ar_c'] )){ echo "&id_course_ar_c=$id_course_ar_c"; }; ?>"  class="page-link">Previous</a>
										</span>
										<?php
									};
                                 ?>
                                 <?php
                                $div = $numrows%$integer;
                                $page_no = $start/$integer;
                                $page_no++;
                                $totalPages=$numrows/$integer;
                                if($div != 0){ $totalPages = $totalPages+1; };
                                if($totalPages > 1) {
                                    for($i = 1; $i <= $totalPages; $i++) {
                                            $st = $integer*$i-$integer; $no =$i;
                                            
                                            if($page_no == $i){
                                                $str .= " <span class=\"page-item active";
                                            }else{
												$str .= " <span class=\"";
											};
                                            $str .= "\"><a class=\"page-link\" href=\"?page=course_main-view&start={$st}{$main_get}{$order_get}{$ASC_get}\">$no</a></span>";
                                            $str .= $i != $totalPages ? "  " : "";
                                        }
                                }
                                echo  $str;
                                        if($numrows>$end){
                                        ?>
                                        <span class="no">
                                            <a href="?page=course_main-view&start=<?php echo $integer + $start; ?>
                                                <?php if ( isset($_GET['id_course_ar_c_c'] )){ echo "&id_course_ar_c_c=$id_course_ar_c_c"; }; ?><?php if ( isset($_GET['id_course_ar_c'] )){ echo "&id_course_ar_c=$id_course_ar_c"; }; ?>"  class="page-link">Next</a></span>
                                                <?php
                                    };
                                    ?>
                          </ul>
                      </nav>
                  </div>
              </div>
              <!-- table secondary end -->


<script src="assets/js/scripts.js"></script>
