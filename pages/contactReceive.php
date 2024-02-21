<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="Mercury Training Centre Contact Receive Page">
        <meta name="keywords" content="Mercury Contact Receive, Learning, Training, Contact Receive">
        <?php include('layouts/head.php'); ?>
    </head>
<body>
    
    <?php
        include('layouts/header.php');
        include('includes/apiFunction.php');
    ?>

    <div class="receive">
        <div class="container">
            <div class="receive-data">
            <?php
            if(isset($_POST['first_name'])){
                $first_name = htmlspecialchars($_POST['first_name']);
            }else{
                $first_name = '';
            }
            if(isset($_POST['last_name'])){
                $last_name = htmlspecialchars($_POST['last_name']);
            }else{
                $last_name = '';
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
            if(isset($_POST['note'])){
                $note = htmlspecialchars($_POST['note']);
            }else{
                $note = '';
            }
            if(isset($_POST['g-recaptcha-response']))
            $captcha=$_POST['g-recaptcha-response'];
            if(!$captcha){
            echo '
                <div class="container">
                    <div class="ok-inquiry not">
                        <i class="fas fa-times " aria-hidden="true"></i>
                        <div>
                            <h1>Sorry!</h1>
                            <h3>Please check the the captcha form.</h3>
                        </div>
                    </div>
                </div>
                    ';
                exit;
            }
            if($islocal){
                $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
            }else{
                $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcpZ3UUAAAAAFwIHWfZfVxmr3MObaGV8qxEG0M6&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
            }
            if($response['success'] == false )
            {
            echo '
                <div class="container">
                    <div class="ok-inquiry not">
                        <i class="fas fa-times " aria-hidden="true"></i>
                        <div>
                            <h1>Sorry!</h1>
                            <h3>Robot verification failed, please try again.</h3>
                        </div>
                    </div>
                </div>
            ';
            exit;
            }else{
        
            $msg = "
                <div class=\"info-client\" style='padding: 40px;'>
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
                                    <span style='font-weight: bold;padding-right: 20px;'>First name:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                    {$first_name}
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
                                    <span style='font-weight: bold;padding-right: 20px;'>Last name:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                    {$last_name}
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
                                    <span style='font-weight: bold;padding-right: 20px;'>Email address:</span>
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
                                    <span style='font-weight: bold;padding-right: 20px;'>Mobile number:</span>
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
                                    <span style='font-weight: bold;padding-right: 20px;'>Comments:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                    <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                        {$note}
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>";
                $message = $msg.'<br />IP: '.$_SERVER['REMOTE_ADDR'];

                $subject = "Contact us Form: mercury-training.com  ($first_name)";
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $headers .= "To: mercury-training.com   <$websiteEmail>" . "\r\n";
                $headers .= "From: $subject <$websiteEmail  >" . "\r\n";
                ?><div class="receive-msg">
            <?php
            if($islocal == 0){
                if((mail($websiteEmail, $subject, $message, $headers))){
                    ?>                    
                    <div class="container">
                        <div class="ok-inquiry ">
                            <i class="fa fa-check " aria-hidden="true"></i>
                            <div>
                                <h1>Thank you</h1>
                                <h3>Your message has been received, we will contact you as soon as possible.</h3>
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
                                <h1>Sorry!</h1>
                                <h3>Your message has not been received. Please try again later.</h3>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }else{
                ?>                    
                    <div class="container">
                        <div class="ok-inquiry ">
                            <i class="fa fa-check " aria-hidden="true"></i>
                            <div>
                                <h1>Thank you</h1>
                                <h3>Your message has been received, we will contact you as soon as possible. (this message is for test reason and it is not sent to the email!)</h3>
                            </div>
                        </div>
                        <div>
                            <h3>here is the message that is being sent when you go live (in production)</h3>
                        </div>
                    </div>
                    <pre>
                        <?php
                            echo $message;
                        ?>
                    </pre>
                </div>
            <?php
            }

                $leed_source = "cf";

                //----------------------------------------------------------------------------------------------------
                // Variables or form data
                //----------------------------------------------------------------------------------------------------

                $full_name= null;
                $first_name = htmlspecialchars($_POST["first_name"]) ;
                $last_name = htmlspecialchars($_POST["last_name"]) ;
                $phone = htmlspecialchars($_POST['mobile']) ;
                $email = htmlspecialchars($_POST["email"]) ;
                $note = htmlspecialchars($_POST["note"]) ;
                // $client_contact_preference = htmlspecialchars($_POST["preference"]) ;
                $ip = htmlspecialchars($_SERVER['REMOTE_ADDR']);

                $fields = [		
                    "website_code" => $website_code,
                    "leed_source" => $leed_source,
                    "event_id" => '',
                    "note" => $note,
                    "participants" => [
                        [
                            "is_responsible" => 0,
                            "client_title" => null,
                            "job_title" => null,
                            "first_name"=> $first_name,
                            "last_name"=> $last_name,
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
                    sendMail("API didn't provide any key from booking side. <br/>", $fields, $websiteEmail, $websiteEmail);
                }
            ?>
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

<script src='https://www.google.com/recaptcha/api.js'></script>
</body>