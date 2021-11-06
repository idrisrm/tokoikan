<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class List_Notifkaryawan extends RestController
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index_get()
    {
        $id = $this->get('id_otlet');
        $data = $this->db->query("SELECT * FROM notifikasi WHERE id_otlet = '$id'")->result_array();
        if ($data) {
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'List notifikasi ditemukan',
                    'data' => $data
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'Tidak ada list notifikasi',
                    'data' => null
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }
}
