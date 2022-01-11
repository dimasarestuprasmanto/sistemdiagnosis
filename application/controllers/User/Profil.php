<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 2 || $this->session->userdata('logged_in') != true) {
            $url = base_url();
            redirect($url);
        }
        $this->load->model('UserModel');
    }
    public function index()
    {
        $data['title'] = 'Profil';
        $this->load->view('template/header', $data);
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('user/profil');
        $this->load->view('template/footer');
    }
}
