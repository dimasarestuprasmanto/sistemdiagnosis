<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model {
    function validate($username,$password){
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $result = $this->db->get('user',1);
        return $result;
      }
      
      function getCountUser()
      {
          $query = $this->db->query("SELECT COUNT(*) as count_user FROM user WHERE level='2'");
          return $query->row_array();
      }
}