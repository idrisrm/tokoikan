<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Notif_Limithutangadmin extends RestController
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
        $penghutang = $this->db->query("SELECT * FROM hutang_admin WHERE limit_tanggal = '$now'")->result_array();
        if ($penghutang) {
            foreach ($penghutang as $p) {
                $id_supplier = $p['id_supplier'];
                $supplier = $this->db->query("SELECT * FROM supplier WHERE id_supplier = '$id_supplier'")->result_array();
                foreach ($supplier as $s) {
                    $namasupplier = $s['nama_supplier'];
                    $this->sendNotification($token, "Penagihan Hutang", "Hari ini hutang anda kepada supplier dengan nama $namasupplier telah mencapat limit tanggal pembayaran hutang");
                    $kodeku = $this->ApiModel->randomkode(15);
                    $arr2 = [
                        'id_notif' => $kodeku,
                        'id_tujuan' => '1',
                        'judul' => "Penagihan Hutang",
                        'deskripsi' =>  "Hari ini hutang anda kepada supplier dengan nama $namasupplier telah mencapat limit tanggal pembayaran hutang",
                        'status' =>  3,
                        'created_at' => date('Y-m-d H:i:s'),
                    ];
                    $query = $this->ApiModel->insert('notifikasi', $arr2);
                }
            }
            if ($query) {
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
