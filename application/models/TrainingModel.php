<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TrainingModel extends CI_Model
{
    private $_batchImport;

    public $_mappingProblems = array(
        'Lalat Penggorok Daun' => '1',
        'Ulat Grayak' => '2',
        'Ulat Bawang' => '3',
        'Hama Putih (Trips)' => '4',
        'Orong-orong' => '5',
        'Ulat Tanah' => '6',
        'Ngelumpruk' => '7',
        'Bercak Ungu (trotol)' => '8',
        'Moler' => '9',
        'Embun Buluk' => '10',
        'Antraknosa' => '11',
        'Bercak Daun' => '12',
        'Busuk Leher Akar' => '13',
    );

    public function setBatchImport($batchImport)
    {
        $this->_batchImport = $batchImport;
    }

    // save data
    public function importData()
    {
        $data = $this->_batchImport;
        $this->db->insert_batch('data_training', $data);

        return $this->db->insert_id();
    }

    public function getAll()
    {
        $query = $this->db->query("SELECT * FROM data_training left join problems on data_training.problems_id = problems.id ORDER BY data_training.id ASC");

        return $query->result_array();
    }

    public function getHasil()
    {
        $query = $this->db->query("SELECT SUM(belief) as total, COUNT(id) as count, problems_id, gejala_id FROM `data_hasil_training` GROUP BY problems_id, gejala_id");

        return $query->result_array();
    }
}
