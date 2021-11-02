<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends RestController
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index_get()
    {
        $id = $this->get('id_penjual');
        $data = $this->db->query("SELECT * FROM penjualan WHERE status = 0 AND id_penjual = '$id'")->row_array();
        if ($data) {
            $id_penjualan = $data['id_penjualan'];
            $databarang = $this->db->query("SELECT * FROM detail_penjualan, barang WHERE detail_penjualan.id_barang = barang.id_barang AND detail_penjualan.id_penjualan = '$id_penjualan'")->result_array();
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'Keranjang ditemukan',
                    'data' => $data,
                    'data_barang' => $databarang,
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'Tidak ada keranjang',
                    'data' => null
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }
}
