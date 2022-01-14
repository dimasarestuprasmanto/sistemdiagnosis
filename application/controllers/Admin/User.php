<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 1 || $this->session->userdata('logged_in') != true) {
            $url = base_url();
            redirect($url);
        }
        $this->load->model('UserModel');
    }
    public function index()
    {
        $data['datapengguna'] = $this->UserModel->getAll();

        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('admin/user_view', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data['data'] = $this->UserModel->getById($id);

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/nav');
            $this->load->view('template/sidebar');
            $this->load->view('admin/edit_user_view');
            $this->load->view('template/footer');
        } else {
            $data = [
                'nama' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat')
            ];

            $this->db->where('id_user', $this->input->post('id'));
            $query = $this->db->update('user', $data);
            if ($query) {
                $this->session->set_flashdata('success', 'Data rule berhasil diubah');
                redirect(base_url('/admin/user'));
            } else {
                $this->session->set_flashdata('error', 'Data gagal diubah ');
                redirect(base_url('/admin/user'));
            }
        }
    }

    public function hapus($id)
    {
        $query = $this->db->delete('user', array('id_user' => $id));
        if ($query) {
            $this->session->set_flashdata('success', 'Data rule berhasil dihapus');
            redirect(base_url('/admin/user'));
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus ');
            redirect(base_url('/admin/user'));
        }
    }
}
