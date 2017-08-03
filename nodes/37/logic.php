<?php
require('includes/fpdf/fpdf.php');

class PDF extends FPDF
{
	private $pagecount = 0;

	function Header(){
		global $data;
		global $content_width;

		$this->pagecount++;
		if($this->pagecount==1){
			// print name
			$this->SetFont('San','B',16);
			$this->MultiCell($content_width, 5,$data->name,0,'C');
			// print email
			$this->SetFont('PragatiNarrow','',10);
			$this->Cell($content_width, 5,$data->email,0,0,'R',0,$data->email);
			$this->ln();
			// print thick line
			$this->ThickLine1();
		} else {
	    	// Move to the right
	    	$this->SetFont('San','B',16);
	    	$this->Cell($content_width/2,6,$data->name,0,0,'L');
	    	
			$this->SetFont('PragatiNarrow','',10);
			$this->Cell($content_width/2,6,'Page '.$this->pagecount,0,0,'R');
			$this->ln();
			$this->ThickLine1();
		}
	}
	function ThickLine1(){
		global $content_width;
		// print line
		$x = $this->GetX();
		$y = $this->GetY();
		$this->SetFillColor(0,0,0);
		$this->Rect($x, $y, $content_width, 0.61, F);
		$this->SetFillColor(96,96,96);
		$this->Rect($x, $y+0.61, $content_width, 1, F);
		$this->SetFillColor(192,192,192);
		$this->Rect($x, $y+1.61, $content_width, 0.61, F);
		$this->ln();
	}
	function ThickLine2(){
		global $content_width;
		// print line
		$x = $this->GetX();
		$y = $this->GetY();
		$this->SetFillColor(192,192,192);
		$this->Rect($x, $y, $content_width, 0.61, F);
		$this->SetFillColor(96,96,96);
		$this->Rect($x, $y+0.61, $content_width, 1, F);
		$this->SetFillColor(0,0,0);
		$this->Rect($x, $y+1.61, $content_width, 0.61, F);
		$this->ln();
	}
}

// print awards
function li($indent_amount, $char, $value, $date = NULL){
	global $pdf;
	global $indent;
	global $content_width;
	global $column_width;
	global $margin;
	
	// print bullet
	if ($char == NULL) {
		$char = chr(149);
	} else {
		$char = iconv('UTF-8', 'windows-1252', $char);
	}
	$pdf->Cell($indent*$indent_amount,4,$char,'',0,'R');

	// print indented list
	$indent_total = $indent*$indent_amount+$margin['left'];
	$pdf->SetX($indent_total);
	if($date == NULL){
		$pdf->MultiCell(0, 4,iconv('UTF-8', 'windows-1252', $value),0,'J',false);
	} else {
		$column_width2 = ($content_width-$indent*$indent_amount)/2;
		
		$pdf->SetFont('PragatiNarrow','B',10);
		$pdf->Cell($column_width2,4,iconv('UTF-8', 'windows-1252', $value),'',0,'L');
		$pdf->SetFont('PragatiNarrow','',10);
		$pdf->Cell($column_width2,4,$date,'',0,'R');
		$pdf->ln();
	}
}

$pdf = new PDF();

$pdf->AddFont('PragatiNarrow','','PragatiNarrow-Regular.php');
$pdf->AddFont('PragatiNarrow','B','PragatiNarrow-Bold.php');
$pdf->AddFont('PragatiNarrow','I','OpenSans-LightItalic.php');
$pdf->AddFont('San','B','archivob.php');

$margin = array(
	'left' => 10,
	'top' => 10,
	'right' => 10,
);
$content_width = $pdf->GetPageWidth() - $margin['left'] - $margin['right'];
$column_width = $content_width/3;
$indent = 10;

// decode json file
$json_file = file_get_contents('nodes/' . $instance->page['current']['node_id']. '/data.json');
$data = json_decode($json_file);

// init page
$pdf->SetMargins($margin['left'], $margin['top'],$margin['right']);
$pdf->AddPage();

// print objective
$pdf->SetFont('San','B',12);
$pdf->MultiCell($content_width, 8,'OBJECTIVE:',0,'L');
$pdf->SetFont('PragatiNarrow','',10);
$pdf->MultiCell($content_width, 5,$data->objective,0,'C');
$pdf->ln(1);
$pdf->ThickLine2();


// print skills
$pdf->SetFont('San','B',12);
$pdf->MultiCell($content_width, 8,'SKILLS:',0,'L');
$pdf->SetFont('PragatiNarrow','',10);
foreach($data->skills as $key => $value){
	//li($indent_amount, NULL, $value);
    $pdf->Cell($indent,4,chr(149),'',0,'R');
	$pdf->Cell($column_width-$indent,4,$value,'',0,'L');
	if($pdf->GetX() > $column_width*3) {
		$pdf->ln();
	}
}

// print misc.
foreach($data->other as $key => $value){
	$pdf->SetFont('San','B',12);
	$pdf->MultiCell($content_width, 7,strtoupper($value->title).':',0,'L');

	foreach($value->list as $key2 => $value2){
		$pdf->SetFont('PragatiNarrow','B',11);
		li(1, ' ', $value2->title,$value2->date);
		$pdf->SetFont('PragatiNarrow','I',8.5);
		li(1, ' ', $value2->description);
		$pdf->ln(0.4);
		foreach($value2->list as $key3 => $value3){
			$pdf->SetFont('PragatiNarrow','B',10);
			li(2, NULL,  $value3->title);
			foreach($value3->list as $key4 => $value4){
				$pdf->SetFont('PragatiNarrow','',10);
				li(3, '—', $value4);
			}
			$pdf->ln(0.4);
		}
		$pdf->ln(0.4);
	}	
}

$pdf->Output();
?>
