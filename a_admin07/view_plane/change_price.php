<?php
$thisPage = $_GET['page'];

if(isset($_GET['cityId']) and $_GET['cityId'] !=''){
    $cityId = $_GET['cityId'];
}else{
    $cityId = '';
}
if(isset($_POST['change']) and $_POST['change'] !=''){
    $change = $_POST['change'];
}else{
    $change = '';
}

if($cityId == ''){
    //all cities
    $sql_course_c = "SELECT `name`,`id` FROM `cities`";
    $result_course_c = $mysqli -> query($sql_course_c);
    if ($result_course_c && (mysqli_num_rows($result_course_c) > 0)) {
        while ($row_course_c = $result_course_c-> fetch_assoc()){
            ?><a href="?page=<?php echo $thisPage; ?>&cityId=<?php echo $row_course_c['id']; ?>" class="btn btn-success btn-sm mr-2 py-1 float-right mb-2">
                <?php
                    echo $row_course_c['name'];
                ?>
            </a><?php
        }
    }
    //end all cities
}else{
    ?><a href="?page=<?php echo $thisPage; ?>" class="btn btn-success btn-sm mr-2 mb-2">All Cities</a><br><?php
    //city h1
    $sql_course_c = "SELECT `name`,`id` FROM `cities` where `id` = '{$cityId}' ";
    $result_course_c = $mysqli -> query($sql_course_c);
    if ($result_course_c && (mysqli_num_rows($result_course_c) > 0)) {
        $row_course_c = $result_course_c-> fetch_assoc();
        ?><hr><div class="container"><h1><?php echo $row_course_c['name']; ?></h1></div><?php
    }
    //end city h1
    ?><div class="container"><?php


    if($change == ''){
        //price
        $sql_price = "SELECT `price`,count(`id`) as 'count' FROM `course` WHERE `city` = '{$cityId}' and $oldUpcomming GROUP by `price` ";
        $result_price = $mysqli -> query($sql_price);
        if ($result_price && (mysqli_num_rows($result_price) > 0)) {
            $nn =0;
            ?><form action="?page=<?php echo $thisPage;?>&cityId=<?php echo $cityId;?>" method="post">
            
            <?php
            while ($row_price = $result_price-> fetch_assoc()){
                $nn++;
                ?><div class="row"><?php
                echo $row_price['price'];
                echo ' ( ';
                echo $row_price['count'];
                echo ' ) ---> ';
                ?>
                <input type="text" name="change[<?php echo $row_price['price']; ?>]">
                </div><?php
            }
            ?>
            <input type="submit" value="send">
            </form><?php
        }
        //end price
    }else{
        $sqlUpdate_xErr = 0;
        $sqlUpdate_vErr = 0;
        
        $nn = 0;
        foreach($change as $x => $v) {
            $nn++;
            if($x != '' and $v !=''){
                // echo "$x = $val<br>";
                $sqlUpdate_x = "update `course` set `price` = '10{$nn}' where `price` = '{$x}' and `city` = '{$cityId}' and $oldUpcomming; ";
                if (!$mysqli -> query($sqlUpdate_x)) {
                    echo("Error description: " . $mysqli -> error);
                    $sqlUpdate_xErr = 1;
                }
            }     
        }
        
        $nn = 0;
        foreach($change as $x => $v) {
            $nn++;
            if($x != '' and $v !=''){
                $sqlUpdate_v = "update `course` set `price` = '{$v}' where `price` = '10{$nn}' and `city` = '{$cityId}' and $oldUpcomming; ";
                if (!$mysqli -> query($sqlUpdate_v)) {
                    echo("Error description: " . $mysqli -> error);
                    $sqlUpdate_vErr = 1;
                }
            }     
        }




        if($sqlUpdate_xErr ==0 and $sqlUpdate_vErr == 0){
            ?><h1>Done</h1><?php
        }

        $sql_price = "SELECT `price` FROM `course` WHERE `city` = '{$cityId}' and $oldUpcomming GROUP by `price` ";
        $result_price = $mysqli -> query($sql_price);
        if ($result_price && (mysqli_num_rows($result_price) > 0)) {
            while ($row_price = $result_price-> fetch_assoc()){
                ?><div class="row"><?php
                echo $row_price['price'];
                ?>
                </div><?php
            }
        }
    }



    ?></div><?php


    
}

?>