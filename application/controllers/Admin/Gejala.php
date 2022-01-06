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
        $this->form_validation->set_rules('nama', 'Nama', 'required|is_unique[gejala.name]');
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

<<<<<<< HEAD
            $query = $this->db->insert('gejala', $data);
            if($query){
                $this->session->set_flashdata('success', 'Data gejala berhasil ditambah');
                redirect(base_url('/admin/gejala'));
            }
            else{
                $this->session->set_flashdata('error', 'Data gagal ditambah, mohon ulangi lagi');
                redirect(base_url('/admin/gejala'));
            }        
=======
            $this->db->insert('gejala', $data);
            $this->session->set_flashdata('flash', 'Berhasil Ditambahkan');
            redirect(base_url('/admin/gejala'));
>>>>>>> 6480ceeb22f2fe6722f384f17d84b2b50f55cd47
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
<<<<<<< HEAD
            $query = $this->db->update('gejala', $data);
            if($query){
                $this->session->set_flashdata('success', 'Data gejala berhasil diubah');
                redirect(base_url('/admin/gejala'));
            }
            else{
                $this->session->set_flashdata('error', 'Data gagal diubah, mohon ulangi lagi');
                redirect(base_url('/admin/gejala'));
            }     
=======
            $this->db->update('gejala', $data);
            $this->session->set_flashdata('flash', 'Berhasil Di Edit');
            redirect(base_url('/admin/gejala'));
>>>>>>> 6480ceeb22f2fe6722f384f17d84b2b50f55cd47
        }
    }
    public function hapus($id)
    {
<<<<<<< HEAD
        $query = $this->db->delete('gejala', array('id' => $id));
        if($query){
            $this->session->set_flashdata('success', 'Data gejala berhasil dihapus');
            redirect(base_url('/admin/gejala'));
        }
        else{
            $this->session->set_flashdata('error', 'Data gagal dihapus');
            redirect(base_url('/admin/gejala'));
        }     
=======
        $result = $this->GejalaModel->deleteById($id);

        if ($result == false) {
            $this->session->set_flashdata('flash', 'Gagal DiHapus Dikarenakan ada data berelasi di data Rules');
            redirect(base_url('/admin/gejala'));
        } else {
            $this->session->set_flashdata('flash', 'Berhasil DiHapus');
            redirect(base_url('/admin/gejala'));
        }
>>>>>>> 6480ceeb22f2fe6722f384f17d84b2b50f55cd47
    }
}
