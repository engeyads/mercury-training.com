<?php
define('_CMS_', 1);
require("../config.inc.php");
require("configAdmin.php");
require("login.php");
?>
<!doctype html>

<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php if($admin_title !=''){ echo $admin_title; }else{ echo 'Admin';}?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>



    <link rel="shortcut icon" type="image/png"
        href="<?php if(file_exists('../images/icon/fav.png')){ echo '../images/icon/fav.png'; }else{ echo 'assets/images/favicon.ico'; }; ?>">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <script src="ckeditor/ckeditor.js"></script>

    <style>
    :root {
        --primary-color: #4336FB;
    }
    </style>


</head>

<body>


    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->

    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.php"><img
                            src="<?php if(file_exists('../images/icon/admin_icon.png')){ echo '../images/icon/admin_icon.png'; }else{ echo 'assets/images/LOGO 23.png'; }; ?>"
                            alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active"><a href="index.php" aria-expanded="true"><i
                                        class="ti-dashboard"></i><span>Dashboard</span></a></li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i
                                        class="ti-layout-sidebar-left"></i><span>Management courses</span></a>
                                <ul class="collapse">
                                    <li><a href="index.php?page=course_main-view" class="linlk">View all Courses</a>
                                    </li>
                                    <li><a href="index.php?page=course_main-edit" class="linlk">Add Course</a></li>
                                    <li><a href="index.php?page=course-upcomming" class="linlk">upcoming Course</a></li>
                                    <li><a href="index.php?page=course-table" class="linlk">upcoming Course Table</a>
                                    </li>

                                </ul>
                            </li>
                            <?php if($level_admin <= 3){ ?><li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-map-alt"></i><span>City
                                        Of Courses</span></a>
                                <ul class="collapse">
                                    <li><a href="index.php?page=cities-view" class="linlk">View all Cities</a></li>
                                    <li><a href="index.php?page=cities-edit" class="linlk">Add City</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i
                                        class="ti-pie-chart"></i><span>Categories</span></a>
                                <ul class="collapse">
                                    <li><a href="index.php?page=course_c-view" class="linlk">View all Categories</a>
                                    </li>
                                    <li><a href="index.php?page=course_c-edit" class="linlk">Add Category</a></li>
                                </ul>
                            </li><?php }?>
                            <?php if($level_admin == 1){ ?><li>
                                <a href="javascript:void(0)" aria-expanded="true"><i
                                        class="ti-user"></i><span>Users</span></a>
                                <ul class="collapse">
                                    <li><a href="index.php?page=users-view" class="linlk">View all Users</a></li>
                                    <li><a href="index.php?page=users-edit" class="linlk">Add user</a></li>
                                </ul>
                            </li><?php }?>
                            <?php if($level_admin <= 2){ ?><li>
                                <a href="javascript:void(0)" aria-expanded="true"><i
                                        class="ti-alarm-clock"></i><span>History</span></a>
                                <ul class="collapse">
                                    <li><a href="index.php?page=history-view" class="linlk">View all History</a></li>
                                    <li><a href="#" class="linlk">Search History</a></li>
                                    <li><a href="#" class="linlk">Log In History</a></li>
                                </ul>
                            </li><?php }?>

                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i
                                        class="fa fa-plus-square-o"></i><span>Extras</span></a>
                                <ul class="collapse">
                                    <li><a href="index.php?page=view_plane-plan" class="linlk">View Plane</a></li>
                                    <?php if($level_admin <= 1){ ?>
                                    <li><a href="index.php?page=add_to_plane-2019" class="linlk">Add Plane
                                            <?php echo date(Y)+1;?></a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#set_done_0" class="linlk">Set Done
                                            as 0</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#TRUNCATE" class="linlk">TRUNCATE
                                            temp-course</a></li>
                                    <li><a href="index.php?page=alias-add_alias" class="linlk">Create Initial Alias</a>
                                    </li>
                                    <li><a href="index.php?page=view_plane-popup" class="linlk">Add Popup</a></li>
                                    <?php }?>
                                </ul>
                            </li>
                            <?php if(file_exists('discount/view.php')){ ?><li>
                                <a href="javascript:void(0)" aria-expanded="true"><i
                                        class="ti-layout-sidebar-left"></i><span>Discount</span></a>
                                <ul class="collapse">
                                    <li><a href="index.php?page=discount-view" class="linlk">View Discount</a></li>
                                    <li><a href="index.php?page=discount-edit" class="linlk">Add Discount</a></li>
                                    <li><a href="index.php?page=discountnow-edit" class="linlk">Discount Now</a></li>
                                </ul>
                            </li><?php }?>


                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i
                                        class="fa fa-cogs"></i><span>Advanced settings</span></a>
                                <ul class="collapse">
                                    <li><a href="index.php?page=404-view" class="linlk">404</a></li>
                                    <li><a href="index.php?page=advalias-view" class="linlk">Alias</a></li>
                                    <li><a href="index.php?page=advsearch-view" class="linlk">Search</a></li>
                                </ul>
                            </li>



                        </ul>
                    </nav>




                    <!-- start section add -->
                    <div class="col-12 mt-5">

                        <div class="card-body">

                            <h4 class="header-title text-white">Course Finder</h4>

                            <form action="index.php" method="get"><input type="hidden" name="page"
                                    value="course_main/view" />

                                <div class="form-row">

                                    <div class="form-group w-100">
                                        <input name="search" value="<?php echo $_GET[search];?>" class="form-control"
                                            type="search" placeholder="Search..." id="example-search-input">
                                    </div>


                                    <div class="form-group w-100">
                                        <input name="c_id" value="<?php echo $_GET[c_id];?>" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="C_ID">
                                    </div>



                                    <div class="form-group w-100">
                                        <select class="form-control" name='course_c'>
                                            <option value=''>Choose a category</option>
                                            <?php
                                                // Query the database
                                                $sql_course_c1 = "SELECT * FROM `course_c` ORDER BY `course_c`.`order` ASC ";
                                                $result_course_c1 = mysql_query($sql_course_c1, $conn);
                                                $numrows = mysql_num_rows($result_course_c1);
                                                $sql_course = "$sql_course_c1 ";
                                                $result_course = mysql_query($sql_course, $conn);
                                                if ($result_course && (mysql_num_rows($result_course) > 0)) {
                                                    while ($row_course = mysql_fetch_assoc($result_course)){
                                                        $id_c = $row_course['id'];
                                                        $name_c = $row_course['name'];
                                                        ?><option value='<?php echo $id_c; ?>'
                                                <?php if($id_c == $_GET[course_c]){ ?>selected="selected" <?php };?>>
                                                <?php echo $name_c; ?></option><?php
                                                    }
                                                };?>
                                        </select>
                                    </div>


                                </div>

                                <button type="Search" class="btn btn-search-primary mt-2 d-block w-100">Search</button>
                            </form>

                        </div>

                    </div>

                    <!-- end section add -->

                </div>

            </div>

        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left" id="breadcrumbs">

                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $user_nameA ;?> <i
                                    class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="reset-pass.html">Reset Password</a>
                                <a class="dropdown-item" href="out.php?<?php echo date('ymdhis'); ?>">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="container-fluid">



                    <!-- page container area end -->

                    <script language="javascript" src="https://www.wired.com/images/archive/breadnav.js"> </script>


                    <!-- jquery latest version -->

                    <!-- jquery latest version -->
                    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
                    <!-- bootstrap 4 js -->
                    <script src="assets/js/popper.min.js"></script>
                    <script src="assets/js/bootstrap.min.js"></script>
                    <script src="assets/js/owl.carousel.min.js"></script>
                    <script src="assets/js/metisMenu.min.js"></script>
                    <script src="assets/js/jquery.slimscroll.min.js"></script>
                    <script src="assets/js/jquery.slicknav.min.js"></script>

                    <!-- start chart js -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
                    <!-- start highcharts js -->
                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    <!-- start zingchart js -->
                    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
                    <script>
                    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
                    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
                    </script>
                    <!-- all line chart activation -->
                    <script src="assets/js/line-chart.js"></script>
                    <!-- all pie chart -->
                    <script src="assets/js/pie-chart.js"></script>
                    <!-- others plugins -->
                    <script src="assets/js/plugins.js"></script>
                    <script src="assets/js/scripts.js"></script>
                    <div class="row mt-5">
                        <?php if($level_admin <= 1){ ?>
                        <div class="modal fade" id="set_done_0" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Set Done as 0</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-danger">
                                        Are you sure you want to Set Done as 0
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                        <span class="b-remove"><a type="button" class="btn btn-primary"
                                                href="index.php?page=add_to_plane-set_done_0">Yes</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="TRUNCATE" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">TRUNCATE temp-course</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-danger">
                                        Are you sure you want to TRUNCATE temp-course
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                        <span class="b-remove"><a type="button" class="btn btn-primary"
                                                href="index.php?page=add_to_plane-TRUNCATE">Yes</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }; ?>
                        <?php
                                $page = $_GET['page'];
                                if($page == ''){ $page = 'home'; }
                                $page = str_replace('-','/',$page);
                                if ( isset( $page) ){ include($page.".php"); };
                                ?>
                    </div>
                    <!-- row area start-->
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018 . All right reserved</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>




</body>

</html>