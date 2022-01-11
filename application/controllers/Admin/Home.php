<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 1 || $this->session->userdata('logged_in') != true) {
            $url = base_url();
            redirect($url);
        }
        $this->load->model('UserModel');
        $this->load->model('GejalaModel');
        $this->load->model('ProblemsModel');
    }
    public function index()
    {
        $data['totalUser']= $this->UserModel->getCountUser();
        $data['totalGejala']= $this->GejalaModel->getCountGejala();
        $data['totalPenyakit']= $this->ProblemsModel->getCountPenyakit();
        $title = 'Dashboard';
        $data['title'] = $title;

        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('admin/index',$data);
        $this->load->view('template/footer');

    }

}
