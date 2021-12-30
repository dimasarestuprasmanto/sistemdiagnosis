<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rule extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 1 || $this->session->userdata('logged_in') != true) {
            $url = base_url();
            redirect($url);
        }
        $this->load->helper('url');
        $this->load->model('RulesModel');
        $this->load->model('GejalaModel');
        $this->load->model('ProblemsModel');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['datarule'] = $this->RulesModel->getAll();
        $this->load->view('template/header', $data);
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('admin/rule_view');
        $this->load->view('template/footer');
    }

    public function tambah_rule()
    {
        $data['id'] = $this->RulesModel->setId();
        $data['datagejala'] = $this->GejalaModel->getAll();
        $data['dataproblems'] = $this->ProblemsModel->getAll();

        $this->form_validation->set_rules('belief', 'Belief', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/nav');
            $this->load->view('template/sidebar');
            $this->load->view('admin/tambah_rule_view');
            $this->load->view('template/footer');
        } else {
            $data = [
                'code' => $this->input->post('id'),
                'belief' => $this->input->post('belief'),
                'problems_id' => $this->input->post('penyakit'),
                'evidences_id' => $this->input->post('gejala')
            ];

            $this->db->insert('rules', $data);
            redirect(base_url('/admin/rule'));
        }
    }

    public function edit($id)
    {
        $data['data'] = $this->RulesModel->getById($id);
        $data['datagejala'] = $this->GejalaModel->getAll();
        $data['dataproblems'] = $this->ProblemsModel->getAll();

        $this->form_validation->set_rules('belief', 'Belief', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/nav');
            $this->load->view('template/sidebar');
            $this->load->view('admin/edit_rule_view');
            $this->load->view('template/footer');
        } else {
            $data = [
                'code' => $this->input->post('id'),
                'belief' => $this->input->post('belief'),
                'problems_id' => $this->input->post('penyakit'),
                'evidences_id' => $this->input->post('gejala')
            ];

            $this->db->insert('rules', $data);
            redirect(base_url('/admin/rule'));
        }
    }
    public function hapus($id)
    {
        $query = $this->db->delete('rules', array('id' => $id));
        $this->session->set_flashdata('flash', 'DiHapus');
        redirect(base_url('/admin/rule'));
    }
}
