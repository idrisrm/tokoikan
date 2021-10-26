<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Barang_Kategori extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Api_Model', 'model');
    }
    public function index_get()
    {
        $id = $this->input->post('id_kategori');
        $data = $this->db->query("SELECT barang.nama_barang, barang.harga, barang.stok, kategori.nama_kategori FROM barang, kategori WHERE barang.id_kategori = kategori.id_kategori AND kategori.id_kategori = '$id'")->result_array();
        if ($data) {
            $this->response(
                [
                    'status' => 'true',
                    'pesan' => 'Data barang ditemukan',
                    'data' => $data
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => 'false',
                    'pesan' => 'Tidak ada data barang',
                    'data' => 'null'
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }
}
