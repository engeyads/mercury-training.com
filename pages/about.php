
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
                <h1 hidden>About <?php echo $centerName; ?></h1>
                <div class="row pb-5">
                    <div class="col-sm-12">
                        <h2 class="d-flex justify-content-center d-md-inline-block justify-content-md-start" itemprop="name" content="Who are <?php echo $centerName; ?>" title="Who are <?php echo $centerName; ?>">Who Are We?</h2>
                        <p class="text-center text-md-start">
                            Mercury Training Center is a multinational World-class Training Solutions Provider with a wide-range portfolio extended to more than 50 countries and 25 Sectors.  
                        </p>
                    </div>
                </div>

                <div class="row pb-5">
                    <div class="col-sm-12 col-md-6 pb-5 pb-md-0">
                        <div class="image">
                            <img src="<?php echo $systemUrl; ?>assets/images/vision.jpg" alt="<?php echo $centerName; ?> - vision" width="100%" height="100%">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <h2 class="d-flex justify-content-center d-md-inline-block justify-content-md-start" itemprop="name" content="<?php echo $centerName; ?> Vision" title="<?php echo $centerName; ?> Vision">Our Vision</h2>
                        <p class="text-center text-md-start">
                            Being an Authority in Vocational Training on a global level, and innovating the new norms, standards and accreditation/ certification systems for training industry in all the categories in which we provide courses.  
                        </p>
                    </div>
                </div>

                <div class="row pb-5">
                    <div class="col-sm-12 col-md-6">
                        <h2 class="d-flex justify-content-center d-md-inline-block justify-content-md-start" itemprop="name" content="<?php echo $centerName; ?> Mission" title="<?php echo $centerName; ?> Mission">Our Mission</h2>
                        <p class="text-center text-md-start">
                            Is to rise with the societal learning curve through focusing on the continuous learning by providing, creative, flexible (onsite / online), unique, and customer-driven (B 2 B) training solution taking into considering the ethical codes of sustainability and respecting diversity.
                        </p>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="image">
                            <img src="<?php echo $systemUrl; ?>assets/images/mission.jpg" alt="<?php echo $centerName; ?> - vision" width="100%" height="100%">
                        </div>
                    </div>
                </div>

                <div class="row pb-5">
                    <div class="col-md-10">
                        <h2 class="d-flex justify-content-center d-md-inline-block justify-content-md-start" itemprop="name" content="<?php echo $centerName; ?> Values" title="<?php echo $centerName; ?> Values">Our Values</h2>
                        <div class="value-box">
                            <h3 class="d-flex justify-content-center d-md-inline-block justify-content-md-start">Flexibility</h3>
                            <p class="text-center text-md-start">
                                With operations in (50) + countries and (25) + training categories whether it is onsite or online we can bend our arrangement to cover-up the needs of our client.
                            </p>
                        </div>
                        <div class="value-box">
                            <h3 class="d-flex justify-content-center d-md-inline-block justify-content-md-start">Customer Driven Approach</h3>
                            <p class="text-center text-md-start">We are a customer centric organization thus we listen effectively to the voice of our customers and we improve to fulfill their needs.</p>
                        </div>
                        <div class="value-box">
                            <h3 class="d-flex justify-content-center d-md-inline-block justify-content-md-start">Continuous Learning</h3>
                            <p class="text-center text-md-start">To stop learning is to stop living thus we breath continuous learning. </p>
                        </div>
                        <div class="value-box">
                            <h3 class="d-flex justify-content-center d-md-inline-block justify-content-md-start">Respecting Diversity</h3>
                            <p class="text-center text-md-start">As a multinational provider we respect and value diversity and consider it one of our strength. </p>
                        </div>
                        <div class="value-box">
                            <h3 class="d-flex justify-content-center d-md-inline-block justify-content-md-start">Sustainability</h3>
                            <p class="text-center text-md-start">
                            As a part of this universe, we are sustainable training provider and we follow the goals of The United Nations sustainability in all of our activities.
                            </p>
                        </div>
                        <div class="value-box">
                            <h3 class="d-flex justify-content-center d-md-inline-block justify-content-md-start">Rising up with the Learning Curve</h3>
                            <p class="text-center text-md-start">As We appreciate continuous learning, we set a standard to share this knowledge with the global societies.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    <?php
    include('layouts/footer.php');
    ?>

</body>

