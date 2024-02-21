<!DOCTYPE html>
<html lang="en">
<?php 
  $currentUrl = $_SERVER['REQUEST_URI'];
  if (preg_match('/\/city\/(\d+)\.html/', $currentUrl, $matches)) {
    $currentUrl = $matches[1];
  }
  if (!empty($currentUrl) && is_numeric($currentUrl)) {
     $citiesArray = new CallAPIv3($scope = "resource=cities&with_keyword_description=true&with_about=true&onlyWithEvents=true&slug=$currentUrl", $method = 'GET'); 
     if (isset($citiesArray->result->cities) && count($citiesArray->result->cities) > 0) {
       $city = $citiesArray->result->cities[0];
      $thetitle = 'Professional Training Courses in '.$city->name;
     }else{http_response_code(404); exit(); }
  }
  $url = 'Location: '.$systemUrl.'city/'.$city->slug;





  $addToTitle = 'Cities';
    $addToH1 .= 'City';
    // $thePage = 'pages/c.php';
    if (!empty($currentUrl)) {
      if (is_numeric($currentUrl)) {
        $addTocityScop = '&slug='.$currentUrl;
        $citiesArray = new CallAPIv3($scope = "resource=cities&with_keyword_description=true&with_about=true".$addTocityScop, $method = 'GET');
        if (isset($citiesArray->result->cities) && count($citiesArray->result->cities) > 0) {
            $city = $citiesArray->result->cities[0];
            $thetitle = $city->title;
            $theH1 = 'Training Courses In'.' '.$city->name;  
            $cityId = $city->id;
            $addToScop = '&city='.$cityId;
            $desc = $city->description;
            if ($city->description!= null) {
                $thedescription = $city->description ;
            } else{
                $thedescription = $city->title.', '.$city->name;
            }
            $keywords = $city->keyword;
            if($keywords != ""){
              $keywords = html_entity_decode($keywords); 
              $array = json_decode($keywords, true,JSON_UNESCAPED_SLASHES);
              $text = '';
              foreach ($array as $item) {$text .= $item['value'] . ", "; }
              $thekeyword= $text;
            }
        }else{http_response_code(404); exit(); }
      }else{
        http_response_code(404); exit();
      }

    }else{http_response_code(404); exit(); }
    $eventsArray = new CallAPIv3($scope = 'resource=events&withImage=true&with_overview=true&with_category=true&with_price=true&with_hotelPhoto=true&withCategoriesSlug=true&order=startDate&limit=12'.(isset($_GET['page']) ? '&page='.$_GET['page'] : '').$addToScop,$method = 'GET');
    if (isset($eventsArray->result->events) && (count($eventsArray->result->events) > 0)) {
        $events = array_filter($eventsArray->result->events, function($event) use ($city) {return $event ;});
    }
    //[limit] => 20000
    //[pageNumber] => 1
    //[totalPages] => 1
    //echo '<pre>'; print_r ($eventsArray);
    $addToH1 .= ''; 
    $thekeyword = 'About Mercury Training Center, Mercury Training, training center';
    $thedescription = $centerName;
    $thelink = $systemUrl."c/".$city->slug;
    // breadCrumbs($addToTitle,'cities',$addToTitle);
?>
        <head>
<meta name="description" content="Explore our handpicked and carefully prepared training programs and find out the suitable titles for your learning and development. You can also choose dates and cities according to availability. If you could not find what suits you">
	<meta name="keywords" content="Finance and Accounting Courses, Marketing, Customer Relations, Sales Courses, Human Resources Management Courses, Management & Leadership Courses, Political & Public Relations Courses, Project Management Courses, Quality & Operation Management Courses, Self-Development Courses">
    <meta property="og:title" content="<?php echo $centerName; ?> Training Courses Cities">
    <meta property="og:locale" content="en-SA">
    <meta property="og:type" content="website">
    <meta property="og:description" content="<?php echo $centerName; ?> Cities Page">
    <meta property="og:url" content="<?php echo $systemUrl; ?>cities.html">
    <meta property="og:site_name" content="<?php echo $centerName; ?>">
    <meta property="og:image" content="<?php echo $systemUrl.'assets/images/logo-1.svg';?>" />
	<?php include('layouts/head.php'); ?>
</head>
    </head>
    <body id="top" itemtype="https://schema.org/WebPage">
        <?php include('layouts/header.php'); ?>


        <div class="cat-header-section">
            <div class="container">
                <div class="cat-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- bread -->
                            <?php
                                breadCrumbs( $city->name, '', $city->name);
                                echo showBreadCrumbs();
                            ?>
                        </div>
                        <div class="col-sm-12">
                            <h1 itemprop="name" content="<?php echo $theH1;?>" title="<?php echo $theH1;?>" class="categroy-title"><?php echo $theH1;?></h1>
                            <p class="cat-desc">
                                <?php
                                    echo $desc;
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <section class="section service grey-bg pt-5">
            <div class="container">
                <div class="row ">
                    <?php 
                      if (isset($eventsArray->result->events) && (count($eventsArray->result->events) > 0)) {
                      foreach ($events as $value) { 
                      $dates = generateEventFormatedDate($value->startDate, $value->endDate); 
                      $courseimgurl = $systemUrl.'assets/images/courses/'. ($value->image != null ? $value->image : 'default.webp' );?>
                    <div class="col-md-3 px-md-2 mb-4 p-0">
                        <div class="card h-100 d-inline-block border shadow-sm cat-card">
                            <a href="<?php echo $systemUrl.$eventPage.'/'.$value->id; ?>.html"
                                title="<?php echo $value->name; ?>">
                                <img class="col-md-12 p-0 img-fluid" src="<?php echo $courseimgurl ;?>"
                                    alt="<?php echo $value->name; ?>" ></a>
                            <div class="p-2 description-dark-color">
                                <div class='card-title d-inline-block'>
                                    <a href="<?php echo $systemUrl.$eventPage.'/'.$value->id; ?>.html"
                                        title="<?php echo $value->name; ?>">
                                        <h2 class="card-title"><?php echo $value->name; ?></h2>
                                    </a>
                                </div>
                                <div class="card-text f-14">
                                    <div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 512 512">
                                            <path
                                                d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                        </svg>Time: 9:00 AM - 1:00 PM</div>
                                    <div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 448 512">
                                            <path
                                                d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H64C28.7 64 0 92.7 0 128v16 48V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192 144 128c0-35.3-28.7-64-64-64H344V24c0-13.3-10.7-24-24-24s-24 10.7-24 24V64H152V24zM48 192H400V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192z" />
                                        </svg>Date: <span
                                            class="font-weight-bold"><?php echo $dates; ?></span></div>
                                    <div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z">
                                            </path>
                                        </svg>Location: <?php echo $city->name; ?></div>
                                    <div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 448 512">
                                            <path
                                                d="M0 80V229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7H48C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                        </svg>Fees: <?php echo $value->price . ' ' . $value->currency; ?></div>
                                    <div class='d-inline-block'><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" fill="currentColor" class="bi bi-geo-alt-fill"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M50.7 58.5L0 160H208V32H93.7C75.5 32 58.9 42.3 50.7 58.5zM240 160H448L397.3 58.5C389.1 42.3 372.5 32 354.3 32H240V160zm208 32H0V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192z" />
                                        </svg>Category: <a href="<?php echo $systemUrl.'/'.$value->categorySlug;?>.html"
                                            title="<?php echo $value->categoryName; ?>"
                                            class="font-weight-bold color-base"> <?php echo $value->categoryName; ?></a>
                                    </div>
                                    <div class="b-0 pt-4">
                                        <center>
                                            <div class="d-inline-flex col-5">
                                                <a title="<?php echo $value->name; ?>"
                                                    class="btn btn-main btn-round-full btn-block "
                                                    href="<?php echo $systemUrl.$eventPage.'/'.$value->id; ?>.html">More Info</a>
                                            </div>
                                            <div class="d-inline-flex p-2"></div>
                                            <div class="d-inline-flex col-5">
                                                <a title="<?php echo $value->name; ?>"
                                                    class="btn btn-main btn-round-full btn-block mb-2"
                                                    href="<?php echo $systemUrl.'c/'.$value->courseId.'.html#all-dates-and-locations'; ?>">Locations</a></div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <?php } ?>
                    <?php } else {echo 'No events found';} ?>
                </div>
                <?php echo $eventsArray->pagination(); ?>
            </div>
        </section>
        <div class="mt-2 pt-5 px-3 rtl">
            <div class="container mb-5">
                <div class="row  ">
                    <h2><?php echo $thetitle; ?></h2>
                    <?php echo $city->about !='' ? html_entity_decode($city->about) : '' ; ?>
                    <div class=" "> Not a destination of your choice? Please <a href="<?php echo $systemUrl ?>contact-us.html"
                            alt="Agile 4 Training Contact" title="Contact Us" class="text">Contact Us</a>
                        <br />
                        Kindly remember that we offer all of our courses online as live stream interactive courses.
                    </div>
                </div>
            </div>
        </div>
        <!-- footer Start -->
        <?php include('layouts/footer.php'); ?>
    </body>
</html>