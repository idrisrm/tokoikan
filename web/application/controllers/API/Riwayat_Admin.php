<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_Admin extends RestController
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index_get()
    {
        $data = $this->db->query("SELECT penjualan.*, otlet.wilayah FROM penjualan, otlet WHERE penjualan.id_otlet = otlet.id_otlet AND penjualan.status != 0 ORDER BY penjualan.created_at DESC")->result_array();
        if ($data) {
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'Riwayat transaksi ditemukan',
                    'data' => $data
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'Tidak ada riwayat transaksi',
                    'data' => null
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }
}
