<!-- start section add -->
<div class="col-6">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Add Discount</h4>
                    <?php
                        $id = $_GET["id"];
                        // Query the database
                        $sql_course_ar_c = "SELECT * FROM `discount_now` WHERE 1 AND `id` LIKE '" . $id . "' ";
                        $result_course_ar_c = mysql_query($sql_course_ar_c, $conn);
                        if ($result_course_ar_c && (mysql_num_rows($result_course_ar_c) > 0)) {
                            $row_course_ar_c = mysql_fetch_assoc($result_course_ar_c);
                            $id =htmlspecialchars($row_course_ar_c['id']);
                            $code =htmlspecialchars($row_course_ar_c['code']);

                        };
						$row_function = $row_course_ar_c;
						$table = 'discount_now';
                    require("function.php");
                    ?>
            <?php if($site_course_link_pdf_course !='' and $c_id !=''){ ?><a
                href="<?php echo $site_course_link_pdf_course; ?><?php echo $c_id; ?>" target="_blank">View
                PDF</a><?php }?>
            <form method="post" action="index.php?page=discountnow-replace" name="insertForm"
                enctype="multipart/form-data"><input name="id" type="hidden" id="id" value="<?php echo $id  ?>" />
                <?php if($code !=''){ ?>
                <div class="form-row">
                    <div class="col-4 mb-3"><?php form_edit('Code','code'); ?></div>
                </div><?php }?>

                <div class="form-row">
                    <div class="col-4 mb-3"><?php form_edit('Discount Now','code'); ?></div>
                </div>

                <button type="submit"   class="btn btn-primary mt-4 pr-4 pl-4"><?php if(isset( $_GET['id'] )){ echo"Edit"; }else{ echo "Add";}; ?></button>
            </form>
        </div>
    </div>
</div>

<!-- end section add -->








