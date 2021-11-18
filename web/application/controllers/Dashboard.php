<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        belumlogin();
    }
    public function index()
    {
        $data['pengajuan'] = $this->db->get_where('hutang', ['status' => 0])->num_rows();

        $data['revisi'] = $this->db->get_where('penjualan', ['pengajuan' => 'revisi'])->num_rows();


        $jember =  $this->db->query("SELECT SUM(qty) as count,MONTHNAME(detail_penjualan.created_at) as month_name FROM detail_penjualan, penjualan WHERE penjualan.id_otlet = 1 AND penjualan.pengajuan = '' AND detail_penjualan.id_penjualan = penjualan.id_penjualan AND YEAR(detail_penjualan.created_at) = '" . date('Y') . "' GROUP BY YEAR(detail_penjualan.created_at), MONTH(detail_penjualan.created_at)")->result_array();

        if($jember){
            foreach ($jember as $jember) {
                $data['bulan'][] = $jember['month_name'];
                $data['jumlah'][] = $jember['count'];
            }
        }else{
                $data['bulan'][] = '-';
                $data['jumlah'][] = 0;
        }

        // var_dump(json_encode($data));die;
        $data['grafikjember'] = json_encode($data);

        $situbondo =  $this->db->query("SELECT SUM(qty) as count,MONTHNAME(detail_penjualan.created_at) as month_name FROM detail_penjualan, penjualan WHERE penjualan.id_otlet = 2 AND penjualan.pengajuan = '' AND detail_penjualan.id_penjualan = penjualan.id_penjualan AND YEAR(detail_penjualan.created_at) = '" . date('Y') . "' GROUP BY YEAR(detail_penjualan.created_at), MONTH(detail_penjualan.created_at)")->result_array();

        if ($situbondo) {
            foreach ($situbondo as $situbondo) {
                $datasitubondo['bulan'][] = $situbondo['month_name'];
                $datasitubondo['jumlah'][] = $situbondo['count'];
            }
        } else {
            $datasitubondo['bulan'][] = '-';
            $datasitubondo['jumlah'][] = '0';
        }

        // var_dump($datasitubondo);die;
        $data['grafiksitubondo'] = json_encode($datasitubondo);



        ///grafik Bali
        $bali =  $this->db->query("SELECT SUM(qty) as count,MONTHNAME(detail_penjualan.created_at) as month_name FROM detail_penjualan, penjualan WHERE penjualan.id_otlet = 3 AND penjualan.pengajuan = '' AND detail_penjualan.id_penjualan = penjualan.id_penjualan AND YEAR(detail_penjualan.created_at) = '" . date('Y') . "' GROUP BY YEAR(detail_penjualan.created_at), MONTH(detail_penjualan.created_at)")->result_array();


        if ($bali) {
            foreach ($bali as $bali) {
                $databali['bulan'][] = $bali['month_name'];
                $databali['jumlah'][] = $bali['count'];
            }
        } else {
            $databali['bulan'][] = '-';
            $databali['jumlah'][] = 0;
        }


        // var_dump($databali);die;
        $data['grafikbali'] = json_encode($databali);
        $this->load->view('dashboard', $data);
    }
}

/* End of file Dashboard.php and path /application/controllers/Dashboard.php */
