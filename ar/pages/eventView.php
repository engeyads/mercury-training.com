
<!DOCTYPE html>
<html lang="ar">
    <head>
        <?php
            // if (isset($eventsArray->result->events) && (count($eventsArray->result->events) ==1)) {
            $event = $eventsArray->result->events[0] ?? null;
            if($event == null) {
                include('404/index.php');exit;
            }
            $date = date_create($event->startDate);
            // }
        ?>
        <meta name="description" content="<?php echo $centerName; ?> <?php echo $event->name . ' حدث, ' . date_format($date,"d.M.Y")?>">
        <meta name="keywords" content="<?php echo $event->name . ' حدث' ?>">
        <meta property="og:title" content="<?php echo $event->name . ' حدث' ?>">
        <meta property="og:locale" content="en-SA">
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?php echo $centerName; ?> <?php echo $event->name . ' حدث, ' . date_format($date,"d.M.Y")?>">
        <meta property="og:url" content="<?php echo $systemUrl.$eventPage.'/'.$event->id.'.html'; ?>">
        <meta property="og:site_name" content="<?php echo $centerName; ?>">
        <link rel="canonical" href="<?php echo $systemUrl.'c/'.$event->courseId.'.html'; ?>"/>
        <?php include('layouts/head.php'); ?>
    </head>
<body itemscope itemtype="https://schema.org/Event">
    
    <?php
        include('layouts/header.php');
    ?>

    <?php
        if (isset($eventsArray->result->events) && (count($eventsArray->result->events) ==1)) {
        $event = $eventsArray->result->events[0];
        $startDate = date_create($event->startDate);
        $endDate = date_create($event->endDate);
    ?>
    <div class="cat-header-section">
        <div class="container">
            <div class="cat-header">
                <div class="row">
                    <div class="col-lg-9 col-md-8">
                        <?php
                            breadCrumbs($event->id,'p/'.$event->id.'.html',$event->id);
                            echo showBreadCrumbs ();
                        ?>
                    </div>
                    <div class="col-md-4 col-lg-3 py-4 py-lg-0 py-md-0 d-flex justify-content-center d-md-inline-block justify-content-md-start">
                        <a href="#" onclick="window.print();" class="print-page mx-1 m-md-0 p-3 p-md-1 no-print"> <i class="fa fa-print fa"></i>&nbsp;طباعة</a>
                        <a title="<?php echo $centerName; ?> البروشور" class="print-page mx-1 m-md-0 p-3 p-md-1 no-print" href="<?php echo $event->pdf_url; ?>"> <i class="fa fa-file-pdf fa"></i>&nbsp;البروشور</a>
                    </div>
                    <div class="col-md-12 py-4">
                        <h2 class="title-color text-center text-md-end"><?php echo $event->categoryName; ?></h2>
                        <br clear="all">
                        <h1 class="categroy-title pull-left text-center text-md-end" itemprop="name" title="<?php echo $centerName . ' ' . $event->name; ?>">
                            <?php echo $event->name; ?>                    
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="course-content">
        <div class="container">
            <div class="row">
                <div class="course-main-content col-sm-12 col-md-9">

                    <div class="course-btns pt-4 pb-4 no-print">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-2 p-1">
                                <a title="<?php echo $centerName; ?> Registeration" class="btn d-block p-3 p-md-1  btn-primary" href="<?php echo $systemUrl.$eventPage.'/'.$event->id.'/register.html'; ?>" data-toggle="modal" data-target=".bs-book-modal-lg">تسجيل</a>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-2 p-1">
                                <a title="<?php echo $centerName; ?> Inquiry" class="btn d-block p-3 p-md-1" id="inquiry-btn" onclick="goToInquiry()">استعلام</a>
                            </div>
                            <!-- <div class="col-xs-6 col-sm-6 col-md-2 p-1">
                                <a title="<?php echo $centerName; ?> Brochure" class="btn d-block p-3 p-md-1" href="<?php echo $event->pdf_url; ?>">البروشور</a>
                            </div> -->
                            <?php 
                                if (isset($event->courseId)) {
                            ?>
                                <div class="col-xs-6 col-sm-12 col-md-4 col-md-3 p-1">
                                    <a title="<?php echo $centerName; ?> Available Dates" class="btn d-block p-3 p-md-1" href="<?php echo $systemUrl.$coursePage.'/'.$event->courseId.'.html#all-dates-and-locations'; ?>"> جميع التواريخ والمدن</a>
                                </div>
                            <?php 
                                }
                            ?>
                        </div>
                    </div>

                    <div class="course-details">

                        <div class="course-info">
                            <div class="row">
                                <div class="col-md-12 text-center text-md-end">

                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            <strong>رمز الدورة:</strong>
                                        </td>
                                        <td>
                                            <?php echo $event->code; ?>_<?php echo $event->id; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>تاريخ الدورة:</strong>
                                        </td>
                                        <td>
                                            <span itemprop="startDate" content="<?php echo date_format($startDate,"d.M.Y"); ?>"><?php echo generateEventFormatedDate($event->startDate,$event->endDate, 'ar'); ?></span> <span itemprop="endDate" content="<?php echo date_format($endDate,"d.M.Y"); ?>" hidden><?php echo date_format($endDate,"d.M.Y");?></span>
                                        </td>
                                    </tr>
                                    <tr itemprop="location">
                                        <td>
                                            <strong>مكان الدورة:</strong>
                                        </td>
                                        <td>
                                            <p><?php echo $event->city; ?></p>
                                        </td>
                                    </tr>
                                    <tr itemprop="offers">
                                        <td>
                                            <strong>رسوم الدورة:</strong>
                                        </td>
                                        <td>
                                            <p><span ><?php echo $event->price; ?> </span> <strong><?php echo $event->currency; ?></strong></p>
                                        </td>
                                    </tr>
                                </table>
                                    <!-- <strong>رمز الدورة:</strong>
                                    <p> <?php //echo $event->code; ?>_<?php //echo $event->id; ?></p> <br>

                                    <strong>تاريخ الدورة:</strong>
                                    <p><span itemprop="startDate" content="<?php //echo date_format($startDate,"d.M.Y"); ?>"><?php //echo generateEventFormatedDate($event->startDate,$event->endDate, 'ar'); ?></span> <span itemprop="endDate" content="<?php //echo date_format($endDate,"d.M.Y"); ?>" hidden><?php //echo date_format($endDate,"d.M.Y");?></span></p>

                                    <div itemprop="location">
                                        <strong>مكان الدورة:</strong>
                                        <p><?php //echo $event->city; ?></p>
                                    </div>

                                    <div itemprop="offers">
                                        <strong>رسوم الدورة:</strong>
                                        <p><span ><?php //echo $event->price; ?> </span> <strong><?php //echo $event->currency; ?></strong></p>          
                                    </div> -->
                                </div>
                            </div>
                            <br clear="all">
                            <hr style="height:1px;color:#CCC;margin-top:0px">
                        </div>

                        <div class="course-intro">

                            <?php echo $event->overview; ?>

                        </div>

                    </div>

                    <div>
                        <div class="inq-header no-print">
                            <div class="cat-header">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h2 class="categroy-title"><?php echo $event->categoryName; ?>
                                            <br/>
                                            <?php echo $event->name; ?> (<?php echo $event->code; ?>_<?php echo $event->id; ?>)</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="inq-content no-print" id="inq-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="info pt-3 pb-3">
                                            <strong>رمز الدورة: </strong> <?php echo $event->code; ?>_<?php echo $event->id; ?>&nbsp;&nbsp;
                                            <strong>تاريخ الدورة: </strong> <?php echo generateEventFormatedDate($event->startDate,$event->endDate, 'ar'); ?>&nbsp;&nbsp;
                                            <strong>مكان الدورة: </strong><?php echo $event->city; ?>&nbsp;
                                            <strong>رسوم الدورة: </strong><?php echo $event->price; ?>&nbsp;<strong><?php echo $event->currency; ?></strong>
                                        </div>
    
                                        <div class="p-3">
                                            <hr>
    
                                            <?php 
                                                $senEventID = $event->id;
                                                $inquiryType = "event";
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
    ?>

<?php
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