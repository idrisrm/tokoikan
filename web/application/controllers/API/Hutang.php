<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Hutang extends RestController
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index_get()
    {
        $data = $this->db->query("SELECT * FROM hutang WHERE status != 3")->result_array();
        if ($data) {
            $total = $this->db->query("SELECT SUM(total_hutang) as all_hutang, COUNT(no_ktp) as all_penghutang FROM hutang WHERE status != 3")->result_array();
            foreach ($total as $t) {
                $this->response(
                    [
                        'status' => 'true',
                        'pesan' => 'List hutang ditemukan',
                        'data' => $data,
                        'total_hutang_semua' => $t['all_hutang'],
                        'total_penghutang' => $t['all_penghutang'],
                    ],
                    RestController::HTTP_OK
                );
            }
        } else {
            $this->response(
                [
                    'status' => 'false',
                    'pesan' => 'Tidak ada list hutang',
                    'data' => null,
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }
}
