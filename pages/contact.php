
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="description" content="<?php echo $centerName; ?> Center Contact Page">
        <meta name="keywords" content="Mercury Contact, Learning, Training, Contact">
        <meta property="og:title" content="Contact <?php echo $centerName; ?>">
        <meta property="og:locale" content="en-SA">
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?php echo $centerName; ?> Center Contact Page">
        <meta property="og:url" content="<?php echo $systemUrl; ?>contact-us.html">
        <?php include('layouts/head.php'); ?>
    </head>
<body itemscope itemtype="https://schema.org/WebPage">
    
    <?php
        include('layouts/header.php');
    ?>

        <div class="container p-5">
            <div class="contact-us">
                <h1 hidden>Contact <?php echo $centerName; ?></h1>
                <div class="row">
                    <div class="col-md-5">
                        <div class="info p-3 py-5 p-md-5">
                            <div class="cen align-self-center p-0 p-md-3 text-center text-sm-start">
                                <h2 itemprop="name" content="<?php echo $centerName; ?> Contact Information" title="<?php echo $centerName; ?> Contact Information">Contact Information</h2>
                                <div> <span class="city">Istanbul - Turkey : </span> <a class="num text-white" href="tel:+(90)5395991206" dir="ltr"> +(90)5395991206</a></div>
                                <div> <span class="city">Amman - Jordan : </span> <a class="num text-white" href="tel:+(962)785666966" dir="ltr"> +(962)785666966</a></div>
                                <div> <span class="city">Dubai - UAE : </span> <a class="num text-white" href="tel:+(971)44505697" dir="ltr"> +(971)44505697</a></div>
                                <div> <span class="city">London - UK : </span> <a class="num text-white" href="tel:+(44)7481362802" dir="ltr"> +(44)7481362802</a></div>
                                <div> <span class="city">Mercury Training</span></div>
                            </div>
                            <div class="contact-logo">
                                <img src="<?php echo $systemUrl; ?>assets/images/logo-1.svg" alt="<?php echo $centerName; ?>" width="100%" height="100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form p-5">
                            <div class="cen contact-form-inside text-center text-sm-start">
                                <h2 itemprop="name" content="Contact <?php echo $centerName; ?>" title="Contact <?php echo $centerName; ?>">Contact Us</h2>
                                <form action="<?php echo $systemUrl; ?>contactReceive.html" method="POST">
                                    <div class="form-group mb-2">
                                        <input type="text" name="first_name" id="" class="form-control font-10" placeholder="First Name" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="text" name="last_name" id="" class="form-control  font-10" placeholder="Last Name" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="email" name="email" id="" class="form-control font-10" placeholder="E-mail">
                                    </div>
                                    <div class="form-group mb-2">
                                        <input class="form-control font-10" type="tel" name="mobile" value="" placeholder="Mobile">
                                    </div>
                                
                                    <div class="form-group mb-2">
                                        <textarea name="note" id="" class="form-control font-10" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group mb-2 form-check">
                                        <input type="checkbox" class="form-check-input font-12 mt-2" id="whatsapp" name="whatsApp" value="1" checked="">
                                        <label class="form-check-label font-10" for="whatsapp">I Want Update my inquiry via WhatsApp</label>
                                    </div>
                                    <div class="form-group mb-2">
                                        <script src='https://www.google.com/recaptcha/api.js'></script>
                                        <div class="g-recaptcha" <?php echo $islocal ? 'data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"' : 'data-sitekey="6LcpZ3UUAAAAAOiPmcT-AymkCOWtW6oDZ6GwSgXF"'; ?> data-callback="recaptchaCallback"></div> 
                                    </div>
                                    <!-- <div class="d-grid"> -->
                                    <div class="form-group mb-2">
                                        <button type="submit" id="btnSubmit" name="submit" class="btn hidden px-4 btn-sm" style="display:none;">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
            include('layouts/footer.php');
        ?>

<script>
    function recaptchaCallback(e) {
        if (e != null && e != undefined) { 
            $("#btnSubmit").show();
        }
    }
</script>
</body>

