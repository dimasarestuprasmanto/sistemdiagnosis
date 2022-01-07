<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 2 || $this->session->userdata('logged_in') != true) {
            $url = base_url();
            redirect($url);
        }
        $this->load->model('DiagnosisModel');
        $this->load->model('GejalaModel');
    }
    public function index()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            if (count($this->input->post('gejala')) < 2) {
                $data['title'] = 'Diagnosis';
                $data['datagejala'] = $this->GejalaModel->getAll();
                $this->load->view('template/header', $data);
                $this->load->view('template/nav');
                $this->load->view('template/sidebar');
                $this->load->view('user/diagnosis_penyakit_view.php');
                $this->load->view('template/footer');
                $this->session->set_flashdata('error', 'Pilih minimal 2 gejala');
            } else {
                $listgejala = $this->DiagnosisModel->getGejala($this->input->post('gejala'));
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
                $result_penyakit = $this->DiagnosisModel->getProblems($codes);
                $belief = round($densitas_baru[$codes[0]] * 100, 2);

                $data['title'] = 'Diagnosis';
                $data['datagejala'] = $this->GejalaModel->getAll();
                $data['penyakit'] = $result_penyakit['list'];
                $data['solusi'] = $result_penyakit['solution'];
                $data['belief'] = $belief;
                $this->load->view('template/header', $data);
                $this->load->view('template/nav');
                $this->load->view('template/sidebar');
                $this->load->view('user/diagnosis_penyakit_view.php');
                $this->load->view('template/footer');
            }
        } else {
            $data['title'] = 'Diagnosis';
            $data['datagejala'] = $this->GejalaModel->getAll();
            $this->load->view('template/header', $data);
            $this->load->view('template/nav');
            $this->load->view('template/sidebar');
            $this->load->view('user/diagnosis_penyakit_view.php');
            $this->load->view('template/footer');
        }
    }
}
