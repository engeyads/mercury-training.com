<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="<?php echo $centerName; ?> Centre Privacy Policy Page">
        <meta name="keywords" content="Mercury Privacy Policy, Learning, Training, Privacy Policy">
        <meta property="og:title" content="<?php echo $centerName; ?> Privacy Policy">
        <meta property="og:locale" content="en-SA">
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?php echo $centerName; ?> Center Privacy Policy Page">
        <meta property="og:url" content="<?php echo $systemUrl; ?>Privacy-Policy.html">
        <meta property="og:site_name" content="<?php echo $centerName; ?>">
        <?php include('layouts/head.php'); ?>
    </head>
<body itemscope itemtype="https://schema.org/WebPage">
    <?php
        include('layouts/header.php');
    ?>
    <div class="cat-header-section">
        <div class="container">
            <div class="cat-header">
                <div class="row">
                    <div class="col-sm-12">
                        <?php echo showBreadCrumbs (); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="container privacy-term pb-5">
            <h1 itemprop="name" content="<?php echo $centerName . ' Privacy Policy'; ?>" title="<?php echo $centerName . ' Privacy Policy'; ?>" class="content-title">Privacy Policy</h1>
            <p>
            This privacy policy covers the information we have about you when you use our products or services. This includes your name, job position, contact details, and training records. Mercruy Training will NOT share any of your data without your permission.
            </p>
            <p>
            Following our policies too, we keep clients' information (personal &amp; organizational) private and protected.
            </p>
            <h2>Feedback and Complaints</h2>
            <p>
            Mercury Training Center believes in continuous improvement and welcomes your feedback related to its people, products, or processes. If you have comments and/or suggestions that will eventually help us improve in any way, please write to us at training@mercury-training.com.
            </p>
        </div>
    </div>
    <?php
        include('layouts/footer.php');
    ?>
</body>