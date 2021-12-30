<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 2 || $this->session->userdata('logged_in') != true) {
            $url = base_url();
            redirect($url);
        }
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('template/header', $data);
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('user/index');
        $this->load->view('template/footer');
    }
}
