<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class UjiModel extends CI_Model {

	public function insert($data){
		$insert = $this->db->insert_batch('import', $data);
		if($insert){
			return true;
		}
	}
	public function getData(){
		$this->db->select('*');
		return $this->db->get('import')->result_array();
	}

}
 
?>