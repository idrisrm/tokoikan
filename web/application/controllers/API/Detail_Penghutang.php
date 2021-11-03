<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Detail_Penghutang extends RestController
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index_get()
    {
        $now = date('Y-m-d H:i:s');
        $no_ktp = $this->get('no_ktp');
        $data = $this->db->query("SELECT * FROM hutang WHERE no_ktp = '$no_ktp'")->row_array();
        if ($data) {
            if ($now >= $data['limit_tanggal'] && $data['total_hutang'] >= 10000000) {
                $this->response(
                    [
                        'status' => true,
                        'pesan' => 'Detail penghutang ditemukan',
                        'data' => $data,
                        'keterangan' => 'Hutang telah melewati batas maksimum dan telah melewati waktu jatuh tempo pembayaran'
                    ],
                    RestController::HTTP_OK
                );
            } elseif ($now >= $data['limit_tanggal'] && $data['total_hutang'] < 10000000) {
                $this->response(
                    [
                        'status' => true,
                        'pesan' => 'Detail penghutang ditemukan',
                        'data' => $data,
                        'keterangan' => 'Hutang belum melewati batas maksimum dan telah melewati waktu jatuh tempo pembayaran'
                    ],
                    RestController::HTTP_OK
                );
            } elseif ($now < $data['limit_tanggal'] && $data['total_hutang'] >= 10000000) {
                $this->response(
                    [
                        'status' => true,
                        'pesan' => 'Detail penghutang ditemukan',
                        'data' => $data,
                        'keterangan' => 'Hutang telah melewati batas maksimum dan belum melewati waktu jatuh tempo pembayaran'
                    ],
                    RestController::HTTP_OK
                );
            } else {
                $this->response(
                    [
                        'status' => true,
                        'pesan' => 'Detail penghutang ditemukan',
                        'data' => $data,
                        'keterangan' => 'Hutang belum melewati batas maksimum dan belum melewati waktu jatuh tempo pembayaran'
                    ],
                    RestController::HTTP_OK
                );
            }
        } else {
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'Tidak ada detail penghutang',
                    'data' => null
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }
}
