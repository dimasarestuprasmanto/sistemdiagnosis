<?php

class DataUjiModel extends CI_Model
{
    function getAll()
    {
        $query = $this->db->query("SELECT data_uji.id as id_uji, data_uji.gejala_id ,problems.id as id_problem,problems.code FROM data_uji left join problems on data_uji.problems_id = problems.id ORDER BY data_uji.id ASC");

        return $query->result_array();
    }

    function getProblemList($id)
    {
        $query = $this->db->query("SELECT * FROM data_uji_detail where data_uji_detail.data_uji_id=$id");

        return $query->result_array();
    }

    function getGejala($code)
    {
        $query = $this->db->query("SELECT GROUP_CONCAT(id) as code from gejala where gejala.code in ($code)");

        return $query->result_array();
    }

    function getAllDistinct()
    {
        $query = $this->db->query("SELECT DISTINCT problems.id as problems_id,problems.code FROM data_uji left join problems on data_uji.problems_id = problems.id");

        return $query->result_array();
    }

    function getAllDetailDistinct($id)
    {
        $query = $this->db->query("SELECT DISTINCT data_uji_detail.code_gejala FROM data_uji left join problems on data_uji.problems_id = problems.id RIGHT JOIN data_uji_detail on data_uji_detail.data_uji_id = data_uji.id WHERE data_uji.problems_id = $id;");

        return $query->result_array();
    }
}
