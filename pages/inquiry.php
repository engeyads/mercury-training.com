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
                    <label for="firstname">First Name</label>
                    <input class="form-control font-14" type="text" name="firstname" id="firstname" placeholder="First Name" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label for="lastname">Last Name</label>
                    <input class="form-control font-14" type="text" name="lastname" id="lastname" placeholder="Last Name" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-3">
                <label for="mobile">Mobile</label>
                    <input class="form-control font-14" type="tel" maxlength="20" required="" name="mobile" value="" id="mobile" placeholder="Mobile">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group mb-3">
                    <label for="email">E-mail</label>
                    <input class="form-control font-14" type="email" name="email" id="email" placeholder="E-mail" required="">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group mb-3">
                    <label for="Message">Message</label>
                    <textarea placeholder="Message" class="form-control font-14" name="comment" cols="30" rows="7" id="Message" required=""></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="input-group input-group-sm mb-3">
                    <input type="checkbox" class="form-check" id="newsletter" name="newsletter">&nbsp;
                    <label class="form-check-label ml-2" for="newsletter">I agree to subscribe to your newsletter</label>
                </div>
            </div>
            <div class="col-sm-9 d-flex justify-content-center justify-content-md-start">
                <script src='https://www.google.com/recaptcha/api.js'></script>
                <div class="g-recaptcha" <?php echo $islocal ? 'data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"' : 'data-sitekey="6LcpZ3UUAAAAAOiPmcT-AymkCOWtW6oDZ6GwSgXF"'; ?> data-callback="recaptchaCallback"></div> 
            </div>
            <div class="col-sm-3 d-flex justify-content-center justify-content-md-end d-none" id="submit_btn">									
                <div class="form-group">
                    <input title="Mercury Training Center Send Inquiry" type="submit" id="btnSubmit" name="Submit" value="Send" class="inq-btn mt-4 ps-5 pe-5">
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