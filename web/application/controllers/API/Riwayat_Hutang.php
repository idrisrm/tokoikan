<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_Hutang extends RestController
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index_get()
    {
        $no_ktp = $this->get('no_ktp');
        $data = $this->db->query("SELECT * FROM penjualan WHERE ktp_penghutang = '$no_ktp' AND pengajuan = '' ORDER BY created_at ASC")->result_array();
        if ($data) {
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'List riwayat hutang ditemukan',
                    'data' => $data,
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'Tidak ada list riwayat hutang',
                    'data' => null,
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }
}
