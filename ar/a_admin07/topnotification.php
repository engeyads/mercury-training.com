<?php
    if(isset($_SESSION['tn']) and $_SESSION['tn'] !='' and isset($_SESSION['tnt']) and $_SESSION['tnt'] !='' ){
        // $_SESSION['tn'] ='';
        // if($_GET['tn'] !='Err'){
        //     $tnId = to10($_GET['tn']);
        //     $sql_topnotification = "SELECT * FROM `topnotification` WHERE 1 AND `id` = '{$tnId}' and `user_name` = '{$user_nameA}' ";
        //     $result_topnotification = $mysqli -> query($sql_topnotification);
        //     if ($result_topnotification && (mysqli_num_rows($result_topnotification) > 0)) {
        //         $row_topnotification = $result_topnotification-> fetch_assoc();
        //             $topnotificationMSG = $row_topnotification['Text'];
        //     };
        // }else{
        //     $topnotificationMSG = 'Err';
        // }

        ?><div id="topNotification">
                <?php
                if($_SESSION['tnt']=='success'){
                    ?>
                    <div class="alert alert-success alert-dismissible fade show p-0 topNotification">
                        <div class="d-inline-block p-2 ico"><i class="fa fa-check-circle fa-2x"></i></div>
                        <div class="d-inline-block pr-5 pl-5 align-top pt-3 h-100"><strong>Success: </strong><?php echo $_SESSION['tn']; ?></div>
                        <a   class="d-inline-block pr-3 pl-0 align-top pt-3 h-100" data-dismiss="alert" aria-label="Close"><i class="fa fa-times"></i></a>
                    </div><?php
                }else{
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show p-0 topNotificationdanger">
                        <div class="d-inline-block p-2 ico"><i class="fa fa-times-circle fa-2x"></i></div>
                        <div class="d-inline-block pr-5 pl-5 align-top pt-3 h-100"><strong>Err: </strong>This action is not completed</div>
                        <a   class="d-inline-block pr-3 pl-0 align-top pt-3 h-100" data-dismiss="alert" aria-label="Close"><i class="fa fa-times"></i></a>
                    </div>
                        <?php
                }
                ?>
            </div>
        <script>
        $( document ).ready(function() {
            $( "#topNotification" ).addClass( "topNhid" ).fadeOut(10000);
        });
        </script><?php
        $_SESSION['tn'] ='';
        $_SESSION['tnt'] ='';
    }
    ?>