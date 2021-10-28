<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataBarang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('Models');
        $this->load->model('API/Api_Model', 'ApiModel');
    }
    public function index()
    {
        $data['barang'] = $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori')->get_where('barang', ['barang.status' => 'on'])->result_array();
        $this->load->view('DataBarang/data', $data);
    }


    public function edit($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $data['kategori'] = $this->db->get('kategori')->result_array();
            $data['barang'] = $this->db->get_where('barang', ['id_barang' => $id])->row_array();
            $this->load->view('DataBarang/edit', $data);
        } else {
            $data = [
                'nama_barang' => $this->input->post('nama'),
                'id_kategori' => $this->input->post('kategori'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga'),
            ];
            $update = $this->Models->update($data, "id_barang", "barang", $id);
            if ($update) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Barang Berhasil Diupdate!
                </div>');
                redirect('DataBarang');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Barang Gagal Diupdate!
                </div>');
                redirect('DataBarang');
            }
        }
    }

    public function hapus($id)
    {
        $data = [
            'status' => 'off'
        ];
        $update = $this->Models->update($data, "id_barang", "barang", $id);
        if ($update) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Barang Berhasil Dihapus!
            </div>');
            redirect('DataBarang');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Barang Gagal Dihapus!
            </div>');
            redirect('DataBarang');
        }
    }

    public function tambah()
    {

        $this->form_validation->set_rules('kode', 'Kode', 'required|is_unique[barang.id_barang]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('otlet', 'Otlet', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $data['kategori'] = $this->db->get('kategori')->result_array();
            $data['otlet'] = $this->db->get('otlet')->result_array();
            $this->load->view('DataBarang/tambah', $data);
        } else {
            $nama = $this->input->post('nama');
            $stok = $this->input->post('stok');
            $otlet = $this->input->post('otlet');
            $data = [
                'id_barang' => $this->input->post('kode'),
                'nama_barang' => $this->input->post('nama'),
                'id_kategori' => $this->input->post('kategori'),
                'id_otlet' => $this->input->post('otlet'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'created_at' => date("Y-m-d h:i:sa"),
                'status' => 'on'
            ];
            $insert = $this->db->insert('barang', $data);

            $getDetail = $this->ApiModel->detail($otlet);
            foreach ($getDetail as $g) {
                $token = $g['token'];
                $id_usernya = $g['id'];
                $this->sendNotification($token, "Penambahan Stok Baru", "Stok $nama baru saja ditambahkan oleh admin sebanyak $stok kg");
                $kodeku = $this->ApiModel->randomkode(15);
                $arr2 = [
                    'id_notif' => $kodeku,
                    'id_tujuan' => $id_usernya,
                    'judul' => "Penambahan Stok Baru",
                    'deskripsi' =>  "Stok $nama baru saja ditambahkan oleh admin sebanyak $stok kg",
                    'status' =>  0,
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                $this->ApiModel->insert('notifikasi', $arr2);
            }

            if ($insert) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Barang Berhasil Ditambahkan!
                </div>');
                redirect('DataBarang');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Barang Gagal Ditambahkan!
            </div>');
                redirect('DataBarang');
            }
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

/* End of file DataBarang.php and path /application/controllers/DataBarang.php */
