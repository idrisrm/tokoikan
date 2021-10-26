<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends RestController
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index_post()
    {
        $user = $this->input->post('username');
        $password = $this->input->post('password');

        $data = $this->db->get_where('user', ['username' => $user, 'status' => 'on'])->row_array();
        if ($data) {
            if ($data['password'] == md5($password)) {
                $this->response(
                    [
                        'status' => 'true',
                        'pesan' => 'Anda Berhasil Login',
                        'data' => $data
                    ],
                    RestController::HTTP_OK
                );
            } else {
                $this->response(
                    [
                        'status' => 'false',
                        'pesan' => 'Password Yang Anda Masukan Salah',
                        'data' => 'null'
                    ],
                    RestController::HTTP_FORBIDDEN
                );
            }
        } else {
            $this->response(
                [
                    'status' => 'false',
                    'pesan' => 'Username Tidak Ditemukan',
                    'data' => 'null'
                ],
                RestController::HTTP_FORBIDDEN
            );
        }
    }
}

/* End of file Auth.php and path /application/controllers/Auth/Auth.php */
