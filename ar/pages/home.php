<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta name="description" content="<?php echo $centerName; ?> الصفحة الرئيسية">
        <meta name="keywords" content="Mercury Main, Learning, Training, Home">
        <meta property="og:title" content="<?php echo $centerName; ?>">
        <meta property="og:locale" content="en-SA">
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?php echo $centerName; ?> الصفحة الرئيسية">
        <meta property="og:url" content="<?php echo $systemUrl; ?>">
        <meta property="og:site_name" content="<?php echo $centerName; ?>">
        <?php include('layouts/head.php'); ?>
    </head>
<body itemscope itemtype="https://schema.org/WebPage">
    <?php include('layouts/header.php'); ?>
    <div class="main-content">
        <?php print_r($page1); ?>
        <div class="container">
            <h1 itemprop="name" class="content-title col-xs-12 col-sm-12 d-flex justify-content-center justify-content-md-start" title="<?php echo $centerName; ?>">دورات المركز</h1>
            <?php
                include('pages/home/homeCategory.php');
            ?>
        </div>
    </div>
    <?php
        $upcomingLimit = 12;
        $addTosearch = '&upcoming=true&withSearchItem=true';
        $eventsArray = new CallAPIv3($scope = 'resource=events&limit='.$upcomingLimit.'&with_category=true'.$addTosearch,$method = 'GET');
        if (isset($eventsArray->result->events) && (count($eventsArray->result->events) > 0)) {
    ?>
        <div class="upcoming-section">
            <div class="container">
                <div class="upcoming-courses-div">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 title="<?php echo $centerName . ' Upcoming Courses'; ?>" class="upcoming-title col-xs-12 col-sm-12 d-flex justify-content-center">الدورات المؤكدة</h2>
                            <?php
                                include('pages/home/homeUpcoming.php');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        }
        include('home/homeFacts.php');
        include('home/homeAccreditation.php');
        include('layouts/footer.php');
    ?>
</body>