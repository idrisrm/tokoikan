<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends RestController
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index_get()
    {
        $id = $this->input->post('id_penjual');
        $data = $this->db->query("SELECT * FROM penjualan WHERE id_penjual = '$id'")->result_array();
        if ($data) {
            $this->response(
                [
                    'status' => 'true',
                    'pesan' => 'Riwayat transaksi ditemukan',
                    'data' => $data
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => 'false',
                    'pesan' => 'Tidak ada riwayat transaksi',
                    'data' => null
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }
}
