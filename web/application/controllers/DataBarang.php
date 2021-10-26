<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class DataBarang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        belumlogin();
    }
    public function index()
    {
        $data['barang'] = $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori')->get('barang')->result_array();
        $this->load->view('DataBarang/data', $data);
    }
}

/* End of file DataBarang.php and path /application/controllers/DataBarang.php */


