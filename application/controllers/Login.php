<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == '1' ) {
            redirect('admin/home');
        }
        elseif($this->session->userdata('logged_in') == TRUE && $this->session->userdata('level') == '2' ) {
            redirect('user/home');
        }
        else{
            //$this->session->set_flashdata('msg-login','Anda belum login!');
        }

        $this->load->view('template/header');
        $this->load->view('login');
        $this->load->view('template/footer');
    }

    function auth()
    {
        $username    = $this->input->post('username',TRUE);
        $password = md5($this->input->post('password',TRUE));
        $validate = $this->UserModel->validate($username,$password);
        if($validate->num_rows() > 0){
            $data  = $validate->row_array();
            $id_user  = $data['id_user'];
            $nama  = $data['nama'];
            $username = $data['username'];
            $level = $data['level'];
            $sesdata = array(
                'id_user'  => $id_user,
                'nama'  => $nama,
                'username'  => $username,
                'level'     => $level,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sesdata);
            if($level === '1'){
                redirect('admin/home');
            }
            elseif($level === '2'){
                redirect('user/home');
            }
        }else{
            $this->session->set_flashdata('msg-error','Username atau kata sandi salah!');
            redirect('login');
        }
      }
     
      function logout()
      {
          $this->session->sess_destroy();
          redirect('login');
      }
}