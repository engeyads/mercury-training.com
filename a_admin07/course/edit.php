<?php
if(isset($_GET["id"])){ $id = $_GET["id"]; }else{ $id ='' ; }
if(isset($_GET["c_id"])){ $c_id = $_GET["c_id"]; }else{ 



	$sql_cid = "SELECT `c_id` FROM `course` WHERE 1 AND `id` LIKE '" . $id . "' ";
	$result_cid = $mysqli -> query($sql_cid);
	if ($result_cid && (mysqli_num_rows($result_cid) > 0)) {
		$row_cid = $result_cid-> fetch_assoc();
		$c_id =$row_cid['c_id'];
	};
}

if(isset($_GET["course_main"])){ $course_main = $_GET["course_main"]; }else{ 
	$sql_course_main = "SELECT `id` FROM `course_main` WHERE 1 AND `c_id` LIKE '" . $c_id . "' ";
	$result_course_main = $mysqli -> query($sql_course_main);
	if ($result_course_main && (mysqli_num_rows($result_course_main) > 0)) {
		$row_course_main = $result_course_main-> fetch_assoc();
        $course_main =$row_course_main['id'];
	};
} 


$months = array('','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
// Query the database

$sqlcourse_main = "SELECT * FROM `course_main` WHERE 1 AND `id` LIKE '" . $course_main . "' ";
$resultcourse_main = $mysqli -> query($sqlcourse_main);
$ErrInWeek = 1;
if ($resultcourse_main && (mysqli_num_rows($resultcourse_main) > 0)) {
    $rowcourse_main = $resultcourse_main-> fetch_assoc();
    $course_c  = $rowcourse_main['course_c'];
	?><div class="col"><h1 class="d-block"><?php echo $rowcourse_main['name']; ?></h1><br><?php
	?><h2 class="d-block"><?php echo $rowcourse_main[$adminweeks]; ?> Week<?php if($rowcourse_main[$adminweeks] > 1){ echo 's'; }?>.</h2>
    <a href="?page=course_main-edit&id=<?php echo $rowcourse_main['id']; ?>"><i class="fa fa-edit"></i></a>
    </div><?php
    $weeks =$rowcourse_main[$adminweeks];
        if($rowcourse_main[$adminweeks] == '1'){ $add_toClass  ='w1_p'; $ErrInWeek = 0;  }
    elseif($rowcourse_main[$adminweeks] == '2'){ $add_toClass  ='w2_p'; $ErrInWeek = 0;  }
    elseif($rowcourse_main[$adminweeks] == '3'){ $add_toClass  ='w3_p'; $ErrInWeek = 0;  }
    elseif($rowcourse_main[$adminweeks] == '4'){ $add_toClass  ='w4_p'; $ErrInWeek = 0;  }
};
$ErrInClass = 1;
$sqlthecourse_c = "SELECT * FROM `course_c` WHERE 1 AND `id` LIKE '" . $course_c . "' ";
$resultthecourse_c = $mysqli -> query($sqlthecourse_c);
if ($resultthecourse_c && (mysqli_num_rows($resultthecourse_c) > 0)) {
	$rowthecourse_c = $resultthecourse_c-> fetch_assoc();
            if($rowthecourse_c['class'] == 'A'){ $add_toClass  .=''  ; $ErrInClass = 0;  }
        elseif($rowthecourse_c['class'] == 'B'){ $add_toClass  .='_b'; $ErrInClass = 0;  }
        elseif($rowthecourse_c['class'] == 'C'){ $add_toClass  .='_c'; $ErrInClass = 0;  }
};

$sql_course_ar_c = "SELECT * FROM `course` WHERE 1 AND `id` LIKE '" . $id . "' ";
$result_course_ar_c = $mysqli -> query($sql_course_ar_c);
if ($result_course_ar_c && (mysqli_num_rows($result_course_ar_c) > 0)) {
	$row_course_ar_c = $result_course_ar_c-> fetch_assoc();
	$id =htmlspecialchars($row_course_ar_c['id']);
	$certain =$row_course_ar_c['certain'];
}; ?>




<form method="post" action="?page=course-replace" name="insertForm" id="insertForm">
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-3 mt-5">
                <div class="card sticky-top">
                    <div class="card-body"
                        <?php if((isset($row_course_ar_c['certain']) and $row_course_ar_c['certain']=="on") and isset($_GET['ch']) and $_GET['ch'] == 1){ ?>style="background:#0C0"
                        <?php }; ?>>
                        <h4 class="header-title"><i class="fa fa-pencil" aria-hidden="true"></i> 
                            <?php if(isset( $_GET['id'] )){ echo"Edit Course: ".$name ; }else{ echo "Add Course";}; ?>
                        </h4>
                        <div class="form-group">
                            <label class="col-form-label">City</label>
                            <select name="city" id="city" class="form-control">
                                <option></option>
                                <?php
                                $city =$row_course_ar_c['city'];
                                // Query the database
                                $sql_select = "SELECT * FROM `cities`";
                                $result_select = $mysqli -> query($sql_select);
                                if ($result_select && (mysqli_num_rows($result_select) > 0)) {
                                    while ($row_select = $result_select-> fetch_assoc()){
                                        $id_select = $row_select['id'];
                                        $name_select = $row_select['name'];
                                ?>
                                <option value="<?php echo $id_select ; ?>"
                                    <?php if (!(strcmp("$id_select", "$city"))) {echo "selected=\"selected\"";} ?>>
                                    <?php echo $name_select; ?></option>
                                <?php
                                    }
                                };
                                ?>
                            </select>
                        </div>

                        <label for="example-date-input" class="col-form-label">Start Date</label>
                        <div class="form-group form-row">
                            <div class="col-lg-3">
                                <input id="d1" class="form-control" type="text" placeholder="day"
                                    value="<?php if(isset($row_course_ar_c['d1'])){ echo $row_course_ar_c['d1']; } ?>" name="d1">
                            </div>
                            <div class="col-lg-3">
                                <input id="m1" class="form-control" type="text" placeholder="Month"
                                    value="<?php if(isset($row_course_ar_c['m1'])){ echo $row_course_ar_c['m1']; } ?>" name="m1">
                            </div>
                            <div class="col-lg-3">

                                <input id="y1" class="form-control" type="text" placeholder="year"
                                    value="<?php if(isset($row_course_ar_c['y1'])){ echo $row_course_ar_c['y1']; } ?>" name="y1">
                            </div>
                        </div>
                        <label for="example-date-input" class="col-form-label">End Date</label>
                        <div class="form-group form-row">
                            <div class="col-lg-3">
                                <input id="d2" class="form-control" type="text" placeholder="Day"
                                    value="<?php if(isset($row_course_ar_c['d2'])){ echo $row_course_ar_c['d2']; } ?>" name="d2">

                                <?php
                                $days = ($weeks*7)-3;
                                $firstDayOfYear_rand = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                                $nextSunday_rand = strtotime('Sunday', $firstDayOfYear_rand);
                                $nextThursday_rand = strtotime("+{$days} day", $nextSunday_rand);
                                //exit;
                                $rand = rand(1,52);
                                    $nextSunday_rand = strtotime("+$rand week", $nextSunday_rand);
                                    $nextThursday_rand = strtotime("+{$days} day", $nextSunday_rand);
                                ?><a onclick="
                                  document.getElementById('d1').value='<?php echo date('d', $nextSunday_rand); ?>';
                                  document.getElementById('m1').value='<?php echo date('m', $nextSunday_rand); ?>';
                                  document.getElementById('y1').value='<?php echo date('Y', $nextSunday_rand); ?>';
                                  document.getElementById('d2').value='<?php echo date('d', $nextThursday_rand); ?>';
                                  document.getElementById('m2').value='<?php echo date('m', $nextThursday_rand); ?>';
                                  document.getElementById('y2').value='<?php echo date('Y', $nextThursday_rand); ?>';
                                  alert('The Date has been changed to: <?php
                                        echo date('d', $nextSunday_rand); echo ' ';
                                        echo $months[date('m', $nextSunday_rand)*1]; echo ' ';
                                        echo date('Y', $nextSunday_rand); echo ' - ';
                                        echo date('d', $nextThursday_rand); echo ' ';
                                        echo $months[date('m', $nextThursday_rand)*1]; echo ' ';
                                        echo date('Y', $nextThursday_rand); echo ' ';
                                        ?>');
                                  " class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal"
                                    data-target="#exampleModalCenter">Random Date</a>


                            </div>
                            <div class="col-lg-3">
                                <input id="m2" class="form-control" type="text" placeholder="Month"
                                    value="<?php if(isset($row_course_ar_c['m2'])){ echo $row_course_ar_c['m2']; } ?>" name="m2">
                            </div>
                            <div class="col-lg-3">
                                <input id="y2" class="form-control" type="text" placeholder="year"
                                    value="<?php if(isset($row_course_ar_c['y2'])){ echo $row_course_ar_c['y2']; } ?>" name="y2">
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-lg-6">
                                <label for="example-date-input" class="col-form-label">Price</label>
                                <input id="price" class="form-control" type="number"
                                    value="<?php if(isset($row_course_ar_c['price'])){ echo $row_course_ar_c['price']; } ?>" name="price">
                            </div>
                            <div class="col-lg-6">
                                <label for="example-date-input" class="col-form-label">Currency</label>
                                <input id="currency" class="form-control" type="text" value="" name="currency">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Address</label>
                            <input class="form-control" type="text" value="<?php if(isset($row_course_ar_c['address'])){ echo $row_course_ar_c['address']; }  ?>"
                                id="Addr" name="address">
                        </div>

                        <div class="form-group form-row">
                            <div class="col-lg-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2"
                                        <?php if((isset($row_course_ar_c['certain']) and $row_course_ar_c['certain']=="on") or (isset($_GET['ch']) and $_GET['ch']==1)){ ?>checked="checked"
                                        <?php }; ?> name="certain" />
                                    <label class="custom-control-label" for="customCheck2">Upcoming</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1"
                                        <?php if((isset($row_course_ar_c['visible']) and $row_course_ar_c['visible']=="on") or $id ==""){ ?>checked="checked"
                                        <?php }; ?> name="visible" />
                                    <label class="custom-control-label" for="customCheck1">Visible in Website</label>
                                </div>
                            </div>
                        </div>



                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" id='focusid'
                            data-target="#exampleModalCenter"><i class="fa fa-pencil" aria-hidden="true"></i> <?php if($id==''){ echo 'Add'; }else{ echo 'Edit'; }; ?></button>



                    </div>
                </div>
            </div>
            <div class="col-lg-3 mt-5">




                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Weeks Sunday</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table text-center table-bordered">
                                    <thead class="text-uppercase bg-light">
                                        <tr>
                                            <th scope="col">DD</th>
                                            <th scope="col">MM</th>
                                            <th scope="col">YYY</th>
                                            <th scope="col">DD</th>
                                            <th scope="col">MM</th>
                                            <th scope="col">YYY</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $days = ($weeks*7)-3;
                                        $firstDayOfYear = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                                        $nextSunday = strtotime('Sunday', $firstDayOfYear);
                                        $nextThursday = strtotime("+{$days} day", $nextSunday);
                                        //exit;
                                        for ($x = 0; $x <= 52; $x++) {
                                            if($m1_ != date('m', $nextSunday)){ ?>
                                        <tr>
                                            <td colspan="6">
                                                <h3><?php echo $months[date('m', $nextSunday)*1].' '.date('Y', $nextSunday); ?>
                                                </h3>
                                            </td>
                                        </tr><?php }?>
                                        <tr onclick="
                                          document.getElementById('d1').value='<?php echo date('d', $nextSunday); ?>';
                                          document.getElementById('m1').value='<?php echo date('m', $nextSunday); ?>';
                                          document.getElementById('y1').value='<?php echo date('Y', $nextSunday); ?>';
                                          document.getElementById('d2').value='<?php echo date('d', $nextThursday); ?>';
                                          document.getElementById('m2').value='<?php echo date('m', $nextThursday); ?>';
                                          document.getElementById('y2').value='<?php echo date('Y', $nextThursday); ?>';
                                          alert('<?php
										  echo date('d', $nextSunday); echo ' ';
										  echo $months[date('m', $nextSunday)*1]; echo ' ';
										  echo date('Y', $nextSunday);
										  echo ' - ';
										  echo date('d', $nextThursday); echo ' ';
										  echo $months[date('m', $nextThursday)*1]; echo ' ';
										  echo date('Y', $nextThursday); ?>');
                                          ">
                                            <td><?php echo date('d', $nextSunday); ?></td>
                                            <td><?php echo $m1_ = date('m', $nextSunday); ?></td>
                                            <td><?php echo date('Y', $nextSunday); ?></td>
                                            <td><?php echo date('d', $nextThursday); ?></td>
                                            <td><?php echo date('m', $nextThursday); ?></td>
                                            <td><?php echo date('Y', $nextThursday); ?></td>
                                        </tr><?php
                                            $nextSunday = strtotime('+1 week', $nextSunday);
                                            $nextThursday = strtotime("+{$days} day", $nextSunday);
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <div class="col-lg-3 mt-5">




                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Weeks Monday</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table text-center table-bordered">
                                    <thead class="text-uppercase bg-light">
                                        <tr>
                                            <th scope="col">DD</th>
                                            <th scope="col">MM</th>
                                            <th scope="col">YYY</th>
                                            <th scope="col">DD</th>
                                            <th scope="col">MM</th>
                                            <th scope="col">YYY</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $days = ($weeks*7)-3;
                                        $firstDayOfYear = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
                                        $nextSunday = strtotime('Monday', $firstDayOfYear);
                                        $nextThursday = strtotime("+{$days} day", $nextSunday);
                                        //exit;
                                        for ($x = 0; $x <= 52; $x++) {
                                            if($m1_ != date('m', $nextSunday)){ ?>
                                        <tr>
                                            <td colspan="6">
                                                <h3><?php echo $months[date('m', $nextSunday)*1].' '.date('Y', $nextSunday); ?>
                                                </h3>
                                            </td>
                                        </tr><?php }?>
                                        <tr onclick="
                                          document.getElementById('d1').value='<?php echo date('d', $nextSunday); ?>';
                                          document.getElementById('m1').value='<?php echo date('m', $nextSunday); ?>';
                                          document.getElementById('y1').value='<?php echo date('Y', $nextSunday); ?>';
                                          document.getElementById('d2').value='<?php echo date('d', $nextThursday); ?>';
                                          document.getElementById('m2').value='<?php echo date('m', $nextThursday); ?>';
                                          document.getElementById('y2').value='<?php echo date('Y', $nextThursday); ?>';
                                          alert('<?php
										  echo date('d', $nextSunday); echo ' ';
										  echo $months[date('m', $nextSunday)*1]; echo ' ';
										  echo date('Y', $nextSunday);
										  echo ' - ';
										  echo date('d', $nextThursday); echo ' ';
										  echo $months[date('m', $nextThursday)*1]; echo ' ';
										  echo date('Y', $nextThursday); ?>');
                                          ">
                                            <td><?php echo date('d', $nextSunday); ?></td>
                                            <td><?php echo $m1_ = date('m', $nextSunday); ?></td>
                                            <td><?php echo date('Y', $nextSunday); ?></td>
                                            <td><?php echo date('d', $nextThursday); ?></td>
                                            <td><?php echo date('m', $nextThursday); ?></td>
                                            <td><?php echo date('Y', $nextThursday); ?></td>
                                        </tr><?php
                                            $nextSunday = strtotime('+1 week', $nextSunday);
                                            $nextThursday = strtotime("+{$days} day", $nextSunday);
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="col-lg-3 mt-5">
                <div class="card sticky-top">
                    <div class="card-body">
                        <div class="single-table">
                            <div class="table-responsive">
                                <table id="table-s" class="table text-center table-bordered">
                                    <thead class="text-uppercase bg-light">
                                        <tr>
                                            <?php if(( isset($row_course_ar_c['certain']) and $row_course_ar_c['certain']=="on") and isset($_GET['ch']) and $_GET['ch'] == 1){ ?>


                                            <?php }; ?>

                                            <input name="id" type="hidden" id="id" value="<?php echo $id  ?>" size="4"
                                                maxlength="4" />
                                            <input name="c_id" type="hidden" id="c_id" value="<?php echo $c_id  ?>"
                                                size="4" maxlength="4" />
                                            <input name="course_main" type="hidden" id="course_main"
                                                value="<?php echo $course_main  ?>" size="4" maxlength="4" />

                                            <th scope="col">City Name</th>
                                            <th scope="col">Fees</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php
										if(isset($row_course_ar_c['city'])){ $city =$row_course_ar_c['city']; }else{ $city =''; }
                                            // Query the database
                                            $sql_select = "SELECT * FROM `cities`";
                                            $result_select = $mysqli -> query($sql_select);
                                            if ($result_select && (mysqli_num_rows($result_select) > 0)) {
                                                while ($row_select = $result_select-> fetch_assoc()){
                                                    if($ErrInWeek ==0 and $ErrInClass ==0){ $price = $row_select["$add_toClass"]; }else{ $price = ''; }

                                                     ?>
                                        <tr onclick="
                                              document.getElementById('city').value='<?php echo $row_select['id'];?>';
                                              document.getElementById('price').value='<?php echo $price; ?>';
                                              alert('<?php echo $row_select['name']; echo ' - '; echo $price; ?>');
                                              ">
                                            <td <?php
                                              if($price !=''){ ?> style="display:block;" <?php };

                                              ?>>
                                                <?php
                                                  $the_name = explode(' ',$row_select['name']);
                                                  echo $the_name[0];

                                                  ?> <?php if($row_select['monday'] == '1'){ ?><span
                                                    class="badge badge-secondary ml-2"
                                                    style="background-color:darkgoldenrod">Monday</span><?php }?>
                                            </td>
                                            <td><?php echo $price; ?></td>
                                        </tr>
                                        <?php }
                                                };
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
    <!-- main content area end -->
</form>



<?php if(isset($_GET['ch']) and $_GET['ch'] == 1){ ?>
    <script>
$(document).ready(function () {
        $("#focusid").focus(); 
    });
</script><?php }; ?>

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
                                                                            <span class="b-remove"><a type="button" class="btn btn-primary" href="?page=course-del&amp;id=<?php echo $id ;?>&amp;c_id=<?php echo $$course_main ;?>">Yes</a></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><a class="button-del" type="button"
data-toggle="modal" data-target="#exampleModa<?php echo $id_course; ?>"><i class="ti-trash fa-2x"></i></a>