<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends RestController
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index_get()
    {
        $data = $this->db->query("SELECT * FROM kategori WHERE status = 'on'")->result_array();
        if ($data) {
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'Data kategori ditemukan',
                    'data' => $data
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'Tidak ada data kategori',
                    'data' => null
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }
}
