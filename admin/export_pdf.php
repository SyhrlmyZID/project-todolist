<?php

// Include TCPDF Library
require_once('../vendor/tecnickcom/tcpdf/tcpdf.php');

// Koneksi Database
include '../config/connection.php';

// Create new PDF document
$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Luxe Task');
$pdf->SetTitle('Laporan Data Pengguna');
$pdf->SetSubject('Export PDF');
$pdf->SetKeywords('Luxe Task, PDF, Users');

// Set Header
$pdf->SetHeaderData('', 0, 'Laporan Data Pengguna', 'Luxe Task | Dashboard Pengguna', array(0, 64, 255), array(0, 64, 128));
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set margins
$pdf->SetMargins(10, 30, 10);
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(10);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 10);

// Set font
$pdf->SetFont('helvetica', '', 10);

// Add a page
$pdf->AddPage();

// Query untuk mengambil semua data dari tabel users
$query = "SELECT * FROM users";
$result = $conn->query($query);

// Desain Tabel Header
$html = '
<h2 style="text-align:center; color:#5a67d8;">Laporan Data Pengguna</h2>
<table border="1" cellpadding="5" cellspacing="0" style="width:100%; border-collapse:collapse;">
    <thead>
        <tr style="background-color:#5a67d8; color:white;">
            <th style="text-align:center; width:20%;">ID</th>
            <th style="text-align:left; width:20%;">Nama</th>
            <th style="text-align:left; width:20%;">Email</th>
            <th style="text-align:center; width:20%;">Role</th>
            <th style="text-align:center; width:20%;">Tanggal Pembuatan</th>
        </tr>
    </thead>
    <tbody>';

// Isi Tabel dengan Data Users
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= '
        <tr>
            <td style="text-align:center;">' . $row['user_id'] . '</td>
            <td>' . htmlspecialchars($row['name']) . '</td>
            <td>' . htmlspecialchars($row['email']) . '</td>
            <td style="text-align:center;">' . $row['role'] . '</td>
            <td style="text-align:center;">' . $row['created_at'] . '</td>
        </tr>';
    }
} else {
    $html .= '
    <tr>
        <td colspan="5" style="text-align:center; color:red;">Tidak ada data pengguna.</td>
    </tr>';
}

$html .= '</tbody></table>';

// Print HTML content to PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output the PDF as download
$pdf->Output('Laporan_Data_Pengguna.pdf', 'D');
header('Location: dashboard_pengguna.php');

?>
