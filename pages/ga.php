
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="About <?php echo $centerName; ?> Center">
        <meta name="keywords" content="Mercury About, Learning, Training, About">
        <meta property="og:title" content="About <?php echo $centerName; ?>">
        <meta property="og:locale" content="en-SA">
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?php echo $centerName; ?> Center About Page">
        <meta property="og:url" content="<?php echo $systemUrl; ?>about.html">
        <meta property="og:site_name" content="<?php echo $centerName; ?>">
        <?php include('layouts/head.php'); ?>
    </head>
<body itemscope itemtype="https://schema.org/WebPage">
    
    <?php
        include('layouts/header.php');
    ?>

    <?php

        // require("class.gaparse.php");

        // var_dump($_SERVER['HTTP_REFERER']);

        if(isset($_SERVER['HTTP_REFERER'])) {
            echo $_SERVER['HTTP_REFERER'];
        }

        $aux = new GA_Parse($_COOKIE);

        echo "Campaign source: ".$aux->campaign_source."<br />";  
        echo "Campaign name: ".$aux->campaign_name."<br />";
        echo "Campaign medium: ".$aux->campaign_medium."<br />";
        echo "Campaign content: ".$aux->campaign_content."<br />";
        echo "Campaign term: ".$aux->campaign_term."<br />";
            
        echo "Date of first visit: ".$aux->first_visit."<br />";
        echo "Date of previous visit: ".$aux->previous_visit."<br />";
        echo "Date of current visit: ".$aux->current_visit_started."<br />";
        echo "Times visited: ".$aux->times_visited."<br />";
        echo "Pages viewed current visit: ".$aux->pages_viewed."<br />";
        echo "IP Address: ".$aux->ip_address."<br />";
    ?>

    <?php
        include('layouts/footer.php');
    ?>

    <script>
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-279423-28']); //279423-28
        _gaq.push(['_trackPageview']);
        _gaq.push(['_trackPageLoadTime']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>

</body>
