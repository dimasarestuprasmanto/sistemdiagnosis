<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Import extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 1 || $this->session->userdata('logged_in') != true) {
            $url = base_url();
            redirect($url);
        }
    }

    public function index()
    {
        $title = 'Import';
        $data['title'] = $title;
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('admin/import_view');
        $this->load->view('template/footer');
    }

    public function excel(){
        die('masuk');

    }
}

?>