<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 1 || $this->session->userdata('logged_in') != true) {
            $url = base_url();
            redirect($url);
        }
        $this->load->model('GejalaModel');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['datagejala'] = $this->GejalaModel->getAll();
        $this->load->view('template/header', $data);
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('admin/gejala_view');
        $this->load->view('template/footer');
    }

    public function tambah_gejala()
    {
        $data['id'] = $this->GejalaModel->setId();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/nav');
            $this->load->view('template/sidebar');
            $this->load->view('admin/tambah_gejala_view');
            $this->load->view('template/footer');
        } else {
            $data = [
                'code' => $this->input->post('id'),
                'name' => $this->input->post('nama'),
                'description' => $this->input->post('deskripsi')
            ];

            $this->db->insert('evidences', $data);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('/admin/gejala'));
        }
    }

    public function edit($id)
    {
        $data['data'] = $this->GejalaModel->getById($id);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/nav');
            $this->load->view('template/sidebar');
            $this->load->view('admin/edit_gejala_view');
            $this->load->view('template/footer');
        } else {
            $data = [
                'code' => $this->input->post('code'),
                'name' => $this->input->post('nama'),
                'description' => $this->input->post('deskripsi')
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('evidences', $data);
            $this->session->set_flashdata('flash', 'Di Edit');
            redirect(base_url('/admin/gejala'));
        }
    }
    public function hapus($id)
    {
        $this->db->delete('evidences', array('id' => $id));
        $this->session->set_flashdata('flash', 'DiHapus');
        redirect(base_url('/admin/gejala'));
    }
}
