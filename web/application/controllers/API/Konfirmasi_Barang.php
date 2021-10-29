<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Konfirmasi_Barang extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('API/Api_Model', 'ApiModel');
    }
    public function index_post()
    {
        $id_notif = $this->input->post('id_notif');
        $id_otlet = $this->input->post('id_otlet');
        $now = date('Y-m-d H:i:s');

        $data = [
            'status' => 1,
            'updated_at' => $now,
        ];
        $query = $this->ApiModel->ubah($data, $id_notif, 'id_notif', 'notifikasi');
        if ($query) {
            $g = $this->ApiModel->bagian('admin');
            $token = $g['token'];
            if ($id_otlet == '1') {
                $otletnya = 'Jember';
            } elseif ($id_otlet == '2') {
                $otletnya = 'Situbondo';
            } elseif ($id_otlet == '3') {
                $otletnya = 'Bali';
            }
            $this->sendNotification($token, "Verifikasi dari stok dari karyawan", "Stok telah di verifikasi oleh karyawan di otlet $otletnya");

            $this->response([
                'status' => true,
                'pesan' => 'Berhasil verifikasi stok'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'pesan' => 'Gagal verifikasi stok'
            ], RestController::HTTP_NOT_FOUND);
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
            'Authorization: key= AAAA1kSN8j0:APA91bG6wK18M-0ejs11mAOzaAue-1hiBrKOJkIzNqSa_QPIO8UrRJ34Gdu3BrMidGbzo5rsESdNqYbU2dmHdByO_gW9m5bLrcyXzyna3NrGqsbC-9dzLFGMuvxpafrwMMg54zH_3I1e',
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
