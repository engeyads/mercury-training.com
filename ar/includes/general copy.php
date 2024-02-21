<?php
// cURL function
class CallAPI{
    function __construct($scope='/events/',$method='GET',$body_array=''){
        global $host,$secret,$key,$withGET,$scopeURL;
        if(!empty($_SERVER['QUERY_STRING']) and strpos($scope, '?') !== false and $withGET == true){ $qs = '&'.$_SERVER['QUERY_STRING']; }elseif(!empty($_SERVER['QUERY_STRING']) and $withGET == true){ $qs = '?'.$_SERVER['QUERY_STRING']; }else{ $qs = ''; }
        $curl = curl_init();
        $scopeURL = $host.$scope.$qs;

        if (strpos($scopeURL, '&upcoming=false') == true) {
            $scopeURL = str_replace('&upcoming=false', '', $scopeURL);
        } 

        $scopeURL = str_replace('&page=search', '', $scopeURL);

        curl_setopt_array($curl, array(
            CURLOPT_URL => $scopeURL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => array('Secret: '.$secret,'Key: '.$key),
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $body_array,
        ));
        $response = curl_exec($curl);
        // decode the result as JSON.
        $result = $this->result = json_decode($response);
        // http response code
        $this->httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        $withGET = '';
        return $result;
    }
    function gethttpCode(){
        return $this->httpCode;
    }

    function pagination(){
        global $pageLink,$beforePageNumber,$afterPageNumber,$pageRrange,$firstPageLink,$startLast,$previousNext,$hideNumbers,$firstTitle,$lastTitle,$previousTitle,$nextTitle;

        $pageLink = !isset($pageLink) ? '' : $pageLink;

        if($this->httpCode == 200 and isset($this->result->{'totalPages'}) and $this->result->{'totalPages'} > 1){
        
            if($startLast ==''){    $startLast = 0;    }
            if($previousNext ==''){ $previousNext = 0; }
            if($hideNumbers ==''){  $hideNumbers = 0;  }
            if($firstTitle ==''){   $firstTitle = '&laquo; First';  }
            if($lastTitle ==''){   $lastTitle = 'Last &raquo;';  }
            if($previousTitle ==''){   $previousTitle = '&laquo; Previous';  }
            if($nextTitle ==''){   $nextTitle = 'Next &raquo;';  }
            $page_no = $this->result->{'pageNumber'};
            $thetotalPages = $this->result->{'totalPages'};
            if(!isset($pageRrange)){ $pageRrange = 3; }
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
                if(isset($get) and  $get !=''){
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

            $pagination = '<nav><ul class="pagination justify-content-center pt-3" style="direction:ltr;">';

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

$breadCrumbsArray = array();
function breadCrumbs($name,$link,$title){
    global $breadCrumbsArray;
    global $activeCat;
    $activeCat = $name;
    $bc = new stdClass();
    $bc->name = $name;    
    $bc->link = $link;    
    $bc->title = $title;    
    array_push($breadCrumbsArray,$bc);
}

function showBreadCrumbs (){

    // <ol class="breadcrumb mb-4" id="breadcrumbs">
    //                     <li><a rel="home" href="https://mercury-training.com"><i class="fas fa-home"></i></a></li>
    //                     <li> <a href="https://mercury-training.com/public-courses.html">Training Courses</a></li>
    //                     <li class="active">Management &amp; Leadership Courses</li> 
    //                 </ol>


    global $breadCrumbsArray,$systemUrl, $centerName;
    $breadCrumbs = '<div class="col-sm-12 no-print"><ol class="breadcrumb">';
        if (isset($breadCrumbsArray) && (count($breadCrumbsArray) > 0)) {
            $countBC = count($breadCrumbsArray);
            $nn = 0;
            foreach ($breadCrumbsArray as &$value) {

                $nn++;
                if($nn == $countBC){
                    $breadCrumbs .= '<li class="breadcrumb-item active" aria-current="page" title="'. $centerName . ' ' . $value->title.'">'.$value->name.'</li>';
                    ?><?php
                }else{
                    $breadCrumbs .= '<li class="breadcrumb-item"><a href="'.$systemUrl.$value->link.'" title="'. $centerName . ' ' . $value->title.'">'.$value->name.'</a></li>';
                }
                
            }
        }
        $breadCrumbs .='</ol></div>';
        return $breadCrumbs;
}

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
?>