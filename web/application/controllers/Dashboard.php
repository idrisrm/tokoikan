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

        $this->load->view('dashboard', $data);
    }
}

/* End of file Dashboard.php and path /application/controllers/Dashboard.php */
