<?php
$cities_array = array();

$sql_cities_array = "SELECT * FROM `cities`";
$result_cities_array = $mysqli -> query($sql_cities_array);
if ($result_cities_array && (mysqli_num_rows($result_cities_array) > 0)) {
	while ($row_cities_array = $result_cities_array-> fetch_assoc()){
		$cities_array_v = array($row_cities_array['id'].'_city' => $row_cities_array['name']);
		$cities_array = array_merge($cities_array,$cities_array_v);
	}
};
$LastArrayToAdd = array('0_city' => 'Err');
$cities_array = array_merge($cities_array,$LastArrayToAdd);

function view_td($c_id,$m1,$mysqli){
	global $cities_array;
$y = date('Y');
$m = date('m');
	$sql_select_test = "SELECT * FROM `course` WHERE 1 AND `c_id` = '$c_id' AND `m1` = '$m1' and (`y1` > '$y' or (`y1` = '$y' and `m1` >= '$m' ))";
	$result_select_test = $mysqli -> query($sql_select_test);
	if ($result_select_test && (mysqli_num_rows($result_select_test) > 0)) {
		while ($row_select_test = $result_select_test-> fetch_assoc()){
			$city = explode(' ',$cities_array[$row_select_test['city'].'_city']);
			?><a href="?page=course-edit&id=<?php echo $row_select_test['id'];?>" title="<?php echo $city[0]; if($row_select_test['price'] != ""){ echo " "; echo $row_select_test['price']; };?>"><?php
			echo $row_select_test['d1'];
			echo substr($cities_array[$row_select_test['city'].'_city'],0,6);
			?></a><br><?php
		}
	};
};




if (isset($_GET['search']) and $_GET['search'] != '' and $_GET['search'] != 'Search...'){
	$search = addslashes($_GET['search']);
	$search = strtolower($search);
	$main .= "AND LCASE( `name`) LIKE '%$search%'";
	$main_get .= "&amp;search=$search";
	$h1 .= " Search by keyword: {$search}";
};

if (isset($_GET['c_id']) and $_GET['c_id'] != ''){
	$c_id = addslashes($_GET['c_id']);
	$leater = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',' ');
	$c_id = str_replace($leater,'',$c_id);
	$h1 .= 'Course C_id: '.$c_id.' ';

	$main .= "AND `c_id` LIKE '%$c_id%'";
	$main_get .= "&amp;c_id=$c_id";
};


if (isset($_GET['course_c']) and $_GET['course_c'] != '' ){
	$course_c = addslashes($_GET['course_c']);
	$main .= "AND `course_c` ='$course_c'";
	$main_get .= "&amp;course_c=$course_c";
};
if (isset($_GET['ASC']) and $_GET['ASC']!=''){
	$ASC = addslashes($_GET['ASC']);
	$ASC_get = "&amp;ASC=$ASC";
}else{
	$ASC = "DESC";
};
if (isset($_GET['order'])and $_GET['order']!=''){
	$order = addslashes($_GET['order']);
	$order_get = "&amp;order=$order";
}else{
	$order = "id";
};
if (isset($_GET['course_c']) and $_GET['course_c'] != ''){
	$course_c = addslashes($_GET['course_c']);
	$sql_select_test1 = "SELECT * FROM `course_c` WHERE 1 AND `id` = '$course_c'";
	$result_select_test1 = $mysqli -> query($sql_select_test1);
	if ($result_select_test1 && (mysqli_num_rows($result_select_test1) > 0)) {
		$row_select_test1 = $result_select_test1-> fetch_assoc();
		$name = $row_select_test1['name'];
		$name = str_replace('&','&amp;',$name);
		$name = str_replace('&&amp','&amp;',$name);
		$h1 .= $name;
	};
	$h1 .=' ';
};

if (isset($_GET['numberOfRows_get']) and $_GET['numberOfRows_get']!=''){
	$integer = addslashes($_GET['numberOfRows_get']);
	$numberOfRows_get = "&amp;numberOfRows_get={$integer}";
}else{
	$numberOfRows_get = '';
	$integer =25;
};

if (isset($_GET['start'] ) and $_GET['start'] !=''){
	$start = addslashes($_GET["start"]);
	$start_get = "&start={$start}";
}else{
	$start = 0;
	$start_get = '';
};
$end = $integer + $start ;
// Query the database
$sql_course_ar_c1 = "SELECT * FROM `course_main` WHERE 1 $main ORDER BY `$order` $ASC";
$result_course_ar_c1 = $mysqli -> query($sql_course_ar_c1);
$numrows = mysqli_num_rows($result_course_ar_c1);
pagination();
// Query the database
$sql_course_ar_c = "$sql_course_ar_c1 LIMIT $start , $integer";
$result_course_ar_c = $mysqli -> query($sql_course_ar_c);
$numrowsView = mysqli_num_rows($result_course_ar_c);
if($view_aa == 1){ 
	?>
    <div class="alert alert-primary" role="alert">
      <h4 class="alert-heading">MSQL</h4>
      <p><?php echo $sql_course_ar_c; ?></p>
      <p>Numrows: Total: <?php echo $numrows; ?></p>
      <p>Numrows: View: <?php echo $numrowsView; ?></p>

    <?php if($mysqli->error){
          ?>
          <hr>
      <p class="mb-0"><?php printf("Error message: %s\n", $mysqli->error); ?></p>
          <?php
       } ?>    
    </div>
    <?php
}
?>


<br />
<br />


						<!-- BUtton viwe start -->
						<div class="but-head">
							<a href="?page=course_main-edit" class="btn btn-outline-primary font-weight-bold linlk"><i class="fa fa-plus" aria-hidden="true"></i> Add Course</a>
						</div>
						<!-- BUtton viwe end -->


              <!-- table secondary start -->
              <div class="col-lg-12 mt-5">
                  <div class="card">
                      <div class="card-body">
                          (<?php echo $numrows; ?>) Programs<br><?php
						if(isset($h1) and $h1 !=''){
							?><h4 class="header-title"><?php
							echo $h1;
							?></h4><?php
							?><br><a href="?page=course_main-view" class="text-danger">View all Programs</a><?php
						}else{
							?><h4 class="header-title"><?php
							echo 'All Categories';
							?></h4><?php
            } 
            $OrderPage = 'course_main';?><br>
</h4>
                        <?php echo $pagination; numberOfRows(); echo $numberOfRowsView;?> 
<?php


?>
                        
                        

                          <div class="single-table">
                              <div class="table-responsive">
                                  <table class="table text-center table-hover table-bordered">
                                      <thead class="text-uppercase bg-secondary">
                                          <tr class="text-white">
                                              <th scope="col"><?php SortBy1('id','ID'); ?></th>
                                              <th scope="col"><?php SortBy1('name','Name Course'); ?></th>
                                              <th scope="col"><?php SortBy1('c_id','C ID'); ?></th>
                                              <th scope="col"><?php SortBy1($adminweeks,'Duration'); ?></th>
                                              <th scope="col"><?php SortBy1('course_c','Category'); ?></th>
                                              <?php if(isset($site_courseMain_link_a) and $site_courseMain_link_a !=''){ ?><th scope="col"><?php SortBy1('overview','View'); ?></th><?php }?>
                                              <?php if(isset($site_coursemain_link_pdf) and $site_coursemain_link_pdf !=''){ ?><th scope="col"><?php SortBy1('broshoure','Broshoure'); ?></th><?php }?>
                                              <th scope="col"><?php SortBy1('like','Liks'); ?></th>
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
											
                                            if ($result_course_ar_c && (mysqli_num_rows($result_course_ar_c) > 0)) {
                                                while ($row_course_ar_c = $result_course_ar_c-> fetch_assoc()){
                                                    $id =$row_course_ar_c['id'];
                                                    $c_id =$row_course_ar_c['c_id'];
                                                    $course_c =$row_course_ar_c['course_c'];
                                                    $name =$row_course_ar_c['name'];
                                                    $overview =$row_course_ar_c['overview'];
                                                    if($overview !='' and $overview !='<br>' and $overview !='</br>'){ $overviewView = 1 ; }else{ $overviewView = 0 ;}
                                                    $broshoure =$row_course_ar_c['broshoure'];
                                                    if($broshoure !='' and $broshoure !='<br>' and $broshoure !='</br>'){ $broshoureView = 1 ; }else{ $broshoureView = 0 ;}
                                                    $objective =$row_course_ar_c['objective'];
                                                    $out_lines = $row_course_ar_c['out_lines'];
                                                    $who_should_attend =$row_course_ar_c['who_should_attend'];
                                                    $weeks =$row_course_ar_c[$adminweeks];
                                                    $like =$row_course_ar_c['like'];
                                                    ?>
                                      </thead>
                                      <tbody>

                                          <tr class="table-remove">
                                            <th scope="row"><a href="?page=course_main-edit&id=<?php echo $id ;?>"><?php echo $id ; ?></a></th>
                                            <td><a href="?page=course_main-edit&id=<?php echo $id ;?>" ><strong><?php echo $name ; ?></strong></a></td>
                                            <th scope="row"><a href="?page=course_main-edit&id=<?php echo $id ;?>"><?php echo $c_id ; ?></a></th>
                                            
                                            <td><?php echo $weeks; ?> weeks</td>
                                            <td>
                                                <?php
                                                // Query the database select_test
                                                $sql_select_test = "SELECT * FROM `course_c` WHERE 1 AND `id` = '$course_c'";
                                                $result_select_test = $mysqli -> query($sql_select_test);
                                                if ($result_select_test && (mysqli_num_rows($result_select_test) > 0)) {
                                                    $row_select_test = $result_select_test-> fetch_assoc();
                                                    $course_cSH =  $row_select_test['sh'];
                                                    ?><a href="?page=course_main-view&course_c=<?php echo $row_select_test['id']; ?>"><?php echo $row_select_test['name']; ?></a><?php
                                                    
                                                };
                                                ?>
                                            </td>
                                            <?php if(isset($site_courseMain_link_a) and $site_courseMain_link_a !=''){ ?><td><a href="<?php echo $site_courseMain_link_a.$course_cSH.$c_id ;?>" target=”_blank”><i class="fa fa-external-link fa-2x <?php if($overviewView ==1){ ?>text-success<?php }else{ ?>text-secondary<?php } ?>" aria-hidden="true"></i></a></td><?php }?>
                                            
                                            <?php if(isset($site_coursemain_link_pdf) and $site_coursemain_link_pdf !=''){ ?><td><a href="<?php echo $site_coursemain_link_pdf.$course_cSH.$c_id.$site_coursemain_link_pdf_b ;?>" target=”_blank”><?php if($broshoureView == 1){ ?><i class="fa fa-file-pdf-o fa-2x text-danger" aria-hidden="true"></i><?php }else{ ?><i class="fa fa-file-o fa-2x text-secondary" aria-hidden="true"></i></a><?php }; ?></td><?php }?>
                                            
                                            
                                            <td><?php echo $like; ?> </td>
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
                      Are you sure you want to delete course:<br>
<strong>"<?php echo $name; ?>"</strong><br>and all related dates
                    </div>
                    <div class="modal-footer">
                      <button type="button " class="btn btn-secondary btn-no" data-dismiss="modal">NO</button>
                      <span class="b-remove"><a type="button" class="btn btn-primary" href="?page=course_main-del&id=<?php
					  
					  echo $id.$main_get.$order_get.$ASC_get.$numberOfRows_get.$start_get;
					     ?>">Yes</a></span>
                    </div>
                  </div>
                </div>
              </div>
             								<button type="button table-remove" data-toggle="modal" data-target="#exampleModa<?php echo $id ;?>"><i class="ti-trash"></i></button></td>

                                            <td ><?php view_td($c_id,'1', $mysqli);?></td>
                                            <td ><?php view_td($c_id,'2', $mysqli);?></td>
                                            <td ><?php view_td($c_id,'3', $mysqli);?></td>
                                            <td ><?php view_td($c_id,'4', $mysqli);?></td>
                                            <td ><?php view_td($c_id,'5', $mysqli);?></td>
                                            <td ><?php view_td($c_id,'6', $mysqli);?></td>
                                            <td ><?php view_td($c_id,'7', $mysqli);?></td>
                                            <td ><?php view_td($c_id,'8', $mysqli);?></td>
                                            <td ><?php view_td($c_id,'9', $mysqli);?></td>
                                            <td ><?php view_td($c_id,'10',$mysqli);?></td>
                                            <td ><?php view_td($c_id,'11',$mysqli);?></td>
                                            <td ><?php view_td($c_id,'12',$mysqli);?></td>
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
                      
                                <?php echo $pagination;  echo $numberOfRowsView;?>
                          
                  </div>
              </div>
              <!-- table secondary end -->