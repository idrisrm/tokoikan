<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Hapus_Keranjang extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('API/Api_Model', 'ApiModel');
    }
    public function index_post()
    {
        $id_detail = $this->input->post('id_detail');
        $query = $this->ApiModel->hapus($id_detail, 'id_detail', 'detail_penjualan');
        if ($query) {
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'Berhasil hapus dari keranjang',
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'Gagal hapus dari keranjang',
                ],
                RestController::HTTP_FORBIDDEN
            );
        }
    }
}
