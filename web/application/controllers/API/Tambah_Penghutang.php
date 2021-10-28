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

    public function sendNotification($id, $pesan, $title)
    {
        $registrationIds = array($id);
        $msg = array(
            'message'   => $pesan,
            'title'     => $title,
            'subtitle'  => 'This is a subtitle. subtitle',
            'tickerText'    => 'Ticker text here...Ticker text here...Ticker text here',
            'vibrate'   => 1,
            'sound'     => 1,
            'largeIcon' => 'large_icon',
            'smallIcon' => 'small_icon'
        );
        $fields = array(
            'registration_ids'  => $registrationIds,
            'data'          => $msg
        );

        $headers = array(
            'Authorization: key= AAAAqEmeg8w:APA91bExiJQhq4ZP48U_N2A_v0pxkEarr8PCLMXyeXbWFgpzvdNi-mO3QgPxLbL9-YoRe9eTY7UlhhtD1OMtvr8Y46TqjB0usNZ4wxv4r19K_n3lSSBJ38U91q3fHuikgFGCIfZO4God',
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        curl_close($ch);
        // echo $result;
    }
}
