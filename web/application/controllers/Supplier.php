<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('Models');
    }
    public function index()
    {
        $data['supplier'] = $this->db->query("SELECT * FROM supplier")->result_array();
        $this->load->view('Supplier/index', $data);
    }

    public function edit($id)
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $data['supplier'] = $this->db->query("SELECT * FROM supplier")->result_array();
            $this->load->view('Supplier/edit', $data);
        } else {
            $data = [
                'nama_supplier' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'status' => $this->input->post('status'),
            ];
            $update = $this->Models->update($data, "id_supplier", "supplier", $id);
            if ($update) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Data Supplier Berhasil Diupdate!
                </div>');
                redirect('Supplier/index');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data Supplier Berhasil Diupdate!
                </div>');
                redirect('Supplier/index');
            }
        }
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('Supplier/tambah');
        } else {
            $data = [
                'nama_supplier' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'status' => 'on',
            ];
            $insert = $this->db->insert('supplier', $data);
            if ($insert) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Berhasil Menambahkan Supplier!
                </div>');
                redirect('Supplier/index');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Gagal Menambahkan Supplier!
                </div>');
                redirect('Supplier/index');
            }
        }
    }
}

/* End of file Supplier.php and path /application/controllers/Supplier.php */
