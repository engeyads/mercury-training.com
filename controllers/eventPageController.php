<?php
    breadCrumbs("Training Courses","public-courses.html","Training Courses");
    if($page3 == 'register.html'){
        $thePage = 'pages/register.php';
    }elseif($page2 !=''){
        $thePage = 'pages/eventView.php';
    }elseif($page1 !=''){
        $thePage = 'pages/events.php';
    }else{
        $thePage = 'pages/courses.php';
    }
?>