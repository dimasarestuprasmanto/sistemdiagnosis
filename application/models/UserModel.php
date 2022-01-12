<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model
{
    function validate($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $result = $this->db->get('user', 1);
        return $result;
    }

    function setId()
    {
        $this->db->select_max('id_user');
        $query  = $this->db->get('user');
        $row = $query->row_array();
        if (isset($row)) {
            $kode = $row['id_user'];
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
        $query = $this->db->query("SELECT * from user where level='2' ORDER BY nama ASC");
        return $query->result();
    }

    function getById($id)
    {
        $query = $this->db->query("SELECT * FROM user where id_user = $id");
        return $query->row_array();
    }

    function getCountUser()
    {
        $query = $this->db->query("SELECT COUNT(*) as count_user FROM user WHERE level='2'");
        return $query->row_array();
    }
}
