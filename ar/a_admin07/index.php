<?php
session_start();
if(!isset($aaPage)){ require("../config.inc.php"); require("configAdmin.php"); require("login.php");  }
require("var.php");
require("function.php");
if(isset($_GET['page'])){ $page = $_GET['page']; }else{ $page = ''; }
if($page == ''){ $page = 'home'; }
$pageexplode = explode('-',$page);
$pageexplode1 = $pageexplode[0];
$page = str_replace('-','/',$page);
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
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>



    <link rel="shortcut icon" type="image/png"
        href="<?php 
        if(file_exists('../images/icon/fav.png')){ echo '../images/icon/fav.png'; }else
        if(file_exists('../image/icon/fav.png' )){ echo '../image/icon/fav.png';  }else
        { echo 'assets/images/favicon.ico'; }; ?>">
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
<?php include('topnotification.php'); ?>


    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->

    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container ">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.php"><img src="<?php 
                            if(file_exists('../images/icon/admin_icon.png')){ echo '../images/icon/admin_icon.png'; }else
                            if(file_exists('../image/icon/admin_icon.png') ){ echo '../image/icon/admin_icon.png';  }else
                            { echo 'assets/images/LOGO 23.png'; }; 
                            ?>" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active"><a href="index.php" aria-expanded="true" <?php if(!isset($_GET['page'])){ ?>class="linlkAct"<?php }?>><i
                                        class="ti-dashboard"></i><span>Dashboard</span></a></li>
                                        <?php
                                        if($pageexplode1 == 'course_main' or $pageexplode1 == 'course'){ $liAddClas_course = 'class="active"'; $aria_expanded_course = 'false'; }else{ $liAddClas_course = ''; $aria_expanded_course = 'true'; }
                                        ?>
                            <li <?php echo $liAddClas_course; ?>>
                                <a href="javascript:void(0)" aria-expanded="<?php echo $aria_expanded_course; ?>"><i
                                        class="ti-layout-sidebar-left"></i><span>Management courses</span></a>
                                <ul class="collapse">
                                    <li><a href="?page=course_main-view" class="linlk <?php if(isset($_GET['page']) and $_GET['page']=='course_main-view'){ echo 'linlkAct'; } ?>">View all Courses</a>
                                    </li>
                                    <li><a href="?page=course_main-edit" class="linlk <?php if(isset($_GET['page']) and $_GET['page']=='course_main-edit'){ echo 'linlkAct'; } ?>">Add Course</a></li>
                                    <li><a href="?page=course-upcomming" class="linlk <?php if(isset($_GET['page']) and $_GET['page']=='course-upcomming'){ echo 'linlkAct'; } ?>">upcoming Course</a></li>
                                    <li><a href="?page=course-table&certain=on&ucOnly=1" class="linlk <?php if(
                                        isset($_GET['page']) and $_GET['page']=='course-table' and 
                                        isset($_GET['certain']) and $_GET['certain']=='on' and 
                                        isset($_GET['ucOnly']) and $_GET['ucOnly']=='1'){ echo 'linlkAct'; } ?>">upcoming Course Table</a></li>

                                    <li><a href="?page=course-table" class="linlk <?php if(
                                        isset($_GET['page']) and $_GET['page']=='course-table' and 
                                        !isset($_GET['certain']) and 
                                        !isset($_GET['ucOnly'])){ echo 'linlkAct'; } ?>">Course Table</a></li>
                                   
                                </ul>
                            </li>
                            <?php if($level_admin <= 3){
                                if($pageexplode1 == 'cities'){ $liAddClas_Cities = 'class="active"'; $aria_expanded_Cities = 'false'; }else{ $liAddClas_Cities = ''; $aria_expanded_Cities = 'true'; }
                                ?><li <?php echo $liAddClas_Cities; ?>>
                                <a href="javascript:void(0)" aria-expanded="<?php echo $aria_expanded_Cities; ?>"><i
                                        class="ti-map-alt"></i><span>City Of Courses</span></a>
                                <ul class="collapse">
                                    <li><a href="?page=cities-view" class="linlk <?php if(isset($_GET['page']) and $_GET['page']=='cities-view'){ echo 'linlkAct'; } ?>">View all Cities</a></li>
                                    <li><a href="?page=cities-edit" class="linlk <?php if(isset($_GET['page']) and $_GET['page']=='cities-edit'){ echo 'linlkAct'; } ?>">Add City</a></li>
                                </ul>
                            </li>
                            <?php 
                            if($pageexplode1 == 'course_c'){ $liAddClas_course_c = 'class="active"'; $aria_expanded_course_c = 'false'; }else{ $liAddClas_course_c = ''; $aria_expanded_course_c = 'true'; }
                            ?>
                            <li <?php echo $liAddClas_course_c; ?>>
                                <a href="javascript:void(0)" aria-expanded="<?php echo $aria_expanded_course_c; ?>"><i
                                        class="ti-pie-chart"></i><span>Categories</span></a>
                                <ul class="collapse">
                                    <li><a href="?page=course_c-view" class="linlk <?php if(isset($_GET['page']) and $_GET['page']=='course_c-view'){ echo 'linlkAct'; } ?>">View all Categories</a>
                                    </li>
                                    <li><a href="?page=course_c-edit" class="linlk <?php if(isset($_GET['page']) and $_GET['page']=='course_c-edit'){ echo 'linlkAct'; } ?>">Add Category</a></li>
                                </ul>
                            </li><?php }?>
                            <?php if($level_admin == 1){ ?>
                                <?php 
                            if($pageexplode1 == 'users'){ $liAddClas_users = 'class="active"'; $aria_expanded_users = 'false'; }else{ $liAddClas_users = ''; $aria_expanded_users = 'true'; }
                            ?>
                            <li <?php echo $liAddClas_users; ?>>
                                <a href="javascript:void(0)" aria-expanded="<?php echo $aria_expanded_users; ?>"><i
                                        class="ti-user"></i><span>Users</span></a>
                                <ul class="collapse">
                                    <li><a href="?page=users-view" class="linlk <?php if(isset($_GET['page']) and $_GET['page']=='users-view'){ echo 'linlkAct'; } ?>">View all Users</a></li>
                                    <li><a href="?page=users-edit" class="linlk <?php if(isset($_GET['page']) and $_GET['page']=='users-edit'){ echo 'linlkAct'; } ?>">Add user</a></li>
                                </ul>
                            </li><?php }?>
                            <?php 
                            if($pageexplode1 == 'view_plane' or $pageexplode1 == 'add_to_plane'){ $liAddClas_Extras = 'class="active"'; $aria_expanded_Extras = 'false'; }else{ $liAddClas_Extras = ''; $aria_expanded_Extras = 'true'; }
                            ?>
                            <li <?php echo $liAddClas_Extras; ?>>
                                <a href="javascript:void(0)" aria-expanded="<?php echo $aria_expanded_Extras; ?>"><i
                                        class="fa fa-plus-square-o"></i><span>Extras</span></a>
                                <ul class="collapse">
                                    <li><a href="?page=view_plane-plan" class="linlk <?php if(isset($_GET['page']) and $_GET['page']=='view_plane-plan'){ echo 'linlkAct'; } ?>">View Plane</a></li>
                                    <?php if($level_admin <= 1){ ?>
                                    <li><a href="?page=add_to_plane-2019" class="linlk <?php if(isset($_GET['page']) and $_GET['page']=='add_to_plane-2019'){ echo 'linlkAct'; } ?>">Add Plane <?php echo date('Y')+1;?></a></li>
                                    <li><a href="?page=view_plane-change_price" class="linlk <?php if(isset($_GET['page']) and $_GET['page']=='view_plane-change_price'){ echo 'linlkAct'; } ?>">Change Price</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#set_done_0" class="linlk">Set Done as 0</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#TRUNCATE" class="linlk">TRUNCATE temp-course</a></li>
                                    <?php if(file_exists('alias/add_alias.php')){ ?><li><a href="?page=alias-add_alias" class="linlk <?php if(isset($_GET['page']) and $_GET['page']=='alias-add_alias'){ echo 'linlkAct'; } ?>">Create Initial Alias</a></li><?php }?>
                                    <?php }?>
                                </ul>
                            </li>
                            <?php if(file_exists('discount/view.php')){ ?>
                                <?php
                            if($pageexplode1 == 'discount'){ $liAddClas_Discount = 'class="active"'; $aria_expanded_Discount = 'false'; }else{ $liAddClas_Discount = ''; $aria_expanded_Discount = 'true'; }
                            ?>
                            <li <?php echo $liAddClas_Discount; ?>>
                                <a href="javascript:void(0)" aria-expanded="<?php echo $aria_expanded_Discount; ?>"><i
                                        class="ti-layout-sidebar-left"></i><span>Discount</span></a>
                                <ul class="collapse">
                                    <li><a href="?page=discount-view" class="linlk <?php if(isset($_GET['page']) and $_GET['page']=='discount-view'){ echo 'linlkAct'; } ?>">View Discount</a></li>
                                    <li><a href="?page=discount-edit" class="linlk <?php if(isset($_GET['page']) and $_GET['page']=='discount-edit'){ echo 'linlkAct'; } ?>">Add Discount</a></li>
                                    <li><a href="?page=discountnow-edit" class="linlk <?php if(isset($_GET['page']) and $_GET['page']=='discountnow-edit'){ echo 'linlkAct'; } ?>">Discount Now</a></li>
                                </ul>
                            </li><?php }?>
                            

                            
                            <?php
                            if($pageexplode1 == '404' or $pageexplode1 == 'advsearch'){ $liAddClas_Advanced = 'class="active"'; $aria_expanded_Advanced = 'false'; }else{ $liAddClas_Advanced = ''; $aria_expanded_Advanced = 'true'; }
                            ?>
                            <li <?php echo $liAddClas_Advanced; ?>>
                                <a href="javascript:void(0)" aria-expanded="<?php echo $aria_expanded_Advanced; ?>"><i
                                        class="fa fa-cogs"></i><span>Advanced settings</span></a>
                                <ul class="collapse">
                                    <li><a href="?page=404-view" class="linlk <?php if(isset($_GET['page']) and $_GET['page']=='404-view'){ echo 'linlkAct'; } ?>">404</a></li>
                                    <?php if(file_exists('advalias/view.php')){ ?><li><a href="?page=advalias-view" class="linlk">Alias</a></li><?php }?>
                                    
                                    <li><a href="?page=advsearch-view" class="linlk <?php if(isset($_GET['page']) and $_GET['page']=='advsearch-view'){ echo 'linlkAct'; } ?>">Search</a></li>
                                </ul>
                            </li>



                        </ul>
                    </nav>




                    <!-- start section add -->
                    <div class="col-12 mt-5">

                        <div class="card-body">

                            <h4 class="header-title text-white"><i class="fa fa-filter" aria-hidden="true"></i> Course Finder</h4>

                            <form action="" method="get"><input type="hidden" name="page" value="course_main/view" />

                                <div class="form-row">

                                    <div class="form-group w-100">
                                        <input name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>" class="form-control" type="search" placeholder="Search..." id="example-search-input">
                                    </div>

                                    
                                        <div class="form-group w-100">
                                            <input name="c_id" value="<?php if(isset($_GET['c_id'])){ echo $_GET['c_id']; }; ?>" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="C_ID">
                                        </div>
                                    

                                    
                                        <div class="form-group">
                                        <?php $sql_course_c1 = "SELECT * FROM `course_c` ORDER BY `course_c`.`order` ASC "; ?>
                                            <select class="form-control" name='course_c'>
                                                <option value=''>Choose a category</option>
                                                <?php
                                                // Query the database
                                                
                                                $result_course_c1 = $mysqli -> query($sql_course_c1);
                                                $numrows = mysqli_num_rows($result_course_c1);
                                                $sql_course = "$sql_course_c1 ";
                                                $result_course = $mysqli -> query($sql_course);
                                                if ($result_course && (mysqli_num_rows($result_course) > 0)) {
                                                    while ($row_course = $result_course-> fetch_assoc()){
                                                        $id_c = $row_course['id'];
                                                        $name_c = $row_course['name'];
                                                        ?><option value='<?php echo $id_c; ?>' <?php if(isset($_GET['course_c']) and $id_c == $_GET['course_c']){ ?>selected="selected"
                                                                                            <?php };?>><?php echo $name_c; ?></option><?php
                                                    }
                                                };?>
                                            </select>
                                        </div>
                                    

                                </div>

                                <button type="Search" class="btn btn-search-primary mt-2 d-block w-100"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
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
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php if($fullName !=''){ echo $fullName; }else{ echo $user_nameA ; }?> <i
                                    class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="?page=reset_pass"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Reset Password</a>
                                <?php
                                if($level_admin ==1){
                                    ?><hr><a class="dropdown-item" href="aa.php<?php if(isset($_SERVER['QUERY_STRING'])){ echo '?'.$_SERVER['QUERY_STRING'];} ?>"><i class="fa fa-bug" aria-hidden="true"></i> Debugging Mode</a><?php
                                }
                                ?>
                                <hr>
                                <a class="dropdown-item" href="out.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="container-fluid">
    
            

<!-- page container area end -->

    <script language="javascript" src="http://www.wired.com/images/archive/breadnav.js"> </script>


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
                        <div class="modal fade" id="set_done_0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                      <span class="b-remove"><a type="button" class="btn btn-primary" href="?page=add_to_plane-set_done_0">Yes</a></span>
                                    </div>
                                  </div>
                                </div>
                                </div><div class="modal fade" id="TRUNCATE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                      <span class="b-remove"><a type="button" class="btn btn-primary" href="?page=add_to_plane-TRUNCATE">Yes</a></span>
                                    </div>
                                  </div>
                                </div>
                                </div>
                                                <?php 
												if($view_aa == 1){ ?><div class="alert alert-warning col-lg-12" role="alert"><a href="index.php<?php if(isset($_SERVER['QUERY_STRING'])){ echo '?'.$_SERVER['QUERY_STRING'];} ?>"><i class="fa fa-times" aria-hidden="true"></i></a> <strong>Debugging Mode</strong> super admin only <i class="fa fa-code" aria-hidden="true"></i></div><br><br>
<br>
<?php }
}; ?>
                                                    <?php if ( isset( $page) ){ include($page.".php"); }; ?>
                    </div>
                <!-- row area start-->
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2020. Training Center Admin <?php include('version.php');?></p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    



</body>

</html>