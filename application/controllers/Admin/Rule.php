<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rule extends CI_Controller
{

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('admin/rule_view');
        $this->load->view('template/footer');
    }

    public function tambah_rule()
    {
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('admin/tambah_rule_view');
        $this->load->view('template/footer');
    }
}
