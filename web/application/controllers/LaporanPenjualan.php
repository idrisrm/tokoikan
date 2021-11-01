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

        $nama = '';
        if ($metode == 1) {
            $nama = 'Cash';
        } else {
            $nama = 'Hutang';
        }

        $this->db->join('detail_penjualan', 'detail_Penjualan.id_penjualan = penjualan.id_penjualan');
        $this->db->join('barang', 'barang.id_barang = detail_penjualan.id_barang');
        $this->db->join('user', 'user.id = penjualan.id_penjual');
        $this->db->join('otlet', 'otlet.id_otlet = penjualan.id_otlet');
        $this->db->where(['penjualan.status' => $metode]);
        $this->db->where('penjualan.created_at BETWEEN "' . date('Y-m-d', strtotime($daritanggal)) . '" and "' . date('Y-m-d', strtotime($sampaitanggal)) . '"');
        $data = $this->db->get('penjualan')->result_array();

        // var_dump($data);die;
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Karyawan');
        $sheet->setCellValue('C1', 'Nama Barang');
        $sheet->setCellValue('D1', 'Jumlah');
        $sheet->setCellValue('E1', 'Harga');
        $sheet->setCellValue('F1', 'Total Harga');

        $no = 1;
        $x = 2;
        foreach ($data as $data) {
            $sheet->setCellValue('A' . $x, $no++);
            $sheet->setCellValue('B' . $x, $data['nama']);
            $sheet->setCellValue('C' . $x, $data['nama_barang']);
            $sheet->setCellValue('D' . $x, $data['qty']);
            $sheet->setCellValue('E' . $x, $data['harga']);
            $sheet->setCellValue('F' . $x, $data['total_harga']);
            $x++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = 'Laporan-Penjualan-' . $nama;

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}

/* End of file LaporanPenjualan.php and path /application/controllers/LaporanPenjualan.php */
