<?php if($level_admin !=1){ exit; }?>
<h1 class="header-title ml-5">Change Password for: <?php echo $_GET['user_name']?></h1><br />
<br />





            <div class="main-content-inner">


                    <!-- change area start -->


                    <div class="login-box">
                        <form method="post" action="?page=users-change_r"><input name="user_name_ch" type="hidden" value="<?php echo $_GET['user_name'];  ?>">

                            <div class="login-form-body">


                                <div class="form-gp">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" id="exampleInputPassword1" name="pass1">
                                    <i class="ti-lock"></i>
                                </div>
                                <div class="form-gp">
                                    <label for="exampleInputPassword2">RE Password</label>
                                    <input type="password" id="exampleInputPassword2" name="pass2">
                                    <i class="ti-lock"></i>
                                </div>

                                <div class="submit-btn-area">
                                    <button id="form_submit" type="submit">Change Password<i class="ti-arrow-right"></i></button>

                                </div>
                            </div>
                        </form>
                    </div>


            <!-- change area end -->


            </div>
        <!-- main content area end -->


<br><br><br>
