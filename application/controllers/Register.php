<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('register');
        $this->load->view('template/footer');
    }
}
