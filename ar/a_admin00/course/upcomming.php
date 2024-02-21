                    <!-- upcaming table start -->
                    <div class="col-lg-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Upcomming Course Rows</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Course Name</th>
                                                    <th scope="col">City</th>
                                                    <th scope="col">Start Date</th>
                                                    <th scope="col">End Date</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody><?php
                                                $month_a = array('','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                                                $y = date('Y');
                                                $m = date('m');
                                                $sql_course = "SELECT * FROM `course` where `certain` = 'on' and (`y1` > '$y' or (`y1` = '$y' and `m1` >= '$m'))";
                                                $result_course = mysql_query($sql_course, $conn);
                                                if ($result_course && (mysql_num_rows($result_course) > 0)) {
                                                    while ($row_course = mysql_fetch_assoc($result_course)){
                                                        ?><tr>

                                                    <td><?php
                                                                                                    
                                                $sql_course_main = "SELECT `name`,`id` FROM `course_main` where `c_id` = '{$row_course['c_id']}'";
                                                $result_course_main = mysql_query($sql_course_main, $conn);
                                                if ($result_course_main && (mysql_num_rows($result_course_main) > 0)) {
                                                    $row_course_main = mysql_fetch_assoc($result_course_main);
                                                    ?><a
                                                            href="?page=course_main-edit&id=<?php echo $row_course_main[id]; ?>"><?php echo $row_course_main[name]; ?></a><?php
                                                };


                                                ?></td>
                                                    <td><?php
                                                                                                    
                                                $sql_cities = "SELECT `name` FROM `cities` where `id` = '{$row_course['city']}'";
                                                $result_cities = mysql_query($sql_cities, $conn);
                                                if ($result_cities && (mysql_num_rows($result_cities) > 0)) {
                                                    $row_cities = mysql_fetch_assoc($result_cities);
                                                    echo $row_cities[name];
                                                };


                                                ?></td>
                                                    <td><?php echo $row_course[d1];?>/<?php echo $month_a[$row_course[m1]*1];?>/<?php echo $row_course[y1];?>
                                                    </td>
                                                    <td><?php echo $row_course[d2];?>/<?php echo $month_a[$row_course[m2]*1];?>/<?php echo $row_course[y2];?>
                                                    </td>
                                                    <td>

                                                        <ul class="d-flex justify-content-center">
                                                            <li><a href="?page=course-certain&id=<?php echo $row_course[id] ;?>&course_main=<?php echo $row_course_main[id]; ?>&certain=<?php if($row_course['certain']!="on"){ ?>on<?php }else{ ?>off<?php }; ?>"
                                                                    class="text-danger"><i
                                                                        class="fa fa-toggle-<?php if($row_course['certain']=="on"){ ?>on<?php }else{ ?>off<?php }; ?> fa-lg"></i></a>
                                                            </li>
                                                        </ul>
                                                    </td>

                                                </tr><?php

                                                    }
                                                };

                                                ?>




                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- upcaming table end -->