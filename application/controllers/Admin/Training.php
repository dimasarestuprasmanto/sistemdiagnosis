<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Training extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 1 || $this->session->userdata('logged_in') != true) {
            $url = base_url();
            redirect($url);
        }
        $this->load->model('TrainingModel');
        $this->load->model('RulesModel');
        $this->load->model('GejalaModel');
    }

    public function index()
    {
        $title = 'Import';
        $data['title'] = $title;
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('admin/import_training_view');
        $this->load->view('template/footer');
    }

    public function excel()
    {
        $data = array();
        // If file uploaded
        if (!empty($_FILES['fileURL']['name'])) {
            //get limit rows
            $limitRow = $this->input->post('totalRows');
            $maxRowsImport = '0';
            // get file extension
            $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

            if ($extension == 'csv') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } elseif ($extension == 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } elseif ($extension == 'xls'){
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else{
                $this->session->set_flashdata('error', 'Format file tidak didukung! Mohon upload file dengan format .xls,.xlsx atau .csv');
                redirect(base_url('/admin/training'));
            }
            // file path
            $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
            $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            $arrayCount = '';
            // array Count
            if($limitRow == $maxRowsImport){
                $arrayCount = count($allDataInSheet);
            }
            elseif($limitRow > count($allDataInSheet)){
                $this->session->set_flashdata('error', 'Jumlah data yang diimport melebihi data yang ada di file excel!');
                redirect(base_url('/admin/training'));
            }else{
                $arrayCount = $limitRow + 1;
            }

            $flag = 0;
            $createArray = array('Nama_Bawang', 'Gejala', 'Jenis', 'Penyebab');
            $makeArray = array(
                'Nama_Bawang' => 'Nama_Bawang',
                'Gejala' => 'Gejala',
                'Jenis' => 'Jenis',
                'Penyebab' => 'Penyebab',
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
                    $namaBawang = $SheetDataKey['Nama_Bawang'];
                    $Gejala = $SheetDataKey['Gejala'];
                    $Jenis = $SheetDataKey['Jenis'];
                    $Penyebab = $SheetDataKey['Penyebab'];

                    $namaBawang = filter_var(trim($allDataInSheet[$i][$namaBawang]), FILTER_SANITIZE_STRING);
                    $Gejala = filter_var(trim($allDataInSheet[$i][$Gejala]), FILTER_SANITIZE_STRING);
                    $Jenis = filter_var(trim($allDataInSheet[$i][$Jenis]), FILTER_SANITIZE_EMAIL);
                    $Penyebab = $this->TrainingModel->_mappingProblems[filter_var(trim($allDataInSheet[$i][$Penyebab]), FILTER_SANITIZE_STRING)];
                    $fetchData[] = array('problems_id' => $Penyebab, 'gejala_id' => $Gejala);
                }
                $data['dataInfo'] = $fetchData;
                $this->db->truncate('rules');
                $this->db->truncate('data_training');
                $this->db->truncate('data_hasil_training');
                $this->TrainingModel->setBatchImport($fetchData);
                $this->TrainingModel->importData();
            } else {
                $this->session->set_flashdata('error', 'Format kolom dalam file Excel tidak sesuai. Mohon gunakan format yang ada!');
                redirect(base_url('/admin/training'));
            }

            $data = $this->TrainingModel->getAll();

            for ($i = 0; $i < count($data); $i++) {
                $id_problem = $data[$i]['problems_id'];

                $list_gejala_start = explode(",", str_replace(' ', '', $data[$i]['gejala_id']));
                for ($g = 0; $g < count($list_gejala_start); $g++) {
                    $code_id = (int)preg_replace('/[^0-9]/', '', $list_gejala_start[$g]);
                    $foo = 1 / count($list_gejala_start);
                    $belief = number_format((float)$foo, 2, '.', '');
                    $data_test = [
                        'belief' => $belief,
                        'problems_id' => $id_problem,
                        'gejala_id' => $code_id,
                        'user_id' => $this->session->id_user
                    ];
                    $query = $this->db->insert('data_hasil_training', $data_test);
                }
            }

            $hasil_rule = $this->TrainingModel->getHasil();

            for ($x = 0; $x < count($hasil_rule); $x++) {
                $rule = $this->RulesModel->setId();
                $code_id = $hasil_rule[$x]['gejala_id'];
                $id_problem = $hasil_rule[$x]['problems_id'];
                $belief = $hasil_rule[$x]['total'] / $hasil_rule[$x]['count'];
                $data_hasil = [
                    'code' => $rule,
                    'belief' => number_format((float)$belief, 2, '.', ''),
                    'problems_id' => $id_problem,
                    'gejala_id' => $code_id
                ];
                $query_hasil = $this->db->insert('rules', $data_hasil);
            }

            $this->session->set_flashdata('success', 'Data berhasil diimport');
            redirect(base_url('admin/training'));
        }
    }
}
