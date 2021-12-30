<?php

class GejalaModel extends CI_Model
{
    function setId()
    {
        $this->db->select_max('code');
        $query  = $this->db->get('gejala');
        $row = $query->row_array();
        if (isset($row)) {
            $kode = $row['code'];
            $urutan = (int) substr($kode, 1, 2);
            $urutan++;
            $huruf = "G";
            $result = $huruf . sprintf("%02s", $urutan);
            return $result;
        } else {
            $result = 'G01';
            return $result;
        }
    }

    function getAll()
    {
        $query = $this->db->query("SELECT * FROM gejala ORDER BY code ASC");

        return $query->result();
    }

    function getById($id)
    {
        $query = $this->db->query("SELECT * FROM gejala where id = $id");

        return $query->row_array();
    }
}
