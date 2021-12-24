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
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('admin/gejala_view');
        $this->load->view('template/footer');
    }

    public function tambah_gejala()
    {
        $data['id'] = $this->GejalaModel->setId();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/nav');
            $this->load->view('template/sidebar');
            $this->load->view('admin/tambah_gejala_view');
            $this->load->view('template/footer');
        } else {
            $data = [
                'id_parameter' => $this->input->post('id'),
                'nama_parameter' => $this->input->post('nama'),
                'pertanyaan' => $this->input->post('pertanyaan')
            ];

            $this->db->insert('parameter', $data);
            redirect(base_url('/admin/gejala'));
        }
    }

    public function save()
    {

        redirect(base_url('admin/gejala'));
    }
}
