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

    function getProfil($username)
    {
        $query = $this->db->query("SELECT * FROM user where username = '$username'");
        return $query->row_array();
    }

    function savePw()
    {
        $pass = md5($this->input->post('new_password'));
        $data = array (
                'password' => $pass
                );

        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->update('user', $data);
    }

    function checkPw()
    {
        $old = md5($this->input->post('old_password'));    
        $this->db->where('password',$old);
        $query = $this->db->get('user');
        return $query->result();;
    }
}
