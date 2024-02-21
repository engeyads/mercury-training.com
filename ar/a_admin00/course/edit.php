<?php
$id = $_GET["id"];
$c_id = $_GET["c_id"];
$course_main = $_GET["course_main"];
$months = array('','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
// Query the database

$sqlcourse_main = "SELECT * FROM `course_main` WHERE 1 AND `id` LIKE '" . $course_main . "' ";
$resultcourse_main = mysql_query($sqlcourse_main, $conn);
if ($resultcourse_main && (mysql_num_rows($resultcourse_main) > 0)) {
	$rowcourse_main = mysql_fetch_assoc($resultcourse_main);
	?><h1><?php echo $rowcourse_main['name']; ?></h1><?php
	?><h2><?php echo $rowcourse_main['week']; ?> Week<?php if($rowcourse_main['week'] > 1){ echo 's'; }?>.</h2><?php
	$weeks =$rowcourse_main['week'];
}; 

$sql_course_ar_c = "SELECT * FROM `course` WHERE 1 AND `id` LIKE '" . $id . "' ";
$result_course_ar_c = mysql_query($sql_course_ar_c, $conn);
if ($result_course_ar_c && (mysql_num_rows($result_course_ar_c) > 0)) {
	$row_course_ar_c = mysql_fetch_assoc($result_course_ar_c);
	$id =htmlspecialchars($row_course_ar_c['id']);
	$name =htmlspecialchars($row_course_ar_c['name']);
	$certain =$row_course_ar_c['certain'];
}; ?>




<form method="post" action="index.php?page=course-replace" name="insertForm" id="insertForm">
          <!-- page title area end -->
            <div class="main-content-inner">
              <div class="row">
                  <div class="col-lg-4 mt-5">
                    <div class="card sticky-top">
                      <div class="card-body" <?php if($row_course_ar_c['certain']=="on" and $_GET[ch] == 1){ ?>style="background:#0C0"<?php }; ?>>
                        <h4 class="header-title"><?php if(isset( $_GET['id'] )){ echo"Edit Course: ".$name ; }else{ echo "Add Course";}; ?></h4>
                        <div class="form-group">
                            <label class="col-form-label">City</label>
                            <select name="city" id="city" class="form-control">
                                <option></option>
                                <?php
                                $city =$row_course_ar_c['city'];
                                // Query the database
                                $sql_select = "SELECT * FROM `cities`";
                                $result_select = mysql_query($sql_select, $conn);
                                if ($result_select && (mysql_num_rows($result_select) > 0)) {
                                    while ($row_select = mysql_fetch_assoc($result_select)){
                                        $id_select = $row_select['id'];
                                        $name_select = $row_select['name'];
                                ?>
                                      <option value="<?php echo $id_select ; ?>" <?php if (!(strcmp("$id_select", "$city"))) {echo "selected=\"selected\"";} ?>><?php echo $name_select; ?></option>
                                      <?php
                                    }
                                };
                                ?>
                            </select>
                        </div>

                        <label for="example-date-input" class="col-form-label">Start Date</label>
                        <div class="form-group form-row">
                          <div class="col-lg-3">
                            <input id="d1" class="form-control" type="text" placeholder="day" value="<?php echo $row_course_ar_c['d1']; ?>" name="d1">
                          </div>
                          <div class="col-lg-3">
                            <input  id="m1" class="form-control" type="text" placeholder="Month"  value="<?php echo $row_course_ar_c['m1']; ?>" name="m1">
                          </div>
                          <div class="col-lg-3">

                            <input  id="y1" class="form-control" type="text" placeholder="year"  value="<?php echo $row_course_ar_c['y1']; ?>" name="y1">
                          </div>
                        </div>
                        <label for="example-date-input" class="col-form-label">End Date</label>
                        <div class="form-group form-row">
                          <div class="col-lg-3">
                            <input  id="d2" class="form-control" type="text" placeholder="Day"  value="<?php echo $row_course_ar_c['d2']; ?>" name="d2">

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
                                  " class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#exampleModalCenter">Random Date</a>


                          </div>
                          <div class="col-lg-3">
                            <input  id="m2" class="form-control" type="text" placeholder="Month"  value="<?php echo $row_course_ar_c['m2']; ?>" name="m2">
                          </div>
                          <div class="col-lg-3">
                            <input  id="y2" class="form-control" type="text" placeholder="year"  value="<?php echo $row_course_ar_c['y2']; ?>" name="y2">
                          </div>
                        </div>

                        <div class="form-group form-row">
                          <div class="col-lg-6">
                            <label for="example-date-input" class="col-form-label">Price</label>
                            <input id="price" class="form-control" type="number" value="<?php echo $row_course_ar_c['price']; ?>" name="price" >
                          </div>
                          <div class="col-lg-6">
                            <label for="example-date-input" class="col-form-label">Currency</label>
                            <input id="currency" class="form-control" type="text" value="" name="currency">
                          </div>
                        </div>



                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Address</label>
                            <input class="form-control" type="text" value="<?php echo $row_course_ar_c['address'] ;  ?>" id="Addr" name="address">
                        </div>

                        <div class="form-group form-row">
                          <div class="col-lg-6">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck2" <?php if($row_course_ar_c['certain']=="on" or $_GET[ch]==1){ ?>checked="checked"<?php }; ?> name="certain" />
                                <label class="custom-control-label" for="customCheck2">Upcoming</label>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="customCheck1" <?php if($row_course_ar_c['visible']=="on" or $id ==""){ ?>checked="checked"<?php }; ?> name="visible" />
                              <label class="custom-control-label" for="customCheck1">Visible in Website</label>
                            </div>
                          </div>
                        </div>



                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" data-toggle="modal" data-target="#exampleModalCenter"><?php if($id==''){ echo 'Add'; }else{ echo 'Edit'; }; ?></button>



                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 mt-5">




                    <div class="card">
                        <div class="card-body">
                          <h4 class="header-title">Weeks</h4>
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
                                              <tr >
                                            <td colspan="6"><h3><?php echo $months[date('m', $nextSunday)*1].' '.date('Y', $nextSunday); ?></h3></td>
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
                                          " >
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


                  <div class="col-lg-4 mt-5">
                    <div class="card sticky-top">
                      <div class="card-body">
                        <div class="single-table">
                            <div class="table-responsive">
                                <table id="table-s" class="table text-center table-bordered">
                                    <thead class="text-uppercase bg-light">
                                        <tr>
                                            <?php if($row_course_ar_c['certain']=="on" and $_GET[ch] == 1){ ?>


<?php }; ?>

    <input name="id" type="hidden" id="id" value="<?php echo $id  ?>" size="4" maxlength="4" />
    <input name="c_id" type="hidden" id="c_id" value="<?php echo $c_id  ?>" size="4" maxlength="4" />
    <input name="course_main" type="hidden" id="course_main" value="<?php echo $course_main  ?>" size="4" maxlength="4" />

                                            <th scope="col">City Name</th>
                                            <th scope="col">Fees</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                            <?php
                                            $city =$row_course_ar_c['city'];
                                            // Query the database
                                            $sql_select = "SELECT * FROM `cities`";
                                            $result_select = mysql_query($sql_select, $conn);
                                            if ($result_select && (mysql_num_rows($result_select) > 0)) {
                                                while ($row_select = mysql_fetch_assoc($result_select)){
                                                    $sql_price = "SELECT count(`id`) as 'a' , `price`  FROM `course` WHERE `c_id` = '{$rowcourse_main['c_id']}'  AND `city` = '{$row_select[id]}' group by `price` order by `a` DESC";
                                                    $row_price = mysql_fetch_assoc(mysql_query($sql_price, $conn));

                                                     ?>
                                              <tr onclick="
                                              document.getElementById('city').value='<?php echo $row_select[id];?>';
                                              document.getElementById('price').value='<?php echo $row_price['price']; ?>';
                                              alert('<?php echo $row_select[name]; echo ' - '; echo $row_price['price']; ?>');
                                              ">
                                            <td <?php
                                              if($row_price['price'] !=''){ ?> style="display:block;"<?php };

                                              ?>>
                                                <?php
                                                  $the_name = explode(' ',$row_select[name]);
                                                  echo $the_name[0];

                                                  ?>
                                                </td><td><?php echo $row_price['price']; ?></td></tr>
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



<?php if($_GET[ch] == 1){ ?>
<script type="text/javascript" language="JavaScript">
window.onload = function() {
    document.getElementById("certain").focus();
};

</script><?php }; ?>
