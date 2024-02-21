<?php
$id = $_GET['id'];
include ('../includes/general.php');
include ('../includes/config.php');

$eventsArray = new CallAPIv3($scope = 'resource=events&id='.$id.'&with_overview=true&with_broshoure=true&with_category=true&with_price=true&limit=1',$method = 'GET');
if (isset($eventsArray->result->events) && (count($eventsArray->result->events) ==1)) {
	$event = $eventsArray->result->events[0];
}else{
	exit;
}

$conference_training_course ='Course';
$coverdate = generateEventFormatedDate($event->startDate, $event->endDate);
$title = $event->name;
$currency = 'Euro';
$firstpagedetail = $coverdate . '<br/>' . $event->city.($event->hotelName != '' ? ' - '.$event->hotelName : '');

$detail = '<style>
strong {
	color: #004b52;   font-size:10px; 
}
div {color: #000; font-size:10px;}
</style>
<div style="text-align:left"><strong>Ref.: </strong> '.$event->code . '_' .$event->id .' <strong> Date: </strong> '.$coverdate.' <strong> Location: </strong> '.$event->city. ($event->hotelName != '' ? ' - '.$event->hotelName : '').' <strong> Fees: </strong> '.$event->price.' <strong> '.$currency.'</strong>
</div>';


// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

$brochure = $event->broshoure;
$brochure = str_replace('<span dir="LTR">&ndash;</span>','-',$brochure);
$brochure = str_replace('&ndash;','-',$brochure);
$brochure = str_replace(')','',$brochure);
$brochure = str_replace('(','',$brochure);

$htmlpersian = '
<style>
		h2 , strong , b , h3, h4 {
		color: #004b52;  
	
	}
	
</style>'.$brochure.'<p style="page-break-after: always;">&nbsp;</p>

<h4 style="text-align:center;background-color:#eeeeef;margin-top:20px;">Registration form on the '.': <br />'.$title.'</h4>
<br><br>

<div style="text-align:left; direction:ltr;"><strong>'.' code: </strong> '.$event->code.' <strong> From: </strong> '.$coverdate.' <strong> Venue: </strong> '.$event->city. ($event->hotelName != '' ? ' - '.$event->hotelName : '').' <strong>'.' Fees: </strong> '.$event->price.' <strong> '.$currency.'</strong>
</div>
<p>Complete & Mail or fax to Mercury Training Center at the address given below</p>
<div style="text-align:center;background-color:#eeeeef;"><strong style="color:#000">Delegate Information</strong></div>
<br>
Full Name (Mr / Ms / Dr / Eng): ........................................................................................................................................................
<br>
Position: ........................................................................................................................................................
<br>
Telephone / Mobile: ........................................................................................................................................................
<br>
Personal E-Mail: ........................................................................................................................................................
<br>
Official E-Mail: ........................................................................................................................................................

<br>
<div style="text-align:center;background-color:#eeeeef;"><strong style="color:#000">Company Information</strong></div>
<br>
Company Name: ........................................................................................................................................................
<br>
Address: ........................................................................................................................................................
<br>
City / Country: ........................................................................................................................................................
<br>
<div style="text-align:center;background-color:#eeeeef;"><strong style="color:#000">Person Responsible for Training and Development</strong></div>
<br>
Full Name (Mr / Ms / Dr / Eng): ........................................................................................................................................................
<br>
Position: ........................................................................................................................................................
<br>
Telephone / Mobile: ........................................................................................................................................................
<br>
Personal E-Mail: ........................................................................................................................................................
<br>
Official E-Mail: ........................................................................................................................................................

<br>

<div style="text-align:center;background-color:#eeeeef;"><strong style="color:#000">Payment Method</strong></div>

<br>
<table width="100%" border="0">
  <tr>
    <td width="3%"><div style="border:1px solid #000;height:10px;width:10px"> </div></td>
    <td width="2%">&nbsp;</td>
    <td width="95%">Please invoice me </td>
  </tr>
  
  <tr>
    <td><div style="border:1px solid #000;height:10px;width:10px"> </div></td>
    <td>&nbsp;</td>
    <td>Please invoice my company</td>
  </tr>
</table>
<br>';


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	public function Header() 
	{
		if ( $this->PageNo() == 1 )
		{
			// get the current page break margin
			$bMargin = $this->getBreakMargin();
			// get current auto-page-break mode
			$auto_page_break = $this->AutoPageBreak;
			// disable auto-page-break
			$this->SetAutoPageBreak(false, 0);
			$this->setRTL(false);
			// set bacground image
			$img_file = K_PATH_IMAGES.'Mercury-cover.png';
			$this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
			$this->ImageSVG(K_PATH_IMAGES.'logoWhite.svg', $x=70, $y=0, $w='70', $h='100', $link='', $align='', $palign='', $border=0, $fitonpage=false);

			$this->setRTL(false);
			// restore auto-page-break status
			$this->SetAutoPageBreak($auto_page_break, $bMargin);
			// set the starting point for the page content
			$this->setPageMark();
		}
		else
		{
			
			// get the current page break margin
			$bMargin = $this->getBreakMargin();
			// get current auto-page-break mode
			$auto_page_break = $this->AutoPageBreak;
			// disable auto-page-break
			$this->SetAutoPageBreak(false, 0);
			$this->setRTL(false);
			// set bacground image
			// $img_file = K_PATH_IMAGES.'euro.jpg';
			// $this->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
			$this->ImageSVG(K_PATH_IMAGES.'mercury-training5.svg', $x=0, $y=0, $w='210', $h='297', $link='', $align='', $palign='', $border=0, $fitonpage=false);
			$this->ImageSVG(K_PATH_IMAGES.'logoWhite.svg', $x=12, $y=0, $w='35', $h='40', $link='', $align='', $palign='', $border=0, $fitonpage=false);
			$this->ImageSVG(K_PATH_IMAGES.'teleen.svg', $x=155, $y=0, $w='50', $h='25', $link='', $align='', $palign='', $border=0, $fitonpage=false);
			$this->ImageSVG(K_PATH_IMAGES.'tele2.svg', $x=8, $y=275, $w='50', $h='30', $link='', $align='', $palign='', $border=0, $fitonpage=false);
			$this->setRTL(false);
			// restore auto-page-break status
			$this->SetAutoPageBreak($auto_page_break, $bMargin);
			// set the starting point for the page content
			$this->setPageMark();
		}
    }
	
	public function Footer() 
	{
        $this->SetY(-125);
        //$this->SetFont('helvetica', 'N', 6);
        //$this->Cell(0, 5, date("m/d/Y H\hi:s"), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}


// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
   
// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
// remove default footer
$pdf->setPrintFooter(true);

$lg = Array();
$lg['a_meta_charset'] = 'UTF-8';
$lg['a_meta_dir'] = 'ltr';
$lg['a_meta_language'] = 'fa';
$lg['w_page'] = 'page';

// set some language-dependent strings (optional)
$pdf->setLanguageArray($lg);

// add a page
$pdf->AddPage();
// set some language dependent data:

$pdf->SetTextColor('0','70','80');
// set font
$pdf->SetFont('dejavusans', '', 18);
$pdf->Ln(1);
$pdf->SetY(80);
$pdf->Cell(2);
// write the second column
$pdf->writeHTMLCell(130, '', '', '', $title, 0, 0, 0, false, 'L', false);

$pdf->Ln(1);
// set font
$pdf->SetFont('dejavusans', '', 11);
$pdf->SetY(110);
$pdf->Cell(5);
// write the second column
$pdf->writeHTMLCell('130', '', '', '', $firstpagedetail, 0, 0, 0, false, 'L', false);

// add a page
$pdf->AddPage();
$pdf->SetTextColor('0','70','80');
// set font
$pdf->SetFont('dejavusans', '', 18);

$pdf->SetY(37);
$pdf->Cell(1);

// write the second column
$pdf->writeHTMLCell('', '', '', '', $title, 0, 0, 0, false, 'L', false);


$pdf->SetY(55);
$pdf->Cell(1);
// set font
$pdf->SetFont('dejavusans', '', 10);
// write the second column
$pdf->writeHTMLCell('', '', '', '', $detail, 0, 0, 0, false, 'C', false);


$pdf->SetFont('dejavusans', '', 12);

$pdf->SetY(68);
$pdf->SetTextColor('25','25','25');
// set font
$pdf->SetFont('dejavusans', '', 10);
// Persian and English content

 // output the HTML content
$pdf->writeHTML($htmlpersian, true, false, true, false, '');

//Close and output PDF document
$pdf->Output($event->id.'.pdf', 'D');
//============================================================+
// END OF FILE
//============================================================+
