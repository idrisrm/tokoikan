<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Notif_Limithutang extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('API/Api_Model', 'ApiModel');
    }
    public function index_post()
    {
        $now = date('Y-m-d');
        $g = $this->ApiModel->bagian('admin');
        $token = $g['token'];
        $id_usernya = $g['id'];
        $penghutang = $this->db->query("SELECT * FROM hutang WHERE limit_tanggal = '$now' AND total_hutang > 0")->result_array();
        if ($penghutang) {
            foreach ($penghutang as $p) {
                $otlet = $p['id_otlet'];
                $nama = $p['nama_penghutang'];
                $no_ktp = $p['no_ktp'];
                if ($otlet == '1') {
                    $otletnya = 'Jember';
                } elseif ($otlet == '2') {
                    $otletnya = 'Situbondo';
                } elseif ($otlet == '3') {
                    $otletnya = 'Bali';
                }
                $this->sendNotification($token, "Penagihan Hutang", "Hari ini penghutang dengan nama $nama di otlet $otletnya telah mencapat limit tanggal pembayaran hutang");
                $kodeku = $this->ApiModel->randomkode(15);
                $arr = [
                    'status' => 2,
                ];
                $arr2 = [
                    'id_notif' => $kodeku,
                    'id_tujuan' => $id_usernya,
                    'judul' => "Penagihan Hutang",
                    'deskripsi' =>  "Hari ini penghutang dengan nama $nama di otlet $otletnya telah mencapat limit tanggal pembayaran hutang",
                    'status' =>  3,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                $query = $this->ApiModel->insert('notifikasi', $arr2);
                $queryhutang = $this->ApiModel->ubah($arr, $no_ktp, 'no_ktp', 'hutang');
            }
            if ($query && $queryhutang) {
                $this->response([
                    'status' => true,
                    'pesan' => 'Berhasil kirim notifikasi'
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'pesan' => 'Gagal kirim notifikasi'
                ], RestController::HTTP_NOT_FOUND);
            }
        } else {
            $this->response([
                'status' => false,
                'pesan' => 'Gagal kirim notifikasi'
            ], RestController::HTTP_NOT_FOUND);
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
