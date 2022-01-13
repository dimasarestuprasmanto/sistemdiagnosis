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
        $id = $this->session->userdata('id_user');
        $username = $this->session->userdata('username');
        $data['dataprofil'] = $this->UserModel->getProfil($username);
        $data['title'] = 'Profil';
        $this->load->view('template/header', $data);
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('user/profil');
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        
        $data['data'] = $this->UserModel->getById($id);
        $data['title'] = 'Profil';
        $this->form_validation->set_rules('new_password','Password baru','required|alpha_numeric');
        $this->form_validation->set_rules('re_password', 'Konfirmasi password', 'required|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {
            //$this->session->set_flashdata('error','Password baru harus sama.' );
            $this->load->view('template/header', $data);
            $this->load->view('template/nav');
            $this->load->view('template/sidebar');
            $this->load->view('user/ubah_password');
            $this->load->view('template/footer');
        } else {
            $checkOld = $this->UserModel->checkPw();
            if ($checkOld == FALSE){
                $this->session->set_flashdata('notmatch','Password lama tidak sesuai!' );
                $this->load->view('template/header', $data);
                $this->load->view('template/nav');
                $this->load->view('template/sidebar');
                $this->load->view('user/ubah_password');
                $this->load->view('template/footer');
            }
            else{
                $this->UserModel->savePw();
                $this->session->sess_destroy();
                echo '<script>alert("Password berhasil diubah, mohon login kembali.");</script>';                
                redirect(base_url('/login'));
            }     
        }
    }
}
