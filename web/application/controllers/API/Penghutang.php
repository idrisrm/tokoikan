<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Penghutang extends RestController
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index_get()
    {
        $data = $this->db->query("SELECT * FROM hutang")->result_array();
        if ($data) {
            $this->response(
                [
                    'status' => 'true',
                    'pesan' => 'List penghutang ditemukan',
                    'data' => $data,
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => 'false',
                    'pesan' => 'Tidak ada list penghutang',
                    'data' => null,
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }
}
