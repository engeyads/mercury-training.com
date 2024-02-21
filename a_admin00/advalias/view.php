<?php if($level_admin > 3){ exit; } ?>

<?php

function search_icon($name){

global $get,$main;

?>

<?php echo $name; ?>:

<div class="form-group">
<input type='text' class="form-control input-search" name="<?php echo $name; ?>" value="<?php
    $val = trim($_GET["$name"]);
    echo $val; if($val !=''){
    $main .= " and `$name` like '%{$val}%' "; 
    $get .="&{$name}=".urlencode($val); 
    } ?>">
</div>

<?php

} ?>



<form action="#" class="form-inline">
<input type="hidden" name="page" value="advalias-view">
<label for="" class="label-search"><?php search_icon('Alias'); ?></label>
<label for="" class="label-search"><?php search_icon('Url'); ?></label>
<label for="" class="label-search"><?php search_icon('Keywords'); ?></label>
<label for="" class="label-search"><?php search_icon('Description'); ?></label>
<label for="" class="label-search"><?php search_icon('Title'); ?></label>
<label for="" class="label-search"><?php search_icon('Date'); ?></label>
<label for="" class="label-search"><?php search_icon('IP'); ?></label>
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
$sql_course_ar_c1 = "SELECT * FROM `alias` where 1 $main  ";
$result_course_ar_c1 = mysql_query($sql_course_ar_c1, $conn);
$numrows = mysql_num_rows($result_course_ar_c1);

if($_GET[order_by] !=''){ 
    $order = "ORDER BY `{$_GET[order_by]}` "; 
    $get .="&order_by={$_GET[order_by]}";
    $get .="&ASC={$_GET[ASC]}";
    if($_GET[ASC] =='1'){
        $order .= "ASC ";
    }else{
        $order .= "DESC ";
    }
}else{
    $order = "ORDER BY `id` DESC"; 
}

// Query the database
$sql_course_ar_c = "$sql_course_ar_c1 $order LIMIT $start , $integer";
$result_course_ar_c = mysql_query($sql_course_ar_c, $conn);

function order_by_name($name){
    global $get;
    ?><a href="?page=<?php echo $_GET[page]; echo $get; ?>&order_by=<?php echo $name; ?>&ASC=<?php if($_GET['ASC'] == '1'){ ?>0<?php }else{ ?>1<?php };  ?>"><?php echo $name; ?><?php
    if($_GET['order_by'] == "$name"){
        if($_GET['ASC'] == '1'){ ?><i class="fa fa-chevron-up ml-2"></i><?php }else{ ?><i class="fa fa-chevron-down ml-2"></i><?php };
    }
    ?></a><?php
}
?>

<!-- basic table start -->
<div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Alias</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table text-center table-hover">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col"><?php order_by_name('id'); ?></th>
                                <th scope="col"><?php order_by_name('alias'); ?></th>
                                <th scope="col"><?php order_by_name('url'); ?></th>
                                <th scope="col"><?php order_by_name('keywords'); ?></th>
                                <th scope="col"><?php order_by_name('description'); ?></th>                                               
                                <th scope="col"><?php order_by_name('title'); ?></th>                                               
                                <th scope="col"><?php order_by_name('date'); ?></th>                                               
                                <th scope="col"><?php order_by_name('ip'); ?></th>                                               
                                <th scope="col">Delete</th>                                               
                                <th scope="col">Edit</th>                                               
                            </tr>
                            <?php
                            if ($result_course_ar_c && (mysql_num_rows($result_course_ar_c) > 0)) {
                                while ($row_course_ar_c = mysql_fetch_assoc($result_course_ar_c)){
                                    
                                    $id =htmlspecialchars($row_course_ar_c['id']);
                                    $alias =htmlspecialchars($row_course_ar_c['alias']);
                                    $url =htmlspecialchars($row_course_ar_c['url']);
                                    $keywords =htmlspecialchars($row_course_ar_c['keywords']);
                                    $description =htmlspecialchars($row_course_ar_c['description']);
                                    $title =htmlspecialchars($row_course_ar_c['title']);
                                    $date =htmlspecialchars($row_course_ar_c['date']);
                                    $ip =htmlspecialchars($row_course_ar_c['ip']);
                                    
                                    
                                    ?>
                        </thead>
                        <tbody>
                            <tr>
                                <td> <?php echo $id ; ?></td>
                                <td><?php echo $alias ; ?></td>
                                <td><?php echo $url; ?></td>
                                <td><?php echo $keywords; ?></td>
                                <td><?php echo $description; ?></td>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $date; ?></td>
                                <td><?php echo $ip; ?></td>
                                <td><a href="?page=advalias-edit&id=<?php echo $id ;?>"><i class="fa fa-edit"></i></a></td>
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
                                            <span class="b-remove"><a type="button" class="btn btn-primary" href="?page=advalias-del&amp;id=<?php echo $id ;?>">Yes</a></span>
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

        

        <nav aria-label="...">
                    <ul class="pagination">
                    <?php if($start>0){
                $start_integer = $start - $integer;
                    ?><li class="page-item">
                            <a href="?page=advalias-view&start=<?php echo $start - $integer; echo $get;?>"  class="page-link">Previous</a>
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
        $str .= '">'."<a href=\"?page=advalias-view&start={$st}{$get}\" class=\"page-link\">$no</a></li>";
        $str .= $i != $totalPages ? "  " : "";

                    }else{ if($q ==0){$str .= '...';} $q=1;}
                }
        }
        echo  $str;

        ?>
                        <?php
                        if($numrows>$end){
                ?><li class="page-item">
                            <a href="?page=advalias-view&start=<?php echo $integer + $start; echo $get; ?>"  class="page-link">Next</a>
                        </li><?php
                        };
                        ?>

                    </ul>
                </nav>

        




    </div>
</div>
<!-- basic table end -->