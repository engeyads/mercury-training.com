<?php
if(isset($_POST['user_name'])){ $user_nameA = addslashes($_POST['user_name']); }else{ $user_nameA = ''; }
if(isset($_POST['pass_word'])){ $pass_wordA = addslashes($_POST['pass_word']); }else{ $pass_wordA=''; }
if($user_nameA == ""){
	if(isset($_COOKIE['user_nameA'])){ $user_nameA = addslashes($_COOKIE['user_nameA']); }
	if(isset($_COOKIE['pass_wordA'])){ $pass_wordA = addslashes($_COOKIE['pass_wordA']); }
};

Setcookie ("user_nameA" , "$user_nameA", time()+86400,'/');
Setcookie ("pass_wordA" , "$pass_wordA", time()+86400,'/');
$pass_wordA = md5($pass_wordA);
$pass_wordA.='anas101';
$pass_wordA = md5($pass_wordA);
$pass_wordA="anas101".$pass_wordA;
$pass_wordA = md5($pass_wordA);






	if(!isset($order)){ $order = ''; }
	if(!isset($start)){ $start = ''; }
	if(!isset($integer)){ $integer = ''; }
	if(!isset($num_of_class_A)){ $num_of_class_A = ''; }
	if(!isset($num_of_class_B)){ $num_of_class_B = ''; }
	if(!isset($num_of_class_C)){ $num_of_class_C = ''; }
	if(!isset($num_of_class_no)){ $num_of_class_no = ''; }
	if(!isset($y1)){ $y1 = ''; }
	if(!isset($name)){ $name = ''; }
	if(!isset($site_course_link_pdf_course)){ $site_course_link_pdf_course = ''; }
	if(!isset($m1_)){ $m1_ = ''; }

	
	
	
$sql_admin = "SELECT * 
FROM `user_name` 
WHERE (1 AND `user_name` LIKE '$user_nameA' 
AND `pass_world` LIKE '$pass_wordA' )
 LIMIT 0 , 30 ";


$result_admin = $mysqli -> query($sql_admin);
if ($result_admin && (mysqli_num_rows($result_admin)> 0)) {
    while ($row_admin = $result_admin-> fetch_assoc()) {
		$level_admin = htmlspecialchars($row_admin['level']);
		$fullName = htmlspecialchars($row_admin['last_name']);
		
	}
}else{
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form name="form1" method="post" action="#">
                    <div class="login-form-head">
                    <img src="<?php 
                            if(file_exists('../images/icon/admin_icon.png')){ echo '../images/icon/admin_icon.png'; }else
                            if(file_exists('../image/icon/admin_icon.png') ){ echo '../image/icon/admin_icon.png';  }else
                            { echo 'assets/images/LOGO 23.png'; }; 
                            ?>" alt="logo" class="p-3">
                        <h4>Sign In</h4>
                        <p>Hello there, Sign in and start managing your Admin</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">User Name</label>
                            <input type="text" name="user_name" class="form-control" id='focusid'>
                            <i class="ti-email"></i>
                        </div>
                        <div class="form-gp">
                            <label name="pass_word" for="exampleInputPassword1">Password</label>
                            <input type="password" id="exampleInputPassword1" name="pass_word" class="form-control">
                            <i class="ti-lock"></i>
                        </div>
                        
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-gp text-center pt-3">
                <p class="text-center text-muted">© Copyright 2020.<br>Training Center Admin <?php include('version.php');?></p>
            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

<script>
$(document).ready(function () {
        $("#focusid").focus(); 
    });
</script>

</html>
<?php
 exit;
};
?>

