<?php

class CallAPIv3 {
    private $scope;
    private $httpMethod;

    // Properties to store API response data
    public $result;
    public $httpCode;

    public function __construct($scope, $httpMethod = self::HTTP_GET, $lang = 'en') {
        global $systemUrl;
        $host = $systemUrl;
        $this->scope = $host .'api/xyz.php?'. $scope.'&lang='.$lang;
        $this->httpMethod = $httpMethod;
        if (strpos($scope, '&upcoming=false') == true) {
            $scope = str_replace('&upcoming=false', '', $scope);
        } 

        $scope = str_replace('&page=search', '', $scope);
        $this->fetchData();
    }

    public function fetchData() {
        // Initialize a cURL session
        
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $this->scope);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        if ($this->httpMethod === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            // Add POST data if needed
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        }

        // Record the start time
        $startTime = microtime(true);

        // Execute the cURL request
        $response = curl_exec($ch);

        // Calculate the time taken to retrieve data
        $timeTaken = microtime(true) - $startTime;

        // Check for cURL errors
        if (curl_errno($ch)) {
            // Handle errors here
            $this->result = (object)[
                'error' => 'cURL Error: ' . curl_error($ch),
            ];
            $this->httpCode = 500; // Internal Server Error
            return;
        }

        // Close the cURL session
        curl_close($ch);

        // Decode the JSON response as an object
        $data = json_decode($response);

        if (!$data) {
            // Handle JSON decoding errors here
            $this->result = (object)[
                'error' => 'Failed to decode JSON response',
            ];
            $this->httpCode = 500; // Internal Server Error
            return;
        }

        // Assuming the API response contains pagination information,
        // customize this part based on your API response structure
        $this->result = $data; // Store the raw API response
        $this->httpCode = 200; // Set HTTP status code from the response
    }
    function gethttpCode(){
        return $this->httpCode;
    }
    function pagination(){
        global $pageLink,$beforePageNumber,$afterPageNumber,$pageRrange,$firstPageLink,$startLast,$previousNext,$hideNumbers,$firstTitle,$lastTitle,$previousTitle,$nextTitle;
        $pageLink = !isset($pageLink) ? '' : $pageLink;
        if($this->httpCode == 200 && isset($this->result->{'totalPages'}) && $this->result->{'totalPages'} > 1){
            if($startLast ==''){    $startLast = 0;    }
            if($previousNext ==''){ $previousNext = 0; }
            if($hideNumbers ==''){  $hideNumbers = 0;  }
            if($firstTitle ==''){   $firstTitle = '&laquo; First';  }
            if($lastTitle ==''){   $lastTitle = 'Last &raquo;';  }
            if($previousTitle ==''){   $previousTitle = '&laquo; Previous';  }
            if($nextTitle ==''){   $nextTitle = 'Next &raquo;';  }
            $page_no = $this->result->{'pageNumber'};
            $thetotalPages = $this->result->{'totalPages'};
            if(!isset($pageRrange)){ $pageRrange = 1; }
            if(!isset($page_no)){ $page_no =1; }
            if(!isset($thetotalPages)){ $thetotalPages =1; }
            if(!isset($pageLink)){ 
                $get = '';
                $nm = 0;
                foreach($_GET as $key => $value) {
                    if($key !='page'){
                        $nm++;
                        if($nm == 1){ $get .= '?'; }else{ $get .= '&'; }
                        $get .= $key.'='.$value; 
                    }
                }
                $pageLink = $_SERVER['PHP_SELF'].$get; 
            }
            if(!isset($beforePageNumber)){ 
                if(isset($get) &&  $get !=''){
                    $beforePageNumber ='&page=';
                }else{
                    $beforePageNumber ='?page=';
                }
            }
            if($firstPageLink =='')
            { 
                //$firstPageLink = $pageLink;
                // By Sadaf
                $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
                $firstPageLink = $uri_parts[0];
            }
            $pagination = '<nav class="direction"><ul class="pagination justify-content-center pt-3">';
            // if($page_no > 1 and $startLast ==1){
            //     $pagination .='<li class="page-item"><a href="'.$firstPageLink.'" class="page-link">'.$firstTitle.'</a></li>';
            // };
            // if($page_no > 1 and $previousNext ==1){
            //     $previousPage = $page_no-1;
            //     if($previousPage == 1){ $previousLink = $firstPageLink; }else{ $previousLink = $pageLink.$beforePageNumber.$previousPage.$afterPageNumber; }
            //     $pagination .='<li class="page-item"><a href="'.$previousLink.'" class="page-link">'.$previousTitle.'</a></li>';
            // };
            // By Sadaf
            if($page_no > 1)
            {
                $beforePageNumber_s = $page_no-1;
                $beforePageNumber_s = $beforePageNumber_s == 1 ? $firstPageLink : '?page=' . $beforePageNumber_s;
                if(count($_GET) > 0)
                {
                    $sign = $beforePageNumber_s == $firstPageLink  ? '?' : '&';
                    unset($_GET['page']);
                    $beforePageNumber_s = $beforePageNumber_s . $sign . http_build_query($_GET, '', '&');
                }
                $pagination .='<li class="page-item"><a href="'.$beforePageNumber_s.'" class="page-link">&laquo;</a></li>';
            };
            if($hideNumbers !=1)
            {
                $arraystr = array();
                for($i = 1; $i <= $pageRrange; $i++)
                {
                    array_push($arraystr,$i);
                    array_push($arraystr,$thetotalPages+1-$i);
                }
                if($page_no-3 == $pageRrange){array_push($arraystr,$page_no-2); }
                if($page_no+3 == $thetotalPages-$pageRrange+1){array_push($arraystr,$page_no+2); }
                array_push($arraystr,$page_no-1);
                array_push($arraystr,$page_no+1);
                array_push($arraystr,$page_no);	

                for($i = 1; $i <= $thetotalPages; $i++) 
                {
                    if(in_array($i,$arraystr))
                    {
                        $inarray = 1;
                        $pagination .= ' <li class="page-item';
                        $pagination .= ($page_no == $i ? ' active' : '');
                        $pLinke = $i == 1 ? $firstPageLink : $pageLink.$beforePageNumber.$i.$afterPageNumber;
                        if(count($_GET) > 0)
                        {
                            $sign = $pLinke == $firstPageLink  ? '?' : '&';
                            unset($_GET['page']);
                            $pLinke = $pLinke . $sign . http_build_query($_GET, '', '&');
                        }
                        $pagination .= '"><a class="page-link" href="'.$pLinke.'">'.$i.'</a></li>';
                    }
                    else
                    {
                        if($inarray == 1)
                        { 
                            $pagination .='<li class="page-item"><span class="page-link">...</span></li>'; 
                        }
                        $inarray = 0;	
                    }	
                }
            }
            // if($page_no < $thetotalPages and $previousNext ==1){
            //     $nextPage = $page_no+1;
            //     $pagination .=' <li class="page-item"><a href="'.$pageLink.$beforePageNumber.$nextPage.$afterPageNumber.'"  class="page-link">'.$nextTitle.'</a></li>';
            // };

            // if($page_no < $thetotalPages and $startLast ==1){
            //     $pagination .=' <li class="page-item"><a href="'.$pageLink.$beforePageNumber.$thetotalPages.$afterPageNumber.'"  class="page-link">'.$lastTitle.'</a></li>';
            // };

            // By Sadaf
            if($page_no >= 1 and ($page_no < $thetotalPages))
            {
                $lastLink_s = $page_no+1;
                if(count($_GET) > 0)
                {
                    unset($_GET['page']);
                    $lastLink_s = $lastLink_s . '&' . http_build_query($_GET, '', '&');
                }
                $pagination .='<li class="page-item"><a href="?page='.$lastLink_s.'" class="page-link">&raquo;</a></li>';
            };
            $pagination .='</ul></nav>';
            return $pagination;
        }else{
            return null;
        }
    }
}



// // Example usage:
// $apiUrl = 'https://example.com/xyz.php'; // Replace with your API URL
// $httpMethod = 'GET'; // Replace with your desired HTTP method (e.g., 'POST')
// $api = new CallAPIv3($apiUrl, $httpMethod);
// $result = $api->fetchData();

// // Check if there was an error
// if (isset($result['error'])) {
//     echo 'Error: ' . $result['error'];
// } else {
//     // Process and use the API data as needed
//     var_dump($result);
// }
$breadCrumbsArray = array();
function breadCrumbs($name,$link,$title){
    global $breadCrumbsArray;
    global $activeCat;
    $activeCat = $name;
    $bc = new stdClass();
    $bc->name = $name;    
    $bc->link = $link;    
    $bc->title = $title;    
    // initiate breadcrumbsarray to store breadcrumbs in pages
    array_push($breadCrumbsArray,$bc);
}
function breadCrumbsWithType($name,$link,$title,$itemtype){
    global $breadCrumbsArray;
    global $activeCat;
    $activeCat = $name;
    $bc = new stdClass();
    $bc->name = $name;    
    $bc->link = $link;    
    $bc->title = $title;  
    $bc->itemtype = $itemtype;
    // initiate breadcrumbsarray to store breadcrumbs in pages
    array_push($breadCrumbsArray,$bc);
}
// this is to show breadcrumbs in pages (main page - subpages) to help google crawl your website and get much faster
function showBreadCrumbs (){
    global $breadCrumbsArray,$systemUrl, $centerName;
    
    $breadCrumbs = '<ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">';
        if (isset($breadCrumbsArray) && (count($breadCrumbsArray) > 0)) {
            $countBC = count($breadCrumbsArray);
            $nn = 0;
            foreach ($breadCrumbsArray as &$value) {
                if($nn > 0) {
                    // $breadCrumbs .= '<span class="text-blue"> &nbsp;›&nbsp;</span>';
                }
                $nn++;
                if($nn == $countBC){
                    $breadCrumbs .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope
                    itemtype="https://schema.org/ListItem">
                  <span itemprop="name">'.$value->name.'</span>
                  <meta itemprop="position" content="'.$nn.'" />
                </li>';
                }elseif($nn == 1){
                    $breadCrumbs .='<li class="breadcrumb-item" itemprop="itemListElement" itemscope
                    itemtype="https://schema.org/ListItem">
                  <a itemprop="item" title="'.($value->title == 'home page' ? 'Home' : $value->title).'" href="'.$systemUrl.$value->link.'" >
                      <span itemprop="name">'.($value->name == 'Home' ?'<i class="fas fa-home"></i>' : $value->name).'</span></a>
                  <meta itemprop="position" content="1" />
                </li>'; 
                }else{
                    $breadCrumbs .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope
                    itemtype="https://schema.org/ListItem">
                  <a itemscope itemtype="https://schema.org/WebPage"
                     itemprop="item" itemid="'.$systemUrl.$value->link.'"
                     href="'.$systemUrl.$value->link.'" title="'.$value->title.'">
                    <span itemprop="name">'.$value->name.'</span></a>
                  <meta itemprop="position" content="'.$nn.'" />
                </li>';
                }
                
                
            }
        }
        $breadCrumbs .='</ol>';

        return $breadCrumbs;
}
//showBreadCrumbs ();
function postTitle($name){
    global $$name;
    if(isset($_POST[$name])){
        $$name = addslashes($_POST[$name]) ;
    }else{
        $$name = '';
    }
}
function weekLength($num){
    return  '<span class="num-dur">'. ($num * 5 * 5) . '</span>' .' <span class="duration"> Hours</span>' ;
    // return $weekLength;
}

function resize_image($file, $w, $h, $crop=FALSE) {
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    $src = imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}


?>