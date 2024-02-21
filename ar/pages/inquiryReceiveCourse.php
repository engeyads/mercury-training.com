
<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta name="description" content="Mercury Training Centre Inquiry Page">
        <meta name="keywords" content="Mercury Inquiry, Learning, Training, Inquiry">
        <?php include('layouts/head.php'); ?>
    </head>
<body>
    
    <?php
        include('layouts/header.php');
    ?>

<?php
    include('includes/apiFunction.php');
    $viewInquiry = 0;
    $viewRegister = 1;
    $course = $courseArray->result->courses[0];
    $courseLink = $systemUrl.$coursePage.'/'.$course->courseId.'.html';
?>
        <div class="receive">
        <div class="container">
            <div class="receive-data">
    <?php
    if(isset($_POST['firstname'])){
        $firstname = htmlspecialchars($_POST['firstname']);
    }else{
        $firstname = '';
    }
    if(isset($_POST['lastname'])){
        $lastname = htmlspecialchars($_POST['lastname']);
    }else{
        $lastname = '';
    }
    if(isset($_POST['email'])){
        $email = htmlspecialchars($_POST['email']);
    }else{
        $email = '';
    }
    if(isset($_POST['mobile'])){
        $mobile = htmlspecialchars($_POST['mobile']);
    }else{
        $mobile = '';
    }
    if(isset($_POST['comment'])){
        $comment = htmlspecialchars($_POST['comment']);
    }else{
        $comment = '';
    }

    if(isset($_POST['g-recaptcha-response']))
    $captcha=$_POST['g-recaptcha-response'];
    
    if(!$captcha)
    {
        echo '
            <div class="container">
                <div class="ok-inquiry not">
                    <i class="fas fa-times " aria-hidden="true"></i>
                    <div>
                        <h1>نأسف!</h1>
                        <h3>يرجى التحقق من نموذج captcha.</h3>
                    </div>
                </div>
            </div>
            ';
        exit;
    }
    $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcpZ3UUAAAAAFwIHWfZfVxmr3MObaGV8qxEG0M6&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
    if($response['success'] == false )
    {
        echo '
            <div class="container">
                <div class="ok-inquiry not">
                    <i class="fas fa-times " aria-hidden="true"></i>
                    <div>
                        <h1>نأسف!</h1>
                        <h3>فشل التحقق من الروبوت ، يرجى المحاولة مرة أخرى.</h3>
                    </div>
                </div>
            </div>
        ';
        exit;
    }
    else
    {
        $msg = "
                <div class=\"info-client\" style='padding: 40px;'>
                    <h3><strong>عنوان المسار: </strong>{$course->name}</h3>
                    <a href='{$courseLink}'>انقر هنا لعرض المسار على الموقع</a>
                    
                    <ul class=\"list-group list-group-flush list-lltc-receive\" style='
                    margin: 20px 0 20px;
                    
                    border-radius: 0;
                    flex-direction: column;
                    padding-left: 0'>
                        <li class=\"list-group-item\" style='
                            padding: 0.75rem 1rem;
                            color: #717171;
                            border-width: 0 0 1px;
                            position: relative;
                            display: block;
                            text-decoration: none;
                            background-color: #fff;
                            border-bottom: 1px solid rgba(0,0,0,.125);
                        '>
                            <div class=\"row\" style='
                            --bs-gutter-x: 1.5rem;
                            --bs-gutter-y: 0;
                            display: flex;
                            flex-wrap: wrap;
                            margin-top: calc(var(--bs-gutter-y) * -1);
                            margin-right: calc(var(--bs-gutter-x) * -.5);
                            margin-left: calc(var(--bs-gutter-x) * -.5);
                            '>
                                <div class=\"col-sm-3\" style='
                                    flex: 0 0 auto;
                                    width: 25%;
                                '>
                                    <span style='font-weight: bold;padding-right: 20px;'>اللقب:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                    {$firstname}
                                </span>    
                                </div>
                            </div>
                        </li>
                        <li class=\"list-group-item\" style='
                            padding: 0.75rem 1rem;
                            color: #717171;
                            border-width: 0 0 1px;
                            position: relative;
                            display: block;
                            text-decoration: none;
                            background-color: #fff;
                            border-bottom: 1px solid rgba(0,0,0,.125);
                        '>
                            <div class=\"row\" style='
                            --bs-gutter-x: 1.5rem;
                            --bs-gutter-y: 0;
                            display: flex;
                            flex-wrap: wrap;
                            margin-top: calc(var(--bs-gutter-y) * -1);
                            margin-right: calc(var(--bs-gutter-x) * -.5);
                            margin-left: calc(var(--bs-gutter-x) * -.5);
                            '>
                                <div class=\"col-sm-3\" style='
                                    flex: 0 0 auto;
                                    width: 25%;
                                '>
                                    <span style='font-weight: bold;padding-right: 20px;'>الكنية:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                    {$lastname}
                                </span>    
                                </div>
                            </div>
                        </li>
                        <li class=\"list-group-item\" style='
                            padding: 0.75rem 1rem;
                            color: #717171;
                            border-width: 0 0 1px;
                            position: relative;
                            display: block;
                            text-decoration: none;
                            background-color: #fff;
                            border-bottom: 1px solid rgba(0,0,0,.125);
                        '>
                            <div class=\"row\" style='
                            --bs-gutter-x: 1.5rem;
                            --bs-gutter-y: 0;
                            display: flex;
                            flex-wrap: wrap;
                            margin-top: calc(var(--bs-gutter-y) * -1);
                            margin-right: calc(var(--bs-gutter-x) * -.5);
                            margin-left: calc(var(--bs-gutter-x) * -.5);
                            '>
                                <div class=\"col-sm-3\" style='
                                    flex: 0 0 auto;
                                    width: 25%;
                                '>
                                    <span style='font-weight: bold;padding-right: 20px;'>بريد الالكتروني:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                    <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                        {$email}
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class=\"list-group-item\" style='
                            padding: 0.75rem 1rem;
                            color: #717171;
                            border-width: 0 0 1px;
                            position: relative;
                            display: block;
                            text-decoration: none;
                            background-color: #fff;
                            border-bottom: 1px solid rgba(0,0,0,.125);
                        '>
                            <div class=\"row\" style='
                            --bs-gutter-x: 1.5rem;
                            --bs-gutter-y: 0;
                            display: flex;
                            flex-wrap: wrap;
                            margin-top: calc(var(--bs-gutter-y) * -1);
                            margin-right: calc(var(--bs-gutter-x) * -.5);
                            margin-left: calc(var(--bs-gutter-x) * -.5);
                            '>
                                <div class=\"col-sm-3\" style='
                                    flex: 0 0 auto;
                                    width: 25%;
                                '>
                                    <span style='font-weight: bold;padding-right: 20px;'>رقم الهاتف المحمول:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                    <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                        {$mobile}
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class=\"list-group-item\" style='
                            padding: 0.75rem 1rem;
                            color: #717171;
                            border-width: 0 0 1px;
                            position: relative;
                            display: block;
                            text-decoration: none;
                            background-color: #fff;
                            border-bottom: 1px solid rgba(0,0,0,.125);
                        '>
                            <div class=\"row\" style='
                            --bs-gutter-x: 1.5rem;
                            --bs-gutter-y: 0;
                            display: flex;
                            flex-wrap: wrap;
                            margin-top: calc(var(--bs-gutter-y) * -1);
                            margin-right: calc(var(--bs-gutter-x) * -.5);
                            margin-left: calc(var(--bs-gutter-x) * -.5);
                            '>
                                <div class=\"col-sm-3\" style='
                                    flex: 0 0 auto;
                                    width: 25%;
                                '>
                                    <span style='font-weight: bold;padding-right: 20px;'>تعليقات:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                    <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                        {$comment}
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>";
                // $message = $msgTop.$msg.'<br />IP: '.$_SERVER['REMOTE_ADDR'];
                $message = $msg.'<br />IP: '.$_SERVER['REMOTE_ADDR'];
                $subject = "Inquiry Form: mercury-training.com ($firstname)";
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $headers .= "To: mercury-training.com   <$websiteEmail>" . "\r\n";
                $headers .= "From: $subject <$websiteEmail >" . "\r\n";
                ?><div class="receive-msg">
            <?php
                if($islocal == 0 and (mail($websiteEmail, $subject, $message, $headers))){
                    ?>
                    <div class="container">
                        <div class="ok-inquiry ">
                            <i class="fa fa-check " aria-hidden="true"></i>
                            <div>
                                <h1>شكراً لك</h1>
                                <h3>تم إرسال الاستعلام بنجاح</h3>
                            </div>
                        </div>
                    </div>
            </div>
            <?php
                }else{
                    ?>
                    <div class="container">
                        <div class="ok-inquiry not">
                            <i class="fas fa-times " aria-hidden="true"></i>
                            <div>
                                <h1>نأسف!</h1>
                                <h3>لم يتم تقديم الاستعلام بنجاح</h3>
                            </div>
                        </div>
                    </div>
            <?php
                }

                $leed_source = "ai";

                //----------------------------------------------------------------------------------------------------
                // Variables or form data
                //----------------------------------------------------------------------------------------------------
                $full_name= null;
                $firstname = htmlspecialchars($_POST["firstname"]) ;
                $lastname = htmlspecialchars($_POST["lastname"]) ;
                $phone = htmlspecialchars($_POST['mobile']) ;
                $email = htmlspecialchars($_POST["email"]) ;
                $note = htmlspecialchars($_POST["comment"]) ;
                // $client_contact_preference = htmlspecialchars($_POST["preference"]) ;
                $ip = htmlspecialchars($_SERVER['REMOTE_ADDR']);
                $fields = [		
                    "website_code" => $website_code,
                    "leed_source" => $leed_source,
                    "course_name" => $course->name,
                    "note" => $note,
                    "participants" => [
                        [
                            "is_responsible" => 0,
                            "client_title" => null,
                            "job_title" => null,
                            "first_name"=> $firstname,
                            "last_name"=> $lastname,
                            "full_name" => null,
                            "client_company_name"=> "",
                            "client_city"=> "",
                            "client_country"=> "",
                            "client_address"=> "",
                            "reference" =>"",
                            "fax"=> "",
                            "ip" => $ip,
                            "phones"=>[],
                            "mobiles"=>[$phone],
                            "emails"=>[$email],
                            "cc" => [],
                            "whatsapp_approval" => '',
                            "full_name_in_certificate" => "",
                            "contact_preference" => ''
                        ]
                        
                    ],
                    "leed_extra_columns" => [
                        "payment_method" => ""
                    ]
                ];

                $fields = json_encode($fields);
                //----------------------------------------------------------------------------------------------------
                // Set Curl data
                //----------------------------------------------------------------------------------------------------

                $access_token = authenticateAPIUser($bookingApiUsername, $bookingApiPassword ,$bookingUrl);

                if(isset($access_token) && $access_token != "" && $access_token != null)
                {
                    $message = createInquiry($access_token, $fields, $bookingUrl);
                }else
                {
                    sendMail("لم تقدم API أي مفتاح من جانب الحجز. <br/>", $fields, $websiteEmail, $websiteEmail);
                }
            ?>
            </div>
            </div>
        </div>
    </div>
        <?php
        }
    // }
    ?>

<?php
    include('layouts/footer.php');
    ?>

<script src='https://www.google.com/recaptcha/api.js'></script>
</body>