<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyakit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 1 || $this->session->userdata('logged_in') != true) {
            $url = base_url();
            redirect($url);
        }

        $this->load->model('ProblemsModel');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['dataproblems'] = $this->ProblemsModel->getAll();
        $this->load->view('template/header', $data);
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('admin/penyakit_view');
        $this->load->view('template/footer');
    }

    public function tambah_penyakit()
    {
        $data['id'] = $this->ProblemsModel->setId();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('solusi', 'Solusi', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header', $data);
            $this->load->view('template/nav');
            $this->load->view('template/sidebar');
            $this->load->view('admin/tambah_penyakit_view');
            $this->load->view('template/footer');
        } else {
            $gambar = $_FILES['gambar'];

            $config['upload_path'] = './assets/images/penyakit';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name']     = true;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                $gambar = 'default.jpg';
            } else {
                $gambar = $this->upload->data('file_name');
            }


            $data = [
                'code' => $this->input->post('id'),
                'name' => $this->input->post('nama'),
                'description' => $this->input->post('deskripsi'),
                'solution' => $this->input->post('solusi'),
                'image' => $gambar
            ];

            $this->db->insert('problems', $data);
            redirect(base_url('/admin/penyakit'));
        }
    }

    public function edit($id)
    {
        $data['data'] = $this->ProblemsModel->getById($id);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('solusi', 'Solusi', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header', $data);
            $this->load->view('template/nav');
            $this->load->view('template/sidebar');
            $this->load->view('admin/edit_penyakit_view');
            $this->load->view('template/footer');
        } else {
            $gambar = $_FILES['gambar'];
            $temp = $this->input->post('old_gambar');

            $config['upload_path'] = './assets/images/penyakit';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name']     = true;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                $gambar = $temp;
            } else {
                unlink('./assets/images/penyakit/' . $temp);
                $gambar = $this->upload->data('file_name');
            }


            $data = [
                'code' => $this->input->post('code'),
                'name' => $this->input->post('nama'),
                'description' => $this->input->post('deskripsi'),
                'solution' => $this->input->post('solusi'),
                'image' => $gambar
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('problems', $data);
            $this->session->set_flashdata('flash-penyakit', 'Di Edit');
            redirect(base_url('/admin/penyakit'));
        }
    }

    public function hapus($id)
    {
        $this->db->delete('problems', array('id' => $id));
        $this->session->set_flashdata('flash-penyakit', 'DiHapus');
        redirect(base_url('/admin/penyakit'));
    }
}
