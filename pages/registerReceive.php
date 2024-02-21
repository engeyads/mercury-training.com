
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="Mercury Training Centre Register Receive Page">
        <meta name="keywords" content="Mercury Register Receive, Learning, Training, Register Receive">
        <?php include('layouts/head.php'); ?>
    </head>
<body>
    
    <?php
        include('layouts/header.php');
        include('includes/apiFunction.php');
    ?>

    <?php
        $viewInquiry = 0;
        $viewRegister = 1;
        //$event_id = $page3;
        if (isset($eventsArray->result->events) && (count($eventsArray->result->events) ==1)) {
            $event = $eventsArray->result->events[0];
            $event_id = $event->id;
            $eventDate = generateEventFormatedDate($event->startDate, $event->endDate);
            $eventLink = $systemUrl.$eventPage.'/'.$event->id.'.html';
    ?>

        <!-- <div class="slide-up-inner">
            <div class="bg-image">
                <img src="<?php
                        // $imgLink = 'assets/images/course-slider/';
                        // $filename = $imgLink.$event->code.'.jpg';
                        // if (file_exists($filename)) {
                        //     echo $systemUrl.$imgLink.$event->code;?>.jpg<?php
                        // } else {
                        //     echo $systemUrl.$imgLink.'avatar'; ?>.jpg<?php
                        // }
                        ?>" alt="<?php echo $centerName; ?>">
            </div>
            <div class="big_titles2">
                <div class="container">
                    <div class="row">
                        <?php //include('include/eventTop.php');?>
                    </div>
                </div>
            </div>
        </div> -->


        <div class="receive">
            <div class="container">
                <div class="receive-data">
                <?php

                $participants = $_POST['participants'];

                if(isset($participants[0]['title'])){
                    $title = htmlspecialchars($participants[0]['title']);
                }else{
                    $title = '';
                }
                if(isset($participants[0]['first_name'])){
                    $first_name = htmlspecialchars($participants[0]['first_name']);
                }else{
                    $first_name = '';
                }
                if(isset($participants[0]['last_name'])){
                    $last_name = htmlspecialchars($participants[0]['last_name']);
                }else{
                    $last_name = '';
                }
                if(isset($participants[0]['position'])){
                    $position = htmlspecialchars($participants[0]['position']);
                }else{
                    $position = '';
                }
                if(isset($participants[0]['phone_number'])){
                    $phone_number = htmlspecialchars($participants[0]['phone_number']);
                }else{
                    $phone_number = '';
                }
                if(isset($participants[0]['mobile_number'])){
                    $mobile_number = htmlspecialchars($participants[0]['mobile_number']);
                }else{
                    $mobile_number = '';
                }
                if(isset($participants[0]['fax_number'])){
                    $fax_number = htmlspecialchars($participants[0]['fax_number']);
                }else{
                    $fax_number = '';
                }
                if(isset($participants[0]['email'])){
                    $email = htmlspecialchars($participants[0]['email']);
                }else{
                    $email = '';
                }
                if(isset($participants[0]['cc'])){
                    $cc = htmlspecialchars($participants[0]['cc']);
                }else{
                    $cc = '';
                }

                if(isset($_POST['company'])){
                    $company = htmlspecialchars($_POST['company']);
                }else{
                    $company = '';
                }
                if(isset($_POST['country'])){
                    $country = htmlspecialchars($_POST['country']);
                }else{
                    $country = '';
                }
                if(isset($_POST['city'])){
                    $city = htmlspecialchars($_POST['city']);
                }else{
                    $city = '';
                }
                if(isset($_POST['address'])){
                    $address = htmlspecialchars($_POST['address']);
                }else{
                    $address = '';
                }

                if(isset($_POST['pr_title'])){
                    $pr_title = htmlspecialchars($_POST['pr_title']);
                }else{
                    $pr_title = '';
                }
                if(isset($_POST['pr_first_name'])){
                    $pr_first_name = htmlspecialchars($_POST['pr_first_name']);
                }else{
                    $pr_first_name = '';
                }
                if(isset($_POST['pr_last_name'])){
                    $pr_last_name = htmlspecialchars($_POST['pr_last_name']);
                }else{
                    $pr_last_name = '';
                }
                if(isset($_POST['pr_position'])){
                    $pr_position = htmlspecialchars($_POST['pr_position']);
                }else{
                    $pr_position = '';
                }
                if(isset($_POST['pr_phone_number'])){
                    $pr_phone_number = htmlspecialchars($_POST['pr_phone_number']);
                }else{
                    $pr_phone_number = '';
                }
                if(isset($_POST['pr_mobile_number'])){
                    $pr_mobile_number = htmlspecialchars($_POST['pr_mobile_number']);
                }else{
                    $pr_mobile_number = '';
                }
                if(isset($_POST['pr_email'])){
                    $pr_email = htmlspecialchars($_POST['pr_email']);
                }else{
                    $pr_email = '';
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
                $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcpZ3UUAAAAAFwIHWfZfVxmr3MObaGV8qxEG0M6&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
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

                ?>
                <?php $msg = "
                <div class=\"info-client\" style='padding: 40px;'>
                    <h3><strong>Event Title: </strong>{$event->name}</h3>
                    <p><strong>Date: </strong>{$eventDate}></p>
                    <p><strong>Location: </strong>{$event->city}></p>
                    <a href='{$eventLink}'>Click here to view the event on website</a>
                
                    <h4>Delegate Information</h4>
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
                                    <span style='font-weight: bold;padding-right: 20px;'>title:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                    {$title}
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
                                    <span style='font-weight: bold;padding-right: 20px;'>First Name:</span>
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
                                    <span style='font-weight: bold;padding-right: 20px;'>Job Title:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                    <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                        {$position}
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
                                    <span style='font-weight: bold;padding-right: 20px;'>Phone number:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                    <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                        {$phone_number}
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
                                        {$mobile_number}
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
                                        {$fax_number}
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
                                    <span style='font-weight: bold;padding-right: 20px;'>Email address:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                    <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                        {$cc}
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <h4>Company Information</h4>
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
                                    <span style='font-weight: bold;padding-right: 20px;'>Company Name:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                    {$company}
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
                                    <span style='font-weight: bold;padding-right: 20px;'>country Name:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                    {$country}
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
                                    <span style='font-weight: bold;padding-right: 20px;'>City:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                    <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                        {$city}
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
                                    <span style='font-weight: bold;padding-right: 20px;'>Company Address:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                    <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                        {$address}
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <h4>Person Responsible for Training and Development</h4>
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
                                    <span style='font-weight: bold;padding-right: 20px;'>Title:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                    {$pr_title}
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
                                    <span style='font-weight: bold;padding-right: 20px;'>First Name:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                    {$pr_first_name}
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
                                        {$pr_last_name}
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
                                    <span style='font-weight: bold;padding-right: 20px;'>Position:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                    <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                        {$pr_position}
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
                                    <span style='font-weight: bold;padding-right: 20px;'>Phone number:</span>
                                </div>
                                <div class=\"col-sm-8\" style='
                                    flex: 0 0 auto;
                                    width: 66.66666667%;
                                '>
                                    <span class=\"data\" style='    font-weight: bold;padding-right: 20px;'>
                                        {$pr_phone_number}
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
                                        {$pr_mobile_number}
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
                                        {$pr_email}
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>";

                // $message = $msgTop.$msg.'<br />IP: '.$_SERVER['REMOTE_ADDR'];
                $message = $msg.'<br />IP: '.$_SERVER['REMOTE_ADDR'];
                $subject = "Register Form: mercury-training.com  ($first_name)";
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $headers .= "To: mercury-training.com   <$websiteEmail>" . "\r\n";
                $headers .= "From: $subject <$websiteEmail  >" . "\r\n";
                ?>
                <!-- <div class="receive-msg"> -->
                <!-- <?php
                if($islocal == 0 && (mail($websiteEmail, $subject, $message, $headers))){
                    ?><div class="msg-success">
                    <div class="cover-msg">
                        <div class="img-icon">
                            <i class="far fa-check-circle"></i>
                        </div>
                        <div class="info-msg">
                            <h2>Thank you your</h2>
                            <h4>Registration has been received</h4>
                        </div>
                    </div>
                
            </div><?php
                }else{
                    ?><div class="msg-false bg-danger">
                    <div class="cover-msg">
                        <div class="img-icon">
                            <i class="far fa-check-circle"></i>
                        </div>
                        <div class="info-msg">
                            <h2>Sorry !!</h2>
                            <h4>Registration has been not received</h4>
                        </div>
                    </div>
                
            </div><?php
                }
            ?> -->
            <!-- </div> -->
            <!-- <?php echo $msg; ?> -->


            <div class="container p-4">
                <div class="card mx-auto" style="max-width:800px;">
                    <div class="card-body shadow">
                        <div class="p-3" style="color:#333;">
                            <h4 style="font-size:18px;">Register: <?php echo $event->categoryName ?></h4>
                            <h3 style="font-size:24px;"> <?php echo $event->name ?> (<?php echo $event->code ?>_<?php echo $event->id ?> )</h3>
                        </div>
                        <hr>
                        <table class="table table-striped equal-td">
                            <thead>
                                <tr>
                                    <th colspan="2">
                                        <h4 class="mercury-color">Delegate Information</h4>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>TITLE</td>
                                    <td><?php echo $title; ?></td>
                                </tr>

                                <tr>
                                    <td>FIRST NAME</td>
                                    <td><?php echo $first_name; ?></td>
                                </tr>

                                <tr>
                                    <td>SURNAME</td>
                                    <td><?php echo $last_name; ?></td>
                                </tr>

                                <tr>
                                    <td>POSITION</td>
                                    <td><?php echo $position; ?></td>
                                </tr>

                                <tr>
                                    <td>PHONE NUMBER (include country)</td>
                                    <td><?php echo $phone_number; ?></td>
                                </tr>

                                <tr>
                                    <td>MOBILE NUMBER (include country)</td>
                                    <td><?php echo $mobile_number; ?></td>
                                </tr>

                                <tr>
                                    <td>FAX NUMBER (include country)</td>
                                    <td><?php echo $fax_number; ?></td>
                                </tr>

                                <tr>
                                    <td>E-MAIL</td>
                                    <td><?php echo $email; ?></td>
                                </tr>
                                <tr>
                                    <td>PERSONAL E-MAIL</td>
                                    <td><?php echo $cc; ?></td>
                                </tr>
                            </tbody>
                            
                            <thead>
                                <tr>
                                    <th colspan="2">
                                        <h4 class="mercury-color pt-3">Company Information</h4>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>COMPANY NAME</td>
                                    <td><?php echo $company; ?></td>
                                </tr>

                                <tr>
                                    <td>CITY</td>
                                    <td><?php echo $city; ?></td>
                                </tr>

                                <tr>
                                    <td>COMPANY ADDRESS</td>
                                    <td><?php echo $address; ?></td>
                                </tr>

                                <tr>
                                    <td>COUNTRY</td>
                                    <td><?php echo $country; ?></td>
                                </tr>
                            </tbody>
                            
                            <thead>
                                <tr>
                                    <th colspan="2">
                                        <h4 class="mercury-color pt-3">Person Responsible for Training and Development</h4>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>TITLE</td>
                                    <td><?php echo $pr_title; ?></td>
                                </tr>

                                <tr>
                                    <td>FIRST NAME</td>
                                    <td><?php echo $pr_first_name; ?></td>
                                </tr>

                                <tr>
                                    <td>SURNAME</td>
                                    <td><?php echo $pr_last_name; ?></td>
                                </tr>

                                <tr>
                                    <td>POSITION</td>
                                    <td><?php echo $pr_position; ?></td>
                                </tr>

                                <tr>
                                    <td>PHONE NUMBER (include country)</td>
                                    <td><?php echo $pr_phone_number; ?></td>
                                </tr>

                                <tr>
                                    <td>MOBILE NUMBER (include country)</td>
                                    <td><?php echo $pr_mobile_number; ?></td>
                                </tr>

                                <tr>
                                    <td>E-MAIL (include country)</td>
                                    <td><?php echo $pr_email; ?></td>
                                </tr>

                            </tbody>

                        </table>

                        <?php
                            if($islocal == 0 && (mail($websiteEmail, $subject, $message, $headers) )){
                        ?>
                            <h1 style="text-align:center; font-size: 16px;" class="alert alert-success">
                                Your booking has been sent successfully. We will sent you a confirmation ASAP. Thank you.
                            </h1>
                        <?php
                            }else{?>
                                <h1 style="text-align:center; font-size: 16px;" class="alert alert-danger">
                                    Your booking has not been sent successfully.
                                </h1>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>


        <?php

                    // Start API
                    $leed_source = "bf";
                
                    //----------------------------------------------------------------------------------------------------
                    // Variables or form data
                    //----------------------------------------------------------------------------------------------------
        
                    $ip = htmlspecialchars($_SERVER['REMOTE_ADDR']);

                    $b_participants = [];

                    foreach ($participants as $participant) {
                        array_push($b_participants, [
                            "is_responsible" => 0,
                            "client_title" => $participant['title'],
                            "job_title" => $participant['position'],
                            "first_name"=> $participant['first_name'],
                            "last_name"=> $participant['last_name'],
                            "full_name" => null,
                            "client_company_name"=> $company,
                            "client_city"=> $city,
                            "client_country"=> $country,
                            "client_address"=> $address,
                            "reference" =>"",
                            // "fax"=> $participant['fax_number'],
                            "ip" => $ip,
                            "phones"=>[$participant['phone_number']],
                            "mobiles"=>[$participant['mobile_number']],
                            "emails"=>[$participant['email']],
                            "cc" => [$participant['cc']],
                            "whatsapp_approval" => '',
                            "full_name_in_certificate" => "",
                            "contact_preference" => ''
                        ]);
                    }

                    if ($pr_title != '' || $pr_position != '' || $pr_first_name != '' || $pr_last_name != ''
                            || $pr_phone_number != '' || $pr_mobile_number != '' || $pr_email != '') 
                    {
                        array_push($b_participants, [
                            "is_responsible" => 1,
                            "client_title" => $pr_title,
                            "job_title" => $pr_position,
                            "first_name"=> $pr_first_name,
                            "last_name"=> $pr_last_name,
                            "full_name" => null,
                            "client_company_name"=> $company,
                            "client_city"=> $city,
                            "client_country"=> $country,
                            "client_address"=> $address,
                            "reference" =>"",
                            "fax"=> "",
                            "ip" => $ip,
                            "phones"=>[$pr_phone_number],
                            "mobiles"=>[$pr_mobile_number],
                            "emails"=>[$pr_email],
                            "cc" => [],
                            "whatsapp_approval" => '',
                            "full_name_in_certificate" => "",
                            "contact_preference" => ''
                        ]);
                    }

                    $fields = [		
                        "website_code" => $website_code,
                        "leed_source" => $leed_source,
                        "event_id" => $event_id,
                        "note" => $message,
                        "participants" => $b_participants,
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
        
                    // End API
        }
    // }
    ?>  

    <?php
        }
    include('layouts/footer.php');
    ?>

<script src='https://www.google.com/recaptcha/api.js'></script>
</body>

