
<?php

$sql_course_ar_c1 = "SELECT * FROM `course_c` $main $order";
$result_course_ar_c1 = mysql_query($sql_course_ar_c1, $conn);
$numrows_course_c = mysql_num_rows($result_course_ar_c1);


$sql_course_ar_c1_A = "SELECT * FROM `course_c` Where `class` = 'A'";
$result_course_ar_c1_A = mysql_query($sql_course_ar_c1_A, $conn);
$numrows_A = mysql_num_rows($result_course_ar_c1_A);

$sql_course_ar_c1_B = "SELECT * FROM `course_c` Where `class` = 'B'";
$result_course_ar_c1_B = mysql_query($sql_course_ar_c1_B, $conn);
$numrows_B = mysql_num_rows($result_course_ar_c1_B);

$sql_course_ar_c1_C = "SELECT * FROM `course_c` Where `class` = 'C'";
$result_course_ar_c1_C = mysql_query($sql_course_ar_c1_C, $conn);
$numrows_C = mysql_num_rows($result_course_ar_c1_C);

$sql_course_ar_c1_noclass = "SELECT * FROM `course_c` Where `class` = ''";
$result_course_ar_c1_noclass = mysql_query($sql_course_ar_c1_noclass, $conn);
$numrows_noclass = mysql_num_rows($result_course_ar_c1_noclass);

// Query the database
$sql_course_ar_c = "$sql_course_ar_c1 LIMIT $start , $integer";
$result_course_ar_c = mysql_query($sql_course_ar_c, $conn);
?>

<?php
$color_array = array('#FFC312','#C4E538','#12CBC4','#FDA7DF','#ED4C67','#F79F1F','#A3CB38','#1289A7','#D980FA','#B53471','#EE5A24','#009432','#0652DD','#9980FA','#833471','#EA2027','#006266','#1B1464','#5758BB','#6F1E51','#fad390','#6a89cc','#82ccdd','#e55039','#1e3799','#3c6382','#38ada9','#e58e26','#b71540','#0a3d62','#079992','#f19066',
'#546de5','#ea8685','#574b90','#ffd32a','#0fbcf9','#05c46b','#8919FE','#ff3f34');?>

            <div class="mb-4" style="width:100%">
                <div class="d-flex justify-content-around pr-4">
            <?php
                $this_year = date('Y');
                $this_Month = date('m');
                $this_Day = date('d');
                $sql_num_year = "SELECT `y1`,count(`id`) as 'count' FROM `course` group by `y1`";
                $sql_course_year_count = mysql_query($sql_num_year, $conn);
                
                
                
                while($row = mysql_fetch_array($sql_course_year_count)){
                    
                            
                    

                    $sql__city_count = "SELECT `city`,count(`id`) as 'count_city' FROM `course` WHERE `y1` = '{$row[y1]}' GROUP by `city`";
                    $sql__city_count = mysql_query($sql__city_count, $conn);
                    
                    $nn = 0;
                    $labels_Chart ='';
                    $backgroundColor_Chart ='';
                    $data_Chart ='';
                    while($row_city_count = mysql_fetch_array($sql__city_count)){
                        
                        //echo $row_city_count['city'];
                    $sql__city_count_name = "SELECT `name` FROM `cities` WHERE `id` = '{$row_city_count[city]}'";
                    $sql__city_count_name = mysql_query($sql__city_count_name, $conn);
                    $row_city_count_name = mysql_fetch_array($sql__city_count_name);
                    // echo $row_city_count_name['name'];
                        if($nn !=0){
                            $labels_Chart .= ',';
                            $backgroundColor_Chart .= ',';
                            $data_Chart .= ',';
                        }
                        
                        $labels_Chart .= '"'.$row_city_count_name['name'].'"';
                        $backgroundColor_Chart .= '"'.$color_array[$nn].'"';
                        $data_Chart .= $row_city_count['count_city'];
                    
                        $nn++;

                        // echo ' - ';
                        // echo $row_city_count['count_city'];
                        // echo '<br>';
                                }?>
                                
                        <div class="seo-fact sbg2">
                            <div class="inner-sbg">
                                <h3 class="mb-4"> <i class="fa fa-calendar-check-o fa-lg mr-2"></i> <?php echo $row['y1'] ?></h3>
                                <div>
                                <h4>Total Courses</h4>
                                <span class=""> <i class="fa fa-graduation-cap mr-2" ></i><?php echo $row['count']; ?> </span>
                                </div>
                                
                            </div>
                                <?php
                            
                                if($this_year == $row['y1']){
                            
                                $sql_num_up = "SELECT *  FROM `course` WHERE `y1` = '{$this_year}' and (`m1` > '{$this_Month}' or (`m1` = '{$this_Month}' and `d1` >= '{$this_Day}')) ";
                                $sql_course_up = mysql_query($sql_num_up, $conn);
                                
                                $sql_num_old = "SELECT *  FROM `course` WHERE `y1` = '{$this_year}' and (`m1` < '{$this_Month}' or (`m1` = '{$this_Month}' and `d1` < '{$this_Day}')) ";
                                $sql_num_old = mysql_query($sql_num_old, $conn);
                                
                                ?>

                                <div class="d-flex justify-content-between pt-5">
                                    <div class="">
                                        <h4>Upcoming Courses</h4>
                                        <span><i class="fa fa-chevron-up mr-2"></i><?php echo mysql_num_rows($sql_course_up); ?></span>
                                    </div>
                                    <div class="">
                                        <h4>Previous Courses</h4>
                                        <span><i class="fa fa-chevron-down mr-2"></i><?php echo mysql_num_rows($sql_num_old); ?></span>
                                    </div>
                                
                                </div>
                                <?php
                                }?>

                        
                    </div>
                    
                    <?php
                    }

                    ?>
                    
                    </div>
                    </div>
                    
                    <div class="row" style="width:100%">
                        <div class="col-md-8">

                        <div class="card card-in-home w-100 mt-4 mb-4">
                                <div class="card-body ">
                                    
                                    <div class="state d-flex  justify-content-between mb-3">
                                    
                                        <div class="inn-first">
                                            <div><h3 class="tit-home">   Total  Categories   </h3></div>
                                            <span><?php echo $numrows_course_c; ?>  </span> 
                                        </div>
                                        <div>
                                            <div class="a">Class A</div> <span class="nu"> <strong><?php echo $numrows_A; ?></strong>  Categories <?php echo $num_of_class_A; ?> </span> 
                                        </div> 
                                        <div  class="">
                                            <div class="b">Class B</div><span class="nu"> <strong><?php echo $numrows_B; ?></strong>  Categories <?php echo $num_of_class_B; ?> </span> 
                                        </div> 
                                        <div  class="">
                                            <div class="c">Class C</div> <span class="nu"> <strong><?php echo $numrows_C; ?></strong>   Categories  <?php echo $num_of_class_C; ?> </span>
                                        </div> 
                                        <div  class="">
                                            <div class="n">No Calss</div><span class="nu"> <strong><?php echo $numrows_noclass; ?></strong>   Categories <?php echo $num_of_class_no; ?> </span>
                                        </div> 
                                    </div>
                                    
                                
                                </div>
                                
                            </div>
                            <div class="card ">
                                <div class="card-body">
                                    <h3 class="mb-5">  Number of Courses Per city</h3>
                                    <canvas id="seolinechart8" height="155" ></canvas>
                                </div>
                            </div>
                            
                        </div>
                        
                    
                    
                <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>

                <script>
                if ($('#seolinechart8').length) {
                var ctx = document.getElementById("seolinechart8").getContext('2d');
                var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'doughnut',
                // The data for our dataset
                data: {
                    labels: [<?php echo $labels_Chart; ?>],
                    datasets: [{
                        backgroundColor: [<?php echo $backgroundColor_Chart; ?>
                        ],
                        borderColor: '#fff',
                        data: [<?php echo $data_Chart; ?>],
                    }]
                },
                // Configuration options go here
                options: {
                    legend: {
                        display: true
                    },
                    animation: {
                        easing: "easeInOutBack"
                    }
                }
                });
                }
                </script>
                



                <div class="col-md-4">
                    <div class="">
                    
                            <?php
                            $sql_DATEDIFF = "SELECT `y1`,DATEDIFF(CONCAT(`y2`,'-',`m2`,'-',`d2`),CONCAT(`y1`,'-',`m1`,'-',`d1`))+1 as 'DATEDIFF',count(`id`) as 'count' FROM `course` group BY `y1`,`DATEDIFF` DESC ORDER BY `course`.`y1` ASC";
                            $sql_DATEDIFF = mysql_query($sql_DATEDIFF, $conn);
                            $nn = 0;
                            ?><div class="card-home mb-4"><?php
                            while($row_DATEDIFF = mysql_fetch_array($sql_DATEDIFF)){
                                $dat_dif = $row_DATEDIFF['DATEDIFF'];
                                $dat_count =  $row_DATEDIFF['count'];
                                if($y1 != $row_DATEDIFF['y1']){
                                    if($nn !=0){ ?></div><div class="card-home mb-4"><?php }?>
                                    
                                    
                                <h3 class="mt-4 mb-2 pb-2"> <i class="ti-calendar ml-3 mr-2"></i>  <?php echo $row_DATEDIFF['y1']; ?></h3>
                                
                                <?php
                                }?>
                                
                                    
                                
                                    <div class="card-home-inn py-2 px-3 d-flex justify-content-around" >
                                        <div class="">
                                            <h6>Number of Days</h6>    
                                            <span><a href="?page=dat_dif-view&dat_dif=<?php echo $dat_dif; ?>"><?php echo $dat_dif; ?></a></span>

                                        </div>
                                        <div><i class="fa fa-angle-double-right"></i></div>
                                        <div class=" ">
                                            <h6>Number of Courses</h6>
                                            <span><?php echo $dat_count; ?> </span> 
                                        </div>
                                    </div>

                                
                                
                                <?php
                                $y1 = $row_DATEDIFF['y1'];
                                $nn++;
                            }
                            
                            ?>
                        </div>
                        
                    </div>
                <div>

                </div>
        
</div>   



<!-- all line chart activation -->
<script src="assets/js/line-chart.js"></script>












