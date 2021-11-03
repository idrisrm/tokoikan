<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Detail_Notif extends RestController
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index_get()
    {
        $id = $this->get('id_notif');
        $data = $this->db->query("SELECT * FROM notifikasi WHERE id_notif = '$id'")->result_array();
        if ($data) {
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'Detail notifikasi ditemukan',
                    'data' => $data
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'Tidak ada detail notifikasi',
                    'data' => null
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }
}
