<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class DataBarang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('Models');
    }
    public function index()
    {
        $data['barang'] = $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori')->get_where('barang', ['status' => 'on'])->result_array();
        $this->load->view('DataBarang/data', $data);
    }
    

    public function edit($id){
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if($this->form_validation->run() == false){
            $data['kategori'] = $this->db->get('kategori')->result_array();
            $data['barang'] = $this->db->get_where('barang', ['id_barang' => $id])->row_array();
            $this->load->view('DataBarang/edit', $data);
        }else{
            $data = [
                'nama_barang' => $this->input->post('nama'),
                'id_kategori' => $this->input->post('kategori'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga'),
            ];
            $update = $this->Models->update($data, "id_barang", "barang", $id);
            if($update){
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Barang Berhasil Diupdate!
                </div>');
                 redirect('DataBarang');
            }else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Barang Gagal Diupdate!
                </div>');
                 redirect('DataBarang');
            }
        }
    }

    public function hapus($id){
        $data = [
            'status' => 'off'
        ];
        $update = $this->Models->update($data, "id_barang", "barang", $id);
        if($update){
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Barang Berhasil Dihapus!
            </div>');
             redirect('DataBarang');
        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Barang Gagal Dihapus!
            </div>');
             redirect('DataBarang');
        }
    }
}

/* End of file DataBarang.php and path /application/controllers/DataBarang.php */


