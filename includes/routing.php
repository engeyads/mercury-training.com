<?php
global $slash,$addTosearch,$addToTitle,$addToDescription,$addToH1;
$eventsid = '';
//REDIRECT_URL
if(isset($_SERVER['REDIRECT_URL'])){
    $REDIRECT_URL = $_SERVER['REDIRECT_URL'];
}else{
    $REDIRECT_URL = '';
}
$REDIRECT_URLExplode = explode('/',$REDIRECT_URL);

for ($i = 1; $i <= 5; $i++) {
    $pageWord = 'page'.$i;
    if(isset($REDIRECT_URLExplode[$i+$correction])){
        $$pageWord = $REDIRECT_URLExplode[$i+$correction];
        if($i == 1){ $slash .= './'; }else{ $slash .= '../'; }
    }else{
        $$pageWord = '';
    }
}
//Bread crumbs function for home page L1
breadCrumbs($centerSH,null,"home page");
switch ($page1) {
    case '':
        if (count($_GET) > 0) {
            include('controllers/searchController.php');
        } else {
            include('controllers/homeController.php');
        }
        break;
    case 'ga.html':
         include('controllers/gaController.php');
         break;
    case 'about.html':
        include('controllers/aboutController.php');
        break;
    case 'public-courses.html':
        include('controllers/publicController.php');
        break;
    case 'cities.html':
        $isstaticpage=$page1;
        include('controllers/citiesController.php');
        break;
    case 'upcoming.html':
        $isstaticpage=$page1;
        include('controllers/upcomingController.php');
        break;
    case 'online-courses.html':
        include('controllers/onlineController.php');
        break;
    case 'Accreditation.html':
        include('controllers/accreditationController.php');
        break;
    case 'contact-us.html':
        include('controllers/contactController.php');
        break;
    case 'Privacy-Policy.html':
        include('controllers/privacyController.php');
        break;
    case 'terms-and-conditions.html':
        include('controllers/termsController.php');
        break;
    case 'contactReceive.html':
        include('controllers/contactReceiveController.php');
        break;
    case $inquiryReceive:
        // $isstaticpage=$page1;
        include('controllers/inquiryReceiveController.php');
        break;
    case $inquiryReceiveCourse:
        include('controllers/inquiryReceiveCourseController.php');
        break;
    case $registerReceive:
        include('controllers/registerReceiveController.php');
        break;

    case $eventPage:
        include('controllers/eventPageController.php');
        break;

    case $coursePage:
        include('controllers/coursePageController.php');
        break;
    case $cityPage:
        include('controllers/cityPageController.php');
        break;
    case $eventsPage:
        include('controllers/eventsPageController.php');
        break;
    default:
        $slug = str_replace('.html', '', $page1);
        $categoriesArray = new CallAPIv3($scope = 'resource=categories&slug='.$slug.'&with_category=true&withEvents=4&with_overview=true',$method = 'GET');
        if(isset($categoriesArray->result->categories[0])){
            breadCrumbs("Training Courses","public-courses.html","Training Courses");
            $addToTitle = $categoriesArray->result->categories[0]->name;
            $thePage = 'pages/events.php';
            $addToH1 .= $categoriesArray->result->categories[0]->name;
            break;
        }else{

            include('404/index.php');exit;
        }
         
}

if($thePage == 'pages/upcoming.php'){
    $addToScope = '';

    if(isset($slug)){
        $addToScope = '&withSearchItem=true&with_category=true&categoryName='.urlencode($categoriesArray->result->categories[0]->name);
    }

    $withGET = true; // Allow class to read the GET ($_SERVER['QUERY_STRING'])
    $eventsArray = new CallAPIv3($scope = 'resource=events'.$addToScope.'&upcoming=true&withEvents=true&with_overview=true'.$eventsid.(isset($_GET['page']) ? '&page=' . $_GET['page'] : ''),$method = 'GET');
    if(isset($eventsArray->result->searchItem)){
        $searchItem = $eventsArray->result->searchItem;
        if ($page2 != '' && isset($searchItem->category) && (count(array($searchItem->category)) > 0)) {
            foreach ($searchItem->category as $value) {
                if($addToTitle !=''){ $addToTitle .=' ';}
                $addToTitle       .= $value;
                $addToDescription .= $value;
                $addToH1          .= $value;
            }
        }
    }
    
    if (isset($_GET['page']) ) {
        $addToTitle .= ', Page ' . $_GET['page'];
    }

    breadCrumbs($addToH1,$eventPage.'/'.$page2,$addToH1);
}

if($thePage == 'pages/events.php'){
    $addToScope = '';
    if($page1=='city'){
        $currentUrl = $_SERVER['REQUEST_URI'];
        if (preg_match('/\/city\/(\d+)\.html/', $currentUrl, $matches)) {
            $currentUrl = $matches[1];
        }
        $cityView = true;
        $cityid = $currentUrl;
        $eventsid = "&city=$cityid";
    }
    isset($eventsid) ? $eventsid : $eventsid = '';
    if(isset($slug)){
        $addToScope = '&withSearchItem=true&with_category=true&categoryName='.urlencode($categoriesArray->result->categories[0]->name);
    }

    $withGET = true; // Allow class to read the GET ($_SERVER['QUERY_STRING'])
    
    $eventsArray = new CallAPIv3($scope = 'resource=courses'.$addToScope.'&onlyWithEvents=true&withEvents=true&eventslimit=4&with_overview=true'.$eventsid.(isset($_GET['page']) ? '&page=' . $_GET['page'] : ''),$method = 'GET');
    if(isset($eventsArray->result->searchItem)){
        $searchItem = $eventsArray->result->searchItem;
        if ($page2 != '' && isset($searchItem->category) && (count(array($searchItem->category)) > 0)) {
            foreach ($searchItem->category as $value) {
                if($addToTitle !=''){ $addToTitle .=' ';}
                $addToTitle       .= $value;
                $addToDescription .= $value;
                $addToH1          .= $value;
            }
        }
    }
    
    if (isset($_GET['page']) ) {
        $addToTitle .= ', Page ' . $_GET['page'];
    }
    if(isset($addToTitle)){
        if($addToTitle != ''){
            breadCrumbs($addToH1,$eventPage.'/'.$page2,$addToH1);
        }
    }
}

if($thePage == 'pages/eventView.php' || $thePage == 'pages/inquiryReceive.php' || $thePage == 'pages/register.php' || $thePage == 'pages/registerReceive.php' || $thePage == 'pages/contactReceive.php'){
    $currentUrl = $_SERVER['REQUEST_URI'];
    if ($thePage == "pages/register.php") {
        // get name of the page from url ex. 'inquiryReceive', 'register'
        if (preg_match('/\/p\/(\d+)\/register\.html/', $currentUrl, $matches)) {
            $currentUrl = $matches[1];
        }
    }elseif($thePage == 'pages/inquiryReceive.php' || $thePage == 'pages/registerReceive.php'){
        $pageName = substr($thePage, strpos($thePage, '/')+1, strpos($thePage, '.')-strpos($thePage, '/')-1);
        if (preg_match('/\/'.$pageName.'\/(\d+)\.html/', $currentUrl, $matches)) {
            $currentUrl = $matches[1];
        }
    }elseif($thePage == 'pages/contactReceive.php'){
        $currentUrl = 'contactReceive.php';
    }else{
        if (preg_match('/\/p\/(\d+)\.html/', $currentUrl, $matches)) {
            $currentUrl = $matches[1];
        }
    }
    if($thePage != 'pages/contactReceive.php'){

        $addToScop = '&id='.$currentUrl;
        $eventsArray = new CallAPIv3($scope = 'resource=events&with_overview=true&with_category=true&with_price=true&with_hotelPhoto=true&withCategoriesSlug=true'.$addToScop,$method = 'GET');
        if (isset($eventsArray->result->events[0]->name)) {
            $addToTitle = $eventsArray->result->events[0]->name;
        }else{
            include('404/index.php');exit;
        }
    }
    if (isset($eventsArray->result->events[0]->categoryName)) {
        $addToTitle .= ' '.$eventsArray->result->events[0]->startDate;
        $addToTitle .= ' '.$eventsArray->result->events[0]->city;
    }
    if ($thePage == "pages/register.php") {
        $addToTitle .= ' - Register';
    }

    if (isset($eventsArray->result->events) && (count($eventsArray->result->events) ==1)) {
        $events = $eventsArray->result->events[0];
        // //Bread crumbs function L2
        breadCrumbs($events->categoryName,$events->categorySlug.'.html',$events->categoryName);
        breadCrumbs($events->name,'c/'.$events->courseId.'.html',$events->name);
        if($thePage == 'pages/inquiryReceive.php'){
            //Bread crumbs function L5
            breadCrumbs('Inquiry','','Inquiry Receive');
        }
        if($thePage == 'pages/contactReceive.php'){
            //Bread crumbs function L5
            breadCrumbs('contact','','contact Receive');
        }
        if($thePage == 'pages/registerReceive.php'){
            //Bread crumbs function L5
            breadCrumbs('Register','','Register Receive');
        }
    }
}

if($thePage == 'pages/courseView.php' || $thePage =='pages/inquiryReceiveCourse.php'){
    $currentUrl = $_SERVER['REQUEST_URI'];
    $pageName = $thePage == 'pages/courseView.php' ? 'c' : 'inquiryReceiveCourse';
    if (preg_match('/\/'.$pageName.'\/(\d+)\.html/', $currentUrl, $matches)) {
        $categoryId = $matches[1];
        $addToScop = '&code=' . $categoryId;
    } else {
        // If you want to set $addToScop to an empty string when the numeric part is not found
        $addToScop = '';
    }
    
    //call the class
    $courseArray = new CallAPIv3($scope = 'resource=courses&with_overview=true&with_keyword_description=true&with_category=true&withEvents=true&eventslimit=20'.$addToScop,$method = 'GET');


    if (isset($courseArray->result->courses[0]->name)) {
        $addToTitle = $courseArray->result->courses[0]->name;
    }else{
        include('404/index.php');exit;
    }
    if (isset($courseArray->result->events[0]->categoryName)) {
        $addToTitle .= ' '.$courseArray->result->courses[0]->categoryName;
    }
    if (isset($courseArray->result->courses) && (count($courseArray->result->courses) ==1)) {
        $courses = $courseArray->result->courses[0];
        //Bread crumbs function L2
        breadCrumbs($courses->categoryName,$courses->categorySlug.'.html',$courses->categoryName);
        if($thePage == 'pages/inquiryReceiveCourse.php'){
            //Bread crumbs function L5
            breadCrumbs('Inquiry','','Inquiry Receive');
        }
    }
    
}

if($thePage == 'pages/search.php'){
    $addToScope = '&withSearchItem=true&with_category=true';
    $upcoming = '';
    $keyword = '';
    $city = '';
    $category = '';
    $numberOfWeeks = '';
    $month = '';
    if (isset($_GET['upcoming'])) {
        if ($_GET['upcoming'] == 'true') {
            $upcoming = "&upcoming=true";
        }else{
            $upcoming = "";
        }
    }
    if (isset($_GET['m'])) {
        if ($_GET['m'] != '') {
            $month = "&month=" . $_GET['m'];
        }else{
            $month = "";
        }
    }
    if (isset($_GET['keyword'])) {
        if ($_GET['keyword'] == '') {
            $keyword = "";
        }else{
            $keyword = "&keyword=" . urlencode($_GET['keyword']);
        }
    }
    if (isset($_GET['city'])) {
        if ($_GET['city'] == '') {
            $city = "";
        }else{
            $city = "&city=" . $_GET['city'];
        }
    }
    if (isset($_GET['category'])) {
        if ($_GET['category'] == '') {
            $category = "";
        }else{
            $category = "&category=" . $_GET['category'];
        }
    }
    if (isset($_GET['numberOfWeeks'])) {
        if ($_GET['numberOfWeeks'] == '') {
            $numberOfWeeks = "";
        }else{
            $numberOfWeeks = "&numberOfWeeks=" . $_GET['numberOfWeeks'];
        }
    }
    if(isset($_GET['page'])){
        if($_GET['page'] != null){
            $pageing = '&page='.$_GET['page'];
        }else{
            $pageing = '';
        }
    }else{
        $pageing = '';
    }
    $addToScope = "&withSearchItem=true&with_category=true$upcoming$keyword$city$category$numberOfWeeks$month$pageing";

    $withGET = true; // Allow class to read the GET ($_SERVER['QUERY_STRING'])
    $eventsArray = new CallAPIv3($scope = 'resource=events'.$addToScope,$method = 'GET');

    if(isset($eventsArray->result->searchItem)){
        $searchItem = $eventsArray->result->searchItem;
        if ($page2 != '' && isset($searchItem->category) && (count(array($searchItem->category)) > 0)) {
            foreach ($searchItem->category as $value) {
                if($addToTitle !=''){ $addToTitle .=' ';}
                $addToTitle       .= $value;
                $addToDescription .= $value;
                $addToH1          .= $value;
            }
        }
    }
    breadCrumbs($addToH1,$eventPage.'/'.$page2,$addToH1);
}


?>