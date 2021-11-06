<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataPenjualan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function jember()
    {
        $data['jember'] = $this->db->join('detail_penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan')->join('barang', 'barang.id_barang = detail_penjualan.id_barang')->get_where('penjualan', ['penjualan.id_otlet' => '1', 'penjualan.pengajuan' => ''])->result_array();
        
        // var_dump($data);die;
        $this->load->view('DataPenjualan/jember', $data);
    }
    public function situbondo()
    {
        $data['situbondo'] = $this->db->join('detail_penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan')->join('barang', 'barang.id_barang = detail_penjualan.id_barang')->get_where('penjualan', ['penjualan.id_otlet' => '2', 'penjualan.pengajuan' => ''])->result_array();
        
        // var_dump($data);die;
        $this->load->view('DataPenjualan/situbondo', $data);
    }
    // public function datasitubondo()
    // {
    //     $data = $this->db->join('detail_penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan')->join('barang', 'barang.id_barang = detail_penjualan.id_barang')->get_where('penjualan', ['penjualan.id_otlet' => '2'])->result_array();
        
    //     echo json_encode($data);
    // }
    public function bali()
    {
        $data['bali'] = $this->db->join('detail_penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan')->join('barang', 'barang.id_barang = detail_penjualan.id_barang')->get_where('penjualan', ['penjualan.id_otlet' => '3', 'penjualan.pengajuan' => ''])->result_array();
        
        // var_dump($data);die;
        $this->load->view('DataPenjualan/bali', $data);
    }
}

/* End of file DataPenjualan.php and path /application/controllers/DataPenjualan.php */
