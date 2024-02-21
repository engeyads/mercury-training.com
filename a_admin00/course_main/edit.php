<style type="text/css">
.btn {
    background: #428bca;
    border: #357ebd solid 1px;
    border-radius: 3px;
    color: #fff;
    display: inline-block;
    font-size: 14px;
    padding: 8px 15px;
    text-decoration: none;
    text-align: center;
    min-width: 60px;
    position: relative;
    transition: color .1s ease;
    /* top: 40em;*/
}

.btn:hover {
    background: #357ebd;
}

.btn.btn-big {
    font-size: 18px;
    padding: 15px 20px;
    min-width: 100px;
}

.btn-close {
    color: #aaaaaa;
    font-size: 30px;
    text-decoration: none;
    position: absolute;
    right: 5px;
    top: 0;
}

.btn-close:hover {
    color: #919191;
}

/*ADDED TO STOP SCROLLING TO TOP*/
#close {
    display: none;
}
</style>




<!-- start table view -->
<div class="main-content-inner">
    <div class="col-6 mt-5">
        <p class="mb-2">
            <a class="btn btn-outline-primary font-weight-bold" data-toggle="collapse" href="#collapseExample"
                role="button" aria-expanded="false" aria-controls="collapseExample">View Table</a>
        </p>
        <div class="card">
            <div class="card-body card-hidd">
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table text-centers table-striped">

                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name of Group</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php
                                      $months = array('','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');

                                        $sql_course_c = "SELECT * FROM `course_c` ";
                                        $result_course_c = mysql_query($sql_course_c, $conn);
                                        if ($result_course_c && (mysql_num_rows($result_course_c) > 0)) {
                                            while ($row_course_c = mysql_fetch_assoc($result_course_c)){
                                                ?>
                                        <tr>
                                            <th scope="row"><?php
                                            $sql_c_id = "SELECT `c_id`, left(`c_id` , 1 )  FROM `course_main` where left(`c_id` , 1 ) = {$row_course_c[id]}  ORDER BY `c_id` DESC";
                                            $result_c_id = mysql_query($sql_c_id, $conn);
                                            $row_c_id = mysql_fetch_assoc($result_c_id);
                                            echo $row_c_id[c_id]+1;
                                            ?>
                                            </th>
                                            <td><?php echo $row_course_c[name]; ?></td>
                                        </tr>

                                        <?php
                                        }
                                    };



                                    $sql_c_id = "SELECT `c_id` FROM `course_main` ORDER BY `c_id` DESC";
                                            $result_c_id = mysql_query($sql_c_id, $conn);
                                            $row_c_id = mysql_fetch_assoc($result_c_id);
                                            $last_cid_plus = $row_c_id[c_id]+1
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End table view -->





<!-- start section add -->
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">
                <?php if(isset( $_GET['id'] )){ echo" edit Courses: ".$name ; }else{ echo "Add Courses";}; ?></h4>
            <?php
                        $id = $_GET["id"];
                        // Query the database
                        $sql_course_ar_c = "SELECT * FROM `course_main` WHERE 1 AND `id` LIKE '" . $id . "' ";
                        $result_course_ar_c = mysql_query($sql_course_ar_c, $conn);
                        if ($result_course_ar_c && (mysql_num_rows($result_course_ar_c) > 0)) {
                            $row_course_ar_c = mysql_fetch_assoc($result_course_ar_c);
                            $id =htmlspecialchars($row_course_ar_c['id']);
							$course_main_id =htmlspecialchars($row_course_ar_c['id']);
                            $name =htmlspecialchars($row_course_ar_c['name']);
                            $c_id =$row_course_ar_c['c_id'];
                            $name_file =$row_course_ar_c['name_file'];
                        };
						$row_function = $row_course_ar_c;
						$table = 'course_main';
require("function.php");
?>
            <?php if($site_course_link_pdf_course !='' and $c_id !=''){ ?><a
                href="<?php echo $site_course_link_pdf_course; ?><?php echo $c_id; ?>" target="_blank">View
                PDF</a><?php }?>
            <form method="post" action="index.php?page=course_main-replace" name="insertForm"
                enctype="multipart/form-data"><input name="id" type="hidden" id="id" value="<?php echo $id  ?>" />
                <div class="form-row">
                    <div class="col-6 mb-3"><?php form_edit('Course Name','name'); ?></div>
                    <div class="col-6 mb-3"><?php form_edit('Sub Title','sub_title'); ?></div>
                    <div class="col-6 mb-3">
                        <label class="col-form-label">Group</label>
                        <select class="form-control" name="course_c">
                            <?php
                            $course_c =$row_course_ar_c['course_c'];
                            // Query the database
                            $sql_select = "SELECT * FROM `course_c`";
                            $result_select = mysql_query($sql_select, $conn);
                            if ($result_select && (mysql_num_rows($result_select) > 0)) {
                                while ($row_select = mysql_fetch_assoc($result_select)){
                                    $id_select = $row_select['id'];
                                    $name_select = $row_select['name'];
                            ?><option value="<?php echo $id_select ; ?>"
                                <?php if ($row_course_ar_c['course_c'] == $id_select) {echo "selected=\"selected\"";} ?>>
                                <?php echo $name_select; ?></option><?php
                                }
                            };
                            ?>
                        </select>
                    </div>
                </div>


                <div class="form-row">
                    <div class="col-4 mb-3"><?php 
                    $default_val = $last_cid_plus; form_edit('Course Number','c_id'); ?></div>
                </div>

                <div class="form-row">
                    <div class="col-4 mb-3"><?php $default_val = 1; form_edit('Weeks','weeks'); ?><?php $default_val = 1; form_edit('Weeks','week'); ?>
                    </div>
                </div>
                <div class="form-group">
							<label class="col-form-label">Hidden</label>
                            <input type="checkbox" name='hidden' value='1' <?php if($row_course_ar_c['hidden'] == 1){ ?> checked<?php }; ?>>
				</div>

                <div class="form-row">
                    <div class="col-12 mb-3"><?php textarea_edit('Outline','overview'); ?></div>
                </div>

                <div class="form-row">
                    <div class="col-12 mb-3"><?php textarea_edit('Brochure','broshoure'); ?></div>
                </div>
                <button type="submit"
                    class="btn btn-primary mt-4 pr-4 pl-4"><?php if(isset( $_GET['id'] )){ echo"Edit"; }else{ echo "Add";}; ?></button>
            </form>
        </div>
    </div>
</div>

<!-- end section add -->










<!-- Start Accordion inner -->
<div class="col-12 mt-5 sss">
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <?php
                            $y = date('Y');
                            $m = date('m');
                            $sql_course_y = "SELECT `y1` FROM `course` WHERE `c_id` ='$c_id'  group BY `y1` ";
                            $result_course_y = mysql_query($sql_course_y, $conn);
                            if ($result_course_y && (mysql_num_rows($result_course_y) > 0)) {
                                while ($row_course_y = mysql_fetch_assoc($result_course_y)){
                                    ?><li class="nav-item">
                    <a class="nav-link <?php if($row_course_y[y1] == $y){ ?>active<?php }; ?>"
                        id="pills-<?php echo $row_course_y[y1]; ?>-tab" data-toggle="pill"
                        href="#pills-<?php echo $row_course_y[y1]; ?>" role="tab"
                        aria-controls="pills-<?php echo $row_course_y[y1]; ?>"
                        aria-selected="true"><?php echo $row_course_y[y1]; ?></a>
                </li><?php
                                }
                            }?>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <?php
                    $sql_course_y = "SELECT `y1` FROM `course` WHERE `c_id` ='$c_id'  group BY `y1` ";
                    $result_course_y = mysql_query($sql_course_y, $conn);
                    if ($result_course_y && (mysql_num_rows($result_course_y) > 0)) {
                        while ($row_course_y = mysql_fetch_assoc($result_course_y)){
                            ?>
                <div class="tab-pane fade <?php if($row_course_y[y1] == $y){ ?>show active<?php }; ?>"
                    id="pills-<?php echo $row_course_y[y1]; ?>" role="tabpanel" aria-labelledby="pills-profile-tab">

                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <?php
                                    $sql_course_m = "SELECT `m1` FROM `course` WHERE `c_id` ='$c_id' and `y1` = '{$row_course_y[y1]}' group BY `m1` ";
                                    $result_course_m = mysql_query($sql_course_m, $conn);
                                    if ($result_course_m && (mysql_num_rows($result_course_m) > 0)) {
                                        while ($row_course_m = mysql_fetch_assoc($result_course_m)){
                                    $id_course
                                    ?>
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapse-<?php echo $row_course_y[y1]; ?><?php echo $row_course_m[m1]; ?>"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        <?php echo $months[$row_course_m[m1]]; ?> <?php echo $row_course_y[y1]; ?>
                                    </button>
                                </h5>
                            </div>
                            <?php

?><div id="collapse-<?php echo $row_course_y[y1]; ?><?php echo $row_course_m[m1]; ?>" class="collapse <?php if($row_course_y[y1] == $y
and $row_course_m[m1] >= $m){ ?>show<?php }?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="single-table">
                                        <div class="table-responsive">
                                            <table class="table text-center table-striped table-hover">
                                                <thead class="text-uppercase">
                                                    <tr>
                                                        <th scope="col">Start Date</th>
                                                        <th scope="col">End Date</th>
                                                        <th scope="col">City</th>
                                                        <th scope="col">Address</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Currency</th>
                                                        <th scope="col">Edit</th>
                                                        <th scope="col">Delete</th>
                                                        <th scope="col">Upcoming</th>
                                                        <th scope="col">View</th>
                                                        <th scope="col">PDF</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql_course = "SELECT * FROM `course` WHERE `c_id` ='$c_id' and `y1` = '{$row_course_y[y1]}' and `m1` = '{$row_course_m[m1]}'  ORDER BY `d1` ASC ";
                                                    $result_course = mysql_query($sql_course, $conn);
                                                    if ($result_course && (mysql_num_rows($result_course) > 0)) {
                                                        while ($row_course = mysql_fetch_assoc($result_course)){
                                                            $id_course = $row_course[id];
                                                            ?>
                                                    <tr <?php if($_GET[course] ==$id_course){ ?>style="background:#F00;color:#FFF"
                                                        <?php }?>>
                                                        <td scope="row">
                                                            <a
                                                                name="course_<?php echo $id_course; ?>"></a><?php if($row_course['d1']!="" and $row_course['m1']!="" and $row_course['y1']!=""){ echo $row_course['d1']; echo "/"; echo $months[$row_course['m1']]; echo "/"; echo $row_course['y1']; }else{ ?><img
                                                                src="assets/images/err.png" width="16"
                                                                height="14" /><?php }; ?>
                                                        </td>
                                                        <td>
                                                            <?php if($row_course['d2']!="" and $row_course['m2']!="" and $row_course['y2']!=""){ echo $row_course['d2']; echo "/"; echo $months[$row_course['m2']]; echo "/"; echo  $row_course['y2']; }else{ ?><img
                                                                src="assets/images/err.png" width="16"
                                                                height="14" /><?php }; ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if($row_course['city']!=""){
                                                                $city = $row_course['city'];
                                                                $sql_select_test1 = "SELECT `name` FROM `cities` WHERE 1 AND `id` = '$city'";
                                                                $result_select_test1 = mysql_query($sql_select_test1, $conn);
                                                                if ($result_select_test1 && (mysql_num_rows($result_select_test1) > 0)) {
                                                                    $row_select_test1 = mysql_fetch_assoc($result_select_test1);
                                                                    echo $row_select_test1['name'];
                                                                }else{
                                                                ?><img src="assets/images/err.png" width="16"
                                                                height="14" /><?php
                                                            };
                                                            }else{
                                                                ?><img src="assets/images/err.png" width="16"
                                                                height="14" /><?php
                                                            };
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                            if($row_course['city']!=""){
                                                                $city = $row_course['city'];
                                                                $sql_select_test1 = "SELECT `hotel_name` FROM `cities` WHERE 1 AND `id` = '$city'";
                                                                $result_select_test1 = mysql_query($sql_select_test1, $conn);
                                                                if ($result_select_test1 && (mysql_num_rows($result_select_test1) > 0)) {
                                                                    $row_select_test1 = mysql_fetch_assoc($result_select_test1);
                                                                    echo $row_select_test1['hotel_name'];
                                                                };
                                                            }else{
                                                                ?><img src="assets/images/err.png" width="16"
                                                                height="14" /><?php
                                                            };
                                                            ?>
                                                        </td>
                                                        <td><?php if($row_course['price']!=""){ echo $row_course['price']; }else{ ?>
                                                            <img src="assets/images/err.png" width="16"
                                                                height="14" /><?php }; ?></td>
                                                        <td><?php if($row_course['currency']!=""){ echo $row_course['currency']; }else{ ?>&euro;<?php }; ?>
                                                        </td>
                                                        <td><a
                                                                href="?page=course-edit&id=<?php echo $id_course; ?>&course_main=<?php echo $id; ?>"><i
                                                                    class="fa fa-edit"></i></a></td>
                                                        <td>
                                                            <div class="modal fade"
                                                                id="exampleModa<?php echo $id_course; ?>"
                                                                tabindex="1000" role="dialog"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="false">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Delet Course</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body text-danger">
                                                                            Are you sure you want to delete
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">NO</button>
                                                                            <span class="b-remove"><a type="button"
                                                                                    class="btn btn-primary"
                                                                                    href="?page=course-del&amp;id=<?php echo $id_course ;?>&amp;c_id=<?php echo $course_main_id ;?>">Yes</a></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><button class="button-del" type="button"
                                                                data-toggle="modal"
                                                                data-target="#exampleModa<?php echo $id_course; ?>"><i
                                                                    class="ti-trash"></i></button>





                                                        </td>
                                                        <td>
                                                            <ul class="d-flex justify-content-center">
                                                                <li><a href="?page=course-certain&id=<?php echo $id_course ;?>&course_main=<?php echo $id ;?>&certain=<?php if($row_course['certain']!="on"){ ?>on<?php }else{ ?>off<?php }; ?>"
                                                                        class="text-danger"><i
                                                                            class="fa fa-toggle-<?php if($row_course['certain']=="on"){ ?>on<?php }else{ ?>off<?php }; ?> fa-lg"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo $site_course_link_a.$id_course.$site_course_link_b; ?>"
                                                                target="_blank">View</a>
                                                        </td>
                                                        <td><a href="<?php echo $site_course_link_pdf; ?><?php echo $id_course ;?>"
                                                                target="_blank">PDF</a></td>
                                                    </tr><?php
	}
}?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div><?php
	}
}?>


                        </div>
                    </div>


                </div><?php
	}
}?>

                <div class="tab-pane fade" id="pills-2020" role="tabpanel" aria-labelledby="pills-contact-tab"></div>
            </div>
        </div>
    </div>
</div>
<span type="button" class="btn btn-warning mt-4 pr-4 pl-4 text-bold"><a
        href="?page=course-edit&c_id=<?php echo $c_id; ?>&course_main=<?php echo $id; ?>">Add New Date and
        City</a></span>
</div>
<!-- End Accordion inner -->





<div <?php if($y > $row_course['y1']){ ?>style="display:none" <?php }; ?> id="div_<?php echo $row_course['y1']; ?>">



    <div <?php if($y <= $row_course['y1'] and $m > $row_course['m1'] ){ ?>style="display:none" <?php }; ?>
        id="div_<?php echo $row_course['y1']; ?>_<?php echo $row_course['m1']; ?>">







    </div>

</div><a name="anas"></a>



<?php
if($id !='' and $level_admin <= 2){
// Query the database
$main .="WHERE `table` = 'course_main' AND `admin_id` = '{$id}'";
$sql_admin_history1 = "SELECT * FROM `admin_history` $main ORDER BY `id` DESC";
$result_admin_history1 = mysql_query($sql_admin_history1, $conn);
$numrows = mysql_num_rows($result_admin_history1);

// Query the database
$sql_admin_history = "$sql_admin_history1";
$result_admin_history = mysql_query($sql_admin_history, $conn);
?>
<!-- page title area end -->


<div class="main-content-inner">
    <div class="col-12 mt-5">
        <p class="mb-2">
            <a class="btn btn-outline-primary font-weight-bold \


            " data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false"
                aria-controls="collapseExample1">View History</a>

        </p>
        <div class="card">
            <div class="card-body card-hidd">
                <div class="collapse" id="collapseExample1">
                    <div class="card card-body">
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">user</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">time</th>
                                            <th scope="col">type</th>
                                            <th scope="col">text</th>
                                            <th scope="col">IP</th>
                                        </tr>
                                    </thead>
                                    <tbody> <?php
                                    if ($result_admin_history && (mysql_num_rows($result_admin_history) > 0)) {
                                         while ($row_admin_history = mysql_fetch_assoc($result_admin_history)){
                                           $id =htmlspecialchars($row_admin_history['id']);

                                                                                ?>
                                        <tr>

                                            <td scope="row"><?php echo $row_admin_history['user_name']; ?></td>

                                            <td><?php echo $row_admin_history['Date']; ?></td>
                                            <td><?php echo $row_admin_history['time']; ?></td>
                                            <td><?php echo $row_admin_history['type']; ?></td>
                                            <td><?php echo $row_admin_history['Text']; ?></td>
                                            <td><?php echo $row_admin_history['ip']; ?></td>
                                        </tr><?php
                                                                        }
                                                                    }else{ echo " There are no Items to display "; };
                                                                     ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php }; ?>