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
if(isset($_GET['dat_dif'])){ $dat_dif = $_GET['dat_dif']; }else{ $dat_dif =''; }
$sql_course_ar_c1 = " SELECT `id`,`c_id`,DATEDIFF(CONCAT(`y2`,'-',`m2`,'-',`d2`),CONCAT(`y1`,'-',`m1`,'-',`d1`))+1 as 'DATEDIFF' FROM `course`
where DATEDIFF(CONCAT(`y2`,'-',`m2`,'-',`d2`),CONCAT(`y1`,'-',`m1`,'-',`d1`))+1 = '{$dat_dif}'
 ORDER BY `course`.`y1` ASC";
$result_course_ar_c1 = $mysqli -> query($sql_course_ar_c1);
if($result_course_ar_c1){
	$numrows = mysqli_num_rows($result_course_ar_c1);
}else{
	$numrows = 0;
}




// Query the database
$sql_course_ar_c = "$sql_course_ar_c1  LIMIT $start , $integer";
$result_course_ar_c = $mysqli -> query($sql_course_ar_c);

?>

 <!-- basic table start -->
 <div class="col-lg-12 mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="header-title">Number of Days (<?php echo $dat_dif; ?>)</h4>
                          <div class="single-table">
                              <div class="table-responsive">
                                  <table class="table text-center table-hover">
                                      <thead class="text-uppercase">
                                          <tr>
                                              <th scope="col">ID</th>
                                              <th scope="col">c_id</th>
                                              <th scope="col">Course Title</th>
                                              <th scope="col">Weeks</th>
                                              <th scope="col">Count</th>
                                          </tr>
                                          <?php
                                            if ($result_course_ar_c && (mysqli_num_rows($result_course_ar_c) > 0)) {
                                                while ($row_course_ar_c = $result_course_ar_c-> fetch_assoc()){
                                                    
                                                    $id =htmlspecialchars($row_course_ar_c['id']);
                                                    $c_id =htmlspecialchars($row_course_ar_c['c_id']);
                                                    $count =htmlspecialchars($row_course_ar_c['count']);
                                                    
                                                    // Query the database
                                                    $sql_course_main = "SELECT * FROM `course_main` WHERE `c_id` = '{$c_id}' LIMIT 0,1 ";
                                                    $result_course_main = $mysqli -> query($sql_course_main);
                                                    if ($result_course_main && (mysqli_num_rows($result_course_main) > 0)) {
                                                        $row_course_main = $result_course_main-> fetch_assoc();
                                                    }else{
                                                        $row_course_main = '';
                                                    }
                                                    ?>
                                      </thead>
                                      <tbody>
                                          <tr>
                                             
                                              <td><a href="?page=course-edit&id=<?php echo $id ; ?>"><?php echo $id ; ?></a></td>      
                                              <td><a href="?page=course_main-view&c_id=<?php echo $c_id ; ?>"><?php echo $c_id ; ?></a></td>  
                                              <td><?php echo $row_course_main['name']; ?></td>  
                                              <td><?php if($row_course_main['week'] !=''){ echo $row_course_main['week']; }else{ echo $row_course_main['week']; } ?></td>  
                                              <td><?php echo $count ; ?></td>  

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
                      <nav aria-label="...">
                    <ul class="pagination">
                    <?php if($start>0){
                $start_integer = $start - $integer;
                    ?><li class="page-item">
                            <a href="?page=404-view&start=<?php echo $start - $integer; echo $get;?>"  class="page-link">Previous</a>
                        </li><?php
                };?>
                        <?php
        $div = $numrows%$integer;
        $page_no = $start/$integer;
		if($page_no ==0){$page_no = 1;}
       //echo $page_no = $page_no +1;
        $totalPages=$numrows/$integer;
        $totalPages = $totalPages-1;
        if($div != 0){ $totalPages = $totalPages+1; };
        if($totalPages > 2) {
            for($i = 1; $i <= $totalPages; $i++) {
                    $st = $integer*$i-$integer; $no =$i;
                    if($i < 4 or $i > $totalPages-3 or ($page_no == 7 and $i ==4) or ($page_no == $t_page-5 and $i ==$t_page-2) or $page_no == $i or $page_no+1 == $i or $page_no-1 == $i or $page_no+2 == $i or $page_no-2 == $i ){
        $q = 0;
        $str .= '<li class="page-item';
        if($page_no == $i){ $str .=' active';};
        $str .= '">'."<a href=\"?page=404-view&start={$st}{$get}\" class=\"page-link\">$no</a></li>";
        $str .= $i != $totalPages ? "  " : "";

                    }else{ if($q ==0){$str .= '...';} $q=1;}
                }
        }
        echo  $str;

        ?>
                        <?php
                        if($numrows>$end){
                ?><li class="page-item">
                            <a href="?page=404-view&start=<?php echo $integer + $start; echo $get; ?>"  class="page-link">Next</a>
                        </li><?php
                        };
                        ?>

                    </ul>
                </nav>
                  </div>
              </div>
              <!-- basic table end -->