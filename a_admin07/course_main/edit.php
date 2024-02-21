<span type="button" class="btn btn-warning my-4 pr-4 pl-4 text-bold ml-4">
    <a href="?page=course_main-view" class="text-white"> View all courses</a></span>
</div>

<?php  if(isset($_GET["id"])){ $id = $_GET["id"]; }else{ $id = ''; } 
$months = array('','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
?><?php
$sql_c_id = "SELECT `c_id` FROM `course_main` ORDER BY `c_id` DESC";
$result_c_id = $mysqli -> query($sql_c_id);
$row_c_id = $result_c_id-> fetch_assoc();
$last_cid_plus = $row_c_id['c_id']+1;

// Query the database
$sql_course_ar_c = "SELECT * FROM `course_main` WHERE 1 AND `id` LIKE '" . $id . "' ";
$result_course_ar_c = $mysqli -> query($sql_course_ar_c);
if($view_aa == 1){ 
	?>
    <div class="alert alert-primary" role="alert">
      <h4 class="alert-heading">MSQL</h4>
      <p><?php echo $sql_course_ar_c; ?></p>


    <?php if($mysqli->error){
          ?>
          <hr>
      <p class="mb-0"><?php printf("Error message: %s\n", $mysqli->error); ?></p>
          <?php
       } ?>    
    </div>
    <?php
}
if ($result_course_ar_c && (mysqli_num_rows($result_course_ar_c) > 0)) {
    $row_course_ar_c = $result_course_ar_c-> fetch_assoc();
    $id =htmlspecialchars($row_course_ar_c['id']);
    $course_main_id =htmlspecialchars($row_course_ar_c['id']);
    $name =htmlspecialchars($row_course_ar_c['name']);
    $c_id =$row_course_ar_c['c_id'];
    $name_file =$row_course_ar_c['name_file'];
};
if(!isset($row_course_ar_c)){ $row_course_ar_c  =''; }
$row_function = $row_course_ar_c;
$table = 'course_main';


$InformationAT ='';  $InformationAC ='';
$EventAT       ='';  $EventAC       ='';
$AdvanceAT     ='';  $AdvanceAC     ='';
$LogAT         ='';  $LogAC         ='';

if(isset($_GET['activeTab']) and $_GET['activeTab'] == 'Information'){ $InformationAT = ' class="active"'; $InformationAC = ' in active'; }else
if(isset($_GET['activeTab']) and $_GET['activeTab'] == 'Event'      ){ $EventAT       = ' class="active"'; $EventAC       = ' in active'; }else
if(isset($_GET['activeTab']) and $_GET['activeTab'] == 'Advance'    ){ $AdvanceAT     = ' class="active"'; $AdvanceAC     = ' in active'; }else
if(isset($_GET['activeTab']) and $_GET['activeTab'] == 'Log'        ){ $LogAT         = ' class="active"'; $LogAC         = ' in active'; }else
                                                                     { $InformationAT = ' class="active"'; $InformationAC = ' in active'; }

?>
<h1 class="header-title"><?php if(isset( $_GET['id'] )){ echo" edit Courses: ".$name ; }else{ echo "Add Courses";}; ?></h1>
<div class="ov">

  <ul class="nav nav-tabs">
    <li<?php echo  $InformationAT; ?>><a data-toggle="tab" href="#Information"><i class="fa fa-university"  aria-hidden="true"></i> Information</a></li>
    
    <?php if($id !=''){ ?>
    <li<?php echo  $EventAT;       ?>><a data-toggle="tab" href="#Event"      ><i class="fa fa-calendar"    aria-hidden="true"></i> Event      </a></li>
    <?php }?>
    <li<?php echo  $AdvanceAT;     ?>><a data-toggle="tab" href="#Advance"    ><i class="fa fa-cog"         aria-hidden="true"></i> Advance    </a></li>
    <?php if($id !='' and $level_admin <= 2){?>
    <li<?php echo  $LogAT;         ?>><a data-toggle="tab" href="#Log"        ><i class="fa fa-history"     aria-hidden="true"></i> Log history</a></li>
    <?php }?>
  </ul>

  <div class="tab-content">
  <div id="Information" class="tab-pane fade<?php echo  $InformationAC; ?>"><?php include('course_main/tabs/Information.php'); ?></div>

  <?php if($id !=''){?> 
  <div id="Event"   class="tab-pane fade<?php echo  $EventAC;   ?>"><?php include('course_main/tabs/Event.php')  ; ?></div>
  <?php }?> 
  <div id="Advance"     class="tab-pane fade<?php echo  $AdvanceAC;     ?>"><?php include('course_main/tabs/Advance.php')    ; ?></div>
  <?php if($id !='' and $level_admin <= 2){?>
  <div id="Log"         class="tab-pane fade<?php echo  $LogAC;         ?>"><?php include('course_main/tabs/Log.php')        ; ?></div>
  <?php }?>
    
  </div>
</div>










<style type="text/css">
.btn {
    background: #428bca;
    border: #357ebd solid 1px;
    border-radius: 3px;
    color: #fff;
    display: inline-block;
    font-size: 14px;
    padding: 8px 15px;
    text-decoration: none;
    text-align: center;
    min-width: 60px;
    position: relative;
    transition: color .1s ease;
    /* top: 40em;*/
}
.btn:hover {
    background: #357ebd;
}
.btn.btn-big {
    font-size: 18px;
    padding: 15px 20px;
    min-width: 100px;
}
.btn-close {
    color: #aaaaaa;
    font-size: 30px;
    text-decoration: none;
    position: absolute;
    right: 5px;
    top: 0;
}
.btn-close:hover {
    color: #919191;
}
.tab-content{background:#fff;padding:30px}
.ov{width: 100%;}
</style>


