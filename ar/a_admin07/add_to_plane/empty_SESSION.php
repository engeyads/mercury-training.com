<?php
require("config.inc.php");
$_SESSION['sum_x_class_A']   = null;
$_SESSION['sum_x_class_B']   = null;
$_SESSION['sum_x_class_C']   = null;
$_SESSION['class_A_array']   = null;
$_SESSION['class_B_array']   = null;
$_SESSION['class_C_array']   = null;
$_SESSION['main_class_A']    = null;
$_SESSION['main_class_B']    = null;
$_SESSION['main_class_C']    = null;
$_SESSION['courses_num']     = '';
$_SESSION['courses_add_num'] = '';
$_SESSION['acceptednn'] = '';
$_SESSION['rejectednn'] = '';
$_SESSION['courses_numS2'] = '';

?>
<meta http-equiv="refresh" content="0;URL=?page=add_to_plane-add_plan_step1&amp;nn=<?php echo rand(); ?>" />
<a href="?page=add_to_plane-add_plan_step1" class="button"><i class="fa fa-plus" aria-hidden="true"></i> Add <?php $year; ?> Plane</a>