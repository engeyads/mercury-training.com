<div class="footer1-section no-print">
    <div class="container pt-3">
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="logo-footer d-flex justify-content-center justify-content-md-start">
                    <a href="https://mercury-training.com/" title="Mercury Training Center">
                        <img src="<?php echo $systemUrl; ?>assets/images/logo-1.svg" alt="Mercury Training Center" title="Mercury Training Center" width="140" height="100%">
                    </a>
                </div>
                <div class="d-flex justify-content-center justify-content-md-start">
                    <p>
                        Mercury dynamic schedule is constantly reviewed and updated to ensure that every category is
                        being addressed at least once a month, if not once every week. Please check the training
                        courses listed below and if you do not find the subject you are interested in, email us or
                        give us a call and we will do our best to assist.
                    </p>
                </div>
                <div class="d-flex justify-content-center justify-content-md-start">
                    <nav class="menu-footer">
                        <ul class="g-0 g-md-4">
                            <li class="d-flex justify-content-center justify-content-md-start"> <i class="fa fa-caret-right d-none d-md-inline"></i> <a title="<?php echo $centerName; ?> Privacy Policy" href="<?php echo $systemUrl; ?>Privacy-Policy.html">Privacy Policy</a></li>
                            <li class="d-flex justify-content-center justify-content-md-start"> <i class="fa fa-caret-right d-none d-md-inline"></i> <a title="<?php echo $centerName; ?> Terms and Conditions" href="<?php echo $systemUrl; ?>terms-and-conditions.html">Terms and Conditions</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="social d-flex justify-content-center justify-content-md-start">
                    <a title="<?php echo $centerName; ?> facebook" href="https://www.facebook.com/mercurytrainingcentre" target="_blank"><i class="fab fa-facebook-square fa-2x"></i></a>
                    <a title="<?php echo $centerName; ?> twitter" href="https://twitter.com/trainingmercury?lang=en" target="_blank" ><i class="fab fa-x-twitter fa-2x"></i></a>
                    <a title="<?php echo $centerName; ?> instagram" href="https://www.instagram.com/mercurytrainingcenter" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
                    <a title="<?php echo $centerName; ?> linkedin" href="https://www.linkedin.com/company/mercury-training " target="_blank"><i class="fab fa-linkedin fa-2x"></i></a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 pt-5 pt-md-0">
                <h2 class="title-footer d-flex justify-content-center justify-content-md-start"> Our Training Courses</h2>
                <div class="footer-course row d-flex text-center text-sm-start ">
                            <?php
                                $categoriesArray = new CallAPIv3($scope = 'resource=categories',$method = 'GET'); 
                                if (isset($categoriesArray->result->categories) && (count($categoriesArray->result->categories) > 0)) {
                                $categories = $categoriesArray->result->categories;
                                ksort($categories);
                                // usort($categories,function($first,$second){
                                //     return strtolower($first->name) > strtolower($second->name);
                                // });
                                list($cat1, $cat2) = array_chunk($categories, ceil(count($categories) / 2));
                            ?>
                                <ul class=" col-sm-6 mb-0 mb-md-1 g-0 g-md-4">
                                    <?php
                                        foreach ($cat1 as $value) {
                                    ?>
                                        <li class="d-flex justify-content-center justify-content-md-start">
                                            <i class="fa fa-caret-right d-none d-sm-inline"></i>
                                            <a href="<?php echo $systemUrl.$categorySlugs[$value->id]; ?>" title="<?php echo $centerName . ' ' . $value->name; ?>"><?php echo $value->name; ?></a>
                                        </li>
                                    <?php
                                        }
                                    ?>
                             </ul>
                                
                             <ul class=" col-sm-6 mt-0 mt-md-1 g-0 g-md-4">
                                    <?php
                                        foreach ($cat2 as $value) {
                                    ?>
                                        <li class="d-flex justify-content-center justify-content-md-start">
                                            <i class="fa fa-caret-right d-none d-sm-inline"></i>
                                            <a href="<?php echo $systemUrl.$categorySlugs[$value->id]; ?>" title="<?php echo $centerName . ' ' .$value->name; ?>"><?php echo $value->name; ?></a>
                                        </li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            <?php
                                }
                            ?>
                    
                
                </div>
            </div>
            <div class="col-sm-12 col-md-3">
                <h2 class="title-footer d-flex justify-content-center justify-content-md-start">Contact Us</h2>
                <div class="contact-div g-2">
                    <h3 class="d-flex justify-content-center justify-content-md-start"> Istanbul Office (Turkey)</h3>
                    <span class="d-flex justify-content-center justify-content-md-start" title="<?php echo $centerName; ?> Email Address"><i class="far fa-envelope me-2"></i> <a class="text-white" href="mailto:training@mercury-training.com">training@mercury-training.com </a></span>
                    <span class="d-flex justify-content-center justify-content-md-start" title="<?php echo $centerName; ?> Contact Number"><i class="fa fa-phone me-2"></i> <a class="text-white" href="tel:+905395991206">+905395991206</a></span>
                </div>
                <div class="contact-div g-2">
                    <h3 class="d-flex justify-content-center justify-content-md-start"> London (UK)</h3>
                    <span class="d-flex justify-content-center justify-content-md-start" title="<?php echo $centerName; ?> Email Address"><i class="far fa-envelope me-2"></i> <a class="text-white" href="mailto:training@mercury-training.com">training@mercury-training.com </a></span>
                    <span class="d-flex justify-content-center justify-content-md-start" title="<?php echo $centerName; ?> Contact Number"><i class="fa fa-phone me-2"></i> <a class="text-white" href="tel:+447481362802">+447481362802</a></span>
                </div>
                <div class="contact-div g-2">
                    <h3 class="d-flex justify-content-center justify-content-md-start"> Amman (Jordan)</h3>
                    <span class="d-flex justify-content-center justify-content-md-start" title="<?php echo $centerName; ?> Email Address"><i class="far fa-envelope me-2"></i> <a class="text-white" href="mailto:training@mercury-training.com">training@mercury-training.com </a></span>
                    <span class="d-flex justify-content-center justify-content-md-start" title="<?php echo $centerName; ?> Contact Number"><i class="fa fa-phone me-2"></i> <a class="text-white" href="tel:+962785666966">+962785666966</a></span>
                </div>
                <div class="contact-div g-2">
                    <h3 class="d-flex justify-content-center justify-content-md-start"> Dubai (UAE)</h3>
                    <span class="d-flex justify-content-center justify-content-md-start" title="<?php echo $centerName; ?> Email Address"><i class="far fa-envelope me-2"></i> <a class="text-white" href="mailto:training@mercury-training.com">training@mercury-training.com </a></span>
                    <span class="d-flex justify-content-center justify-content-md-start" title="<?php echo $centerName; ?> Contact Number"><i class="fa fa-phone me-2"></i> <a class="text-white" href="tel:+97144505697">+97144505697</a></span>
                </div>
                <div class="acc-logo d-flex justify-content-center justify-content-md-start">
                    <div>
                        <a href="<?php echo $systemUrl; ?>Accreditation.html" title="<?php echo $centerName; ?> ISO">
                            <img src="<?php echo $systemUrl; ?>assets/images/iso_1.webp" alt="<?php echo $centerName; ?> ISO" width="100%" height="100%">
                        </a>
                    </div>
                    <div>
                        <a href="<?php echo $systemUrl; ?>Accreditation.html" title="<?php echo $centerName; ?> CPD">
                            <img src="<?php echo $systemUrl; ?>assets/images/cpd_1.webp" alt="<?php echo $centerName; ?> CPD" width="100%" height="100%">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copyright-section no-print">
    <div class="container">
        <div class="copy-right">
            <div class="copy-right-text">
                <p>© All rights reserved Mercury Training Center</p>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- <script src="<?php //echo $systemUrl; ?>assets/js/bootstrap.min.js"></script> -->
<script src="<?php echo $systemUrl; ?>assets/jquery.js"></script>
<script>
    $(".rotate").click(function(){
        $(this).toggleClass("down"); 
    });

    
    $(function(){
        function rescaleCaptcha(){
            var width = $('.g-recaptcha').parent().width();
            var scale;
            if (width < 302) {
                scale = width / 302;
            } else{
                scale = 1.0; 
            }

            $('.g-recaptcha').css('transform', 'scale(' + scale + ')');
            $('.g-recaptcha').css('-webkit-transform', 'scale(' + scale + ')');
            $('.g-recaptcha').css('transform-origin', '0 0');
            $('.g-recaptcha').css('-webkit-transform-origin', '0 0');
        }

        rescaleCaptcha();
        $( window ).resize(function() { rescaleCaptcha(); });
    });
</script>


<script type="text/javascript" id="zsiqchat">

var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode:"18bfbb7e93be95fe3c04e8203c85e9668b107ec667e69fd406571d85c3ef20a7ec33c3447a5d363239ce715ad5148906", values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zoho.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);

</script>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVWJ8WV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<script>
    // JavaScript to check if the user is on search with specific parameters
    $(document).ready(function(){
      var urlParams = new URLSearchParams(window.location.search);
      var items = urlParams.get('keyword') || urlParams.get('city') || urlParams.get('m') || urlParams.get('numberOfWeeks') || urlParams.get('upcoming');
      if (window.location.pathname === '/index.php' && items !== null) {
        // If the user is on search.php with specific parameters, show the collapse element
        $('#search').collapse('show');
      }
    });
</script>