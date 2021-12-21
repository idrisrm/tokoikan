<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('otlet', 'Otlet', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('Laporan/index');
        } else {
            $tanggal = $this->input->post('tanggal');
            $otlet = $this->input->post('otlet');

            $data['pokok'] = $this->db->query("SELECT detail_penjualan.id_barang, detail_penjualan.qty, barang.harga_beli, detail_penjualan.created_at, penjualan.id_otlet, detail_penjualan.id_penjualan, penjualan.id_penjualan, SUM(detail_penjualan.qty * barang.harga_beli) as totalnya FROM detail_penjualan, barang, penjualan WHERE detail_penjualan.id_barang = barang.id_barang AND date(detail_penjualan.created_at) = date('$tanggal') AND penjualan.id_otlet = $otlet AND penjualan.id_penjualan = detail_penjualan.id_penjualan")->row_array();

            $data['tanggal'] = $tanggal;
            $data['otlet'] = $this->db->get_where('otlet', ['id_otlet' => $otlet])->row_array();

            // foreach ($pokok as $pokok) {
            //     $datapokok['jumlah'][] = $pokok['qty'] * $pokok['harga_beli'];
            //     // $datapokok['jumlah'][] = $pokok['count'];
            // }a

            $data['penjualan'] = $this->db->query("SELECT detail_penjualan.total_harga, penjualan.id_otlet, detail_penjualan.id_penjualan, penjualan.id_penjualan, SUM(detail_penjualan.total_harga) as totalpenjualan FROM detail_penjualan, penjualan WHERE date(detail_penjualan.created_at) = date('$tanggal') AND penjualan.id_otlet = $otlet AND penjualan.id_penjualan = detail_penjualan.id_penjualan")->row_array();

            $data['biaya'] = $this->db->query("SELECT biaya, SUM(biaya) as total FROM pengeluaran WHERE date(created_at) = date('$tanggal') AND status = 'on'")->row_array();


            $this->load->view('Laporan/index2', $data);
            // var_dump($data);die;
        }
    }

    public function bulanan()
    {

        $this->form_validation->set_rules('bulan', 'Bulan', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('otlet', 'Otlet', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('Laporan/bulanan');
        } else {
            $bulan = $this->input->post('bulan');
            $otlet = $this->input->post('otlet');
            $tahun = $this->input->post('tahun');
            $data['pokok'] = $this->db->query("SELECT detail_penjualan.id_barang, detail_penjualan.qty, barang.harga_beli ,penjualan.id_otlet, detail_penjualan.id_penjualan, penjualan.id_penjualan, SUM(detail_penjualan.qty * barang.harga_beli) as totalnya FROM detail_penjualan, barang, penjualan WHERE detail_penjualan.id_barang = barang.id_barang AND month(detail_penjualan.created_at) = $bulan AND year(detail_penjualan.created_at) = $tahun AND penjualan.id_otlet = $otlet AND penjualan.id_penjualan = detail_penjualan.id_penjualan")->row_array();

            // foreach ($pokok as $pokok) {
            //     $datapokok['jumlah'][] = $pokok['qty'] * $pokok['harga_beli'];
            //     // $datapokok['jumlah'][] = $pokok['count'];
            // }a

            $data['penjualan'] = $this->db->query("SELECT detail_penjualan.total_harga, penjualan.id_otlet, detail_penjualan.id_penjualan, penjualan.id_penjualan, SUM(detail_penjualan.total_harga) as totalpenjualan FROM detail_penjualan, penjualan WHERE month(detail_penjualan.created_at) = $bulan AND year(detail_penjualan.created_at) = $tahun AND penjualan.id_otlet = $otlet AND penjualan.id_penjualan = detail_penjualan.id_penjualan")->row_array();

            $data['biaya'] = $this->db->query("SELECT biaya, SUM(biaya) as total FROM pengeluaran WHERE month(created_at) = $bulan AND year(created_at) = $tahun AND status = 'on'")->row_array();

            $data['bulan'] = $bulan;
            $data['otlet'] = $this->db->get_where('otlet', ['id_otlet' => $otlet])->row_array();

            // var_dump($pokok);die;

            $this->load->view('Laporan/bulanan2', $data);
        }
    }

    public function zakat()
    {

        $this->form_validation->set_rules('bulan', 'Bulan', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        $this->form_validation->set_rules('otlet', 'Otlet', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('Laporan/bulanan');
        } else {
            $bulan = $this->input->post('bulan');
            $otlet = $this->input->post('otlet');
            $tahun = $this->input->post('tahun');
            $data['pokok'] = $this->db->query("SELECT detail_penjualan.id_barang, detail_penjualan.qty, barang.harga_beli ,penjualan.id_otlet, detail_penjualan.id_penjualan, penjualan.id_penjualan, SUM(detail_penjualan.qty * barang.harga_beli) as totalnya FROM detail_penjualan, barang, penjualan WHERE detail_penjualan.id_barang = barang.id_barang AND month(detail_penjualan.created_at) = $bulan AND year(detail_penjualan.created_at) = $tahun AND penjualan.id_otlet = $otlet AND penjualan.id_penjualan = detail_penjualan.id_penjualan")->row_array();

            // foreach ($pokok as $pokok) {
            //     $datapokok['jumlah'][] = $pokok['qty'] * $pokok['harga_beli'];
            //     // $datapokok['jumlah'][] = $pokok['count'];
            // }a

            $data['penjualan'] = $this->db->query("SELECT detail_penjualan.total_harga, penjualan.id_otlet, detail_penjualan.id_penjualan, penjualan.id_penjualan, SUM(detail_penjualan.total_harga) as totalpenjualan FROM detail_penjualan, penjualan WHERE month(detail_penjualan.created_at) = $bulan AND year(detail_penjualan.created_at) = $tahun AND penjualan.id_otlet = $otlet AND penjualan.id_penjualan = detail_penjualan.id_penjualan")->row_array();

            $data['biaya'] = $this->db->query("SELECT biaya, SUM(biaya) as total FROM pengeluaran WHERE month(created_at) = $bulan AND year(created_at) = $tahun AND status = 'on'")->row_array();

            $data['bulan'] = $bulan;
            $data['otlet'] = $this->db->get_where('otlet', ['id_otlet' => $otlet])->row_array();

            // var_dump($pokok);die;

            $this->load->view('Laporan/bulanan2', $data);
        }
    }
}

/* End of file Laporan.php and path \application\controllers\Laporan.php */
