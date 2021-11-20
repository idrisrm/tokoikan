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
        $now = date('Y-m-d H:i:s');

        $id_tambah = $this->db->query("SELECT * FROM notifikasi WHERE id_notif = '$id_notif'")->row_array();
        $id_tambah_barang = $id_tambah['id_tambah_barang'];
        $id_otlet = $id_tambah['id_otlet'];
        $tambahbarangdata = $this->db->query("SELECT * FROM tambah_stok WHERE id_tambah = '$id_tambah_barang'")->row_array();
        $id_barang = $tambahbarangdata['id_barang'];
        $stok = $this->db->query("SELECT * FROM barang WHERE id_barang = '$id_barang'")->row_array();
        $barangnya = $stok['nama_barang'];
        $data = [
            'status' => 1,
            'updated_at' => $now,
        ];
        $dataupdatetambah = [
            'status' => 'konfirmasi'
        ];
        $datastok = [
            'stok' => $stok['stok'] + $tambahbarangdata['jumlah']
        ];
        $query = $this->ApiModel->ubah($data, $id_notif, 'id_notif', 'notifikasi');
        $querytambah = $this->ApiModel->ubah($dataupdatetambah, $id_tambah_barang, 'id_tambah', 'tambah_stok');
        $querystok = $this->ApiModel->ubah($datastok, $id_barang, 'id_barang', 'barang');
        if ($query && $querytambah && $querystok) {
            $g = $this->ApiModel->bagian('admin');
            $token = $g['token'];
            if ($id_otlet == '1') {
                $otletnya = 'Jember';
            } elseif ($id_otlet == '2') {
                $otletnya = 'Situbondo';
            } elseif ($id_otlet == '3') {
                $otletnya = 'Bali';
            }
            $this->sendNotification($token, "Verifikasi stok dari karyawan", "Stok barang $barangnya telah di verifikasi oleh karyawan di otlet $otletnya");

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
