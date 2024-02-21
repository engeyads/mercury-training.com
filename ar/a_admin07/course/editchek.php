<?php
$id = $_GET['course'];
$link = "?page=course_main-edit&id={$_GET['course_main']}&amp;course={$id}{$topnotificationAddToLinke}&activeTab=Event#course_{$id}";
$errIconAfter = '';
$errIconBefor = ' <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>';
// Query the database
$sql_course = "SELECT * FROM `course` where 1 and `id` = '{$id}'";
$sql_course = "$sql_course LIMIT 0 , 1";
$sql_course = $mysqli -> query($sql_course);
if ($sql_course && (mysqli_num_rows($sql_course) > 0)) {
	$row_course = $sql_course-> fetch_assoc();
    $id = $row_course['id'];
    $thePrice =$row_course['price'];
    $date1 = "{$row_course['y1']}-{$row_course['m1']}-{$row_course['d1']}";
	$date2 = "{$row_course['y2']}-{$row_course['m2']}-{$row_course['d2']}";
    $sql_course_main = "SELECT `name`,`c_id`,`{$adminweeks}` as 'weeks',`course_c` FROM `course_main` WHERE `c_id` = '{$row_course['c_id']}' ";
    $sql_course_main = $mysqli -> query($sql_course_main);
    if ($sql_course_main && (mysqli_num_rows($sql_course_main) > 0)) {
        $row_course_main = $sql_course_main-> fetch_assoc();
        $weeks = $row_course_main['weeks'];

        $sql_course_c = "SELECT `name`,`class` FROM `course_c` WHERE `id` = '{$row_course_main['course_c']}' ";
        $sql_course_c = $mysqli -> query($sql_course_c);
        if ($sql_course_c && (mysqli_num_rows($sql_course_c) > 0)) {
            $row_course_c = $sql_course_c-> fetch_assoc();
            $class = $row_course_c['class'];
        }
        if($class == 'B'){
            $classEx = '_b';
        }elseif($class == 'C'){
            $classEx = '_c';
        }else{
            $classEx = '';
        }
    }else{
        $row_course_main = '';
        $weeks = '';
        $row_course_c = '';
        $class = '';
        $classEx = '';
    }
    $diff = abs(strtotime($date2) - strtotime($date1));
    $duration = floor($diff / (60*60*24))+1;
    $days = ($weeks * 7) -2;
    $defDays = $duration-$days;
    $w4_p_b = 'w'.$weeks.'_p'.$classEx;
    $errInCity = 0;
    $errInCity_Price = 0;
    $sql_cities = "SELECT `id`,`name`,`monday` FROM `cities` where `id` = '{$row_course['city']}'";
    $sql_cities = $mysqli -> query($sql_cities);
    if ($sql_cities && (mysqli_num_rows($sql_cities) > 0)) {
        $row_cities = $sql_cities-> fetch_assoc();
        $monday = $row_cities['monday'];
        $monSun = date("D", strtotime("{$row_course['y1']}-{$row_course['m1']}-{$row_course['d1']}")); 
    }else{
        $row_cities = '';
        $errInCity = 1;
        $monday = '';
        $monSun = '';
    }

    $sql_cities_price = "SELECT `id`,`{$w4_p_b}` as 'c_price' FROM `cities` where `id` = '{$row_course['city']}'";
    $sql_cities_price = $mysqli -> query($sql_cities_price);
    if ($sql_cities_price && (mysqli_num_rows($sql_cities_price) > 0)) {
        $row_cities_price = $sql_cities_price-> fetch_assoc();
        $estPrice = $row_cities_price['c_price'];
        $priceDEF = $thePrice - $estPrice;
    }else{
        $row_cities_price = '';
        $errInCity_Price = 1;
        $estPrice = '';
        $priceDEF = '';
    }
    $tableDanger = 0;
    if($errInCity == 1 or $errInCity_Price == 1 or $defDays != 0 or !(($monSun == 'Sun' and $monday == 0) or ($monSun == 'Mon' and $monday == 1)) or $priceDEF!=0){ $tableDanger = 1; }

    if($tableDanger ==1){ ?>

        <table width="100" class="table">
        <tr>
            <th>Course Name</th>
            <th>Category Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Duration</th>
            <th>City</th>
            <th>Price</th>
            <th>Est price</th>
            <th>Def price</th>
            <th>Def Duration</th>
            <th>Day in weak</th>
        </tr>
        <tr >
            <td <?php if(!isset($row_course_main) or !($weeks >=1 and $weeks < 5)){ ?>class="table-danger"<?php }; ?>><?php 
                if(!empty($row_course_main)){ echo $row_course_main['name']; }else{ 
                    echo $errIconAfter;
                    echo 'Err in Course name';
                    echo $errIconBefor;
                }; 
                echo ' (';
                if($weeks >=1 and $weeks < 5){ echo $weeks; }else{ 
                    echo $errIconAfter;
                    echo 'Err in Course weeks'; 
                    echo $errIconBefor;
                }; 
                echo ' weaks) - ';
                echo $row_course['c_id']; 
                ?>
            </td>
            <td <?php if(!isset($row_course_c) or $class == ''){ ?>class="table-danger"<?php }; ?>><?php 
                if(!empty($row_course_c)){ 
                    echo $row_course_c['name'];
                    echo ' (';
                    echo $row_course_main['course_c'];
                    echo ') ';
                    ?><span class="badge badge-secondary ml-2" style="background-color:darkgoldenrod"><?php 
                    if($class != ''){
                        echo $class;
                    }else{
                        echo $errIconAfter;
                        echo 'Err in Class';
                        echo $errIconBefor;
                    }
                    ?></span><?php
                }else{
                    echo $errIconAfter;
                    echo 'Err in Category';
                    echo $errIconBefor;
                };
                ?>
            </td>
            <td <?php if($row_course['d1'] == 0 or $row_course['m1'] == 0 or $row_course['y1'] == 0){ ?>class="table-danger"<?php };?>>
                <?php echo $date1; ?>
            </td>
            <td <?php if($row_course['d2'] == 0 or $row_course['m2'] == 0 or $row_course['y2'] == 0){ ?>class="table-danger"<?php };?>>
                <?php echo $date2; ?>
            </td>
            <td><?php echo $duration; ?></td>
            <td <?php if($errInCity == 1){ ?>class="table-danger"<?php };?>><?php 
            if($errInCity ==0){
                echo $row_cities['name']; ?> - <?php echo $row_course['city']; echo ' '; if($monday == 1){ ?><span class="badge badge-secondary ml-2" style="background-color:darkgoldenrod">Monday</span><?php }
            }else{
                echo $errIconAfter;
                echo 'Err in City';
                echo $errIconBefor;
            }
            ?></td>
            <td <?php if(empty($thePrice)){ ?>class="table-danger"<?php }; ?>>
                <?php if(!empty($thePrice)){ echo $thePrice; }else{ 
                    echo $errIconAfter;
                    echo 'Err in Price';
                    echo $errIconBefor;
                    }; ?>
            </td>
            <td <?php if($errInCity_Price == 1){ ?>class="table-danger"<?php }; ?>>
                <?php if($errInCity_Price == 0){ echo $estPrice; }else{ 
                    echo $errIconAfter;
                    echo 'Err in estimated price';
                    echo $errIconBefor;
                    } ?>
            </td>
            <td <?php if(!isset($priceDEF) or $priceDEF !=0 ){ ?>class="table-danger"<?php }; ?>>
                <?php if(isset($priceDEF)){ echo $estPrice; }else{ 
                    echo $errIconAfter;
                    echo 'Err in Def price';
                    echo $errIconBefor;
                    }
                    if($priceDEF !=0){ 
                        echo $errIconAfter;
                        echo $errIconBefor;
                    }
                ?>
            </td>
            <td <?php if($defDays != 0){ ?>class="table-danger"<?php }; ?>>
                <?php echo $duration-$days;
                if($defDays != 0){ echo $errIconAfter; echo $errIconBefor; };
                ?>
            </td>			
            <td <?php if(!isset($monSun) or !(($monSun == 'Sun' and $monday == 0) or ($monSun == 'Mon' and $monday == 1))){ ?>class="table-danger"<?php }; ?>><?php 
            if(isset($monSun)){ echo $monSun; }else{ 
                echo $errIconAfter;
                echo 'Err in day';
                echo $errIconBefor;
                } ?></td>
        </tr>
        </table>
        <?php 

        ?>
        <a href="?page=course-edit&id=<?php echo $id; ?>&course_main=<?php echo $_GET['course_main']; echo $topnotificationAddToLinke; ?>" type="button" class="btn btn-primary mr-5">Edit</a>
        <a href="<?php echo $link; ?>" type="button" class="btn btn-danger">Acceept</a>
        <?php
    }else{
        ?>
        <meta http-equiv="refresh" content="0;url=<?php echo $link; ?>" />
        <?php
    }
}else{
    echo $errIconAfter;
    echo 'Err in id';
    echo $errIconBefor;
}
?>
