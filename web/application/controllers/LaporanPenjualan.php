<?php
require 'vendor/autoload.php';

//Memanggil class dari PhpSpreadsheet dengan namespace
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

defined('BASEPATH') or exit('No direct script access allowed');


class LaporanPenjualan extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        belumlogin();
    }
    public function jember()
    {
        $daritanggal = $this->input->post('daritanggal');
        $sampaitanggal = $this->input->post('sampaitanggal');
        $metode = $this->input->post('metode');



        $this->db->where(['status' => $metode]);
        $this->db->where('created_at BETWEEN "' . date('Y-m-d', strtotime($daritanggal)) . '" and "' . date('Y-m-d', strtotime($sampaitanggal)) . '"');
        $data = $this->db->get('penjualan')->result_array();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'subtotal');
        // $sheet->setCellValue('C1', 'Kelas');
        // $sheet->setCellValue('D1', 'Jenis Kelamin');
        // $sheet->setCellValue('E1', 'Alamat');

        $no = 1;
        $x = 2;
        foreach ($data as $data) {
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $data['sub_total']);
            // $sheet->setCellValue('C' . $x, $row->kelas);
            // $sheet->setCellValue('D' . $x, $row->jenis_kelamin);
            // $sheet->setCellValue('E' . $x, $row->alamat);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan-Penjualan';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}

/* End of file LaporanPenjualan.php and path /application/controllers/LaporanPenjualan.php */
