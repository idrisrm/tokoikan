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
        $id_penjualan = $this->input->post('id_penjualan');
        $banyakbarang = $this->db->query("SELECT COUNT(id_penjualan) as banyak FROM detail_penjualan WHERE id_penjualan = '$id_penjualan'")->row_array();
        if ($banyakbarang['banyak'] > 1) {
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
        } else {
            $query = $this->ApiModel->hapus($id_detail, 'id_detail', 'detail_penjualan');
            $querypenjualan = $this->ApiModel->hapus($id_penjualan, 'id_penjualan', 'penjualan');
            if ($query && $querypenjualan) {
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
}
