<!DOCTYPE html>
<html lang="ar">

    <head>
        <meta name="description" content="<?php echo $centerName; ?> المدن">
        <meta name="keywords" content="Mercury cities">
        <meta property="og:title" content="<?php echo $centerName; ?> المدن">
        <meta property="og:locale" content="en-SA">
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?php echo $centerName; ?> المدن">
        <meta property="og:url" content="<?php echo $systemUrl; ?>cities.html">
        <meta property="og:site_name" content="<?php echo $centerName; ?>">
        <?php include('layouts/head.php'); ?>
    </head>

    <body id="top" itemtype="https://schema.org/WebPage">
        <?php include('layouts/header.php'); ?>

        <!-- bread -->
        <div class="cat-header-section">
            <div class="container">
                <div class="cat-header">
                    <div class="row">
                        <!-- bread -->
                        <div class="col-md-12">
                            <?php echo showBreadCrumbs (); ?>
                        </div>
                        <div class="col-sm-12">
                            <h1 itemprop="name" content="" title="" class="categroy-title">الدورات التدريبية في المدن</h1>
                            <p class="cat-desc">
                            ارفع مستوى تجربتك التعليمية: أماكن الدورات التدريبية الاستثنائية لدينا
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

 
        <section class="section grey-bg pt-5">
            <div class="container">
                <div class="row">
                    
                </div>
            </div>
            <?php include('layouts/cities.php'); ?>
        </section>
        <!-- footer Start -->
        <?php include('layouts/footer.php'); ?>

    </body>

</html>