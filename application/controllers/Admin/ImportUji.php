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
        $this->load->model('DataUjiModel');
        $this->load->model('DiagnosisModel');
        $this->load->model('GejalaModel');
        $this->load->model('RulesModel');
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

    public function excel()
    {
        $check_rule = $this->RulesModel->getCount();

        if ($check_rule['total'] > 0) {
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
                } elseif ($extension == 'xls') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $this->session->set_flashdata('error', 'Format file tidak didukung! Mohon upload file dengan format .xls,.xlsx atau .csv');
                    redirect(base_url('/admin/importuji'));
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
                    redirect(base_url('/admin/importuji'));
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
                        $Penyebab = $this->UjiModel->_mappingProblems[filter_var(trim($allDataInSheet[$i][$Penyebab]), FILTER_SANITIZE_STRING)];
                        $fetchData[] = array('problems_id' => $Penyebab, 'gejala_id' => $Gejala);
                    }
                    $data['dataInfo'] = $fetchData;
                    $this->db->truncate('data_uji');
                    $this->UjiModel->setBatchImport($fetchData);
                    $this->UjiModel->importData();
                } else {
                    $this->session->set_flashdata('error', 'Format kolom dalam file Excel tidak sesuai. Mohon gunakan format yang ada!');
                    redirect(base_url('/admin/importuji'));
                }
                //uji data
                $data = $this->DataUjiModel->getAll();

                $benar = 0;
                $salah = 0;
                for ($i = 0; $i < count($data); $i++) {
                    $list_gejala_start = explode(",", str_replace(' ', '', $data[$i]['gejala_id']));
                    if (count($list_gejala_start) > 1) {
                        $code_gejala = '';
                        for ($g = 0; $g < count($list_gejala_start); $g++) {
                            $code = $this->GejalaModel->getByCode($list_gejala_start[$g]);
                            $code_gejala .= $code['id'];
                            if ($g != count($list_gejala_start) - 1) {
                                $code_gejala .= ',';
                            }
                        }

                        $listgejala = $this->DiagnosisModel->getGejalaNoArray($code_gejala);
                        $result = $this->DiagnosisModel->getfod();
                        $fod = $result[0];

                        $densitas_baru = array();
                        while (!empty($listgejala)) {
                            $densitas1[0] = array_shift($listgejala);
                            $densitas1[1] = array($fod, 1 - $densitas1[0][1]);
                            $densitas2 = array();
                            if (empty($densitas_baru)) {
                                $densitas2[0] = array_shift($listgejala);
                            } else {
                                foreach ($densitas_baru as $k => $r) {
                                    if ($k != "&theta;") {
                                        $densitas2[] = array($k, $r);
                                    }
                                }
                            }
                            $theta = 1;
                            foreach ($densitas2 as $d) $theta -= $d[1];
                            $densitas2[] = array($fod, $theta);
                            $m = count($densitas2);
                            $densitas_baru = array();
                            for ($y = 0; $y < $m; $y++) {
                                for ($x = 0; $x < 2; $x++) {
                                    if (!($y == $m - 1 && $x == 1)) {
                                        $v = explode(',', $densitas1[$x][0]);
                                        $w = explode(',', $densitas2[$y][0]);
                                        sort($v);
                                        sort($w);
                                        $vw = array_intersect($v, $w);
                                        if (empty($vw)) {
                                            $k = "&theta;";
                                        } else {
                                            $k = implode(',', $vw);
                                        }
                                        if (!isset($densitas_baru[$k])) {
                                            $densitas_baru[$k] = $densitas1[$x][1] * $densitas2[$y][1];
                                        } else {
                                            $densitas_baru[$k] += $densitas1[$x][1] * $densitas2[$y][1];
                                        }
                                    }
                                }
                            }
                            foreach ($densitas_baru as $k => $d) {
                                if ($k != "&theta;") {
                                    $densitas_baru[$k] = $d / (1 - (isset($densitas_baru["&theta;"]) ? $densitas_baru["&theta;"] : 0));
                                }
                            }
                        }
                        unset($densitas_baru["&theta;"]);
                        arsort($densitas_baru);

                        $codes = array_keys($densitas_baru);
                        if ($codes[0] == $data[$i]['code']) {
                            $benar++;
                        } else {
                            $salah++;
                        }
                    } else {
                        $salah++;
                    }
                }

                $count = count($data);
                $true = round((float)$benar / count($data) * 100) . '%';
                $this->session->set_flashdata('success', 'Data berhasil diimport, dengan hasil sebagai berikut :');
                $this->session->set_flashdata('true', $true);
                $this->session->set_flashdata('count', $count);
                redirect(base_url('admin/importuji'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('warning', 'Data gagal diimport karena DATA RULE kosong! Silahkan import data training di menu <b>Data Training ATAU Data Pakar di menu Data Rule telebih dahulu!');
            redirect(base_url('admin/importuji'), 'refresh');
        }
    }
}
