<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class PengambilanPelanggan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $date = date("m");
        $data['pengambilan'] = $this->db->query("SELECT penjualan.subtotal, penjualan.status, penjualan.nama_customer, otlet.wilayah, SUM(penjualan.subtotal) as subtotal FROM penjualan, otlet WHERE penjualan.status = 1 AND otlet.id_otlet = penjualan.id_otlet AND month(penjualan.created_at) = $date GROUP BY nama_customer ORDER BY subtotal DESC")->result_array();

        $this->load->view('Pengambilan/index', $data);
    }

    public function kredit()
    {
        $date = date("m");
        $data['pengambilan'] = $this->db->query("SELECT penjualan.ktp_penghutang, penjualan.subtotal, penjualan.status, hutang.nama_penghutang, otlet.wilayah, SUM(penjualan.subtotal) as subtotal FROM penjualan, otlet, hutang WHERE penjualan.status = 2 AND otlet.id_otlet = penjualan.id_otlet AND hutang.no_ktp = penjualan.ktp_penghutang AND month(penjualan.created_at) = $date GROUP BY ktp_penghutang ORDER BY subtotal DESC")->result_array();

        $this->load->view('Pengambilan/kredit', $data);
    }
}

/* End of file PengambilanPelanggan.php and path \application\controllers\PengambilanPelanggan.php */
