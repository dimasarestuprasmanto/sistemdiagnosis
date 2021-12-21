<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('no_telp', 'No_telp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('repassword', 'Konfirmasi Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('register');
            $this->load->view('template/footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'tanggal_registrasi' => time()
            ];
        }
    }
}
