<?php
$id = $_GET['id'];
include ('../includes/general.php');
include ('../includes/config.php');

$courseArray = new CallAPIv3($scope = 'resource=courses&code='.$id.'&with_overview=true&with_category=true&with_broshoure=true&limit=1',$method = 'GET');
if (isset($courseArray->result->courses) && (count($courseArray->result->courses) ==1)) {
	$course = $courseArray->result->courses[0];
}else{
	exit;
}

$conference_training_course ='مسار';
$title = $course->name;

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

$brochure = $course->broshoure;
$brochure = str_replace('<span dir="LTR">&ndash;</span>','-',$brochure);
$brochure = str_replace('&ndash;','-',$brochure);
$brochure = str_replace(')','',$brochure);
$brochure = str_replace('(','',$brochure);

$htmlpersian = $brochure;

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

			$this->setRTL(true);
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
			$this->ImageSVG(K_PATH_IMAGES.'telear.svg', $x=155, $y=0, $w='50', $h='25', $link='', $align='', $palign='', $border=0, $fitonpage=false);
			$this->ImageSVG(K_PATH_IMAGES.'tele2.svg', $x=8, $y=275, $w='50', $h='30', $link='', $align='', $palign='', $border=0, $fitonpage=false);
			$this->setRTL(true);
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
$pdf->SetMargins(PDF_MARGIN_LEFT, 37, PDF_MARGIN_RIGHT);
// remove default footer
$pdf->setPrintFooter(true);

$lg = Array();
$lg['a_meta_charset'] = 'UTF-8';
$lg['a_meta_dir'] = 'rtl';
$lg['a_meta_language'] = 'fa';
$lg['w_page'] = 'page';

// set some language-dependent strings (optional)
$pdf->setLanguageArray($lg);

// add a page
$pdf->AddPage();
// set some language dependent data:

$pdf->SetTextColor('0','70','80');
// set font
$pdf->SetFont('aealarabiya', '', 18);
$pdf->Ln(1);
$pdf->SetY(80);
$pdf->Cell(2);
// write the second column
$pdf->writeHTMLCell(130, '', '', '', $title, 0, 0, 0, false, 'R', false);

$pdf->Ln(1);
// set font
$pdf->SetFont('aealarabiya', '', 14);
$pdf->SetY(110);
$pdf->Cell(1);
// write the second column
$firstpagedetail = isset($firstpagedetail) ?? '';

$pdf->writeHTMLCell('130', '', '', '', $firstpagedetail, 0, 0, 0, false, 'R', false);

// add a page
$pdf->AddPage();
$pdf->SetTextColor('0','70','80');

// set font
$pdf->SetFont('aealarabiya', '', 18);
$pdf->SetY(37);
$pdf->Cell(1);
// write the second column
$pdf->writeHTMLCell('', '', '', '', $title, 0, 0, 0, false, 'C', false);

$pdf->SetFont('aealarabiya', '', 12);
$pdf->SetY(68);
$pdf->SetTextColor('25','25','25');
// set font
$pdf->SetFont('aealarabiya', '', 10);
// Persian and English content

 // output the HTML content
$pdf->writeHTML($htmlpersian, true, false, true, false, '');

//Close and output PDF document
$pdf->Output($course->courseId.'.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
