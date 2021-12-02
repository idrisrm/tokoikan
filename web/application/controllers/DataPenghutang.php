<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataPenghutang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('Models');
    }
    public function index()
    {
        $data['penghutang'] = $this->db->join('otlet', 'otlet.id_otlet = hutang.id_otlet')->get_where('hutang', ['status !=' => 0])->result_array();
        $this->load->view('DataPenghutang/index', $data);
    }

    public function detail($id)
    {
        $data['hutang'] = $this->db->join('otlet', 'otlet.id_otlet = hutang.id_otlet')->get_where('hutang', ['no_ktp' => $id])->row_array();
        $this->load->view('DataPenghutang/detail', $data);
    }

    public function konfirmasi($id)
    {
        $data = [
            'status' => 1
        ];
        $update = $this->Models->update($data, "no_ktp", "hutang", $id);
        if ($update) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Penghutang Berhasil Dikonfirmasi
            </div>');
            redirect('DataPenghutang/PengajuanHutang');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Penghutang Gagal Dikonfirmasi
            </div>');
            redirect('DataPenghutang/PengajuanHutang');
        }
    }

    public function PengajuanHutang()
    {
        $data['penghutang'] = $this->db->join('otlet', 'otlet.id_otlet = hutang.id_otlet')->get_where('hutang', ['status' => 0])->result_array();
        $this->load->view('DataPenghutang/pengajuan', $data);
    }
    public function DetailPembelian($id)
    {
        $data['id'] = $id;
        $data['pembelian'] = $this->db->join('otlet', 'otlet.id_otlet = penjualan.id_otlet')->get_where('penjualan', ['ktp_penghutang' => $id])->result_array();
        $this->load->view('DataPenghutang/detailPembelian', $data);
    }
    public function DetailPembayaran($id)
    {
        $data['id'] = $id;
        $data['bayar'] = $this->db->get_where('bayar_hutang', ['no_ktp' => $id])->result_array();
        $this->load->view('DataPenghutang/detailPembayaran', $data);
    }
    public function Barang($id)
    {
        $data['barang'] = $this->db->join('barang', 'barang.id_barang = detail_penjualan.id_barang')->get_where('detail_penjualan', ['id_penjualan' => $id])->result_array();
        $this->load->view('DataPenghutang/barang', $data);
    }

    public function DetailPengajuan($id)
    {
        $data['hutang'] = $this->db->join('otlet', 'otlet.id_otlet = hutang.id_otlet')->get_where('hutang', ['no_ktp' => $id])->row_array();
        $this->load->view('DataPenghutang/detailpengajuan', $data);
    }
}

/* End of file DataPenghutang.php and path /application/controllers/DataPenghutang.php */
