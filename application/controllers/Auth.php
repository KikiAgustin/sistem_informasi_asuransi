<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data = [
            'judul' => "ASURANSIKU | Registrasi"
        ];

        $this->load->view('registrasi/index', $data);
    }
}
