<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Detail_Riwayat extends RestController
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index_get()
    {
        $id = $this->get('id_penjualan');
        $data = $this->db->query("SELECT * FROM penjualan, detail_penjualan WHERE penjualan.id_penjualan = detail_penjualan.id_penjualan AND penjualan.id_penjualan = '$id'")->result_array();
        if ($data) {
            $this->response(
                [
                    'status' => 'true',
                    'pesan' => 'Detail riwayat transaksi ditemukan',
                    'data' => $data
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => 'false',
                    'pesan' => 'Tidak ada detail riwayat transaksi',
                    'data' => null
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }
}
