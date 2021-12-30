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
}
