
            <?php if($site_course_link_pdf_course !='' and $c_id !=''){ ?><a href="<?php echo $site_course_link_pdf_course; ?><?php echo $c_id; ?>" target="_blank" class=" text-info">View PDF</a><?php }?>
                <form method="post" action="?page=course_main-replace" name="insertForm"
                enctype="multipart/form-data"><input name="id" type="hidden" id="id" value="<?php echo $id  ?>" />
                <div class="form-row">
                    <div class="col-6 mt-2"><?php form_edit('Course Name','name'); ?></div>
                    <!-- <div class="col-6 mb-3"><?php form_edit('Sub Title','sub_title'); ?></div> -->
                    <div class="col-6 mb-3" >
                        <div class="form-group">
                            <label class="col-form-label">Group</label>
                            <select class="form-control" name="course_c">
                                <?php
                                $course_c =$row_course_ar_c['course_c'];
                                // Query the database
                                $sql_select = "SELECT * FROM `course_c`";
                                $result_select = $mysqli -> query($sql_select);
                                if ($result_select && (mysqli_num_rows($result_select) > 0)) {
                                    while ($row_select = $result_select-> fetch_assoc()){
                                        $id_select = $row_select['id'];
                                        $name_select = $row_select['name'];
                                ?><option value="<?php echo $id_select ; ?>"
                                    <?php if ($row_course_ar_c !='' and $row_course_ar_c['course_c'] == $id_select) {echo "selected=\"selected\"";} ?>>
                                    <?php echo $name_select; ?></option><?php
                                    }
                                };
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class=" col-3">
                        <div class="form-group">
                            <?php  $default_val = $last_cid_plus; form_edit('Course Number','c_id'); ?>
                        </div>
                    </div>

                    
                    <div class="col-3 mb-3">
                        <div class="form-group">
                            <?php $default_val = 1; form_edit('Weeks','weeks'); ?><?php $default_val = 1; form_edit('Weeks','week'); ?>
                        </div>
                    </div>

                    <div class="col-6 mb-3">
                        <div class="form-group">
                            <?php form_edit('keyword','keyword'); ?>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <?php form_edit('Description','description'); ?>
                        </div>
                    </div>

                    <div class="col-6 mb-3">
                    
                            <div class="form-group">
                                <label for="">Tags</label>
                                <input type="text" id="tagInput" class="form-control"  />
                                <button class="btn btn-sm btn-info mt-2" onclick="setTag()">Add Tag</button>    
                            </div>

                        
                    </div>
                    <div class="col-6 mt-5">

                            <div class="alert alert-info">
                                <?php form_edit('Tags','tags'); ?>
                            </div>
            
                            <p id="pText"></p>
                        
                    </div>



                </div>


                

                
                

                <!-- <div class="form-group">
                    <label class="col-form-label">Hidden</label>
                    <input type="checkbox" name='hidden' value='1'
                        <?php if($row_course_ar_c['hidden'] == 1){ ?>checked<?php }; ?>>
                </div> -->
                <div class="custom-control custom-checkbox mr-sm-2 my-4 ml-2">
                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name='hidden'
                        value='1' <?php if(isset($row_course_ar_c['hidden']) and $row_course_ar_c['hidden'] == 1){ ?>checked<?php }; ?>>
                    <label class="custom-control-label" for="customControlAutosizing">Hidden</label>
                </div>
                <div class="form-row">
                    <div class="col-12 mb-3"><?php textarea_edit('Brochure','broshoure'); ?></div>
                </div>
                <div class="form-row">
                    <div class="col-12 mb-3"><?php textarea_edit('Outline','overview'); ?></div>
                </div>
                

                
                <button type="submit"
                    class="btn btn-primary mt-4 px-5 float-right"><i class="fa fa-pencil" aria-hidden="true"></i> <?php if(isset( $_GET['id'] )){ echo"Edit Course"; }else{ echo "Add Course";}; ?></button>
            </form>


            <script>
            
            // create an array
            var myArr = [];
            var inputText = document.getElementById('tagInput');
            function pushData()
            {

                var inputText = document.getElementById('tagInput').value;
                
                if(myArr.indexOf(inputText) < 0)
                {
                    myArr.push(inputText);
                }
                
                document.getElementById('pText').innerHTML = myArr.join(", ");

                var x = document.getElementsByName("tags");

                for (i = 0; i < x.length; i++) {
  
                    x[i].value = myArr.join(", ");
                }
            }
            
            function setTag(){
                
                pushData()
                inputText.value = '';
                document.getElementById("tagInput").focus();

            }
    //         inputText.addEventListener('click', function (e) {
                
    //                 pushData(e)
    //                 inputText.value = '';
    //                 document.getElementById("tagInput").focus();

                
    // });
            
        </script>