<?php
    $url = null;
    if ($inquiryType == 'event') {
        $url = $systemUrl . $inquiryReceive . '/' . $senEventID . '.html';
    } else {
        $url = $systemUrl . $inquiryReceiveCourse . '/' . $senEventID . '.html';
    }
?>

<div class="form">
    <form action="<?php echo $url; ?>" name="contact_form" method="POST">
        <input type="hidden" name="contactus" value="CONTACTUS">
        <input type="hidden" name="proc" value="edit">
        <input type="hidden" name="page" value="i">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label for="firstname">الاسم الأول</label>
                    <input class="form-control font-14" type="text" name="firstname" id="firstname" placeholder="الاسم الأول" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label for="lastname">الكنية</label>
                    <input class="form-control font-14" type="text" name="lastname" id="lastname" placeholder="الكنية" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-3">
                <label for="mobile">رقم الجوال</label>
                    <input class="form-control font-14" type="tel" maxlength="20" required="" name="mobile" value="" id="mobile" placeholder="الجوال">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label for="email">البريد الإلكتروني</label>
                    <input class="form-control font-14" type="email" name="email" id="email" placeholder="البريد الإلكتروني" required="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group mb-3">
                    <label for="Message">الإستعلام</label>
                    <textarea placeholder="الإستعلام" class="form-control font-14" name="comment" cols="30" rows="7" id="Message" required=""></textarea>
                </div>
            </div>
            <div class="col-sm-9 d-flex justify-content-center justify-content-md-start">
                <script src='https://www.google.com/recaptcha/api.js?hl=ar'></script>
                <div class="g-recaptcha" data-sitekey="6LcpZ3UUAAAAAOiPmcT-AymkCOWtW6oDZ6GwSgXF" data-callback="recaptchaCallback"></div> 
            </div>
            <div class="col-sm-3 d-flex justify-content-center justify-content-md-end d-none" id="submit_btn">									
                <div class="form-group">
                    <input title="Mercury Training Center Send Inquiry" type="submit" id="btnSubmit" name="Submit" value="إرسال" class="inq-btn mt-4 ps-5 pe-5">
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    function recaptchaCallback(e) {
        if (e != null && e != undefined) { 
            $("#submit_btn").removeClass("d-none");
        }
    }
</script>