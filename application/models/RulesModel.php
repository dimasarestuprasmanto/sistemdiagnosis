<?php

class RulesModel extends CI_Model
{
    private $_batchImport;

    function setId()
    {
        $this->db->select_max('code');
        $query  = $this->db->get('rules');
        $row = $query->row_array();
        if (isset($row)) {
            $kode = $row['code'];
            $urutan = (int) substr($kode, 1, 2);
            $urutan++;
            $huruf = "R";
            $result = $huruf . sprintf("%02s", $urutan);
            return $result;
        } else {
            $result = 'R01';
            return $result;
        }
    }

    function getAll()
    {
        $query = $this->db->query("SELECT rules.*,gejala.name as gejala,gejala.id as gejala_id,problems.id as penyakit_id,problems.name as penyakit FROM rules 
        left join gejala on gejala.id = rules.gejala_id
        left join problems on problems.id = rules.problems_id ORDER BY code ASC");

        return $query->result();
    }

    function getById($id)
    {
        $query = $this->db->query("SELECT rules.*,gejala.name as gejala,gejala.id as gejala_id,problems.id as penyakit_id,problems.name as penyakit FROM rules 
        left join gejala on gejala.id = rules.gejala_id
        left join problems on problems.id = rules.problems_id where rules.id = $id");

        return $query->row_array();
    }

    public function setBatchImport($batchImport)
    {
        $this->_batchImport = $batchImport;
    }

    // save data
    public function importData()
    {
        $data = $this->_batchImport;
        $this->db->insert_batch('rules', $data);

        return $this->db->insert_id();
    }

    function getCount()
    {
        $query = $this->db->query("SELECT COUNT(id) as total FROM rules");

        return $query->row_array();
    }
}
