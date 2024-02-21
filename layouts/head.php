<title>
    <?php 
        $title = null;
        if($addToTitle ==''){ $title = $centerName; }else{ $title = $addToTitle . ' - ' . $centerName; } 
        if (strlen($title) > 74) {
            $title = substr($title, 0, 70) . '...';
        }
        echo $title;
    ?>
</title>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- Bootstrap CSS -->
<!-- <link href="<?php //echo $systemUrl; ?>assets/css/bootstrap.min.css" rel="stylesheet" media="all" /> -->
<!-- fontawesome -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" media="all">
<!-- css -->
<link rel="stylesheet" href="<?php echo $systemUrl; ?>assets/css/style.min.css?v=1.7" media="all">
<!-- favicon -->
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $systemUrl; ?>assets/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $systemUrl; ?>assets/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $systemUrl; ?>assets/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $systemUrl; ?>assets/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $systemUrl; ?>assets/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $systemUrl; ?>assets/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $systemUrl; ?>assets/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $systemUrl; ?>assets/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $systemUrl; ?>assets/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192" href="<?php echo $systemUrl; ?>assets/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $systemUrl; ?>assets/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $systemUrl; ?>assets/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $systemUrl; ?>assets/favicon/favicon-16x16.png">
<link rel="manifest" href="<?php echo $systemUrl; ?>assets/favicon/manifest.json">

<!-- anti-flicker snippet (recommended)  -->
<style>.async-hide { } </style>
<script async>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
(a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
})(window,document.documentElement,'async-hide','dataLayer',4000,
{'GTM-PVWJ8WV':true});</script>

<!-- Google Tag Manager -->
<script async>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PVWJ8WV');</script>
<!-- End Google Tag Manager -->
