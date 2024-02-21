<?php
    $thePage = 'pages/cities.php';
    $addToTitle = 'Our Cities';
    $addToH1 .= '';
    $thetitle = 'Our Cities' .' - ' . $centerName;
    $theH1 = 'Our Training Courses Venues';  
    breadCrumbs($addToTitle,'cities',$addToTitle);
    $thedescription= 'We offer training opportunities in some of the best training';
    // this is to get the cities keywords to put them to the meta tags inside the page
    $citiesArray = new CallAPIv3($scope = 'resource=cities&with_keyword_description=true&with_about=true&onlyWithEvents=true', $method = 'GET'); 


    if (isset($citiesArray->result->cities) && count($citiesArray->result->cities) > 0) {
        $cities = $citiesArray->result->cities;
        $thekeyword='';
        foreach ($cities as &$value) {   
            $thekeyword .= $value->title.', ';
        }
    }
    $thelink = $systemUrl.'cities';
?>