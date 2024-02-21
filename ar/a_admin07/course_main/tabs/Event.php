<?php if(isset($c_id) and $c_id!=''){ ?>
<!-- Start Accordion inner -->

<div class=" text-right">

<span type="button" class="btn btn-warning mt-4 pr-4 pl-4 text-bold ml-4">
    <a href="?page=course-edit&c_id=<?php echo $c_id; ?>&course_main=<?php echo $id; ?>" class="text-white"><i class="fa fa-pencil" aria-hidden="true"></i> Add New Date & City</a></span>
</div>


<div class="col-12 mt-5 sss">
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <?php
                            $y = date('Y');
                            $m = date('m');
                            $sql_course_y = "SELECT `y1` FROM `course` WHERE `c_id` ='$c_id'  group BY `y1` ";
                            $result_course_y = $mysqli -> query($sql_course_y);
                            if ($result_course_y && (mysqli_num_rows($result_course_y) > 0)) {
                                while ($row_course_y = $result_course_y-> fetch_assoc()){
                                    ?><li class="nav-item">
                    <a class="nav-link <?php if($row_course_y['y1'] == $y){ ?>active<?php }; ?>"
                        id="pills-<?php echo $row_course_y['y1']; ?>-tab" data-toggle="pill"
                        href="#pills-<?php echo $row_course_y['y1']; ?>" role="tab"
                        aria-controls="pills-<?php echo $row_course_y['y1']; ?>" aria-selected="true"><i
                            class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        <?php echo $row_course_y['y1']; ?> </a>
                </li><?php
                                }
                            }?>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <?php
                    $sql_course_y = "SELECT `y1` FROM `course` WHERE `c_id` ='$c_id'  group BY `y1` ";
                    $result_course_y = $mysqli -> query($sql_course_y);
                    if ($result_course_y && (mysqli_num_rows($result_course_y) > 0)) {
                        while ($row_course_y = $result_course_y-> fetch_assoc()){
                            ?>
                <div class="tab-pane fade <?php if($row_course_y['y1'] == $y){ ?>show active<?php }; ?>"
                    id="pills-<?php echo $row_course_y['y1']; ?>" role="tabpanel" aria-labelledby="pills-profile-tab">

                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <?php
                                    $sql_course_m = "SELECT `m1` FROM `course` WHERE `c_id` ='$c_id' and `y1` = '{$row_course_y['y1']}' group BY `m1` ";
                                    $result_course_m = $mysqli -> query($sql_course_m);
                                    if ($result_course_m && (mysqli_num_rows($result_course_m) > 0)) {
                                        while ($row_course_m = $result_course_m-> fetch_assoc()){
                                    $id_course
                                    ?>
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                        data-target="#collapse-<?php echo $row_course_y['y1']; ?><?php echo $row_course_m['m1']; ?>"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        <?php echo $months[$row_course_m['m1']]; ?> <?php echo $row_course_y['y1']; ?> <i
                                            class="fa fa-chevron-down ml-2" aria-hidden="true"></i>
                                    </button>
                                </h5>
                            </div>
                            <?php

?><div id="collapse-<?php echo $row_course_y['y1']; ?><?php echo $row_course_m['m1']; ?>" class="collapse <?php if($row_course_y['y1'] == $y
and $row_course_m['m1'] >= $m){ ?>show<?php }?>" aria-labelledby="headingOne" data-parent="#accordionExample">
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
                                                    $sql_course = "SELECT * FROM `course` WHERE `c_id` ='$c_id' and `y1` = '{$row_course_y['y1']}' and `m1` = '{$row_course_m['m1']}'  ORDER BY `d1` ASC ";
                                                    $result_course = $mysqli -> query($sql_course);
                                                    if ($result_course && (mysqli_num_rows($result_course) > 0)) {
                                                        while ($row_course = $result_course-> fetch_assoc()){
                                                            $id_course = $row_course['id'];
                                                            ?>
                                                    <tr <?php if(isset($_GET['course']) and $_GET['course'] ==$id_course){ ?>style="background:#F00;color:#FFF"
                                                        <?php }?>>
                                                        <td scope="row">
                                                            <a
                                                                name="course_<?php echo $id_course; ?>"></a><?php if($row_course['d1']!="" and $row_course['m1']!="" and $row_course['y1']!=""){ echo $row_course['d1']; echo "/"; echo $months[$row_course['m1']]; echo "/"; echo $row_course['y1']; }else{ ?><img src="assets/images/err.png" width="16" height="14" /><?php }; ?>
                                                        </td>
                                                        <td>
                                                            <?php if($row_course['d2']!="" and $row_course['m2']!="" and $row_course['y2']!=""){ echo $row_course['d2']; echo "/"; echo $months[$row_course['m2']]; echo "/"; echo  $row_course['y2']; }else{ ?><img src="assets/images/err.png" width="16" height="14" /><?php }; ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if($row_course['city']!=""){
                                                                $city = $row_course['city'];
                                                                $sql_select_test1 = "SELECT `name` FROM `cities` WHERE 1 AND `id` = '$city'";
                                                                $result_select_test1 = $mysqli -> query($sql_select_test1);
                                                                if ($result_select_test1 && (mysqli_num_rows($result_select_test1) > 0)) {
                                                                    $row_select_test1 = $result_select_test1-> fetch_assoc();
                                                                    echo $row_select_test1['name'];
                                                                }else{
                                                                ?><img src="assets/images/err.png" width="16" height="14" /><?php
                                                            };
                                                            }else{
                                                                ?><img src="assets/images/err.png" width="16" height="14" /><?php
                                                            };
                                                            ?>
                                                        </td>

                                                        <td>
                                                            <?php
                                                            if($row_course['city']!=""){
                                                                $city = $row_course['city'];
                                                                $sql_select_test1 = "SELECT `hotel_name` FROM `cities` WHERE 1 AND `id` = '$city'";
                                                                $result_select_test1 = $mysqli -> query($sql_select_test1);
                                                                if ($result_select_test1 && (mysqli_num_rows($result_select_test1) > 0)) {
                                                                    $row_select_test1 = $result_select_test1-> fetch_assoc();
                                                                    echo $row_select_test1['hotel_name'];
                                                                };
                                                            }else{
                                                                ?><img src="assets/images/err.png" width="16" height="14" /><?php
                                                            };
                                                            ?>
                                                        </td>
                                                        <td><?php if($row_course['price']!=""){ echo $row_course['price']; }else{ ?>
                                                            <img src="assets/images/err.png" width="16" height="14" /><?php }; ?></td>
                                                        <td><?php if($row_course['currency']!=""){ echo $row_course['currency']; }else{ ?>&euro;<?php }; ?>
                                                        </td>
                                                        <td><a
                                                                href="?page=course-edit&id=<?php echo $id_course; ?>&course_main=<?php echo $id; ?>"><i class="fa fa-edit"></i></a></td>
                                                        <td>
                                                            <div class="modal fade"
                                                                id="exampleModa<?php echo $id_course; ?>"
                                                                tabindex="1000" role="dialog"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="false">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Delet Course Date</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body text-danger">
                                                                            Are you sure you want to delete this date
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
                                                                <li><a href="?page=course-certain&id=<?php echo $id_course ;?>&course_main=<?php echo $id ;?>&certain=<?php if($row_course['certain']!="on"){ ?>on<?php }else{ ?> <?php }; ?>"
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
                                                                target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true" title="PDF download"></i></a></td>
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

<div class="col-md-4 offset-8 text-right">

    <span type="button" class="btn btn-warning mt-4 pr-4 pl-4 text-bold ml-4">
        <a href="?page=course-edit&c_id=<?php echo $c_id; ?>&course_main=<?php echo $id; ?>" class="text-white"><i class="fa fa-pencil" aria-hidden="true"></i> Add New Date & City</a></span>
</div>
<!-- End Accordion inner -->
<div <?php if($y > $row_course['y1']){ ?>style="display:none" <?php }; ?> id="div_<?php echo $row_course['y1']; ?>">
    <div <?php if($y <= $row_course['y1'] and $m > $row_course['m1'] ){ ?>style="display:none" <?php }; ?> id="div_<?php echo $row_course['y1']; ?>_<?php echo $row_course['m1']; ?>"></div>

</div><a name="anas"></a><?php }?>