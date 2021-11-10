<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('Models');
    }
    public function index()
    {

        $this->form_validation->set_rules('passwordsekarang', 'Password Sekarang', 'required');
        $this->form_validation->set_rules('passwordbaru', 'Password Baru', 'required');
        $this->form_validation->set_rules('konfirmasipassword', 'Konfirmasi Password', 'required|matches[passwordbaru]');

        if ($this->form_validation->run() == false) {
            $this->load->view('Pengaturan/index');
        } else {
            $passwordbaru = md5($this->input->post('passwordbaru'));
            $passwordsekarang = md5($this->input->post('passwordsekarang'));
            $id = $this->session->userdata('id');
            $data = [
                'password' => $passwordbaru
            ];

            $user = $this->db->get_where('user', ['id' => $id])->row_array();
            if ($user['password'] == $passwordsekarang) {
                $update = $this->Models->update($data, "id", "user", $id);
                if ($update) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Password Berhasil Diubah!
                    </div>');
                    redirect('Pengaturan/index');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Password Gagal Diubah!
                    </div>');
                    redirect('Pengaturan/index');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Password Yang Anda Masukan Salah!
                </div>');
                redirect('Pengaturan/index');
            }
        }
    }
}

/* End of file Pengaturan.php and path /application/controllers/Pengaturan.php */
