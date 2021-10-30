<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends RestController
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index_get()
    {
        $id_otlet = $this->get('id_otlet');
        $data = $this->db->query("SELECT barang.*, kategori.nama_kategori FROM barang, kategori WHERE barang.id_kategori = kategori.id_kategori AND barang.id_otlet = '$id_otlet' AND barang.status_barang = 'on'")->result_array();
        if ($data) {
            $this->response(
                [
                    'status' => 'true',
                    'pesan' => 'Data barang ditemukan',
                    'data' => $data
                ],
                RestController::HTTP_OK
            );
        } else {
            $this->response(
                [
                    'status' => 'false',
                    'pesan' => 'Tidak ada data barang',
                    'data' => null
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }
}
