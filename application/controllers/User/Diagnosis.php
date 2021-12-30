<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 2 || $this->session->userdata('logged_in') != true) {
            $url = base_url();
            redirect($url);
        }

        $this->load->model('GejalaModel');
    }
    public function index()
    {
        $data['title'] = 'Diagnosis';
        $data['datagejala'] = $this->GejalaModel->getAll();
        $this->load->view('template/header', $data);
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('user/diagnosis_penyakit_view.php');
        $this->load->view('template/footer');
    }
}
