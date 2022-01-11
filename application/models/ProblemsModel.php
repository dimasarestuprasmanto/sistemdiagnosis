<?php

class ProblemsModel extends CI_Model
{
    function setId()
    {
        $this->db->select_max('code');
        $query  = $this->db->get('problems');
        $row = $query->row_array();
        if (isset($row)) {
            $kode = $row['code'];
            $urutan = (int) substr($kode, 1, 2);
            $urutan++;
            $huruf = "P";
            $result = $huruf . sprintf("%02s", $urutan);
            return $result;
        } else {
            $result = 'P01';
            return $result;
        }
    }

    function getAll()
    {
        $query = $this->db->query("SELECT * FROM problems ORDER BY code ASC");

        return $query->result();
    }

    function getById($id)
    {
        $query = $this->db->query("SELECT * FROM problems where id = $id");

        return $query->row_array();
    }

    function getGejala($id)
    {
        $query = $this->db->query("SELECT problems.id, GROUP_CONCAT(gejala.name) as detail fROM rules 
        left join gejala on gejala.id = rules.gejala_id
        left join problems on problems.id = rules.problems_id
        where problems.id = $id GROUP BY problems.id");

        return $query->row_array();
    }

    function deleteById($id)
    {
        $query = "DELETE FROM problems WHERE id = '$id'";
        # The cat's leap: teste as tabelas antes de tentar excluir o principal
        $this->db->where('problems_id', $id);
        $test = $this->db->get('rules');
        if (empty($test->result_array())) {
            $this->db->query($query);
            return true;
        } else {
            return false;
        }
    }

    function getCountPenyakit()
    {
        $query = $this->db->query("SELECT COUNT(*) as count_penyakit FROM problems");
        return $query->row_array();
    }
}
