<!DOCTYPE html>
<html lang="ar">
    <head>
        <?php
            $course = $courseArray->result->courses[0] ?? null;
            
            if($course == null) {
                include('404/index.php');exit;
            }
        ?>
        <meta name="description" content="<?php echo $course->description != '' ? $course->description : "مسار $course->name"; ?>">
        <meta name="keywords" content="<?php echo !empty(($course->keyword!='' ? json_decode($course->keyword) : ''))  ?  implode(', ',json_decode($course->keyword)) : "مسار $course->name"; ?>">
        <meta property="og:title" content="<?php echo $course->title != '' ? $course->title : "مسار $course->name"; ?>">
        <meta property="og:locale" content="en-SA">
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?php echo $course->description != '' ? $course->description : "مسار $course->name"; ?>">
        <meta property="og:url" content="<?php echo $systemUrl.$coursePage.'/'.$course->courseId.'.html'; ?>">
        <meta property="og:site_name" content="<?php echo $centerName; ?>">
        <link rel="canonical" href="<?php echo $systemUrl.$coursePage.'/'.$course->courseId.'.html'; ?>"/>
        <?php include('layouts/head.php'); ?>
    </head>
<body itemscope itemtype="https://schema.org/Course">
    <?php
        include('layouts/header.php');
        if (isset($courseArray->result->courses) && (count($courseArray->result->courses) == 1)) {
        $course = $courseArray->result->courses[0];
    ?>
    <div class="cat-header-section category-content">
        <div class="container">
            <div class="cat-header">
                <div class="row">
                    <div class="col-md-10">
                    <?php
                        breadCrumbs($course->name,'',$course->name);
                        echo showBreadCrumbs ();
                    ?>
                    </div>
                    <div class="col-md-3 py-4 py-lg-0 py-md-0">
                        <a href="#" onclick="window.print();" class="print-page no-print"> <i class="fa fa-print fa"></i>&nbsp;طباعة</a>
                        <a title="<?php echo $centerName; ?> البروشور" class="print-page no-print" href="<?php echo $systemUrl; ?>pdfb/index2.php?id=<?php echo $course->courseId; ?>"> <i class="fa fa-file-pdf fa"></i>&nbsp;البروشور</a>
                    </div>
                    <div class="col-md-12">
                        <h2 class="title-color"><?php echo $course->categoryName; ?></h2>
                        <br clear="all">
                        <h1 class="categroy-title pull-left" itemprop="name" title="<?php echo $centerName . ' ' . $course->name; ?>"><?php echo $course->name; ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="course-content">
        <div class="container">
            <div class="row">
                <div class="course-main-content col-sm-12 col-md-12">
                    <div class="course-details">
                        <div class="course-intro pt-5" itemprop="description">
                            <?php echo $course->overview; ?>
                        </div>
                    </div>
                    <hr>
                    <div id="all-dates-and-locations" class="events-list p-3">
                    <?php
                       $eventsArray =  $course->events;//new CallAPIv3($scope = 'resource=events&limit=20&with_price=true&with_category=true&order=date1&courseId='.$course->courseId,$method = 'GET');
                       // print_r($eventsArray);
                       if (isset($eventsArray) && (count($eventsArray) > 0)) {
                           foreach ($eventsArray as $value) {
                                // $startDate = date_create($value->startDate);
                                // $endDate = date_create($value->endDate);
                                $dates = generateEventFormatedDate($value->startDate,$value->endDate, 'ar');
                    ?>
                        <a title="<?php echo "$value->name - $value->city - $dates #".$course->courseId."_".$value->id; ?>" href="<?php echo $systemUrl.$eventPage.'/'.$value->id.'.html'; ?>" class="list-group-inner">
                            <div class="row">
                                <div class="col-sm-4">
                                    <i class="fa fa-globe" aria-hidden="true"></i>
                                    <span><?php echo $value->city; ?></span>
                                </div>
                                <div class="col-sm-4">
                                    <i class="far fa-calendar" aria-hidden="true"></i>
                                    <span>
                                        <?php echo $dates; ?>                                                        
                                    </span>
                                </div>
                                <div class="col-sm-4">
                                    <span><?php echo $value->price . ' ' . $value->currency; ?></span>
                                </div>
                            </div>
                        </a>
                    <?php
                            }
                        }
                    ?>
                    </div>
                    <!-- Inqury if added -->
                    
                    <div>
                        <div class="inq-header no-print">
                            <div class="cat-header">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h2 class="categroy-title"><?php echo $course->categoryName; ?>
                                            <br/>
                                            <?php echo $course->name; ?> (<?php echo $course->code; ?>)</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="inq-content no-print" id="inq-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="p-3">
                                            <?php 
                                                $senEventID = $course->courseId;
                                                $inquiryType = "course";
                                                include('inquiry.php');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <?php
        }
        include('layouts/footer.php');
    ?>
</body>
<script>
    function goToInquiry() {
        $([document.documentElement, document.body]).animate({
            scrollTop: $("#inq-content").offset().top
        }, 500);
    }
</script>