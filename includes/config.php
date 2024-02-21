<?php
// API host
$host = 'https://api.mercury-training.com';
// API secret
$secret = 'giJF6kkoqNQ00vyHMDP7azOuL00vyHMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1yIVBD5b73C75osbmwwsh0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1yIVBD5b73C75osbmwwshQNRC7frWUYrqaTjTpz00vyHMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1yIVBD5b73C75osbmwwsha2y4';
// API Key
$key = 'booking_mere';
$centerName = 'Mercury Training';
$centerSH = '<i class="fas fa-home"></i>';
$ga_cookie_name = "GACookie";

// BOOKING
$websiteEmail = "training@mercury-training.com";
$website_code = "mer";
$bookingUrl = 'https://booking.mercury-training.com';
$bookingApiUsername = "api@booking.com";
$bookingApiPassword = "B00kA6$!U78";

if($_SERVER['HTTP_HOST'] == 'localhost'){
    // $systemUrl = 'http://localhost/mercury/';
    $systemUrl = 'http://localhost/mercury-training.com/';
    $correction = 1;
    $islocal = 1;
}elseif($_SERVER['HTTP_HOST'] == 'test.mercury-training.com'){
	$systemUrl = 'https://test.mercury-training.com/';
	$correction = 0;
	$islocal = 0;
}elseif($_SERVER['HTTP_HOST'] == 'mercury-training.test'){
	$systemUrl = 'https://mercury-training.test/';
	$correction = 0;
	$islocal = 1;
}else{
    $systemUrl = 'https://mercury-training.com/';
    $correction = 0;
    $islocal = 0;
}
$eventsPage = 'events';
$eventPage = 'p';
$coursePage = 'c';
$cityPage = 'city';
$citiesPage = 'cities';
$inquiryReceive = 'inquiryReceive';
$inquiryReceiveCourse = 'inquiryReceiveCourse';
$registerReceive = 'registerReceive';
$contactReceive = 'contactReceive';


$categorySlugs = [
    1 => 'management-leadership-seminars.html',
    2 => 'finance-and-accounting-seminars.html',
    28 => 'HRM-Training-Seminars.html',
    23 => 'Project-Management-Seminars.html',
    24 => 'Quality-Management.html',
    31 => 'Public-Relations-Customer-Service.html',
    25 => 'Secretary-and-Office-Management.html',
    27 => 'Healthcare-and-Hospital-Management.html',
    32 => 'customer-service.html',
    33 => 'aviation-airports.html',
    6 => 'Engineering-Oil-and-Gas.html',
    34 => 'banking-seminars.html',
    7 => 'health-safety-security.html',
    8 => 'Conferences.html',
    9 => 'Management-Analysis-and-Operational-Auditing.html',
    10 => 'CAD-Digitization-of-Engineering-Drawings-Maps.html',
    11 => 'Electrical-Renewable-Energy-Power-DCS.html',
    12 => 'ENVIRONMENT-WATER-WASTE-WATER-TREATMENT.html',
    29 => 'Training-Human-Resources-Development-HR-Best-Practices.html',
    30 => 'documents-management.html',
    21 => 'Intellectual-Property-Management-R-and-D-Management.html',
    15 => 'information-technology.html',
    16 => 'Knowledge-Intellectual-Property-R-and-D-Management.html',
    17 => 'maintenance-engineering.html',
    19 => 'chemical-engineering.html',
    20 => 'industrial-marketing-management-business-development.html',
    22 => 'Procurement-and-Logistics.html'
];

function generateEventFormatedDate($startDate, $endDate, $code=null)
{
	$english_months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
	$arabic_months = array('يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو','يوليو', 'اغسطس', 'سبتمبر', 'اكتوبر', 'نوفمبر', 'ديسمبر');

	$startDate = new DateTime($startDate);
	$endDate = new DateTime($endDate);

	//-------------------------------------------------------------------------------------------------
	// Parse Start date
	//-------------------------------------------------------------------------------------------------
		$day = $startDate->format('d');
		$month = (int) $startDate->format('m');
		$year = $startDate->format('Y');

		if($code == 'ar')
		{
			$month = $arabic_months[$month-1];
		}
		else
		{
			$month = $english_months[$month-1];
		}

		$finalStartDate = $day . ' ' . $month . ' ' . $year;

	//-------------------------------------------------------------------------------------------------
	// Parse End date
	//-------------------------------------------------------------------------------------------------
		$eday = $endDate->format('d');
		$emonth = (int) $endDate->format('m');
		$eyear = $endDate->format('Y');

		if($code == 'ar')
		{
			$emonth = $arabic_months[$emonth-1];
		}
		else
		{
			$emonth = $english_months[$emonth-1];
		}

		$finalEndDate = $eday . ' ' . $emonth . ' ' . $eyear;

	//-------------------------------------------------------------------------------------------------
	// Generate Final Date format from start and end date
	//-------------------------------------------------------------------------------------------------
		if($year == $eyear)
		{
			if($month == $emonth)
			{
				$finalDate = $day . ' - ' . $eday . ' ' . $month . ' ' . $year;
			}
			else
			{
				$finalDate = $day . ' ' . $month . ' - ' . $eday . ' ' . $emonth . ' ' . $year;
			}
		}
		else
		{
			$finalDate = $day . ' ' . $month . ' ' . $year . ' - ' . $eday  . ' ' . $emonth . ' ' . $eyear;
		}
	
	return $finalDate;
}

?>