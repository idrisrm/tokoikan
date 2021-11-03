<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Konfirmasi_Penghutang extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('API/Api_Model', 'ApiModel');
    }
    public function index_post()
    {
        $id_notif = $this->input->post('id_notif');
        $now = date('Y-m-d H:i:s');
        $otletnotif = $this->ApiModel->otletnotif($id_notif);

        $data = [
            'status' => 1,
            'updated_at' => $now,
        ];
        $no_ktp = $otletnotif['no_ktp'];
        $query = $this->ApiModel->ubah($data, $id_notif, 'id_notif', 'notifikasi');
        $querypenghutang = $this->ApiModel->ubah($data, $no_ktp, 'no_ktp', 'hutang');
        if ($query && $querypenghutang) {
            $penghutang = $this->ApiModel->getpenghutangdetail($no_ktp);
            $id_otlet = $penghutang['id_otlet'];
            $nama_penghutang = $penghutang['nama_penghutang'];
            $gotlet = $this->db->query("SELECT * FROM user WHERE id_otlet = '$id_otlet' AND bagian = 'karyawan' AND status = 'on'")->result_array();

            foreach ($gotlet as $g) {
                $token = $g['token'];
                if ($id_otlet == '1') {
                    $otletnya = 'Jember';
                } elseif ($id_otlet == '2') {
                    $otletnya = 'Situbondo';
                } elseif ($id_otlet == '3') {
                    $otletnya = 'Bali';
                }
                $this->sendNotification($token, "Verifikasi penghutang baru", "Penghutang baru dengan nama $nama_penghutang telah di vefirikasi oleh admin di otlet $otletnya");

                $this->response([
                    'status' => true,
                    'pesan' => 'Berhasil verifikasi penghutang'
                ], RestController::HTTP_OK);
            }
        } else {
            $this->response([
                'status' => false,
                'pesan' => 'Gagal verifikasi penghutang'
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
