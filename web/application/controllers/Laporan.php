<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {

        $this->form_validation->set_rules('bulan', 'Bulan', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        if($this->form_validation->run() == false){
            $this->load->view('Laporan/index');
        }else{
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $data['pokok'] = $this->db->query("SELECT detail_penjualan.id_barang, detail_penjualan.qty, barang.harga_beli ,SUM(detail_penjualan.qty * barang.harga_beli) as totalnya FROM detail_penjualan, barang WHERE detail_penjualan.id_barang = barang.id_barang AND month(detail_penjualan.created_at) = $bulan AND year(detail_penjualan.created_at) = $tahun")->row_array();

            // foreach ($pokok as $pokok) {
            //     $datapokok['jumlah'][] = $pokok['qty'] * $pokok['harga_beli'];
            //     // $datapokok['jumlah'][] = $pokok['count'];
            // }a

            $data['penjualan'] = $this->db->query("SELECT detail_penjualan.total_harga, SUM(detail_penjualan.total_harga) as totalpenjualan FROM detail_penjualan WHERE month(detail_penjualan.created_at) = $bulan AND year(detail_penjualan.created_at) = $tahun ")->row_array();

            $data['biaya'] = $this->db->query("SELECT biaya, SUM(biaya) as total FROM pengeluaran WHERE month(created_at) = $bulan AND year(created_at) = $tahun AND status = 'on'")->row_array();

            // var_dump($pokok);die;

            $this->load->view('Laporan/index', $data);
        }





    }
}

/* End of file Laporan.php and path \application\controllers\Laporan.php */
