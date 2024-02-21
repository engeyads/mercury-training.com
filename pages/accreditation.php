<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="<?php echo $centerName; ?> Center Accreditation Page">
        <meta name="keywords" content="Mercury Accreditation, Learning, Training, Accreditation">
        <meta property="og:title" content="<?php echo $centerName; ?> Accreditation">
        <meta property="og:locale" content="en-SA">
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?php echo $centerName; ?> Center Accreditation Page">
        <meta property="og:url" content="<?php echo $systemUrl; ?>Accreditation.html">
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

        <div class="accreditation">
            <div class="container">
                <h1 hidden><?php echo $centerName; ?> Accreditation</h1>
                <div class="row pb-5">
                    <div class="col-sm-12 col-md-8">
                        <h2 class="d-flex justify-content-center d-md-inline-block justify-content-md-start" itemprop="name" content="<?php echo $centerName; ?> ISO" title="<?php echo $centerName; ?> ISO">ISO</h2>
                        <p class="text-center text-md-start w-sm-100">
                            We meet the international standard that specifies needed requirements for a quality management system (QMS) ISO 9001:2015. Demonstrating the ability to consistently provide products and services that meet customer and regulatory requirements.
                        </p>
                        <a class="btn btn-search p-3 p-md-1 btn-sm d-flex justify-content-center d-md-inline-block justify-content-md-start" href="https://www.irqao.com/Search.aspx?s=14140460" target="_black" rel="nofollow">verification</a>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="image">
                            <img src="<?php echo $systemUrl; ?>assets/images/a-iso.png" alt="<?php echo $centerName; ?> - vision" width="100%" height="100%">
                        </div>
                    </div>
                </div>
                <div class="row pb-5 pt-5">
                    <div class="col-sm-12 col-md-8">
                        <h2 class="d-flex justify-content-center d-md-inline-block justify-content-md-start" itemprop="name" content="<?php echo $centerName; ?> CPD" title="<?php echo $centerName; ?> CPD">CPD</h2>
                        <p class="text-center text-md-start w-sm-100">
                            We are an accredited provider of The CPD Certification Service, the leading independent accreditation institution operating across industry sectors to complement the Continuing Professional Development policies of professional institutes and academic bodies.   
                        </p>
                        <a class="btn btn-search p-3 p-md-1 btn-sm d-flex justify-content-center d-md-inline-block justify-content-md-start" href="https://cpduk.co.uk/providers/mercury-training" target="_black" rel="nofollow">verification</a>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="image">
                            <img src="<?php echo $systemUrl; ?>assets/images/a-cpd.png" alt="<?php echo $centerName; ?> - vision" width="100%" height="100%">
                        </div>
                    </div>
                
                </div>
                <div class="row pb-5 pt-5">
                    <div class="col-sm-12 col-md-8">
                        <h2 class="d-flex justify-content-center d-md-inline-block justify-content-md-start" itemprop="name" content="<?php echo $centerName; ?> ICTO" title="<?php echo $centerName; ?> ICTO">ICTO</h2>
                        <p class="text-center text-md-start w-sm-100">
                        Impact Certification Training Organization, the global certification body certifying the training center that delivers high-quality training programs with a real IMPACT.
                        </p>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="image">
                            <img src="<?php echo $systemUrl; ?>assets/images/a-icto.png" alt="<?php echo $centerName; ?> - vision" width="100%" height="100%">
                        </div>
                    </div>
                </div>

                <div class="row pb-5 pt-5">
                    <div class="col-sm-12 col-md-8">
                        <h2 class="d-flex justify-content-center d-md-inline-block justify-content-md-start" itemprop="name" content="<?php echo $centerName; ?> AIAE" title="<?php echo $centerName; ?> AIAE">AIAE</h2>
                        <p class="text-center text-md-start w-sm-100">
                        American Institute for Applied Education isone of the leading institutes in the United States of America, which is working on the development of vocational education and training systems in all areas, with the best available expertise to achieve the maximum quality standards, with the participation of education and training institutions worldwide.
                        </p>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="image">
                            <img src="<?php echo $systemUrl; ?>assets/images/a-aiae.png" alt="<?php echo $centerName; ?> - vision" width="100%" height="100%">
                        </div>
                    </div>
                </div>
<!--
                <div class="row pb-5 pt-5">
                    <div class="col-sm-12 col-md-8">
                        <h2 itemprop="name" content="<?php //echo $centerName; ?> Knowledge" title="<?php //echo $centerName; ?> Knowledge">Knowledge</h2>
                        <p>
                        The Knowledge and Human Development Authority (KHDA) is responsible for the growth and quality of private education &amp; learning in Dubai, and to assure quality and improve the access to education, learning, and human development, with the engagement of the community.
                        </p>
                        <a href="" target="_black"></a>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <div class="image">
                            <img src="<?php //echo $systemUrl; ?>assets/images/knowledge.png" alt="<?php //echo $centerName; ?> - vision" width="100%" height="100%">
                        </div>
                    </div>
                </div>
-->
            </div>
        </div>

        <?php
        include('layouts/footer.php');
        ?>

</body>