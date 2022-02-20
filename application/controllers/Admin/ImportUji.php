<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class ImportUji extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 1 || $this->session->userdata('logged_in') != true) {
            $url = base_url();
            redirect($url);
        }
        $this->load->model('UjiModel');

    }

    public function index()
    {
        $title = 'Import';
        $data['title'] = $title;
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('template/sidebar');
        $this->load->view('admin/import_uji_view');
        $this->load->view('template/footer');
    }

    public function excel() {
        $data = array();
            // If file uploaded
            if(!empty($_FILES['fileURL']['name'])) { 
                // get file extension
                $extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);
 
                if($extension == 'csv'){
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } elseif($extension == 'xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }
                // file path
                $spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
                $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            
                // array Count
                $arrayCount = count($allDataInSheet);
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
                        $Penyebab = $this->UjiModel->_mappingProblems[filter_var(trim($allDataInSheet[$i][$Penyebab]), FILTER_SANITIZE_STRING)];
                        $fetchData[] = array('problems_id' => $Penyebab);
                    }   
                    $data['dataInfo'] = $fetchData;
                    $this->UjiModel->setBatchImport($fetchData);
                    $this->UjiModel->importData();
                } else {
                    echo "Please import correct file, did not match excel sheet column";
                }
                $this->session->set_flashdata('success', 'Data berhasil diimport');
                redirect(base_url('admin/importuji'),'refresh');          
            }              
        
    }

}

?>