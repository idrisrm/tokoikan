<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('Models');
    }
    public function index()
    {
        $data['karyawan'] = $this->db->join('otlet', 'otlet.id_otlet = user.id_otlet')->get_where('user', ['bagian' => 'karyawan'])->result_array();
        $this->load->view('Karyawan/index', $data);
    }

    public function edit($id)
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('otlet', 'Otlet', 'required');

        if ($this->form_validation->run() == false) {
            $data['otlet'] = $this->db->get('otlet')->result_array();
            $data['karyawan'] = $this->db->get_where('user', ['id' => $id])->row_array();

            $this->load->view('Karyawan/edit', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'id_otlet' => $this->input->post('otlet'),
                'status' => $this->input->post('status'),
            ];
            $update = $this->Models->update($data, "id", "user", $id);
            if ($update) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Data Karyawan Berhasil Diupdate!
                </div>');
                redirect('Karyawan/index');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data Karyawan Berhasil Diupdate!
                </div>');
                redirect('Karyawan/index');
            }
        }
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('otlet', 'Otlet', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[konfirmasipassword]');
        $this->form_validation->set_rules('konfirmasipassword', 'Konfirmasi Password', 'required|matches[password]');
        if ($this->form_validation->run() == false) {
            $data['otlet'] = $this->db->get('otlet')->result_array();
            $this->load->view('karyawan/tambah', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'id_otlet' => $this->input->post('otlet'),
                'status' => 'on',
                'bagian' => 'karyawan',
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
            ];
            $insert = $this->db->insert('user', $data);
            if ($insert) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Berhasil Menambahkan karyawan!
                </div>');
                redirect('Karyawan/index');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Gagal Menambahkan karyawan!
                </div>');
                redirect('Karyawan/index');
            }
        }
    }
}

/* End of file Karyawan.php and path /application/controllers/Karyawan.php */
