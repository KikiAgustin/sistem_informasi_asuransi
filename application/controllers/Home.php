<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {

        $data = [
            'judul' => "ASURANSIKU | Home"
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('home/index');
        $this->load->view('template/footer');
    }

    public function Pendidikan()
    {
        $data = [
            'judul' => "ASURANSIKU | Pendidikan"
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('home/pendidikan');
        $this->load->view('template/footer');
    }

    public function pendaftaran()
    {
        $data = [
            'judul' => "ASURANSIKU | Pendaftaran"
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('home/pendaftaran');
        $this->load->view('template/footer');
    }

    public function klaim()
    {
        $data = [
            'judul' => "ASURANSIKU | Klaim Asuransi"
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('home/klaim');
        $this->load->view('template/footer');
    }
}
