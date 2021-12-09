<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran extends CI_Controller
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
        $data['pengeluaran'] = $this->db->query("SELECT * FROM pengeluaran WHERE status = 'on'")->result_array();
        $this->load->view('DataPengeluaran/index', $data);
    }


    public function edit($id)
    {
        $this->form_validation->set_rules('biaya', 'Biaya', 'required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $data['pengeluaran'] = $this->db->query("SELECT * FROM pengeluaran WHERE status = 'on' AND id_pengeluaran = '$id'")->result_array();
            $this->load->view('DataPengeluaran/edit', $data);
        } else {
            $data = [
                'biaya' => $this->input->post('biaya'),
                'keterangan' => $this->input->post('keterangan'),
                'created_at' => date("Y-m-d h:i:s"),
            ];
            $update = $this->Models->update($data, "id_pengeluaran", "pengeluaran", $id);
            if ($update) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Pengeluaran Berhasil Diupdate!
                </div>');
                redirect('Pengeluaran');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Pengeluaran Gagal Diupdate!
                </div>');
                redirect('Pengeluaran');
            }
        }
    }

    public function hapus($id)
    {
        $data = [
            'status' => 'off'
        ];
        $update = $this->Models->update($data, "id_pengeluaran", "pengeluaran", $id);
        if ($update) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Pengeluaran Berhasil Dihapus!
            </div>');
            redirect('Pengeluaran');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Pengeluaran Gagal Dihapus!
            </div>');
            redirect('Pengeluaran');
        }
    }

    public function tambah()
    {

        $this->form_validation->set_rules('biaya', 'Biaya', 'required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('DataPengeluaran/tambah');
        } else {
            $data = [
                'biaya' => $this->input->post('biaya'),
                'keterangan' => $this->input->post('keterangan'),
                'created_at' => date("Y-m-d h:i:s"),
                'status' => 'on'
            ];
            $insert = $this->db->insert('pengeluaran', $data);

            if ($insert) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Pengeluaran Berhasil Ditambahkan!
                </div>');
                redirect('Pengeluaran');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Pengeluaran Gagal Ditambahkan!
            </div>');
                redirect('Pengeluaran');
            }
        }
    }
}

/* End of file Pengeluran.php and path /application/controllers/Pengeluaran.php */
