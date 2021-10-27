<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataKategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Models');
        belumlogin();
    }
    public function index()
    {
        $data['kategori'] = $this->db->get_where('kategori', ['status' =>  'on'])->result_array();
        $this->load->view('DataKategori/index', $data);
    }

    public function hapus($id)
    {
        $data = [
            'status' => 'off'
        ];
        $update = $this->Models->update($data, "id_kategori", "kategori", $id);
        if ($update) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Kategori Berhasil Dihapus!
            </div>');
            redirect('DataKategori');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Kategori Gagal Dihapus!
            </div>');
            redirect('DataKategori');
        }
    }
}

/* End of file DataKategori.php and path /application/controllers/DataKategori.php */
