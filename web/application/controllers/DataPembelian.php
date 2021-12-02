<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataPembelian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Models');
    }
    public function index()
    {
        $data['pembelian'] = $this->db->query("SELECT * FROM pembelian")->result_array();
        $data['supplier'] = $this->db->query("SELECT * FROM supplier")->result_array();
        $data['keranjang'] = $this->db->query("SELECT COUNT(detail_pembelian.id_pembelian) as total FROM detail_pembelian, pembelian WHERE pembelian.id_pembelian = detail_pembelian.id_pembelian AND pembelian.id_admin = 1 AND pembelian.status = 0")->result_array();
        $this->load->view('DataPembelian/index', $data);
    }

    public function keranjang()
    {
        $data['keranjang'] = $this->db->query("SELECT * FROM pembelian, detail_pembelian, supplier, barang WHERE pembelian.id_pembelian = detail_pembelian.id_pembelian AND pembelian.id_supplier = supplier.id_supplier AND detail_pembelian.id_barang = barang.id_barang")->result_array();
        $this->load->view('DataPembelian/keranjang', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('barang', 'Barang', 'required');
        $this->form_validation->set_rules('qty', 'QTY', 'required|numeric');
        $this->form_validation->set_rules('hargasatuan', 'Harga Satuan', 'required');
        $this->form_validation->set_rules('supplier', 'Supplier', 'required');
        $this->form_validation->set_rules('totalharga', 'Total Harga', 'required');
        if ($this->form_validation->run() == false) {
            $data['barang'] = $this->db->query("SELECT * FROM barang")->result_array();
            $data['supplier'] = $this->db->query("SELECT * FROM supplier")->result_array();
            $this->load->view('DataPembelian/tambah', $data);
        } else {
            // $id_otlet = $this->input->post('id_otlet');
            $id_barang = $this->input->post('barang');
            $qty = $this->input->post('qty');
            $hargasatuan = $this->input->post('hargasatuan');
            $id_supplier = $this->input->post('supplier');
            $totalharga = $this->input->post('totalharga');
            $id_pembelian = $this->Models->randomkode(10);
            $now = date('Y-m-d H:i:s');
            $adakeranjang = $this->db->query("SELECT * FROM pembelian, detail_pembelian WHERE pembelian.id_pembelian = detail_pembelian.id_pembelian AND pembelian.id_admin = '1' AND pembelian.status = 0")->result_array();
            if ($adakeranjang) {
                foreach ($adakeranjang as $ad) {
                    $id_pembelianada = $ad['id_pembelian'];
                    $adabarang = $this->db->query("SELECT * FROM detail_pembelian WHERE id_pembelian = '$id_pembelianada' AND id_barang = '$id_barang'")->result_array();
                    if ($adabarang) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal tambah ke keranjang barang sudah ada di keranjang!
                    </div>');
                        redirect('DataPembelian');
                    } else {
                        $datadetail = [
                            'id_pembelian' => $id_pembelianada,
                            'id_barang' => $id_barang,
                            'qty' => $qty,
                            'total_harga' => $totalharga,
                            'harga_satuan' => $hargasatuan,
                            'created_at' => $now,
                        ];
                        $querydetail = $this->Models->insert('detail_pembelian', $datadetail);
                        if ($querydetail) {
                            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                        Berhasil tambah ke keranjang!
                        </div>');
                            redirect('DataPembelian');
                        } else {
                            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                        Gagal tambah ke keranjang!
                        </div>');
                            redirect('DataPembelian');
                        }
                    }
                }
            } else {
                $data = [
                    'id_pembelian' => $id_pembelian,
                    'id_admin' => 1,
                    'id_supplier' => $id_supplier,
                    'subtotal' => 0,
                    'status' => 0,
                    'created_at' => $now,
                ];
                $datadetail = [
                    'id_pembelian' => $id_pembelian,
                    'id_barang' => $id_barang,
                    'qty' => $qty,
                    'total_harga' => $totalharga,
                    'harga_satuan' => $hargasatuan,
                    'created_at' => $now,
                ];
                $query = $this->Models->insert('pembelian', $data);
                $querydetail = $this->Models->insert('detail_pembelian', $datadetail);
                if ($query && $querydetail) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                        Berhasil tambah ke keranjang!
                        </div>');
                    redirect('DataPembelian');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                        Gagal tambah ke keranjang!
                        </div>');
                    redirect('DataPembelian');
                }
            }
        }
    }

    public function hapuskeranjang($id)
    {
        $query = $this->Models->hapus($id, 'id_detail_pembelian', 'detail_pembelian');
        if ($query) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                        Berhasil hapus dari keranjang!
                        </div>');
            redirect('DataPembelian/keranjang');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                        Gagal hapus dari keranjang!
                        </div>');
            redirect('DataPembelian/keranjang');
        }
    }
}

/* End of file DataPembelian.php and path /application/controllers/DataPembelian.php */
