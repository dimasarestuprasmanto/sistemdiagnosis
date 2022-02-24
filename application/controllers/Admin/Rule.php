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
                'gejala_id' => $this->input->post('gejala')
            ];

            $query = $this->db->insert('rules', $data);
            if($query){
                $this->session->set_flashdata('success', 'Data rule berhasil ditambah');
                redirect(base_url('/admin/rule'));
            }
            else{
                $this->session->set_flashdata('error', 'Data gagal ditambah ');
                redirect(base_url('/admin/rule'));
            }             
        }
    }

    public function edit($id)
    {
        $data['data'] = $this->RulesModel->getById(decrypt_url($id));
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
                'code' => $this->input->post('code'),
                'belief' => $this->input->post('belief'),
                'problems_id' => $this->input->post('penyakit'),
                'gejala_id' => $this->input->post('gejala')
            ];

            $this->db->where('id', $this->input->post('id'));
            $query = $this->db->update('rules', $data);
            if($query){
                $this->session->set_flashdata('success', 'Data rule berhasil diubah');
                redirect(base_url('/admin/rule'));
            }
            else{
                $this->session->set_flashdata('error', 'Data gagal diubah ');
                redirect(base_url('/admin/rule'));
            }          
        }
    }
    public function hapus($id)
    {
        $query = $this->db->delete('rules', array('id' => $id));            
        if($query){
            $this->session->set_flashdata('success', 'Data rule berhasil dihapus');
            redirect(base_url('/admin/rule'));
        }
        else{
            $this->session->set_flashdata('error', 'Data gagal dihapus ');
            redirect(base_url('/admin/rule'));
        }   
    }

    public function excel() {
        $data = array();
            // If file uploaded
            if(!empty($_POST['submit'])) { 

                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                // file path
                $inputFileName = './assets/file/data_rule.xlsx';
                $spreadsheet = $reader->load($inputFileName);
                $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            
                // array Count
                $arrayCount = count($allDataInSheet);
                $flag = 0;
                $createArray = array('Code', 'Belief', 'Problems_id', 'Gejala_id');
                $makeArray = array(
                                'Code' => 'Code', 
                                'Belief' => 'Belief', 
                                'Problems_id' => 'Problems_id', 
                                'Gejala_id' => 'Gejala_id', 
                            );
                $SheetDataKey = array();
                foreach ($allDataInSheet as $dataInSheet) {
                    foreach ($dataInSheet as $key => $value) {
                        if (in_array(trim($value), $createArray)) {
                            $value = preg_replace('/\s+/', '', $value);
                            $SheetDataKey[trim($value)] = $key;
                        } 
                    }
                }
                $dataDiff = array_diff_key($makeArray, $SheetDataKey);
                if (empty($dataDiff)) {
                    $flag = 1;
                }
                // match excel sheet column
                if ($flag == 1) {
                    for ($i = 2; $i <= $arrayCount; $i++) {
                        $addresses = array();
                        $code = $SheetDataKey['Code'];
                        $belief = $SheetDataKey['Belief'];
                        $problemsId = $SheetDataKey['Problems_id'];
                        $gejalaId = $SheetDataKey['Gejala_id'];
 
                        $code = filter_var(trim($allDataInSheet[$i][$code]), FILTER_SANITIZE_STRING);
                        $belief = filter_var(trim($allDataInSheet[$i][$belief]), FILTER_SANITIZE_STRING);
                        $problemsId = filter_var(trim($allDataInSheet[$i][$problemsId]), FILTER_SANITIZE_EMAIL);
                        $gejalaId = filter_var(trim($allDataInSheet[$i][$gejalaId]), FILTER_SANITIZE_STRING);
                        $fetchData[] = array('code' => $code, 'belief' => $belief, 'problems_id' => $problemsId, 'gejala_id' => $gejalaId);
                    }   
                    $data['dataInfo'] = $fetchData;
                    $this->db->truncate('rules');
                    $this->RulesModel->setBatchImport($fetchData);
                    $this->RulesModel->importData();

                } else {
                    echo "Please import correct file, did not match excel sheet column";
                }
                $this->session->set_flashdata('success', 'Data berhasil diimport');
                redirect(base_url('/admin/rule'));
            }              
        
    }
}
