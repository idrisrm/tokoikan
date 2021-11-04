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
        $otlet = $this->input->post('id_otlet');
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
            $ktphutang = $this->ApiModel->ktphutang();
            if ($ktphutang['no_ktp'] == $no_ktp) {
                $this->response([
                    'status' => false,
                    'pesan' => 'No KTP sudah ada'
                ], RestController::HTTP_FORBIDDEN);
            } else {
                $data = [
                    'no_ktp' => $no_ktp,
                    'id_otlet' => $otlet,
                    'nama_penghutang' => $nama,
                    'foto_ktp' => $newName,
                    'total_hutang' => 0,
                    'created_at' => $now,
                    'updated_at' => $now,
                    'status' => 0
                ];
                $query = $this->ApiModel->insert('hutang', $data);
                if ($query) {
                    $g = $this->ApiModel->bagian('admin');
                    $token = $g['token'];
                    $id_usernya = $g['id'];
                    if ($otlet == '1') {
                        $otletnya = 'Jember';
                    } elseif ($otlet == '2') {
                        $otletnya = 'Situbondo';
                    } elseif ($otlet == '3') {
                        $otletnya = 'Bali';
                    }
                    $this->sendNotification($token, "Pengajuan Penghutang Baru", "Pengajuan penghutang baru dengan nama $nama di otlet $otletnya");
                    $kodeku = $this->ApiModel->randomkode(15);
                    $arr2 = [
                        'id_notif' => $kodeku,
                        'id_tujuan' => $id_usernya,
                        'no_ktp' => $no_ktp,
                        'judul' => "Pengajuan Penghutang Baru",
                        'deskripsi' =>  "Pengajuan penghutang baru dengan nama $nama di otlet $otletnya",
                        'status' =>  0,
                        'created_at' => date('Y-m-d H:i:s'),
                    ];
                    $this->ApiModel->insert('notifikasi', $arr2);

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
            }
        } else {
            $message = [
                'status' => false,
                'pesan' =>  $this->upload->display_errors()
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function sendNotification($id, $title, $pesan)
    {        
        $arguments = array(
            'message'   => $pesan,
            'title'     => $title,            
        );

        $fields = array(
            'to'  => $id,
            'notification' => array(
                'title' => $title,
                'body' => $pesan,
            ),
            'data' => $arguments,
            'android' => array(
                'priority' => 'high',
            ),
        );

        $headers = array(
            'Authorization: key=AAAA1kSN8j0:APA91bG6wK18M-0ejs11mAOzaAue-1hiBrKOJkIzNqSa_QPIO8UrRJ34Gdu3BrMidGbzo5rsESdNqYbU2dmHdByO_gW9m5bLrcyXzyna3NrGqsbC-9dzLFGMuvxpafrwMMg54zH_3I1e',
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        // echo $result;
    }
}
