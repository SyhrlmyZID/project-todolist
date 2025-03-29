<?php

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

// Koneksi Database
include '../config/connection.php';

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle("Data Users");

// Judul dan Deskripsi
$sheet->setCellValue('A1', 'Laporan Data Pengguna - LuxeTask');
$sheet->setCellValue('A2', 'Data ini berisi daftar pengguna yang terdaftar di website LuxeTask.');
$sheet->mergeCells('A1:E1');
$sheet->mergeCells('A2:E2');
$sheet->getStyle('A1:A2')->getFont()->setBold(true)->setSize(14)->getColor()->setARGB(Color::COLOR_WHITE);
$sheet->getStyle('A1:A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A1:A2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setARGB('5a67d8');

// Desain Header Tabel
$sheet->setCellValue('A4', 'ID')
      ->setCellValue('B4', 'Name')
      ->setCellValue('C4', 'Email')
      ->setCellValue('D4', 'Role')
      ->setCellValue('E4', 'Created At');

$sheet->getStyle('A4:E4')->getFont()->setBold(true)->setSize(12)->getColor()->setARGB(Color::COLOR_WHITE);
$sheet->getStyle('A4:E4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A4:E4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setARGB('5a67d8'); // Warna header biru

// Isi Data
$row = 5;
while ($data = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $row, $data['user_id'])
          ->setCellValue('B' . $row, $data['name'])
          ->setCellValue('C' . $row, $data['email'])
          ->setCellValue('D' . $row, ucfirst($data['role']))
          ->setCellValue('E' . $row, $data['created_at']);
    $row++;
}

// Styling Border Tabel
$sheet->getStyle('A4:E' . ($row - 1))
      ->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

// Mengatur lebar kolom otomatis
foreach (range('A', 'E') as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
}

// Output file Excel
$filename = "Data_Users_LuxeTask_" . date('Y-m-d') . ".xlsx";
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
header('Location: dashboard_pengguna.php');
exit;

?>
