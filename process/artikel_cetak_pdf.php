<?php
	include '../fpdf/fpdf.php';
	include '../function/config.php';
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);


	// judul
	$pdf->Cell(190,18,'Daftar Artikel',0,1,'C');

	// judul tabel
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(10,6,'No',1,0,'C');
	$pdf->Cell(30,6,'Tanggal',1,0,'C');
	$pdf->Cell(148,6,'Judul',1,1,'C');

	// isi tabel
	$no=1;
	$dataArtikel = $dataArtikel= mysqli_query($dbconnect,"SELECT * FROM artikel INNER JOIN kategori ON artikel.kategori_id = kategori.kategori_id");
	while ($rowArtikel = mysqli_fetch_array($dataArtikel)) {
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,6,$no++,1,0,'C');
		$pdf->Cell(30,6,$rowArtikel['artikel_tanggal'],1,0,'C');
		$pdf->Cell(148,6,$rowArtikel['artikel_judul'],1,1,'C');
	}
	
	$pdf->Output();
?>

