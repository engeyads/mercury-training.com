
<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta name="description" content="نحن <?php echo $centerName; ?>">
        <meta name="keywords" content="Mercury About, Learning, Training, About">
        <meta property="og:title" content="نحن <?php echo $centerName; ?>">
        <meta property="og:locale" content="en-SA">
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?php echo $centerName; ?> نحن ">
        <meta property="og:url" content="<?php echo $systemUrl; ?>about.html">
        <meta property="og:site_name" content="<?php echo $centerName; ?>">
        <?php include('layouts/head.php'); ?>
    </head>
<body itemscope itemtype="https://schema.org/WebPage">
    
    <?php
        include('layouts/header.php');
    ?>

        <div class="container">
            <div class="cat-header">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo showBreadCrumbs (); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="about-us">
            <div class="container">
                <h1 hidden>نحن <?php echo $centerName; ?></h1>
                <div class="row pb-5">
                    <div class="col-sm-12">
                        <h2 class="d-flex justify-content-center d-md-inline-block justify-content-md-start" itemprop="name" content="نحن <?php echo $centerName; ?>" title="نحن <?php echo $centerName; ?>">من نحن؟</h2>
                        <p class="text-center text-md-end">
                        ميركوري للتدريب، هو مركز تدريب ذو مستوى عالمي و مختص بتزويد الحلول التدريبية للشركات، من خلال شبكة عمليات واسعة تغطي أكثر من 50 دولة و 25 مجالاً تدريبياً.  
                        </p>
                    </div>
                </div>

                <div class="row pb-5">
                    <div class="col-sm-12 col-md-6 pb-5 pb-md-0">
                        <div class="image">
                            <img src="<?php echo $systemUrl; ?>assets/images/vision.jpg" alt="<?php echo $centerName; ?> - رؤيتنا" width="100%" height="100%">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <h2 class="d-flex justify-content-center d-md-inline-block justify-content-md-start" itemprop="name" content="<?php echo $centerName; ?> رؤيتنا" title="<?php echo $centerName; ?> رؤيتنا">رؤيتنا</h2>
                        <p class="text-center text-md-end">
                        أن نكون مؤسسة تدريب احترافية على مستوى عالمي، وأن نبتكر قواعد ومعايير وأنظمة اعتماد جديدة في قطاع التدريب ضمن جميع المجالات التي نقدم فيها دوراتنا التدريبية.  
                        </p>
                    </div>
                </div>

                <div class="row pb-5">
                    <div class="col-sm-12 col-md-6">
                        <h2 class="d-flex justify-content-center d-md-inline-block justify-content-md-start" itemprop="name" content="<?php echo $centerName; ?> مهمتنا" title="<?php echo $centerName; ?> مهمتنا">مهمتنا</h2>
                        <p class="text-center text-md-end">
                        تحسين منحنى التعلم في مجتمعاتنا من خلال التركيز على التعلم المستمر، و ذلك عبر تقديم حلول تدريبية مبتكرة ومرنة (دورات تقليدية / دورات عن بعد)، فريدة من نوعها، و تلبي احتياجات كافة العملاء مع اتباع القواعد الأخلاقية و أهمها مبادئ الاستدامة واحترام التنوع و الاختلاف.
                        </p>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="image">
                            <img src="<?php echo $systemUrl; ?>assets/images/mission.jpg" alt="<?php echo $centerName; ?> - vision" width="100%" height="100%">
                        </div>
                    </div>
                </div>

                <div class="row pb-5">
                    <div class="col-md-10 justify-content">
                        <h2 class="d-flex justify-content-center d-md-inline-block justify-content-md-start" itemprop="name" content="<?php echo $centerName; ?> قيمنا" title="<?php echo $centerName; ?> قيمنا">قيمنا</h2>
                        <div class="value-box">
                            <h3 class="d-flex justify-content-center d-md-inline-block justify-content-md-start">المرونة</h3>
                            <p class="text-center text-md-end">
                            إن الانتشار الواسع لعملياتنا في أكثر من (50) دولة وعبر ما يزيد عن 25 تخصصًا تدريبيًا يمكننا من تعديل و تكييف ترتيباتنا لموائمة احتياجات عملائنا سواء كان ذلك دورات عادية أو دورات عن بعد.
                            </p>
                        </div>
                        <div class="value-box">
                            <h3 class="d-flex justify-content-center d-md-inline-block justify-content-md-start">النهج القائم على العميل</h3>
                            <p class="text-center text-md-end">بما أننا مؤسسة تنتهج نهج "العميل أولاً"، لذا فإننا نصغي بفعالية إلى متطلبات عملائنا ونتخذ منها قاموساً لتعريف الجودة.</p>
                        </div>
                        <div class="value-box">
                            <h3 class="d-flex justify-content-center d-md-inline-block justify-content-md-start">التعلم المستمر</h3>
                            <p class="text-center text-md-end">بالنسبة لنا فإن التوقف عن التعلم يعني التوقف عن العمل و هذا يدفعنا لنواصل عمليات التعلم المستمر في كل جانب من جوانب القطاع</p>
                        </div>
                        <div class="value-box">
                            <h3 class="d-flex justify-content-center d-md-inline-block justify-content-md-start">احترام التنوع</h3>
                            <p class="text-center text-md-end">بوصفنا جهة متعددة الجنسيات، فإننا نحترم التنوع ونقدره ونعتز به و نعتبره أحد نقاط قوتنا و أحد أهم أسرار نجاحنا.</p>
                        </div>
                        <div class="value-box">
                            <h3 class="d-flex justify-content-center d-md-inline-block justify-content-md-start">الاستدامة</h3>
                            <p class="text-center text-md-end">
                            كجزء من هذا الكوكب، نسعى للحفاظ عليه لذا نسعى لأن نبقى كمزود تدريب عالمي مستدام ونحرص على أن تسترشد جميع أنشطتنا وأهدافنا بأهداف التنمية المستدامة التي وضعتها منظمة الأمم المتحدة.
                            </p>
                        </div>
                        <div class="value-box">
                            <h3 class="d-flex justify-content-center d-md-inline-block justify-content-md-start">الارتقاء بمنحنى التعلم</h3>
                            <p class="text-center text-md-end">نظراً لأننا نقدر التعلم المستمر، فقد وضعنا نصب أعيننا هدفاً وهو مشاركة هذه المعرفة مع المجتمعات التي نعمل لها ووضعنا هذه القيمة معياراً لكافة أهدافنا.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    <?php
    include('layouts/footer.php');
    ?>

</body>

