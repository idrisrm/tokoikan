<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Bayar_Hutang extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('API/Api_Model', 'ApiModel');
    }
    public function index_post()
    {
        $no_ktp = $this->input->post('no_ktp');
        $bayar = $this->input->post('bayar');
        $now = date('Y-m-d H:i:s');
        $hutangnya = $this->db->query("SELECT * FROM hutang WHERE no_ktp = '$no_ktp'")->row_array();
        $limit_hutang = $hutangnya['limit_hutang'];
        $limittanggal = date('Y-m-d', strtotime('+1 month', strtotime($now)));
        $databayar = [
            'no_ktp' => $no_ktp,
            'bayar' => $bayar,
            'created_at' => $now,
        ];
        $datahutang = [
            'total_hutang' => $hutangnya['total_hutang'] - $bayar,
        ];
        $datahutangstatus = [
            'total_hutang' => $hutangnya['total_hutang'] - $bayar,
            'status' => 1,
            'limit_tanggal' => $limittanggal
        ];
        $total = $hutangnya['total_hutang'] - $bayar;
        if ($total < $limit_hutang) {
            $querybayar = $this->ApiModel->insert('bayar_hutang', $databayar);
            $queryhutang = $this->ApiModel->ubah($datahutangstatus, $no_ktp, 'no_ktp', 'hutang');
            if ($querybayar && $queryhutang) {
                $this->response(
                    [
                        'status' => true,
                        'pesan' => 'Berhasil bayar hutang',
                    ],
                    RestController::HTTP_OK
                );
            } else {
                $this->response(
                    [
                        'status' => false,
                        'pesan' => 'Gagal bayar hutang terjadi kesalahan',
                    ],
                    RestController::HTTP_FORBIDDEN
                );
            }
        } else {
            $querybayar = $this->ApiModel->insert('bayar_hutang', $databayar);
            $queryhutang = $this->ApiModel->ubah($datahutang, $no_ktp, 'no_ktp', 'hutang');
            if ($querybayar && $queryhutang) {
                $this->response(
                    [
                        'status' => true,
                        'pesan' => 'Berhasil bayar hutang',
                    ],
                    RestController::HTTP_OK
                );
            } else {
                $this->response(
                    [
                        'status' => false,
                        'pesan' => 'Gagal bayar hutang terjadi kesalahan',
                    ],
                    RestController::HTTP_FORBIDDEN
                );
            }
        }
    }
}
