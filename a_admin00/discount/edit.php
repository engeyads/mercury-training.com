<!-- start section add -->
<div class="col-6">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Add Discount</h4>
                    <?php
                        $id = $_GET["id"];
                        // Query the database
                        $sql_course_ar_c = "SELECT * FROM `discount` WHERE 1 AND `id` LIKE '" . $id . "' ";
                        $result_course_ar_c = mysql_query($sql_course_ar_c, $conn);
                        if ($result_course_ar_c && (mysql_num_rows($result_course_ar_c) > 0)) {
                            $row_course_ar_c = mysql_fetch_assoc($result_course_ar_c);
                            $id =htmlspecialchars($row_course_ar_c['id']);
                            $code =htmlspecialchars($row_course_ar_c['code']);

                        };
						$row_function = $row_course_ar_c;
						$table = 'discount';
                    require("function.php");
                    ?>
            <?php if($site_course_link_pdf_course !='' and $c_id !=''){ ?><a
                href="<?php echo $site_course_link_pdf_course; ?><?php echo $c_id; ?>" target="_blank">View
                PDF</a><?php }?>
            <form method="post" action="index.php?page=discount-replace" name="insertForm"
                enctype="multipart/form-data"><input name="id" type="hidden" id="id" value="<?php echo $id  ?>" />
                <?php if($code !=''){ ?>
                <div class="form-row">
                    <div class="col-4 mb-3"><?php form_edit('Code','code'); ?></div>
                </div><?php }?>

                <div class="form-row">
                    <div class="col-4 mb-3"><?php form_edit('Course ID','course_id'); ?></div>
                </div>
                <div class="form-row">
                    <div class="col-4 mb-3"><?php form_edit('City Id','city'); ?></div>
                </div>
                <div class="form-row">
                    <div class="col-4 mb-3"></div>
                </div>
                <div class="form-row">
                    <div class="col-4 mb-3"><?php $default_val  = 10; form_edit('Percentage %','percentage'); ?></div>
                </div>
                <div class="form-row">
                    <div class="col-4 mb-3"><?php $default_val  = 0;form_edit('Amount','amount'); ?></div>
                </div>
                <div class="form-row">
                    <div class="col-4 mb-3"><?php $default_val  = 1;form_edit('Count','count'); ?></div>
                </div>
                <div class="form-row">
                    <div class="col-4 mb-3"><?php $default_val  = 0;form_edit('Used','used'); ?></div>
                </div>
                <div class="form-row">
                    <div class="col-4 mb-3"><?php 
                    $oneYearOn = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 365 day"));

                    $default_val  = $oneYearOn ;form_edit('Expiry Date','expiry_date'); ?>
                    </div>
                    <div class="col-6 mt-5 text-right">
                        <button class="btn btn-info py-2">10 Days</button>
                        <button class="btn btn-info py-2">1 Month</button>
                        <button class="btn btn-info py-2">1 Year</button>
                    </div>
                    
                </div>

                <div class="form-row">
                    <div class="col-4 mb-3"><?php form_edit('Admin Note','admin_note'); ?></div>
                </div>

                <div class="form-row">
                    <div class="col-4 mb-3"><?php form_edit('View Note','view_note'); ?></div>
                </div>

                <button type="submit"   class="btn btn-primary mt-4 pr-4 pl-4"><?php if(isset( $_GET['id'] )){ echo"Edit"; }else{ echo "Add";}; ?></button>
            </form>
        </div>
    </div>
</div>

<!-- end section add -->

 <!-- basic table start -->
 
                                <?php
// Query the database
$sql_code_log = "SELECT * FROM `code_log` where `code` = '{$code}'";
$result_code_log = mysql_query($sql_code_log, $conn);

if ($result_code_log && (mysql_num_rows($result_code_log) > 0)) {
    ?><div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Code Used</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table text-center table-hover">
                        <thead class="text-uppercase">
                            <tr>
                                
                                <th scope="col">Code</th>
                                <th scope="col">Date</th>
                                <th scope="col">IP</th>
                                <th scope="col">Text<th>
                                                                            
                            </tr>
                            </thead><tbody><?php
    while ($row_code_log = mysql_fetch_assoc($result_code_log)){

        $id_logo =htmlspecialchars($row_code_log['id']);
        $code=htmlspecialchars($row_code_log['code']);
        $date =htmlspecialchars($row_code_log['date']);
        $ip =htmlspecialchars($row_code_log['ip']);
        $text =$row_code_log['text'];

  ?>
<tr>
 
  <td><?php echo $code ; ?><?php echo $id_logo  ; ?></td>
  <td><?php echo $date ; ?></td>
  <td><?php echo $ip ; ?></td>
  <td>
  
    <div class="modal fade " id="bd-example-modal<?php echo $id_logo ;?>-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content modal-big" >
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">text</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body text-danger">
                <?php echo $text; ; ?>
            </div>
            
        </div>
        </div>
    </div><button class="button-del" type="button" data-toggle="modal" data-target="#bd-example-modal<?php echo $id_logo ;?>-lg">View</button>


  
  </td>
  <td></td>
</tr>
      <?php
    }
    ?>                        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>
<!-- basic table end --><?php
}






                           ?>
                           
                           







