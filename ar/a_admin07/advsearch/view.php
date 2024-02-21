<?php if($level_admin > 3){ exit; } ?>

<?php

function search_icon($name,$type){
global $get,$main;
if(isset($_GET["$name"])){ $val = trim($_GET["$name"]); }else{ $val = ''; }
if($val !=''){
    $main .= " and `$name` like '%{$val}%' "; 
    $get .="&{$name}=".urlencode($val); 
}
?><div class="form-group"><label for="" class="label-search">
<?php echo $name; ?>:

<?php if($type == 'input'){
?><input type='text' class="form-control input-search" name="<?php echo $name; ?>" value="<?php echo $val; ?>">
    <?php }elseif($type == 'checkbox'){ ?><input class="form-control input-search" type="checkbox" name='Find' value='1' <?php if($val == 1){ ?> checked<?php }; ?>><?php }; ?>
</label></div>
<?php

} ?>


<form action="#" class="form-inline">
<input type="hidden" name="page" value="advsearch-view">
<?php search_icon('Month','input'); ?>
<?php search_icon('Category','input'); ?>
<?php search_icon('City','input'); ?>
<?php search_icon('ref','input'); ?>
<?php search_icon('Date','input'); ?>
<?php search_icon('Time','input'); ?>
<?php search_icon('ip','input'); ?>
<?php search_icon('Find','checkbox'); ?>
<input type="submit"  class="btn btn-primary btn-search">
</form>


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
$sql_course_ar_c1 = "SELECT * FROM `search` where 1 $main ";
$result_course_ar_c1 = $mysqli -> query($sql_course_ar_c1);
$numrows = mysqli_num_rows($result_course_ar_c1);


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
}

// Query the database
$sql_course_ar_c = "$sql_course_ar_c1 $order  LIMIT $start , $integer";
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
        if(isset($_GET['ASC']) and $_GET['ASC'] == '1'){ ?><i class="fa fa-chevron-up ml-2"></i><?php }else{ ?><i class="fa fa-chevron-down ml-2"></i><?php };
    }
    ?></a><?php
}
?>

<!-- basic table start -->
<div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-Date">Search</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table text-center table-hover">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col"> <?php order_by_name('id'); ?> </th>
                                            <th scope="col"> <?php order_by_name('Month'); ?> </th>
                                            <th scope="col"> <?php order_by_name('Category'); ?> </th>
                                            <th scope="col"> <?php order_by_name('City'); ?> </th>
                                            <th scope="col"> <?php order_by_name('ref'); ?> </th>                                               
                                            <th scope="col"> <?php order_by_name('Date'); ?> </th>                                               
                                            <th scope="col"> <?php order_by_name('Time'); ?> </th>                                               
                                            <th scope="col"> <?php order_by_name('ip'); ?> </th>                                               
                                            <th scope="col"> <?php order_by_name('Find'); ?> </th> 
                                        </tr>
                                        <?php
                                            if ($result_course_ar_c && (mysqli_num_rows($result_course_ar_c) > 0)) {
                                                while ($row_course_ar_c = $result_course_ar_c-> fetch_assoc()){
                                                    
                                                    $id =htmlspecialchars($row_course_ar_c['id']);
                                                    $Month =htmlspecialchars($row_course_ar_c['Month']);
                                                    $Category =htmlspecialchars($row_course_ar_c['Category']);
                                                    $City =htmlspecialchars($row_course_ar_c['City']);
                                                    $ref =htmlspecialchars($row_course_ar_c['ref']);
                                                    $Date =htmlspecialchars($row_course_ar_c['Date']);
                                                    $Time =htmlspecialchars($row_course_ar_c['Time']);
                                                    $ip =htmlspecialchars($row_course_ar_c['ip']);
                                                    $Find =htmlspecialchars($row_course_ar_c['Find']);
                                                    
                                                    
                                                    ?>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            
                                            <td> <?php echo $id ; ?></td>
                                            <td><?php echo $Month ; ?></td>
                                            <td><?php echo $Category; ?></td>
                                            <td><?php echo $City; ?></td>
                                            <td><?php echo $ref; ?></td>
                                            <td><?php echo $Date; ?></td>
                                            <td><?php echo $Time; ?></td>
                                            <td><?php echo $ip; ?></td>
                                            <td><?php echo $Find; ?></td>
                                            
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
                            <a href="?page=advsearch-view&start=<?php echo $start - $integer; echo $get;?>"  class="page-link">Previous</a>
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
        if($start == $st){ $str .=' active';};
        $str .= '">'."<a href=\"?page=advsearch-view&start={$st}{$get}\" class=\"page-link\">$no</a></li>";
        $str .= $i != $totalPages ? "  " : "";

                    }else{ if($q ==0){$str .= '...';} $q=1;}
                }
        }
        echo  $str;

        ?>
                        <?php
                        if($numrows>$end){
                ?><li class="page-item">
                            <a href="?page=advsearch-view&start=<?php echo $integer + $start; echo $get; ?>"  class="page-link">Next</a>
                        </li><?php
                        };
                        ?>

                    </ul>
                </nav>
                </div>
            </div>
            <!-- basic table end -->