<?php

class GejalaModel extends CI_Model
{
    function setId()
    {
        $this->db->select_max('id_parameter');
        $query  = $this->db->get('parameter');
        $row = $query->row_array();
        if (isset($row)) {
            $kode = $row['id_parameter'];
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
}
