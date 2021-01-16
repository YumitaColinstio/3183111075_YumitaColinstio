<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include_once '../../koneksi.php';

#ambil data di tabel dan masukkan ke array
$query = "SET @NO_URUT=0";
mysqli_query($koneksi, $query);
$query = "SELECT ( @NO_URUT := @NO_URUT + 1 ) nomor,no_pem,tgl_pem,usr_pem,FORMAT(tot_pem,2) AS tot_pem FROM pembelian";
$result = mysqli_query($koneksi, $query);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
array_push($data, $row);
}
$query = "SET @NO_URUT=NULL";
mysqli_query($koneksi, $query);

#setting judul laporan dan header tabel
$judul = "LAPORAN PENJUALAN";
$header = array(
array("label" => "NO", "length" => 10, "align" => "C"),
array("label" => "INVOICE", "length" => 50, "align" => "C"),
array("label" => "TANGGAL", "length" => 40, "align" => "C"),
array("label" => "MEMBER", "length" => 50, "align" => "C"),
array("label" => "TOTAL", "length" => 40, "align" => "C")
);
$align = array(
array("label" => "NO", "length" => 10, "align" => "C"),
array("label" => "INVOICE", "length" => 50, "align" => "C"),
array("label" => "TANGGAL", "length" => 40, "align" => "C"),
array("label" => "MEMBER", "length" => 50, "align" => "C"),
array("label" => "TOTAL", "length" => 40, "align" => "C")
);

#sertakan library FPDF dan bentuk objek
require_once '../fpdf182/fpdf.php';
$pdf = new FPDF();
$pdf->AddPage();

#tampilkan judul laporan
$pdf->SetFont('Arial', 'B', '22');
$pdf->SetTextColor(239, 98, 159);
$pdf->Cell(0, 20, $judul, '0', 1, 'C');

#buat header tabel
$pdf->SetFont('Arial', 'B', '12');
$pdf->SetFillColor(137, 255, 253);
$pdf->SetTextColor(33, 150, 243);
$pdf->SetDrawColor(239, 98, 159);
foreach ($header as $kolom) { $pdf->Cell($kolom['length'], 7, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();

#tampilkan data tabelnya
$pdf->SetFillColor(250, 225, 228);
$pdf->SetTextColor(241, 95, 121);
$pdf->SetFont('Arial', '', '10');
$fill = false;

foreach ($data as $baris) {
$i = 0;
foreach ($baris as $cell) {
$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $align[$i]['align'], true);
$i++;
}
$fill = !$fill;
$pdf->Ln();
}

#output file PDF
$pdf->Output();
?>