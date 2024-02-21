<form method="post" action="?page=course_main-replaceO" name="insertForm"
                enctype="multipart/form-data"><input name="id" type="hidden" id="id" value="<?php echo $id  ?>" />
                <div class="form-row">
                    <div class="col-12 mb-3"><?php textarea_edit('Outline','overview'); ?></div>
                </div>
                <button type="submit"
                    class="btn btn-primary mt-4 px-5 float-right"><i class="fa fa-pencil" aria-hidden="true"></i> <?php if(isset( $_GET['id'] )){ echo"Edit Course"; }else{ echo "Add Course";}; ?></button>
            </form>