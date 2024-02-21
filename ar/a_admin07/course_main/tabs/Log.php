<?php
if($id !='' and $level_admin <= 2){
// Query the database
$main .="WHERE `table` = 'course_main' AND `admin_id` = '{$id}'";
$sql_admin_history1 = "SELECT * FROM `admin_history` $main ORDER BY `id` DESC";
$result_admin_history1 = $mysqli -> query($sql_admin_history1);
$numrows = mysqli_num_rows($result_admin_history1);

// Query the database
$sql_admin_history = "$sql_admin_history1";
$result_admin_history = $mysqli -> query($sql_admin_history);
?>
<!-- page title area end -->
<table class="table table-striped table-hover">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th scope="col">user</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">time</th>
                                            <th scope="col">type</th>
                                            <th scope="col">text</th>
                                            <th scope="col">IP</th>
                                        </tr>
                                    </thead>
                                    <tbody> <?php
                                    if ($result_admin_history && (mysqli_num_rows($result_admin_history) > 0)) {
                                         while ($row_admin_history = $result_admin_history-> fetch_assoc()){
                                           $id =htmlspecialchars($row_admin_history['id']);

                                                                                ?>
                                        <tr>

                                            <td scope="row"><?php echo $row_admin_history['user_name']; ?></td>

                                            <td><?php echo $row_admin_history['Date']; ?></td>
                                            <td><?php echo $row_admin_history['time']; ?></td>
                                            <td><?php echo $row_admin_history['type']; ?></td>
                                            <td><?php echo $row_admin_history['Text']; ?></td>
                                            <td><?php echo $row_admin_history['ip']; ?></td>
                                        </tr><?php
                                                                        }
                                                                    }else{ echo " There are no Items to display "; };
                                                                     ?>
                                    </tbody>
                                </table>
<?php }; ?>