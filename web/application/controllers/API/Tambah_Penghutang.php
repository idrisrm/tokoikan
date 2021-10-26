<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Tambah_Penghutang extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('API/Api_Model', 'ApiModel');
    }
    public function index_post()
    {
        $nama = $this->input->post('nama_penghutang');
        $no_ktp = $this->input->post('no_ktp');
        $now = date('Y-m-d H:i:s');
        $key = $this->ApiModel->randomkode(4);

        $config['allowed_types'] = 'jpg|png|gif|jpeg';
        $config['max_size'] = '5000';
        $config['upload_path'] = FCPATH . 'uploads/ktp';
        $newName = "uploads/ktp/" . $key . $_FILES['foto']['name'];
        $config['file_name'] = $key . $_FILES['foto']['name'];
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload('foto')) {
            $data = [
                'no_ktp' => $no_ktp,
                'nama_penghutang' => $nama,
                'foto_ktp' => $newName,
                'total_hutang' => 0,
                'created_at' => $now,
                'updated_at' => $now,
                'status' => 0
            ];
            $query = $this->ApiModel->insert('hutang', $data);
            if ($query) {
                $this->response([
                    'status' => true,
                    'pesan' => 'Berhasil tambah penghutang'
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'pesan' => 'Gagal tambah penghutang'
                ], RestController::HTTP_NOT_FOUND);
            }
        } else {
            $message = [
                'status' => false,
                'pesan' =>  $this->upload->display_errors()
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
