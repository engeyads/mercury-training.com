<?php
// API host
$host = 'https://api.mercury-training.com';
// API secret
$secret = 'giJF6kkoqNQ00vyHMDP7azOuL00vyHMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1yIVBD5b73C75osbmwwsh0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1yIVBD5b73C75osbmwwshQNRC7frWUYrqaTjTpz00vyHMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1yIVBD5b73C75osbmwwsha2y4';
// API Key
$key = 'booking_mera';
$centerName = 'ميركوري للتدريب';
$centerSH = '<i class="fas fa-home"></i>';

// BOOKING
$websiteEmail = "training@mercury-training.com";
$website_code = "merar";
$bookingUrl = 'https://booking.mercury-training.com';
$bookingApiUsername = "api@booking.com";
$bookingApiPassword = "B00kA6$!U78";

if($_SERVER['HTTP_HOST'] == 'localhost'){
    $systemUrl = 'http://localhost/mercury-training.com/ar/';
    $systemEnUrl = 'http://localhost/mercury-training.com/';
    $correction = 1;
    $islocal = 1;
}elseif($_SERVER['HTTP_HOST'] == 'mercury-training.test'){
	$systemUrl = 'https://mercury-training.test/ar/';
    $systemEnUrl = 'https://mercury-training.test/';
	$correction = 0;
	$islocal = 0;
}elseif($_SERVER['HTTP_HOST'] == 'test.mercury-training.com'){
	$systemUrl = 'https://test.mercury-training.com/ar/';
    $systemEnUrl = 'https://test.mercury-training.com/';
    $correction = 0;
    $islocal = 0;
}else{
    $systemUrl = 'https://mercury-training.com/ar/';
    $systemEnUrl = 'https://mercury-training.com/';
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
    1 => 'الدورات-والقيادية-والتطوير.html',
    2 => 'دورات-المحاسبة-والمالية-والبنوك.html',
    3 => 'دورات-الموارد-البشرية-والتدريب.html',
    103 => 'برامج-العقود-والمناقصات-والقانونية.html',
    5 => 'دورات-المشتريات-والمخازن.html',
    90 => 'دورات-التسويق-والمبيعات-وخدمة-العملاء.html',
    91 => 'دورات-السكرتارية-وإدارة-المكاتب.html',
    6 => 'دورات-الهندسة-والفنية-والصيانة.html',
    7 => 'دورات-الأمن-والسلامة.html',
    11 => 'دورات-الإحصاء-والتحليل.html',
    12 => 'دورات-إدارة-المشاريع.html',
    8 => 'المؤتمرات-الدولية-والمهنية.html',
    9 => 'دورات-إدارة-الجودة-والانتاج.html',
    97 => 'دورات-العلاقات-العامة-والاعلام.html',
    87 => 'دورات-التدريب-المهني.html',
    88 => 'الحاسب-الالي-ونظم-المعلومات.html',
    95 => 'البنوك-والتأمين-والخدمات-المالية.html',
    96 => 'إدارة-خدمات-القطاع-الصحي-والصناعات-الدوائية.html',
    98 => 'النفط-والغاز.html',
    99 => 'إدارة-التخطيط-والاستراتيجية.html',
    100 => 'مهارات-التواصل-والكتابة.html',
    104 => 'المهارات-الشخصية-وتطوير-الذات.html',
    105 => 'إدارة-البيانات-وذكاء-الأعمال.html',
    106 => 'إدارة-المشتريات-وسلسلة-التوريد.html',
    107 => 'إدارة-العقود.html',
    108 => 'الابتكار-والتحول-الرقمي.html',
    109 => 'إدارة-تقنية-المعلومات.html',
	110 => 'إدارة-أعمال-البناء.html',
	111 => 'خدمة-العملاء.html',
	102 => 'مهارات-الصحة-والسلامة-والبيئة.html',
	112 => 'أعمال-الصيانة.html',
	114 => 'إدارة-المواصلات-والملاحة-الجوية.html'
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