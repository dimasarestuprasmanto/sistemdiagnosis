<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 1 || $this->session->userdata('logged_in') != true) {
            $url = base_url();
            redirect($url);
        }
        $this->load->model('UserModel');
    }
    public function index()
    {
        $username = $this->session->userdata('username');
        $data['dataprofil'] = $this->UserModel->getProfil($username);
        
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('admin/profil',$data);
        $this->load->view('template/footer');
    }
}
