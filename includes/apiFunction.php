<?php
function createInquiry($access_token, $fields, $url)
{
    $inquiry_url = $url. '/api/v2/create-inquiry';
    $headers = array(
        "Content-Type: application/json",
        "Accept: application/json",
        "Accept-Encoding: utf-8",
        "Authorization: Bearer " . $access_token,
    );
    //open connection
    $ch = curl_init();
    //set options 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_URL, $inquiry_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //execute post
    $result = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    //close connection
    curl_close($ch);

    if($http_code == 200)
    {
        return "Inquiry Successfully Created!";
    }
    else
    {
        $message = sendMail($result, $fields);

        if(!is_null($message))
        {
            return $message;
        }
    }
}

function authenticateAPIUser($apiUsername, $apiPassword, $url)
{
    $login_url = $url . '/api/login';

    $fields = [
        'email' => $apiUsername,
        'password' => $apiPassword,
    ];

    $fields = json_encode($fields);

    $headers = array(
        "Content-Type: application/json",
        "Accept: application/json",
        "Accept-Encoding: utf-8",
    );

    //open connection
    $ch = curl_init();
    //set options 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_URL, $login_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //execute post
    $result = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    //close connection
    curl_close($ch);

    if($http_code == 200)
    {
        $result = json_decode($result);
        return $result->access_token;
    }
    else
    {
        return null;
    }
}

function sendMail($result, $data, $to, $from)
{
    try
    {
        $subject = 'API Inquiry Error!';

        $message = $result . "/" . $data;
        
        $headers = array(
            'From' => $from,
            'Reply-To' => $from,
            'X-Mailer' => 'PHP/' . phpversion()
        );
        
        $success = mail($to, $subject, $message, $headers);

        if (!$success) {
            return "Email has not been sent, please try again later.";
        } else {
            return null;
        }
    }
    catch(Exception $e)
    {
        return "SMTP Email connection error!";
    }
}

?>