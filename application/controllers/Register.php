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
        $this->load->helper('date');
        $this->form_validation->set_rules('name', 'Name', 'required|is_unique[user.nama]');
        $this->form_validation->set_rules('no_telp', 'No_telp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('repassword', 'Konfirmasi Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('register');
            $this->load->view('template/footer');
        } else {
            $data = [
                'nama' => $this->input->post('name'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'level' => 2
            ];

            $this->db->insert('user', $data);
            redirect(base_url(''));
        }
    }
}
