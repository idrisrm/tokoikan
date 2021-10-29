<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Ajukan_Revisi extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('API/Api_Model', 'ApiModel');
    }
    public function index_post()
    {
        $id_penjualan = $this->input->post('id_penjualan');
        $data = [
            'pengajuan' => 'revisi',
        ];
        $query = $this->ApiModel->ubah($data, $id_penjualan, 'id_penjualan', 'penjualan');
        if ($query) {
            $transaksinya = $this->db->query("SELECT penjualan.*, otlet.wilayah, user.nama FROM penjualan, otlet, user WHERE penjualan.id_otlet = otlet.id_otlet AND penjualan.id_penjual = user.id")->row_array();
            $g = $this->ApiModel->bagian('admin');
            $token = $g['token'];
            $id_usernya = $g['id'];
            $nama = $transaksinya['nama'];
            $otletnya = $transaksinya['wilayah'];
            $this->sendNotification($token, "Pengajuan Revisi Transaksi Penjualan", "Pengajuan penghutang baru dengan nama $nama di otlet $otletnya");
            $kodeku = $this->ApiModel->randomkode(15);
            $arr2 = [
                'id_notif' => $kodeku,
                'id_tujuan' => $id_usernya,
                'judul' => "Pengajuan Revisi Transaksi Penjualan",
                'deskripsi' =>  "Pengajuan revisi transaksi penjualan dengan id $id_penjualan dengan nama $nama di otlet $otletnya",
                'status' =>  0,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->ApiModel->insert('notifikasi', $arr2);

            $this->response([
                'status' => true,
                'pesan' => 'Berhasil kirim revisi'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'pesan' => 'Gagal kirim revisi'
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
