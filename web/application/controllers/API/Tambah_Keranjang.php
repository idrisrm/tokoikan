<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Tambah_Keranjang extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('API/Api_Model', 'ApiModel');
    }
    public function index_post()
    {
        $id_penjual = $this->input->post('id_penjual');
        $id_otlet = $this->input->post('id_otlet');
        $id_barang = $this->input->post('id_barang');
        $qty = $this->input->post('qty');
        $totalharga = $this->input->post('totalharga');
        $catatan = $this->input->post('catatan');
        $id_penjualan = $this->ApiModel->randomkode(10);
        $now = date('Y-m-d H:i:s');
        $adakeranjang = $this->db->query("SELECT * FROM penjualan, detail_penjualan WHERE penjualan.id_penjualan = detail_penjualan.id_penjualan AND penjualan.id_penjual = '$id_penjual' AND penjualan.status = 0")->result_array();
        if ($adakeranjang) {
            foreach ($adakeranjang as $ad) {
                $id_penjualanada = $ad['id_penjualan'];
                $adabarang = $this->db->query("SELECT * FROM detail_penjualan WHERE id_penjualan = '$id_penjualanada' AND id_barang = '$id_barang'")->result_array();
                if ($adabarang) {
                    $this->response([
                        'status' => false,
                        'pesan' => 'Gagal tambah ke keranjang, barang sudah ada di keranjang'
                    ], RestController::HTTP_FORBIDDEN);
                } else {
                    $barang = $this->db->query("SELECT * FROM barang WHERE id_barang = '$id_barang'")->row_array();
                    if ($barang['stok'] - $qty < 0) {
                        $this->response([
                            'status' => false,
                            'pesan' => 'Gagal tambah ke keranjang stok barang tidak cukup'
                        ], RestController::HTTP_FORBIDDEN);
                    } else {
                        $datadetail = [
                            'id_penjualan' => $id_penjualanada,
                            'id_barang' => $id_barang,
                            'qty' => $qty,
                            'total_harga' => $totalharga,
                            'catatan' => $catatan,
                            'created_at' => $now,
                        ];
                        $querydetail = $this->ApiModel->insert('detail_penjualan', $datadetail);
                        if ($querydetail) {
                            $this->response([
                                'status' => true,
                                'pesan' => 'Berhasil tambah ke keranjang'
                            ], RestController::HTTP_OK);
                        } else {
                            $this->response([
                                'status' => false,
                                'pesan' => 'Gagal tambah ke keranjang'
                            ], RestController::HTTP_FORBIDDEN);
                        }
                    }
                }
            }
        } else {
            $data = [
                'id_penjualan' => $id_penjualan,
                'id_otlet' => $id_otlet,
                'id_penjual' => $id_penjual,
                'subtotal' => 0,
                'status' => 0,
                'created_at' => $now,
            ];
            $datadetail = [
                'id_penjualan' => $id_penjualan,
                'id_barang' => $id_barang,
                'qty' => $qty,
                'total_harga' => $totalharga,
                'catatan' => $catatan,
                'created_at' => $now,
            ];
            $barang = $this->db->query("SELECT * FROM barang WHERE id_barang = '$id_barang'")->row_array();
            if ($barang['stok'] - $qty < 0) {
                $this->response([
                    'status' => false,
                    'pesan' => 'Gagal tambah ke keranjang stok barang tidak cukup'
                ], RestController::HTTP_FORBIDDEN);
            } else {
                $query = $this->ApiModel->insert('penjualan', $data);
                $querydetail = $this->ApiModel->insert('detail_penjualan', $datadetail);
                if ($query && $querydetail) {
                    $this->response([
                        'status' => true,
                        'pesan' => 'Berhasil tambah ke keranjang'
                    ], RestController::HTTP_OK);
                } else {
                    $this->response([
                        'status' => false,
                        'pesan' => 'Gagal tambah ke keranjang'
                    ], RestController::HTTP_FORBIDDEN);
                }
            }
        }
    }
}
