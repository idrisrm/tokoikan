<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Detail_Riwayat extends RestController
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index_get()
    {
        $id = $this->get('id_penjualan');
        $data = $this->db->query("SELECT penjualan.id_penjualan, penjualan.created_at, penjualan.subtotal, penjualan.jumlah_pembayaran, detail_penjualan.qty, detail_penjualan.total_harga, detail_penjualan.catatan, barang.nama_barang, barang.harga as harga_barang FROM penjualan, detail_penjualan, barang WHERE penjualan.id_penjualan = detail_penjualan.id_penjualan AND detail_penjualan.id_barang = barang.id_barang AND penjualan.id_penjualan = '$id'")->result_array();
        if ($data) {
            foreach ($data as $d) {
                $subtotal = $d['subtotal'];
                $bayar = $d['jumlah_pembayaran'];
                $kembali = number_format($d['jumlah_pembayaran'] - $d['subtotal'], 0, '', '');
            }
            $this->response(
                [
                    'status' => true,
                    'pesan' => 'Detail riwayat transaksi ditemukan',
                    'subtotal' => $subtotal,
                    'bayar' => $bayar,
                    'kembali' => $kembali,
                    'data' => $data,
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => false,
                    'pesan' => 'Tidak ada detail riwayat transaksi',
                    'data' => null
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }
}
