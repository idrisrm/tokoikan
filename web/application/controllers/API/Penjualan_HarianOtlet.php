<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_HarianOtlet extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('API/Api_Model', 'ApiModel');
    }
    public function index_get()
    {
        $now = date('Y-m-d');
        $id_otlet = $this->get('id_otlet');
        $querytotal = $this->db->query("SELECT SUM(subtotal) as total_penjualan FROM penjualan WHERE Date(created_at) = '$now' AND status != 0 AND pengajuan != 'revisi' AND id_otlet = '$id_otlet'")->row_array();
        $querycash = $this->db->query("SELECT SUM(subtotal) as total_cash FROM penjualan WHERE Date(created_at) = '$now' AND status = 1 AND pengajuan != 'revisi' AND id_otlet = '$id_otlet'")->row_array();
        $querykredit = $this->db->query("SELECT SUM(subtotal) as total_kredit FROM penjualan WHERE Date(created_at) = '$now' AND status = 2 AND pengajuan != 'revisi' AND id_otlet = '$id_otlet'")->row_array();
        if ($querytotal && $querycash && $querykredit) {
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'Penjualan harian berhasil ditemukan',
                    'data' => [
                        $querytotal,
                        $querycash,
                        $querykredit
                    ]
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'Penjualan harian tidak ditemukan',
                ],
                RestController::HTTP_FORBIDDEN
            );
        }
    }
}
