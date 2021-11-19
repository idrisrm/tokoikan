<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataSatuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Models');
        belumlogin();
    }
    public function index()
    {
        $data['kategori'] = $this->db->get_where('satuan', ['status' =>  'on'])->result_array();
        $this->load->view('DataSatuan/index', $data);
    }

    public function tambah()
    {

        $data = [
            'nama_satuan' => $this->input->post('nama'),
            'status' => 'on'
        ];
        $insert = $this->db->insert('satuan', $data);
        if ($insert) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Satuan Berhasil Ditambahkan!
                </div>');
            redirect('DataSatuan');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Satuan Gagal Ditambahkan!
            </div>');
            redirect('DataSatuan');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama', 'Nama Kategori', 'required');

        if ($this->form_validation->run() == false) {
            $data['kategori'] = $this->db->get_where('satuan', ['id_satuan' => $id])->row_array();
            $this->load->view('DataSatuan/edit', $data);
        } else {
            $data = [
                'nama_satuan' => $this->input->post('nama'),
            ];
            $update = $this->Models->update($data, "id_satuan", "satuan", $id);
            if ($update) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Satuan Berhasil Diupdate!
                </div>');
                redirect('DataSatuan');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Satuan Gagal Diupdate!
                </div>');
                redirect('DataSatuan');
            }
        }
    }

    public function hapus($id)
    {
        $data = [
            'status' => 'off'
        ];
        $update = $this->Models->update($data, "id_satuan", "satuan", $id);
        if ($update) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Satuan Berhasil Dihapus!
            </div>');
            redirect('DataSatuan');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Satuan Gagal Dihapus!
            </div>');
            redirect('DataSatuan');
        }
    }
}

/* End of file DataKategori.php and path /application/controllers/DataKategori.php */
