<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Update_Qty extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('API/Api_Model', 'ApiModel');
    }
    public function index_post()
    {
        $id_detail = $this->input->post('id_detail');
        $qty = $this->input->post('qty');
        $total_harga = $this->input->post('total_harga');
        $data = [
            'qty' => $qty,
            'total_harga' => $total_harga
        ];
        $query = $this->ApiModel->ubah($data, $id_detail, 'id_detail', 'detail_penjualan');
        if ($query) {
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'Berhasil ubah qty',
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'Gagal ubah qty',
                ],
                RestController::HTTP_FORBIDDEN
            );
        }
    }
}
