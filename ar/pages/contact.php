
<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta name="description" content="<?php echo $centerName; ?> معلومات الإتصال">
        <meta name="keywords" content="Mercury Contact, Learning, Training, Contact">
        <meta property="og:title" content="معلومات الإتصال <?php echo $centerName; ?>">
        <meta property="og:locale" content="en-SA">
        <meta property="og:type" content="website">
        <meta property="og:description" content="<?php echo $centerName; ?> معلومات الإتصال">
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
                            <div class="cen align-self-center p-0 p-md-3 text-center text-sm-end">
                                <h2 itemprop="name" content="<?php echo $centerName; ?> معلومات الإتصال" title="<?php echo $centerName; ?> معلومات الإتصال">معلومات الإتصال</h2>
                                <div> <span class="city">اسطنبول - تركيا: </span> <a class="num text-white" href="tel:+905395991206" dir="ltr"> +(90)5395991206</a></div>
                                <div> <span class="city">عمان - الأردن:</span> <a class="num text-white" href="tel:+962785666966" dir="ltr"> +(962)785666966</a></div>
                                <div> <span class="city">دبي - الإمارات:</span> <a class="num text-white" href="tel:+97144505697" dir="ltr"> +(971)44505697</a></div>
                                <div> <span class="city">لندن - بريطانيا:</span> <a class="num text-white" href="tel:+447481362802" dir="ltr"> +(44)7481362802</a></div>
                                <div> <span class="city">Mercury Training - مركز ميركوري للتدريب</span></div>
                            </div>
                            <div class="contact-logo">
                                <img src="<?php echo $systemUrl; ?>assets/images/logo-1.svg" alt="<?php echo $centerName; ?>" width="100%" height="100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form p-5">
                            <div class="cen contact-form-inside text-center text-sm-end">
                                <h2 itemprop="name" content="اتصل <?php echo $centerName; ?>" title="اتصل <?php echo $centerName; ?>">اتصل بنا</h2>
                                <form action="<?php echo $systemUrl; ?>contactReceive.html" method="POST">
                                    <div class="form-group mb-2">
                                        <input type="text" name="first_name" id="" class="form-control font-10" placeholder="الاسم الأول" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="text" name="last_name" id="" class="form-control  font-10" placeholder="الكنية" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="email" name="email" id="" class="form-control font-10" placeholder="البريد الإلكروني">
                                    </div>
                                    <div class="form-group mb-2">
                                        <input class="form-control font-10" type="tel" name="mobile" value="" placeholder="جوال">
                                    </div>
                                    <div class="form-group mb-2">
                                        <textarea name="note" id="" class="form-control font-10" placeholder="الاستعلام"></textarea>
                                    </div>
                                    <div class="form-group mb-2 form-check">
                                        <label class="form-check-label font-10" for="whatsapp">أرغب بمتابعة إستعلامي عبر WhatsApp</label>
                                        <input type="checkbox" class="form-check-input font-12 mt-2" id="whatsapp" name="whatsApp" value="1" checked="">
                                    </div>
                                    <div class="form-group mb-2">
                                        <script src='https://www.google.com/recaptcha/api.js?hl=ar'></script>
                                        <div class="g-recaptcha" <?php echo $islocal ? 'data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"' : 'data-sitekey="6LcpZ3UUAAAAAOiPmcT-AymkCOWtW6oDZ6GwSgXF"'; ?> data-callback="recaptchaCallback"></div> 
                                    </div>
                                    <!-- <div class="d-grid"> -->
                                    <div class="form-group mb-2">
                                        <button type="submit" id="btnSubmit" name="submit" class="btn hidden px-4 btn-sm" style="display:none;float:left;">أرسل</button>
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
</body>

<script>
    function recaptchaCallback(e) {
        if (e != null && e != undefined) { 
            $("#btnSubmit").show();
        }
    }
</script>