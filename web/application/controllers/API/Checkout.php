<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('API/Api_Model', 'ApiModel');
    }
    public function index_post()
    {
        $id_penjualan = $this->input->post('id_penjualan');
        $status = $this->input->post('status');
        $subtotal = $this->input->post('subtotal');
        $no_ktp = $this->input->post('no_ktp');
        if ($status == '1') {
            $ubahstok = $this->db->query("SELECT * FROM detail_penjualan WHERE id_penjualan = '$id_penjualan'")->result_array();
            foreach ($ubahstok as $us) {
                $id_barang = $us['id_barang'];
                $qty = $us['qty'];
                $barang = $this->db->query("SELECT * FROM barang WHERE id_barang = '$id_barang'")->result_array();
                foreach ($barang as $b) {
                    $data = [
                        'stok' => $b['stok'] - $qty,
                    ];
                    $this->ApiModel->ubah($data, $id_barang, 'id_barang', 'barang');
                }
            }
            $datapenjualan = [
                'subtotal' => $subtotal,
                'status' => $status,
            ];
            $querypenjualan = $this->ApiModel->ubah($datapenjualan, $id_penjualan, 'id_penjualan', 'penjualan');
            if ($querypenjualan) {
                $this->response(
                    [
                        'status' => true,
                        'pesan' => 'Berhasil checkout',
                    ],
                    RestController::HTTP_OK
                );
            } else {
                $this->response(
                    [
                        'status' => false,
                        'pesan' => 'Gagal checkout terjadi kesalahan',
                    ],
                    RestController::HTTP_FORBIDDEN
                );
            }
        } else {
            $ubahstok = $this->db->query("SELECT * FROM detail_penjualan WHERE id_penjualan = '$id_penjualan'")->result_array();
            foreach ($ubahstok as $us) {
                $id_barang = $us['id_barang'];
                $qty = $us['qty'];
                $barang = $this->db->query("SELECT * FROM barang WHERE id_barang = '$id_barang'")->result_array();
                foreach ($barang as $b) {
                    $data = [
                        'stok' => $b['stok'] - $qty,
                    ];
                    $this->ApiModel->ubah($data, $id_barang, 'id_barang', 'barang');
                }
            }
            $datapenjualan = [
                'subtotal' => $subtotal,
                'status' => $status,
                'ktp_penghutang' => $no_ktp,
            ];
            $hutang = $this->db->query("SELECT * FROM hutang WHERE no_ktp = '$no_ktp'")->row_array();
            if ($hutang) {
                $datahutang = [
                    'total_hutang' => $hutang['total_hutang'] + $subtotal,
                ];
                $querypenjualan = $this->ApiModel->ubah($datapenjualan, $id_penjualan, 'id_penjualan', 'penjualan');
                $queryhutang = $this->ApiModel->ubah($datahutang, $no_ktp, 'no_ktp', 'hutang');
                if ($querypenjualan && $queryhutang) {
                    $this->response(
                        [
                            'status' => true,
                            'pesan' => 'Berhasil checkout',
                        ],
                        RestController::HTTP_OK
                    );
                } else {
                    $this->response(
                        [
                            'status' => false,
                            'pesan' => 'Gagal checkout terjadi kesalahan',
                        ],
                        RestController::HTTP_FORBIDDEN
                    );
                }
            } else {
                $this->response(
                    [
                        'status' => false,
                        'pesan' => 'Gagal checkout terjadi kesalahan',
                    ],
                    RestController::HTTP_FORBIDDEN
                );
            }
        }
    }
}
