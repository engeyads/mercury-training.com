<!-- start table view -->
<div class="main-content-inner">
    <div class="col-6 mt-5">
        <p class="mb-2">
            <a class="btn btn-outline-primary font-weight-bold" data-toggle="collapse" href="#collapseExample"
                role="button" aria-expanded="false" aria-controls="collapseExample">View Table</a>
        </p>
        <div class="card">
            <div class="card-body card-hidd">
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table text-centers table-striped">

                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name of Group</th>
                                        </tr>
                                    </thead>
                                    <tbody><?php
                                        

                                        $sql_course_c = "SELECT * FROM `course_c` ";
                                        $result_course_c = $mysqli -> query($sql_course_c);
                                        if ($result_course_c && (mysqli_num_rows($result_course_c) > 0)) {
                                            while ($row_course_c = $result_course_c-> fetch_assoc()){
                                                ?>
                                        <tr>
                                            <th scope="row"><?php
                                            $sql_c_id = "SELECT `c_id`, left(`c_id` , 1 )  FROM `course_main` where left(`c_id` , 1 ) = {$row_course_c['id']}  ORDER BY `c_id` DESC";
                                            $result_c_id = $mysqli -> query($sql_c_id);
                                            $row_c_id = $result_c_id-> fetch_assoc();
                                            echo $row_c_id['c_id']+1;
                                            ?>
                                            </th>
                                            <td><?php echo $row_course_c['name']; ?></td>
                                        </tr>

                                        <?php
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
        </div>
    </div>
</div>

<!-- End table view -->

<?php if($id != ''){ ?>
<div class="modal fade" id="exampleModa<?php echo $id ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delet Course</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body text-danger">
                      Are you sure you want to delete course:<br>
<strong>"<?php echo $name; ?>"</strong><br>and all related dates
                    </div>
                    <div class="modal-footer">
                      <button type="button " class="btn btn-secondary btn-no" data-dismiss="modal">NO</button>
                      <span class="b-remove"><a type="button" class="btn btn-primary" href="?page=course_main-del&id=<?php
					  
					  echo $id;
					     ?>">Yes</a></span>
                    </div>
                  </div>
                </div>
              </div>
<a href='' data-toggle="modal" data-target="#exampleModa<?php echo $id ;?>"><i class="ti-trash fa-2x"></i></a>
<?php }?>