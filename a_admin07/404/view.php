<?php if($level_admin > 3){ exit; } ?>

<?php
function search_icon($name){
global $get,$main;

$name_new = $name.'_input';
echo $name; ?>:

<div class="form-group">
<input type='text' class="form-control input-search" name="<?php echo $name_new; ?>" value="<?php
    
    if(isset($_GET["$name_new"])){
		$val = trim($_GET["$name_new"]);
	}else{
		$val = '';
	}
	
	echo $val; if($val !=''){
    $main .= " and `$name` like '%{$val}%' "; 
    $get .="&{$name_new}=".urlencode($val); 
    } ?>">
</div>

<?php

} ?>

<div class="row">
    <div class="col-md-12 m-3">
    <?php if(isset($_GET['group_by']) and $_GET['group_by'] ==1){
    ?><a href="?page=404-view" class="btn btn-outline-primary  font-weight-bold linlk">View All</a><?php
}else{
    ?><a href="?page=404-view&group_by=1" class="btn btn-outline-primary  font-weight-bold linlk">Group By</a><?php
}?>
    </div>
    <div class="col-md-12">
    <form action="#" class="form-inline">
<input type="hidden" name="page" value="404-view">

<label for="" class="label-search"><?php search_icon('HTTP_REFERER'); ?></label>
<label for="" class="label-search"><?php search_icon('page'); ?></label>
<label for="" class="label-search"><?php search_icon('REMOTE_ADDR'); ?></label>
<label for="" class="label-search"><?php search_icon('date_time'); ?></label>
<input type="submit"  class="btn btn-primary btn-search">
</form>
    </div>
</div>





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
if(isset($_GET['group_by']) and $_GET['group_by'] == 1){
    $sql_course_ar_c1 = "
    SELECT *,count(`id`) as 'count' from ( SELECT * FROM `404` where 1 $main ORDER BY id DESC ) as t group by `t`.`page`
    
    ";
    $get .="&group_by=1";
}else{
    $sql_course_ar_c1 = "SELECT * FROM `404` where 1 $main ";
}

$result_course_ar_c1 = $mysqli -> query($sql_course_ar_c1);
if($result_course_ar_c1){
	$numrows = mysqli_num_rows($result_course_ar_c1);
}else{
	$numrows = 0;
}



if(isset($_GET['order_by']) and $_GET['order_by'] !=''){ 
    $order = "ORDER BY `{$_GET[order_by]}` "; 
    $get .="&order_by={$_GET[order_by]}";
    $get .="&ASC={$_GET[ASC]}";
    if(isset($_GET['ASC']) and $_GET['ASC'] =='1'){
        $order .= "ASC ";
    }else{
        $order .= "DESC ";
    }
}else{
    $order = "ORDER BY `id` DESC"; 
    if(isset($_GET['group_by']) and $_GET['group_by'] == 1){ $order = "ORDER BY `count` DESC";  }
}

// Query the database
$sql_course_ar_c = "$sql_course_ar_c1 $order LIMIT $start , $integer";
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

function order_by_name($name){
    global $get;
    ?><a href="?page=<?php echo $_GET['page']; echo $get; ?>&order_by=<?php echo $name; ?>&ASC=<?php if(isset($_GET['ASC']) and $_GET['ASC'] == '1'){ ?>0<?php }else{ ?>1<?php };  ?>"><?php echo $name; ?><?php
    if(isset($_GET['order_by']) and $_GET['order_by'] == "$name"){
        if($_GET['ASC'] == '1'){ ?><i class="fa fa-chevron-up ml-2"></i><?php }else{ ?><i class="fa fa-chevron-down ml-2"></i><?php };
    }
    ?></a><?php
}

?>

 <!-- basic table start -->
 <div class="col-lg-12 mt-5">
                  <div class="card">
                      <div class="card-body">
                          <h4 class="header-title">404</h4>
                          <div class="single-table">
                              <div class="table-responsive">
                                  <table class="table text-center table-hover">
                                      <thead class="text-uppercase">
                                          <tr>
                                              
                                          <?php if(isset($_GET['group_by']) and $_GET['group_by'] != 1){
                                                  ?><th scope="col"><?php order_by_name('id'); ?> </th><?php
                                              }?>
                                              <th scope="col"><?php order_by_name('HTTP_REFERER'); ?></th>
                                              <th scope="col"><?php order_by_name('page'); ?> </th>
                                              <th scope="col"><?php order_by_name('REMOTE_ADDR'); ?> </th>
                                              <th scope="col"><?php order_by_name('date_time'); ?> </th>
                                              <?php if(isset($_GET['group_by']) and $_GET['group_by'] == 1){
                                                  ?><th scope="col"><?php order_by_name('count'); ?> </th><?php
                                              }?>
                                          </tr>
                                          <?php
                                            if ($result_course_ar_c && (mysqli_num_rows($result_course_ar_c) > 0)) {
                                                while ($row_course_ar_c = $result_course_ar_c-> fetch_assoc()){
                                                    
                                                    $id =htmlspecialchars($row_course_ar_c['id']);
                                                    $HTTP_REFERER =htmlspecialchars($row_course_ar_c['HTTP_REFERER']);
                                                    $page =htmlspecialchars($row_course_ar_c['page']);
                                                    $REMOTE_ADDR =htmlspecialchars($row_course_ar_c['REMOTE_ADDR']);
                                                    $date_time =htmlspecialchars($row_course_ar_c['date_time']);
                                                    $count =htmlspecialchars($row_course_ar_c['count']);
                                                    
                                                    
                                                    ?>
                                      </thead>
                                      <tbody>
                                          <tr>
                                             
                                              
                                              <?php if(isset($_GET['group_by']) and $_GET['group_by'] != 1){
                                                  ?><td>
                                                  <?php echo $id ; ?>
                                                  </td><?php
                                              }?>
                                              <td><?php echo $HTTP_REFERER ; ?></td>
                                              <td><?php echo $page; ?></td>
                                              <td><?php echo $REMOTE_ADDR; ?></td>
                                              
                                              <td><?php echo $date_time; ?></td>
                                              <?php if($_GET[group_by] == 1){
                                                  ?><td><?php echo $count; ?></td><?php
                                              }?>
                                              
                                              
                                             
                                              
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