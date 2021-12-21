<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('user/info_penyakit_view.php');
        $this->load->view('template/footer');
    }

    public function detail()
    {
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('user/detail_info_view.php');
        $this->load->view('template/footer');
    }
}
