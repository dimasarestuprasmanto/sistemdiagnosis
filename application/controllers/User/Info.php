<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 2 || $this->session->userdata('logged_in') != true) {
            $url = base_url();
            redirect($url);
        }

        $this->load->model('ProblemsModel');
    }
    public function index()
    {
        $data['datapenyakit'] = $this->ProblemsModel->getAll();
        $this->load->view('template/header', $data);
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('user/info_penyakit_view.php');
        $this->load->view('template/footer');
    }

    public function detail($id)
    {
        $data['data'] = $this->ProblemsModel->getById($id);
        $this->load->view('template/header', $data);
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('user/detail_penyakit_view.php');
        $this->load->view('template/footer');
    }
}
