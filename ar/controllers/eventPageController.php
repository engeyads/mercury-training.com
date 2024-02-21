<?php
    breadCrumbs("البرامج","public-courses.html","البرامج");
    if($page4 == 'register.html'){
        $thePage = 'pages/register.php';
    }elseif($page3 !=''){
        $thePage = 'pages/eventView.php';
    }elseif($page2 !=''){
        $thePage = 'pages/events.php';
    }else{
        $thePage = 'pages/courses.php';
    }
?>