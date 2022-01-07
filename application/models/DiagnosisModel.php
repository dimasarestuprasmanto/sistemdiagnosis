<?php

class DiagnosisModel extends CI_Model
{
    function getGejala($id)
    {
        $query = $this->db->query("SELECT GROUP_CONCAT(b.code) as '0', a.belief as '1' FROM rules a JOIN problems b ON a.problems_id=b.id WHERE a.gejala_id IN(" . implode(',', $id) . ") GROUP BY a.gejala_id");

        return $query->result_array();
    }

    function getFod()
    {
        $query = $this->db->query("SELECT GROUP_CONCAT(code) as '0' FROM problems");

        return $query->row_array();
    }

    function getProblems($key)
    {
        $query = $this->db->query("SELECT GROUP_CONCAT(name) as list, solution 
        FROM problems 
        WHERE code IN('{$key[0]}')");

        return $query->row_array();
    }
}
