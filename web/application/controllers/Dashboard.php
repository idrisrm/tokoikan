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
        $this->load->view('dashboard');
    }
}

/* End of file Dashboard.php and path /application/controllers/Dashboard.php */
