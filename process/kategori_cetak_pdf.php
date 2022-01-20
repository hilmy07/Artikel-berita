<?php
	include '../fpdf/fpdf.php';
	include '../function/config.php';
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);


	// judul
	$pdf->Cell(190,18,'Daftar Kategori',0,1,'C');

	// judul tabel
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(10,6,'No',1,0,'C');
	$pdf->Cell(180,6,'Nama',1,1,'C');

	// isi tabel
	$no=1;
	$dataKategori= mysqli_query($dbconnect,"SELECT * FROM kategori");
	while ($rowKategori = mysqli_fetch_array($dataKategori)) {
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,6,$no++,1,0,'C');
		$pdf->Cell(180,6,ucfirst($rowKategori['kategori_nama']),1,1,'C');
	}
	
	$pdf->Output();
?>

