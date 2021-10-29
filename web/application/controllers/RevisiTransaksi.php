<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class RevisiTransaksi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        belumlogin();
    }
    public function index()
    {
        $data['revisi'] = $this->db->join('otlet', 'otlet.id_otlet = penjualan.id_otlet')->join('user', 'user.id = penjualan.id_penjual')->get_where('penjualan', ['pengajuan' => 'revisi'])->result_array();
        $this->load->view('RevisiTransaksi/index', $data);    
    }

    public function DetailRevisi($id)
    {
        $data['detail'] = $this->db->join('barang', 'barang.id_barang = detail_penjualan.id_barang')->get_where('detail_penjualan', ['id_penjualan' => $id])->result_array();
        $this->load->view('RevisiTransaksi/detail', $data);    
    }
}

/* End of file RevisiTransaksi.php and path /application/controllers/RevisiTransaksi.php */


