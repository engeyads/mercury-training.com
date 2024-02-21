
<!DOCTYPE html>
<html lang="ar">
    <head>
        <?php
            $event = isset($eventsArray->result->events) ? $eventsArray->result->events[0] : null;
        ?>
        <meta name="description" content="<?php echo $centerName . ' تسجيل '; ?>">
        <meta name="keywords" content="Mercury Register, Learning, Training, Register">
        <link rel="canonical" href="<?php echo $systemUrl.'c/'.$event->courseId.'.html'; ?>"/>
        <meta property="og:title" content="<?php echo $centerName; ?> تسجيل">
        <meta property="og:locale" content="en-SA">
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?php echo $centerName; ?> تسجيل">
        <meta property="og:url" content="<?php echo $systemUrl.$eventPage.'/'.$event->id.'/register.html'; ?>">
        <meta property="og:site_name" content="<?php echo $centerName; ?>">
        <link rel="canonical" href="<?php echo $systemUrl.'c/'.$event->courseId.'.html'; ?>"/>
        <?php include('layouts/head.php'); ?>
    </head>

<body itemscope itemtype="https://schema.org/WebPage">
    
    <?php
        include('layouts/header.php');
    ?>

    <?php
        if (isset($eventsArray->result->events) && (count($eventsArray->result->events) ==1)) {
        $event = $eventsArray->result->events[0];
        $startDate = date_create($event->startDate);
        $endDate = date_create($event->endDate);
    ?>
    <div class="inq-header">
        <div class="cat-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 itemprop="name" content="<?php echo $centerName . ' تسجيل '; ?>" title="<?php echo $centerName . ' تسجيل '; ?>" Policy class="categroy-title">تسجيل : <?php echo $event->categoryName; ?> <br/> <?php echo $event->name; ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="inq-content pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="info pt-3 pb-2">
                        <strong>الرمز:</strong> <?php echo $event->code; ?>_<?php echo $event->id; ?> &nbsp;&nbsp;
                        <strong>التاريخ:</strong> <?php echo generateEventFormatedDate($event->startDate,$event->endDate, 'ar'); ?>&nbsp;&nbsp;
                        <strong>مكان الدورة: </strong><?php echo $event->city; ?>&nbsp;
                        <strong>الرسوم: </strong><?php echo $event->price; ?>&nbsp;<strong><?php echo $event->currency; ?></strong>

                        <p class="mt-3"><b>يرجى إكمال النموذج التالي ويشار إلى الحقول المطلوبة بعلامة النجمة (<i class="fa fa-star text-danger"></i> ).</b></p>
                    </div>
                    <div>
                        <hr>
                        <div class="form">

                            <form id="login" method="POST" name="registerationt" lang="en" action="<?php echo $systemUrl; ?><?php echo $registerReceive; ?>/<?php echo $event->id.'.html'; ?>">
                                <div class="cover-in-form">
                                    <div id="participants">
                                        <div class="participant" data-index="0">
                                            <h4 class="head-form">معلومات المشارك</h4>
                                            <div class="cover-group p-4">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="input-group input-group-sm mb-3">

                                                        <select class="form-select form-control-sm" id="title" name="participants[0][title]">
                                                            <option selected>اللقب</option>
                                                            <option <?php if( isset($_POST['title'] ) =='Mr'){ ?>selected="selected"<?php };?> value="Mr">السيد</option>
                                                            <option <?php if( isset($_POST['title'] ) =='Mrs'){ ?>selected="selected"<?php };?> value="Mrs">السيدة</option>
                                                            <!-- <option <?php if( isset($_POST['title'] ) =='Ms'){ ?>selected="selected"<?php };?> value="Ms">Ms</option>
                                                            <option <?php if( isset($_POST['title'] ) =='Miss'){ ?>selected="selected"<?php };?> value="Miss">Miss</option> -->
                                                            <!-- <option <?php if( isset($_POST['title'] ) =='Dr.'){ ?>selected="selected"<?php };?> value="Dr.">Dr.</option>
                                                            <option <?php if( isset($_POST['title'] ) =='Engr.'){ ?>selected="selected"<?php };?> value="Engr.">Engr.</option>
                                                            <option <?php if( isset($_POST['title'] ) =='Sir'){ ?>selected="selected"<?php };?> value="Sir">Sir</option>
                                                            <option <?php if( isset($_POST['title'] ) =='Capt'){ ?>selected="selected"<?php };?> value="Capt.">Capt.</option>
                                                            <option <?php if( isset($_POST['title'] ) =='Col.'){ ?>selected="selected"<?php };?> value="Col.">Col.</option>
                                                            <option <?php if( isset($_POST['title'] ) =='H.E.'){ ?>selected="selected"<?php };?> value="H.E.">H.E.</option>
                                                            <option <?php if( isset($_POST['title'] ) =='H.H. Sheikh'){ ?>selected="selected"<?php };?> value="H.H. Sheikh">H.H. Sheikh</option>
                                                            <option <?php if( isset($_POST['title'] ) =='H.H. Sheikha'){ ?>selected="selected"<?php };?> value="H.H. Sheikha">H.H. Sheikha</option>
                                                            <option <?php if( isset($_POST['title'] ) =='Prof.'){ ?>selected="selected"<?php };?> value="Prof.">Prof.</option> -->
                                                        </select>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <input name="participants[0][first_name]" type="text" class="form-control required-input" placeholder="الاسم" required="">
                                                            <span class="input-group-text required-span text-danger">*</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <input name="participants[0][last_name]" type="text" class="form-control required-input" placeholder="الكنية (العائلة)" required="">
                                                            <span class="input-group-text required-span text-danger">*</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <input name="participants[0][position]" type="text" id="position" class="form-control required-input" placeholder="االمسمى الوظيفي" required="">
                                                            <span class="input-group-text required-span text-danger">*</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <input name="participants[0][mobile_number]" placeholder=" الجوال (يتضمن رمز البلد)" type="text" id="mobile_number" class="form-control required-input" required="">
                                                            <span class="input-group-text required-span text-danger">*</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <input name="participants[0][phone_number]" type="text" id="phone_number" class="form-control" placeholder=" رقم الهاتف (يتضمن رمز البلد)">
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- <div class="col-sm-4">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <input name="participants[0][fax_number]" type="text" id="fax_number" placeholder="الفاكس  (يتضمن رمز البلد) " class="form-control">
                                                        </div>
                                                    </div> -->
                                                    <div class="col-sm-4">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <input name="participants[0][email]" type="email" id="email" placeholder="االبريد الالكتروني الرسمي " required="" class="form-control required-input">
                                                            <span class="input-group-text required-span text-danger">*</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="input-group input-group-sm mb-3">
                                                            <input name="participants[0][cc]" type="email" id="cc" placeholder="البريد الإلكتروني الشخصي " class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <a class="btn btn-primary btn-sm me-4 mb-4" id="add_delegate">
                                        <i class="far fa-plus-square ms-1"></i>إضافة مشارك
                                    </a>
                                    
                                    <a class="btn btn-danger btn-sm me-2 mb-4" id="remove_delegate" style="display: none">
                                        <i class="fas fa-trash-alt ms-1"></i>إزالة مشارك
                                    </a>
                                </div>

                                <textarea id="new_delegate_html" style="display:none;">
                                    <div class="new_participant" data-index="0">
                                        <h4 class="ms-4"></h4>
                                        <div class="cover-group p-4 pt-2">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="input-group input-group-sm mb-3">

                                                    <select class="form-select form-control-sm" id="title" name="participants[0][title]">
                                                        <option selected>اللقب</option>
                                                        <option <?php if( isset($_POST['title'] ) =='Mr'){ ?>selected="selected"<?php };?> value="Mr">Mr</option>
                                                        <option <?php if( isset($_POST['title'] ) =='Mrs'){ ?>selected="selected"<?php };?> value="Mrs">Mrs</option>
                                                        <!-- <option <?php if( isset($_POST['title'] ) =='Ms'){ ?>selected="selected"<?php };?> value="Ms">Ms</option>
                                                        <option <?php if( isset($_POST['title'] ) =='Miss'){ ?>selected="selected"<?php };?> value="Miss">Miss</option> -->
                                                        <!-- <option <?php if( isset($_POST['title'] ) =='Dr.'){ ?>selected="selected"<?php };?> value="Dr.">Dr.</option>
                                                        <option <?php if( isset($_POST['title'] ) =='Engr.'){ ?>selected="selected"<?php };?> value="Engr.">Engr.</option>
                                                        <option <?php if( isset($_POST['title'] ) =='Sir'){ ?>selected="selected"<?php };?> value="Sir">Sir</option>
                                                        <option <?php if( isset($_POST['title'] ) =='Capt'){ ?>selected="selected"<?php };?> value="Capt.">Capt.</option>
                                                        <option <?php if( isset($_POST['title'] ) =='Col.'){ ?>selected="selected"<?php };?> value="Col.">Col.</option>
                                                        <option <?php if( isset($_POST['title'] ) =='H.E.'){ ?>selected="selected"<?php };?> value="H.E.">H.E.</option>
                                                        <option <?php if( isset($_POST['title'] ) =='H.H. Sheikh'){ ?>selected="selected"<?php };?> value="H.H. Sheikh">H.H. Sheikh</option>
                                                        <option <?php if( isset($_POST['title'] ) =='H.H. Sheikha'){ ?>selected="selected"<?php };?> value="H.H. Sheikha">H.H. Sheikha</option>
                                                        <option <?php if( isset($_POST['title'] ) =='Prof.'){ ?>selected="selected"<?php };?> value="Prof.">Prof.</option> -->
                                                    </select>

                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group input-group-sm mb-3">
                                                        <input name="participants[0][first_name]" type="text" class="form-control required-input" placeholder="الاسم" required="">
                                                        <span class="input-group-text required-span text-danger">*</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group input-group-sm mb-3">
                                                        <input name="participants[0][last_name]" type="text" class="form-control required-input" placeholder="الكنية (العائلة)" required="">
                                                        <span class="input-group-text required-span text-danger">*</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group input-group-sm mb-3">
                                                        <input name="participants[0][position]" type="text" id="position" class="form-control required-input" placeholder="االمسمى الوظيفي" required="">
                                                        <span class="input-group-text required-span text-danger">*</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group input-group-sm mb-3">
                                                        <input name="participants[0][mobile_number]" placeholder=" الجوال (يتضمن رمز البلد)" type="text" id="mobile_number" class="form-control required-input" required="">
                                                        <span class="input-group-text required-span text-danger">*</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group input-group-sm mb-3">
                                                        <input name="participants[0][phone_number]" type="text" id="phone_number" class="form-control" placeholder=" رقم الهاتف (يتضمن رمز البلد)">
                                                    </div>
                                                </div>
                                                
                                                <!-- <div class="col-sm-4">
                                                    <div class="input-group input-group-sm mb-3">
                                                        <input name="participants[0][fax_number]" type="text" id="fax_number" placeholder="الفاكس  (يتضمن رمز البلد) " class="form-control">
                                                    </div>
                                                </div> -->
                                                <div class="col-sm-4">
                                                    <div class="input-group input-group-sm mb-3">
                                                        <input name="participants[0][email]" type="email" id="email" placeholder="االبريد الالكتروني الرسمي " required="" class="form-control required-input">
                                                        <span class="input-group-text required-span text-danger">*</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="input-group input-group-sm mb-3">
                                                        <input name="participants[0][cc]" type="email" id="cc" placeholder="البريد الإلكتروني الشخصي  " class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </textarea>

                                <div class="cover-in-form">
                                    <h4 class="head-form">معلومات عن جهة العمل (شركة - مؤسسة - وزارة - مديرية - هيئة ...)</h4>
                                    <div class="cover-group p-4">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="input-group input-group-sm mb-3">
                                                    <input name="company" type="text" id="company" class="form-control required-input" placeholder="اسم الشركة" required>
                                                    <span class="input-group-text required-span text-danger">*</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group input-group-sm mb-3">
                                                    <input name="city" type="text" id="city" placeholder="المدينة" class="form-control required-input" required>
                                                    <span class="input-group-text required-span text-danger">*</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group input-group-sm mb-3">
                                                    <select class="form-select" id="title" name="country" id="country">
                                                        <option selected>يرجى اختيار البلد</option>
                                                        <option value="Afghanistan" <?php if( isset($_POST['COUNTRY']) =='Afghanistan'){ ?>selected="selected"<?php };?> >Afghanistan</option>
                                                        <option value="Albania" <?php if( isset($_POST['COUNTRY']) =='Albania'){ ?>selected="selected"<?php };?> >Albania</option>
                                                        <option value="Algeria" <?php if( isset($_POST['COUNTRY']) =='Algeria'){ ?>selected="selected"<?php };?> >Algeria</option>
                                                        <option value="American Samoa" <?php if( isset($_POST['COUNTRY']) =='American Samoa'){ ?>selected="selected"<?php };?> >American Samoa</option>
                                                        <option value="Andorra" <?php if( isset($_POST['COUNTRY']) =='Andorra'){ ?>selected="selected"<?php };?> >Andorra</option>
                                                        <option value="Angola" <?php if( isset($_POST['COUNTRY']) =='Angola'){ ?>selected="selected"<?php };?> >Angola</option>
                                                        <option value="Anguilla" <?php if( isset($_POST['COUNTRY']) =='Anguilla'){ ?>selected="selected"<?php };?> >Anguilla</option>
                                                        <option value="Antarctica" <?php if( isset($_POST['COUNTRY']) =='Antarctica'){ ?>selected="selected"<?php };?> >Antarctica</option>
                                                        <option value="Antigua and Barbuda" <?php if( isset($_POST['COUNTRY']) =='Antigua and Barbuda'){ ?>selected="selected"<?php };?> >Antigua and Barbuda</option>
                                                        <option value="Argentina" <?php if( isset($_POST['COUNTRY']) =='Argentina'){ ?>selected="selected"<?php };?> >Argentina</option>
                                                        <option value="Armenia" <?php if( isset($_POST['COUNTRY']) =='Armenia'){ ?>selected="selected"<?php };?> >Armenia</option>
                                                        <option value="Aruba" <?php if( isset($_POST['COUNTRY']) =='Aruba'){ ?>selected="selected"<?php };?> >Aruba</option>
                                                        <option value="Australia" <?php if( isset($_POST['COUNTRY']) =='Australia'){ ?>selected="selected"<?php };?> >Australia</option>
                                                        <option value="Austria" <?php if( isset($_POST['COUNTRY']) =='Austria'){ ?>selected="selected"<?php };?> >Austria</option>
                                                        <option value="Azerbaijan" <?php if( isset($_POST['COUNTRY']) =='Azerbaijan'){ ?>selected="selected"<?php };?> >Azerbaijan</option>
                                                        <option value="Bahamas" <?php if( isset($_POST['COUNTRY']) =='Bahamas'){ ?>selected="selected"<?php };?> >Bahamas</option>
                                                        <option value="Bahrain" <?php if( isset($_POST['COUNTRY']) =='Bahrain'){ ?>selected="selected"<?php };?> >Bahrain</option>
                                                        <option value="Bangladesh" <?php if( isset($_POST['COUNTRY']) =='Bangladesh'){ ?>selected="selected"<?php };?> >Bangladesh</option>
                                                        <option value="Barbados" <?php if( isset($_POST['COUNTRY']) =='Barbados'){ ?>selected="selected"<?php };?> >Barbados</option>
                                                        <option value="Belarus" <?php if( isset($_POST['COUNTRY']) =='Belarus'){ ?>selected="selected"<?php };?> >Belarus</option>
                                                        <option value="Belgium" <?php if( isset($_POST['COUNTRY']) =='Belgium'){ ?>selected="selected"<?php };?> >Belgium</option>
                                                        <option value="Belize" <?php if( isset($_POST['COUNTRY']) =='Belize'){ ?>selected="selected"<?php };?> >Belize</option>
                                                        <option value="Benin" <?php if( isset($_POST['COUNTRY']) =='Benin'){ ?>selected="selected"<?php };?> >Benin</option>
                                                        <option value="Bermuda" <?php if( isset($_POST['COUNTRY']) =='Bermuda'){ ?>selected="selected"<?php };?> >Bermuda</option>
                                                        <option value="Bhutan" <?php if( isset($_POST['COUNTRY']) =='Bhutan'){ ?>selected="selected"<?php };?> >Bhutan</option>
                                                        <option value="Bolivia" <?php if( isset($_POST['COUNTRY']) =='Bolivia'){ ?>selected="selected"<?php };?> >Bolivia</option>
                                                        <option value="Bosnia and Herzegovina" <?php if( isset($_POST['COUNTRY']) =='Bosnia and Herzegovina'){ ?>selected="selected"<?php };?> >Bosnia and Herzegovina</option>
                                                        <option value="Botswana" <?php if( isset($_POST['COUNTRY']) =='Botswana'){ ?>selected="selected"<?php };?> >Botswana</option>
                                                        <option value="Bouvet Island" <?php if( isset($_POST['COUNTRY']) =='Bouvet Island'){ ?>selected="selected"<?php };?> >Bouvet Island</option>
                                                        <option value="Brazil" <?php if( isset($_POST['COUNTRY']) =='Brazil'){ ?>selected="selected"<?php };?> >Brazil</option>
                                                        <option value="British Indian Ocean Territory" <?php if( isset($_POST['COUNTRY']) =='British Indian Ocean Territory'){ ?>selected="selected"<?php };?> >British Indian Ocean Territory</option>
                                                        <option value="Brunei Darussalam" <?php if( isset($_POST['COUNTRY']) =='Brunei Darussalam'){ ?>selected="selected"<?php };?> >Brunei Darussalam</option>
                                                        <option value="Bulgaria" <?php if( isset($_POST['COUNTRY']) =='Bulgaria'){ ?>selected="selected"<?php };?> >Bulgaria</option>
                                                        <option value="Burkina Faso" <?php if( isset($_POST['COUNTRY']) =='Burkina Faso'){ ?>selected="selected"<?php };?> >Burkina Faso</option>
                                                        <option value="Burundi" <?php if( isset($_POST['COUNTRY']) =='Burundi'){ ?>selected="selected"<?php };?> >Burundi</option>
                                                        <option value="Cambodia" <?php if( isset($_POST['COUNTRY']) =='Cambodia'){ ?>selected="selected"<?php };?> >Cambodia</option>
                                                        <option value="Cameroon" <?php if( isset($_POST['COUNTRY']) =='Cameroon'){ ?>selected="selected"<?php };?> >Cameroon</option>
                                                        <option value="Canada" <?php if( isset($_POST['COUNTRY']) =='Canada'){ ?>selected="selected"<?php };?> >Canada</option>
                                                        <option value="Cape Verde" <?php if( isset($_POST['COUNTRY']) =='Cape Verde'){ ?>selected="selected"<?php };?> >Cape Verde</option>
                                                        <option value="Cayman Islands" <?php if( isset($_POST['COUNTRY']) =='Cayman Islands'){ ?>selected="selected"<?php };?> >Cayman Islands</option>
                                                        <option value="Central African Republic" <?php if( isset($_POST['COUNTRY']) =='Central African Republic'){ ?>selected="selected"<?php };?> >Central African Republic</option>
                                                        <option value="Chad" <?php if( isset($_POST['COUNTRY']) =='Chad'){ ?>selected="selected"<?php };?> >Chad</option>
                                                        <option value="Chile" <?php if( isset($_POST['COUNTRY']) =='Chile'){ ?>selected="selected"<?php };?> >Chile</option>
                                                        <option value="China" <?php if( isset($_POST['COUNTRY']) =='China'){ ?>selected="selected"<?php };?> >China</option>
                                                        <option value="Christmas Island" <?php if( isset($_POST['COUNTRY']) =='Christmas Island'){ ?>selected="selected"<?php };?> >Christmas Island</option>
                                                        <option value="Cocos (Keeling) Islands" <?php if( isset($_POST['COUNTRY']) =='Cocos (Keeling) Islands'){ ?>selected="selected"<?php };?> >Cocos (Keeling) Islands</option>
                                                        <option value="Colombia" <?php if( isset($_POST['COUNTRY']) =='Colombia'){ ?>selected="selected"<?php };?> >Colombia</option>
                                                        <option value="Comoros" <?php if( isset($_POST['COUNTRY']) =='Comoros'){ ?>selected="selected"<?php };?> >Comoros</option>
                                                        <option value="Congo" <?php if( isset($_POST['COUNTRY']) =='Congo'){ ?>selected="selected"<?php };?> >Congo</option>
                                                        <option value="Cook Islands" <?php if( isset($_POST['COUNTRY']) =='Cook Islands'){ ?>selected="selected"<?php };?> >Cook Islands</option>
                                                        <option value="Costa Rica" <?php if( isset($_POST['COUNTRY']) =='Costa Rica'){ ?>selected="selected"<?php };?> >Costa Rica</option>
                                                        <option value="Cote DIvoire (Ivory Coast)" <?php if( isset($_POST['COUNTRY']) =='Cote DIvoire (Ivory Coast)'){ ?>selected="selected"<?php };?> >Cote D'Ivoire (Ivory Coast)</option>
                                                        <option value="Croatia (Hrvatska)" <?php if( isset($_POST['COUNTRY']) =='Croatia (Hrvatska)'){ ?>selected="selected"<?php };?> >Croatia (Hrvatska)</option>
                                                        <option value="Cuba" <?php if( isset($_POST['COUNTRY']) =='Cuba'){ ?>selected="selected"<?php };?> >Cuba</option>
                                                        <option value="Cyprus" <?php if( isset($_POST['COUNTRY']) =='Cyprus'){ ?>selected="selected"<?php };?> >Cyprus</option>
                                                        <option value="Czechoslovakia (former)" <?php if( isset($_POST['COUNTRY']) =='Czechoslovakia (former)'){ ?>selected="selected"<?php };?> >Czechoslovakia (former)</option>
                                                        <option value="Czech Republic" <?php if( isset($_POST['COUNTRY']) =='Czech Republic'){ ?>selected="selected"<?php };?> >Czech Republic</option>
                                                        <option value="Denmark" <?php if( isset($_POST['COUNTRY']) =='Denmark'){ ?>selected="selected"<?php };?> >Denmark</option>
                                                        <option value="Djibouti" <?php if( isset($_POST['COUNTRY']) =='Djibouti'){ ?>selected="selected"<?php };?> >Djibouti</option>
                                                        <option value="Dominica" <?php if( isset($_POST['COUNTRY']) =='Dominica'){ ?>selected="selected"<?php };?> >Dominica</option>
                                                        <option value="Dominican Republic" <?php if( isset($_POST['COUNTRY']) =='Dominican Republic'){ ?>selected="selected"<?php };?> >Dominican Republic</option>
                                                        <option value="East Timor" <?php if( isset($_POST['COUNTRY']) =='East Timor'){ ?>selected="selected"<?php };?> >East Timor</option>
                                                        <option value="Ecuador" <?php if( isset($_POST['COUNTRY']) =='Ecuador'){ ?>selected="selected"<?php };?> >Ecuador</option>
                                                        <option value="Egypt" <?php if( isset($_POST['COUNTRY']) =='Egypt'){ ?>selected="selected"<?php };?> >Egypt</option>
                                                        <option value="El Salvador" <?php if( isset($_POST['COUNTRY']) =='El Salvador'){ ?>selected="selected"<?php };?> >El Salvador</option>
                                                        <option value="Equatorial Guinea" <?php if( isset($_POST['COUNTRY']) =='Equatorial Guinea'){ ?>selected="selected"<?php };?> >Equatorial Guinea</option>
                                                        <option value="Eritrea" <?php if( isset($_POST['COUNTRY']) =='Eritrea'){ ?>selected="selected"<?php };?> >Eritrea</option>
                                                        <option value="Estonia" <?php if( isset($_POST['COUNTRY']) =='Estonia'){ ?>selected="selected"<?php };?> >Estonia</option>
                                                        <option value="Ethiopia" <?php if( isset($_POST['COUNTRY']) =='Ethiopia'){ ?>selected="selected"<?php };?> >Ethiopia</option>
                                                        <option value="Falkland Islands (Malvinas)" <?php if( isset($_POST['COUNTRY']) =='Falkland Islands (Malvinas)'){ ?>selected="selected"<?php };?> >Falkland Islands (Malvinas)</option>
                                                        <option value="Faroe Islands" <?php if( isset($_POST['COUNTRY']) =='Faroe Islands'){ ?>selected="selected"<?php };?> >Faroe Islands</option>
                                                        <option value="Fiji" <?php if( isset($_POST['COUNTRY']) =='Fiji'){ ?>selected="selected"<?php };?> >Fiji</option>
                                                        <option value="Finland" <?php if( isset($_POST['COUNTRY']) =='Finland'){ ?>selected="selected"<?php };?> >Finland</option>
                                                        <option value="France" <?php if( isset($_POST['COUNTRY']) =='France'){ ?>selected="selected"<?php };?> >France</option>
                                                        <option value="France, Metropolitan" <?php if( isset($_POST['COUNTRY']) =='France, Metropolitan'){ ?>selected="selected"<?php };?> >France, Metropolitan</option>
                                                        <option value="French Guiana" <?php if( isset($_POST['COUNTRY']) =='French Guiana'){ ?>selected="selected"<?php };?> >French Guiana</option>
                                                        <option value="French Polynesia" <?php if( isset($_POST['COUNTRY']) =='French Polynesia'){ ?>selected="selected"<?php };?> >French Polynesia</option>
                                                        <option value="French Southern Territories" <?php if( isset($_POST['COUNTRY']) =='French Southern Territories'){ ?>selected="selected"<?php };?> >French Southern Territories</option>
                                                        <option value="Gabon" <?php if( isset($_POST['COUNTRY']) =='Gabon'){ ?>selected="selected"<?php };?> >Gabon</option>
                                                        <option value="Gambia" <?php if( isset($_POST['COUNTRY']) =='Gambia'){ ?>selected="selected"<?php };?> >Gambia</option>
                                                        <option value="Georgia" <?php if( isset($_POST['COUNTRY']) =='Georgia'){ ?>selected="selected"<?php };?> >Georgia</option>
                                                        <option value="Germany" <?php if( isset($_POST['COUNTRY']) =='Germany'){ ?>selected="selected"<?php };?> >Germany</option>
                                                        <option value="Ghana" <?php if( isset($_POST['COUNTRY']) =='Ghana'){ ?>selected="selected"<?php };?> >Ghana</option>
                                                        <option value="Gibraltar" <?php if( isset($_POST['COUNTRY']) =='Gibraltar'){ ?>selected="selected"<?php };?> >Gibraltar</option>
                                                        <option value="Great Britain (UK)" <?php if( isset($_POST['COUNTRY']) =='Great Britain (UK)'){ ?>selected="selected"<?php };?> >Great Britain (UK)</option>
                                                        <option value="Greece" <?php if( isset($_POST['COUNTRY']) =='Greece'){ ?>selected="selected"<?php };?> >Greece</option>
                                                        <option value="Greenland" <?php if( isset($_POST['COUNTRY']) =='Greenland'){ ?>selected="selected"<?php };?> >Greenland</option>
                                                        <option value="Grenada" <?php if( isset($_POST['COUNTRY']) =='Grenada'){ ?>selected="selected"<?php };?> >Grenada</option>
                                                        <option value="Guadeloupe" <?php if( isset($_POST['COUNTRY']) =='Guadeloupe'){ ?>selected="selected"<?php };?> >Guadeloupe</option>
                                                        <option value="Guam" <?php if( isset($_POST['COUNTRY']) =='Guam'){ ?>selected="selected"<?php };?> >Guam</option>
                                                        <option value="Guatemala" <?php if( isset($_POST['COUNTRY']) =='Guatemala'){ ?>selected="selected"<?php };?> >Guatemala</option>
                                                        <option value="Guinea" <?php if( isset($_POST['COUNTRY']) =='Guinea'){ ?>selected="selected"<?php };?> >Guinea</option>
                                                        <option value="Guinea-Bissau" <?php if( isset($_POST['COUNTRY']) =='Guinea-Bissau'){ ?>selected="selected"<?php };?> >Guinea-Bissau</option>
                                                        <option value="Guyana" <?php if( isset($_POST['COUNTRY']) =='Guyana'){ ?>selected="selected"<?php };?> >Guyana</option>
                                                        <option value="Haiti" <?php if( isset($_POST['COUNTRY']) =='Haiti'){ ?>selected="selected"<?php };?> >Haiti</option>
                                                        <option value="Heard and McDonald Islands" <?php if( isset($_POST['COUNTRY']) =='Heard and McDonald Islands'){ ?>selected="selected"<?php };?> >Heard and McDonald Islands</option>
                                                        <option value="Honduras" <?php if( isset($_POST['COUNTRY']) =='Honduras'){ ?>selected="selected"<?php };?> >Honduras</option>
                                                        <option value="Hong Kong" <?php if( isset($_POST['COUNTRY']) =='Hong Kong'){ ?>selected="selected"<?php };?> >Hong Kong</option>
                                                        <option value="Hungary" <?php if( isset($_POST['COUNTRY']) =='Hungary'){ ?>selected="selected"<?php };?> >Hungary</option>
                                                        <option value="Iceland" <?php if( isset($_POST['COUNTRY']) =='Iceland'){ ?>selected="selected"<?php };?> >Iceland</option>
                                                        <option value="India" <?php if( isset($_POST['COUNTRY']) =='India'){ ?>selected="selected"<?php };?> >India</option>
                                                        <option value="Indonesia" <?php if( isset($_POST['COUNTRY']) =='Indonesia'){ ?>selected="selected"<?php };?> >Indonesia</option>
                                                        <option value="Iran" <?php if( isset($_POST['COUNTRY']) =='Iran'){ ?>selected="selected"<?php };?> >Iran</option>
                                                        <option value="Iraq" <?php if( isset($_POST['COUNTRY']) =='Iraq'){ ?>selected="selected"<?php };?> >Iraq</option>
                                                        <option value="Ireland" <?php if( isset($_POST['COUNTRY']) =='Ireland'){ ?>selected="selected"<?php };?> >Ireland</option>
                                                        <option value="Italy" <?php if( isset($_POST['COUNTRY']) =='Italy'){ ?>selected="selected"<?php };?> >Italy</option>
                                                        <option value="Jamaica" <?php if( isset($_POST['COUNTRY']) =='Jamaica'){ ?>selected="selected"<?php };?> >Jamaica</option>
                                                        <option value="Japan" <?php if( isset($_POST['COUNTRY']) =='Japan'){ ?>selected="selected"<?php };?> >Japan</option>
                                                        <option value="Jordan" <?php if( isset($_POST['COUNTRY']) =='Jordan'){ ?>selected="selected"<?php };?> >Jordan</option>
                                                        <option value="Kazakhstan" <?php if( isset($_POST['COUNTRY']) =='Kazakhstan'){ ?>selected="selected"<?php };?> >Kazakhstan</option>
                                                        <option value="Kenya" <?php if( isset($_POST['COUNTRY']) =='Kenya'){ ?>selected="selected"<?php };?> >Kenya</option>
                                                        <option value="Kiribati" <?php if( isset($_POST['COUNTRY']) =='Kiribati'){ ?>selected="selected"<?php };?> >Kiribati</option>
                                                        <option value="Korea, North" <?php if( isset($_POST['COUNTRY']) =='Korea, North'){ ?>selected="selected"<?php };?> >Korea, North</option>
                                                        <option value="South Korea" <?php if( isset($_POST['COUNTRY']) =='South Korea'){ ?>selected="selected"<?php };?> >South Korea</option>
                                                        <option value="Kuwait" <?php if( isset($_POST['COUNTRY']) =='Kuwait'){ ?>selected="selected"<?php };?> >Kuwait</option>
                                                        <option value="Kyrgyzstan" <?php if( isset($_POST['COUNTRY']) =='Kyrgyzstan'){ ?>selected="selected"<?php };?> >Kyrgyzstan</option>
                                                        <option value="Laos" <?php if( isset($_POST['COUNTRY']) =='Laos'){ ?>selected="selected"<?php };?> >Laos</option>
                                                        <option value="Latvia" <?php if( isset($_POST['COUNTRY']) =='Latvia'){ ?>selected="selected"<?php };?> >Latvia</option>
                                                        <option value="Lebanon" <?php if( isset($_POST['COUNTRY']) =='Lebanon'){ ?>selected="selected"<?php };?> >Lebanon</option>
                                                        <option value="Lesotho" <?php if( isset($_POST['COUNTRY']) =='Lesotho'){ ?>selected="selected"<?php };?> >Lesotho</option>
                                                        <option value="Liberia" <?php if( isset($_POST['COUNTRY']) =='Liberia'){ ?>selected="selected"<?php };?> >Liberia</option>
                                                        <option value="Libya" <?php if( isset($_POST['COUNTRY']) =='Libya'){ ?>selected="selected"<?php };?> >Libya</option>
                                                        <option value="Liechtenstein" <?php if( isset($_POST['COUNTRY']) =='Liechtenstein'){ ?>selected="selected"<?php };?> >Liechtenstein</option>
                                                        <option value="Lithuania" <?php if( isset($_POST['COUNTRY']) =='Lithuania'){ ?>selected="selected"<?php };?> >Lithuania</option>
                                                        <option value="Luxembourg" <?php if( isset($_POST['COUNTRY']) =='Luxembourg'){ ?>selected="selected"<?php };?> >Luxembourg</option>
                                                        <option value="Macau" <?php if( isset($_POST['COUNTRY']) =='Macau'){ ?>selected="selected"<?php };?> >Macau</option>
                                                        <option value="Macedonia" <?php if( isset($_POST['COUNTRY']) =='Macedonia'){ ?>selected="selected"<?php };?> >Macedonia</option>
                                                        <option value="Madagascar" <?php if( isset($_POST['COUNTRY']) =='Madagascar'){ ?>selected="selected"<?php };?> >Madagascar</option>
                                                        <option value="Malawi" <?php if( isset($_POST['COUNTRY']) =='Malawi'){ ?>selected="selected"<?php };?> >Malawi</option>
                                                        <option value="Malaysia" <?php if( isset($_POST['COUNTRY']) =='Malaysia'){ ?>selected="selected"<?php };?> >Malaysia</option>
                                                        <option value="Maldives" <?php if( isset($_POST['COUNTRY']) =='Maldives'){ ?>selected="selected"<?php };?> >Maldives</option>
                                                        <option value="Mali" <?php if( isset($_POST['COUNTRY']) =='Mali'){ ?>selected="selected"<?php };?> >Mali</option>
                                                        <option value="Malta" <?php if( isset($_POST['COUNTRY']) =='Malta'){ ?>selected="selected"<?php };?> >Malta</option>
                                                        <option value="Marshall Islands" <?php if( isset($_POST['COUNTRY']) =='Marshall Islands'){ ?>selected="selected"<?php };?> >Marshall Islands</option>
                                                        <option value="Martinique" <?php if( isset($_POST['COUNTRY']) =='Martinique'){ ?>selected="selected"<?php };?> >Martinique</option>
                                                        <option value="Mauritania" <?php if( isset($_POST['COUNTRY']) =='Mauritania'){ ?>selected="selected"<?php };?> >Mauritania</option>
                                                        <option value="Mauritius" <?php if( isset($_POST['COUNTRY']) =='Mauritius'){ ?>selected="selected"<?php };?> >Mauritius</option>
                                                        <option value="Mayotte" <?php if( isset($_POST['COUNTRY']) =='Mayotte'){ ?>selected="selected"<?php };?> >Mayotte</option>
                                                        <option value="Mexico" <?php if( isset($_POST['COUNTRY']) =='Mexico'){ ?>selected="selected"<?php };?> >Mexico</option>
                                                        <option value="Micronesia" <?php if( isset($_POST['COUNTRY']) =='Micronesia'){ ?>selected="selected"<?php };?> >Micronesia</option>
                                                        <option value="Moldova" <?php if( isset($_POST['COUNTRY']) =='Moldova'){ ?>selected="selected"<?php };?> >Moldova</option>
                                                        <option value="Monaco" <?php if( isset($_POST['COUNTRY']) =='Monaco'){ ?>selected="selected"<?php };?> >Monaco</option>
                                                        <option value="Mongolia" <?php if( isset($_POST['COUNTRY']) =='Mongolia'){ ?>selected="selected"<?php };?> >Mongolia</option>
                                                        <option value="Montserrat" <?php if( isset($_POST['COUNTRY']) =='Montserrat'){ ?>selected="selected"<?php };?> >Montserrat</option>
                                                        <option value="Morocco" <?php if( isset($_POST['COUNTRY']) =='Morocco'){ ?>selected="selected"<?php };?> >Morocco</option>
                                                        <option value="Mozambique" <?php if( isset($_POST['COUNTRY']) =='Mozambique'){ ?>selected="selected"<?php };?> >Mozambique</option>
                                                        <option value="Myanmar" <?php if( isset($_POST['COUNTRY']) =='Myanmar'){ ?>selected="selected"<?php };?> >Myanmar</option>
                                                        <option value="Namibia" <?php if( isset($_POST['COUNTRY']) =='Namibia'){ ?>selected="selected"<?php };?> >Namibia</option>
                                                        <option value="Nauru" <?php if( isset($_POST['COUNTRY']) =='Nauru'){ ?>selected="selected"<?php };?> >Nauru</option>
                                                        <option value="Nepal" <?php if( isset($_POST['COUNTRY']) =='Nepal'){ ?>selected="selected"<?php };?> >Nepal</option>
                                                        <option value="Netherlands" <?php if( isset($_POST['COUNTRY']) =='Netherlands'){ ?>selected="selected"<?php };?> >Netherlands</option>
                                                        <option value="Netherlands Antilles" <?php if( isset($_POST['COUNTRY']) =='Netherlands Antilles'){ ?>selected="selected"<?php };?> >Netherlands Antilles</option>
                                                        <option value="Neutral Zone" <?php if( isset($_POST['COUNTRY']) =='Neutral Zone'){ ?>selected="selected"<?php };?> >Neutral Zone</option>
                                                        <option value="New Caledonia" <?php if( isset($_POST['COUNTRY']) =='New Caledonia'){ ?>selected="selected"<?php };?> >New Caledonia</option>
                                                        <option value="New Zealand" <?php if( isset($_POST['COUNTRY']) =='New Zealand'){ ?>selected="selected"<?php };?> >New Zealand</option>
                                                        <option value="Nicaragua" <?php if( isset($_POST['COUNTRY']) =='Nicaragua'){ ?>selected="selected"<?php };?> >Nicaragua</option>
                                                        <option value="Niger" <?php if( isset($_POST['COUNTRY']) =='Niger'){ ?>selected="selected"<?php };?> >Niger</option>
                                                        <option value="Nigeria" <?php if( isset($_POST['COUNTRY']) =='Nigeria'){ ?>selected="selected"<?php };?> >Nigeria</option>
                                                        <option value="Niue" <?php if( isset($_POST['COUNTRY']) =='Niue'){ ?>selected="selected"<?php };?> >Niue</option>
                                                        <option value="Norfolk Island" <?php if( isset($_POST['COUNTRY']) =='Norfolk Island'){ ?>selected="selected"<?php };?> >Norfolk Island</option>
                                                        <option value="Northern Mariana Islands" <?php if( isset($_POST['COUNTRY']) =='Northern Mariana Islands'){ ?>selected="selected"<?php };?> >Northern Mariana Islands</option>
                                                        <option value="Norway" <?php if( isset($_POST['COUNTRY']) =='Norway'){ ?>selected="selected"<?php };?> >Norway</option>
                                                        <option value="Oman" <?php if( isset($_POST['COUNTRY']) =='Oman'){ ?>selected="selected"<?php };?> >Oman</option>
                                                        <option value="Pakistan" <?php if( isset($_POST['COUNTRY']) =='Pakistan'){ ?>selected="selected"<?php };?> >Pakistan</option>
                                                        <option value="Palau" <?php if( isset($_POST['COUNTRY']) =='Palau'){ ?>selected="selected"<?php };?> >Palau</option>
                                                        <option value="Palestine" <?php if( isset($_POST['COUNTRY']) =='Palestine'){ ?>selected="selected"<?php };?> >Palestine</option>
                                                        <option value="Panama" <?php if( isset($_POST['COUNTRY']) =='Panama'){ ?>selected="selected"<?php };?> >Panama</option>
                                                        <option value="Papua New Guinea" <?php if( isset($_POST['COUNTRY']) =='Papua New Guinea'){ ?>selected="selected"<?php };?> >Papua New Guinea</option>
                                                        <option value="Paraguay" <?php if( isset($_POST['COUNTRY']) =='Paraguay'){ ?>selected="selected"<?php };?> >Paraguay</option>
                                                        <option value="Peru" <?php if( isset($_POST['COUNTRY']) =='Peru'){ ?>selected="selected"<?php };?> >Peru</option>
                                                        <option value="Philippines" <?php if( isset($_POST['COUNTRY']) =='Philippines'){ ?>selected="selected"<?php };?> >Philippines</option>
                                                        <option value="Pitcairn" <?php if( isset($_POST['COUNTRY']) =='Pitcairn'){ ?>selected="selected"<?php };?> >Pitcairn</option>
                                                        <option value="Poland" <?php if( isset($_POST['COUNTRY']) =='Poland'){ ?>selected="selected"<?php };?> >Poland</option>
                                                        <option value="Portugal" <?php if( isset($_POST['COUNTRY']) =='Portugal'){ ?>selected="selected"<?php };?> >Portugal</option>
                                                        <option value="Puerto Rico" <?php if( isset($_POST['COUNTRY']) =='Puerto Rico'){ ?>selected="selected"<?php };?> >Puerto Rico</option>
                                                        <option value="Qatar" <?php if( isset($_POST['COUNTRY']) =='Qatar'){ ?>selected="selected"<?php };?> >Qatar</option>
                                                        <option value="Reunion" <?php if( isset($_POST['COUNTRY']) =='Reunion'){ ?>selected="selected"<?php };?> >Reunion</option>
                                                        <option value="Romania" <?php if( isset($_POST['COUNTRY']) =='Romania'){ ?>selected="selected"<?php };?> >Romania</option>
                                                        <option value="Russian Federation" <?php if( isset($_POST['COUNTRY']) =='Russian Federation'){ ?>selected="selected"<?php };?> >Russian Federation</option>
                                                        <option value="Rwanda" <?php if( isset($_POST['COUNTRY']) =='Rwanda'){ ?>selected="selected"<?php };?> >Rwanda</option>
                                                        <option value="Saint Kitts and Nevis" <?php if( isset($_POST['COUNTRY']) =='Saint Kitts and Nevis'){ ?>selected="selected"<?php };?> >Saint Kitts and Nevis</option>
                                                        <option value="Saint Lucia" <?php if( isset($_POST['COUNTRY']) =='Saint Lucia'){ ?>selected="selected"<?php };?> >Saint Lucia</option>
                                                        <option value="Saint Vincent and the Grenadines" <?php if( isset($_POST['COUNTRY']) =='Saint Vincent and the Grenadines'){ ?>selected="selected"<?php };?> >Saint Vincent and the Grenadines</option>
                                                        <option value="Samoa" <?php if( isset($_POST['COUNTRY']) =='Samoa'){ ?>selected="selected"<?php };?> >Samoa</option>
                                                        <option value="San Marino" <?php if( isset($_POST['COUNTRY']) =='San Marino'){ ?>selected="selected"<?php };?> >San Marino</option>
                                                        <option value="Sao Tome and Principe" <?php if( isset($_POST['COUNTRY']) =='Sao Tome and Principe'){ ?>selected="selected"<?php };?> >Sao Tome and Principe</option>
                                                        <option value="Saudi Arabia" <?php if( isset($_POST['COUNTRY']) =='Saudi Arabia'){ ?>selected="selected"<?php };?> >Saudi Arabia</option>
                                                        <option value="Senegal" <?php if( isset($_POST['COUNTRY']) =='Senegal'){ ?>selected="selected"<?php };?> >Senegal</option>
                                                        <option value="Seychelles" <?php if( isset($_POST['COUNTRY']) =='Seychelles'){ ?>selected="selected"<?php };?> >Seychelles</option>
                                                        <option value="S. Georgia and S. Sandwich Isls." <?php if( isset($_POST['COUNTRY']) =='S. Georgia and S. Sandwich Isls.'){ ?>selected="selected"<?php };?> >S. Georgia and S. Sandwich Isls.</option>
                                                        <option value="Sierra Leone" <?php if( isset($_POST['COUNTRY']) =='Sierra Leone'){ ?>selected="selected"<?php };?> >Sierra Leone</option>
                                                        <option value="Singapore" <?php if( isset($_POST['COUNTRY']) =='Singapore'){ ?>selected="selected"<?php };?> >Singapore</option>
                                                        <option value="Slovak Republic" <?php if( isset($_POST['COUNTRY']) =='Slovak Republic'){ ?>selected="selected"<?php };?> >Slovak Republic</option>
                                                        <option value="Slovenia" <?php if( isset($_POST['COUNTRY']) =='Slovenia'){ ?>selected="selected"<?php };?> >Slovenia</option>
                                                        <option value="Solomon Islands" <?php if( isset($_POST['COUNTRY']) =='Solomon Islands'){ ?>selected="selected"<?php };?> >Solomon Islands</option>
                                                        <option value="Somalia" <?php if( isset($_POST['COUNTRY']) =='Somalia'){ ?>selected="selected"<?php };?> >Somalia</option>
                                                        <option value="South Africa" <?php if( isset($_POST['COUNTRY']) =='South Africa'){ ?>selected="selected"<?php };?> >South Africa</option>
                                                        <option value="Spain" <?php if( isset($_POST['COUNTRY']) =='Spain'){ ?>selected="selected"<?php };?> >Spain</option>
                                                        <option value="Sri Lanka" <?php if( isset($_POST['COUNTRY']) =='Sri Lanka'){ ?>selected="selected"<?php };?> >Sri Lanka</option>
                                                        <option value="St. Helena" <?php if( isset($_POST['COUNTRY']) =='St. Helena'){ ?>selected="selected"<?php };?> >St. Helena</option>
                                                        <option value="St. Pierre and Miquelon" <?php if( isset($_POST['COUNTRY']) =='St. Pierre and Miquelon'){ ?>selected="selected"<?php };?> >St. Pierre and Miquelon</option>
                                                        <option value="Sudan" <?php if( isset($_POST['COUNTRY']) =='Sudan'){ ?>selected="selected"<?php };?> >Sudan</option>
                                                        <option value="Suriname" <?php if( isset($_POST['COUNTRY']) =='Suriname'){ ?>selected="selected"<?php };?> >Suriname</option>
                                                        <option value="Svalbard and Jan Mayen Islands" <?php if( isset($_POST['COUNTRY']) =='Svalbard and Jan Mayen Islands'){ ?>selected="selected"<?php };?> >Svalbard and Jan Mayen Islands</option>
                                                        <option value="Swaziland" <?php if( isset($_POST['COUNTRY']) =='Swaziland'){ ?>selected="selected"<?php };?> >Swaziland</option>
                                                        <option value="Sweden" <?php if( isset($_POST['COUNTRY']) =='Sweden'){ ?>selected="selected"<?php };?> >Sweden</option>
                                                        <option value="Switzerland" <?php if( isset($_POST['COUNTRY']) =='Switzerland'){ ?>selected="selected"<?php };?> >Switzerland</option>
                                                        <option value="Syria" <?php if( isset($_POST['COUNTRY']) =='Syria'){ ?>selected="selected"<?php };?> >Syria</option>
                                                        <option value="Taiwan" <?php if( isset($_POST['COUNTRY']) =='Taiwan'){ ?>selected="selected"<?php };?> >Taiwan</option>
                                                        <option value="Tajikistan" <?php if( isset($_POST['COUNTRY']) =='Tajikistan'){ ?>selected="selected"<?php };?> >Tajikistan</option>
                                                        <option value="Tanzania" <?php if( isset($_POST['COUNTRY']) =='Tanzania'){ ?>selected="selected"<?php };?> >Tanzania</option>
                                                        <option value="Thailand" <?php if( isset($_POST['COUNTRY']) =='Thailand'){ ?>selected="selected"<?php };?> >Thailand</option>
                                                        <option value="Togo" <?php if( isset($_POST['COUNTRY']) =='Togo'){ ?>selected="selected"<?php };?> >Togo</option>
                                                        <option value="Tokelau" <?php if( isset($_POST['COUNTRY']) =='Tokelau'){ ?>selected="selected"<?php };?> >Tokelau</option>
                                                        <option value="Tonga" <?php if( isset($_POST['COUNTRY']) =='Tonga'){ ?>selected="selected"<?php };?> >Tonga</option>
                                                        <option value="Trinidad and Tobago" <?php if( isset($_POST['COUNTRY']) =='Trinidad and Tobago'){ ?>selected="selected"<?php };?> >Trinidad and Tobago</option>
                                                        <option value="Tunisia" <?php if( isset($_POST['COUNTRY']) =='Tunisia'){ ?>selected="selected"<?php };?> >Tunisia</option>
                                                        <option value="Turkey" <?php if( isset($_POST['COUNTRY']) =='Turkey'){ ?>selected="selected"<?php };?> >Turkey</option>
                                                        <option value="Turkmenistan" <?php if( isset($_POST['COUNTRY']) =='Turkmenistan'){ ?>selected="selected"<?php };?> >Turkmenistan</option>
                                                        <option value="Turks and Caicos Islands" <?php if( isset($_POST['COUNTRY']) =='Turks and Caicos Islands'){ ?>selected="selected"<?php };?> >Turks and Caicos Islands</option>
                                                        <option value="Tuvalu" <?php if( isset($_POST['COUNTRY']) =='Tuvalu'){ ?>selected="selected"<?php };?> >Tuvalu</option>
                                                        <option value="Uganda" <?php if( isset($_POST['COUNTRY']) =='Uganda'){ ?>selected="selected"<?php };?> >Uganda</option>
                                                        <option value="Ukraine" <?php if( isset($_POST['COUNTRY']) =='Ukraine'){ ?>selected="selected"<?php };?> >Ukraine</option>
                                                        <option value="United Arab Emirates" <?php if( isset($_POST['COUNTRY']) =='United Arab Emirates'){ ?>selected="selected"<?php };?> >United Arab Emirates</option>
                                                        <option value="United Kingdom" <?php if( isset($_POST['COUNTRY']) =='United Kingdom'){ ?>selected="selected"<?php };?> >United Kingdom</option>
                                                        <option value="United States" <?php if( isset($_POST['COUNTRY']) =='United States'){ ?>selected="selected"<?php };?> >United States</option>
                                                        <option value="Uruguay" <?php if( isset($_POST['COUNTRY']) =='Uruguay'){ ?>selected="selected"<?php };?> >Uruguay</option>
                                                        <option value="US Minor Outlying Islands" <?php if( isset($_POST['COUNTRY']) =='US Minor Outlying Islands'){ ?>selected="selected"<?php };?> >US Minor Outlying Islands</option>
                                                        <option value="USSR (former)" <?php if( isset($_POST['COUNTRY']) =='USSR (former)'){ ?>selected="selected"<?php };?> >USSR (former)</option>
                                                        <option value="Uzbekistan" <?php if( isset($_POST['COUNTRY']) =='Uzbekistan'){ ?>selected="selected"<?php };?> >Uzbekistan</option>
                                                        <option value="Vanuatu" <?php if( isset($_POST['COUNTRY']) =='Vanuatu'){ ?>selected="selected"<?php };?> >Vanuatu</option>
                                                        <option value="Vatican City State (Holy Sea)" <?php if( isset($_POST['COUNTRY']) =='Vatican City State (Holy Sea)'){ ?>selected="selected"<?php };?> >Vatican City State (Holy Sea)</option>
                                                        <option value="Venezuela" <?php if( isset($_POST['COUNTRY']) =='Venezuela'){ ?>selected="selected"<?php };?> >Venezuela</option>
                                                        <option value="Viet Nam" <?php if( isset($_POST['COUNTRY']) =='Viet Nam'){ ?>selected="selected"<?php };?> >Viet Nam</option>
                                                        <option value="Virgin Islands (British)" <?php if( isset($_POST['COUNTRY']) =='Virgin Islands (British)'){ ?>selected="selected"<?php };?> >Virgin Islands (British)</option>
                                                        <option value="Virgin Islands (U.S.)" <?php if( isset($_POST['COUNTRY']) =='Virgin Islands (U.S.)'){ ?>selected="selected"<?php };?> >Virgin Islands (U.S.)</option>
                                                        <option value="Wallis and Futuna Islands" <?php if( isset($_POST['COUNTRY']) =='Wallis and Futuna Islands'){ ?>selected="selected"<?php };?> >Wallis and Futuna Islands</option>
                                                        <option value="Western Sahara" <?php if( isset($_POST['COUNTRY']) =='Western Sahara'){ ?>selected="selected"<?php };?> >Western Sahara</option>
                                                        <option value="Yemen" <?php if( isset($_POST['COUNTRY']) =='Yemen'){ ?>selected="selected"<?php };?> >Yemen</option>
                                                        <option value="Yugoslavia" <?php if( isset($_POST['COUNTRY']) =='Yugoslavia'){ ?>selected="selected"<?php };?> >Yugoslavia</option>
                                                        <option value="Zaire" <?php if( isset($_POST['COUNTRY']) =='Zaire'){ ?>selected="selected"<?php };?> >Zaire</option>
                                                        <option value="Zambia" <?php if( isset($_POST['COUNTRY']) =='Zambia'){ ?>selected="selected"<?php };?> >Zambia</option>
                                                        <option value="Zimbabwe" <?php if( isset($_POST['COUNTRY']) =='Zimbabwe'){ ?>selected="selected"<?php };?> >Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="input-group input-group-sm mb-3">
                                                    <input name="address" type="text" id="address" placeholder="عنوان الشركة" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="cover-in-form">
                                    <h4 class="head-form">معلومات الشخص المسؤول عن ترشيح الموظفين</h4>
                                    <div class="cover-group p-4">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="input-group input-group-sm mb-3">
                                                    <select class="form-select" id="pr_title" name="pr_title">
                                                        <option selected>اللقب</option>
                                                        <option <?php if( isset($_POST['title'] ) =='Mr'){ ?>selected="selected"<?php };?> value="Mr">السيد</option>
                                                        <option <?php if( isset($_POST['title'] ) =='Mrs'){ ?>selected="selected"<?php };?> value="Mrs">السيدة</option>
                                                        <!-- <option <?php if( isset($_POST['title'] ) =='Ms'){ ?>selected="selected"<?php };?> value="Ms">Ms</option>
                                                        <option <?php if( isset($_POST['title'] ) =='Miss'){ ?>selected="selected"<?php };?> value="Miss">Miss</option> -->
                                                        <!-- <option <?php if( isset($_POST['title'] ) =='Dr.'){ ?>selected="selected"<?php };?> value="Dr.">Dr.</option>
                                                        <option <?php if( isset($_POST['title'] ) =='Engr.'){ ?>selected="selected"<?php };?> value="Engr.">Engr.</option>
                                                        <option <?php if( isset($_POST['title'] ) =='Sir'){ ?>selected="selected"<?php };?> value="Sir">Sir</option>
                                                        <option <?php if( isset($_POST['title'] ) =='Capt'){ ?>selected="selected"<?php };?> value="Capt.">Capt.</option>
                                                        <option <?php if( isset($_POST['title'] ) =='Col.'){ ?>selected="selected"<?php };?> value="Col.">Col.</option>
                                                        <option <?php if( isset($_POST['title'] ) =='H.E.'){ ?>selected="selected"<?php };?> value="H.E.">H.E.</option>
                                                        <option <?php if( isset($_POST['title'] ) =='H.H. Sheikh'){ ?>selected="selected"<?php };?> value="H.H. Sheikh">H.H. Sheikh</option>
                                                        <option <?php if( isset($_POST['title'] ) =='H.H. Sheikha'){ ?>selected="selected"<?php };?> value="H.H. Sheikha">H.H. Sheikha</option>
                                                        <option <?php if( isset($_POST['title'] ) =='Prof.'){ ?>selected="selected"<?php };?> value="Prof.">Prof.</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group input-group-sm mb-3">
                                                    <input name="pr_first_name" type="text" id="pr_fire" class="form-control" placeholder="الاسم">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group input-group-sm mb-3">
                                                    <input name="pr_last_name" type="text" id="pr_last_name" placeholder="الكنية (العائلة)" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group input-group-sm mb-3">
                                                    <input name="pr_position" type="text" id="pr_position" placeholder="المسمى الوظيفي" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group input-group-sm mb-3">
                                                    <input name="pr_mobile_number" type="text" id="pr_mobile_number" placeholder=" رقم الجوال (متضمن رمز الدولة)" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="input-group input-group-sm mb-3">
                                                    <input name="pr_phone_number" type="text" id="pr_phone_number" placeholder=" رقم الهاتف (يتضمن رمز البلد)" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <div class="input-group input-group-sm mb-3">
                                                    <input name="pr_email" type="email" id="pr_email" placeholder="البريد الإلكتروني" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="last-form">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="checkbox" class="form-check" name="terms" required>
                                                &nbsp;<label class="form-check-label ml-2" for="exampleCheck1"><a class="text-secondary font-weight-bold" href="<?php echo $systemUrl; ?>terms-and-conditions.html" target="_blank"> <u>أوافق على الشروط و الأحكام</u> </a></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <script src='https://www.google.com/recaptcha/api.js?hl=ar'></script>
                                            <div class="g-recaptcha" data-sitekey="6LcpZ3UUAAAAAOiPmcT-AymkCOWtW6oDZ6GwSgXF" data-callback="recaptchaCallback"></div> 
                                        </div>
                                        <div class="col-sm-6" style="display:none;" id="submit_btn">
                                            <div class="form-group mb-3">
                                                <input title="Mercury Training Center Register" type="submit" id="btnSubmit" name="Submit" value="تسجيل" class="inq-btn ps-5 pe-5">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        }
    ?>

    <?php
        include('layouts/footer.php');
    ?>
    
</body>


<script>
    $(document).on('click', '#add_delegate', function(){
        let count_participants = $('div.participant').length;
        count_participants =  parseInt(count_participants);
        let participant_number = count_participants + 1;
    
        let html = $('#new_delegate_html').val();
        html = html.replaceAll("participants[0]", 'participants['+ count_participants +']');
        html = html.replace('<div class="new_participant" data-index="0">', '<div class="participant" data-index="'+ count_participants +'">');
        html = html.replace('<h4 class="ms-4"></h4>', '<h4 class="ms-4">المشارك #'+ participant_number +' معلومات </h4>');
        $('#participants').append(html);
        $('#remove_delegate').show();
    });

    $(document).on('click', '#remove_delegate', function(){
        let count_participants = $('div.participant').length;
        count_participants = parseInt(count_participants);

        if(count_participants == 1)
        {
            $(this).hide();
            return;
        }
        else 
        {   
            let index = count_participants - 1;
            let element = '.participant[data-index="'+ index +'"]';
            $(element).remove();

            let count_after_delete = $('div.participant').length;
            if(count_after_delete == 1)
            {
                $(this).hide();
                return;
            }
        }
    });

    function recaptchaCallback(e) {
        if (e != null && e != undefined) { 
            $("#submit_btn").show();
        }
    }

</script>
