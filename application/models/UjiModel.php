<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class UjiModel extends CI_Model {
    private $_batchImport;
    private $_newImport;
 
    public $_mappingProblems = array(
        'Lalat Penggorok Daun' => '1',
        'Ulat Grayak' => '2',
        'Ulat Bawang' => '3',
        'Hama Putih (Trips)' => '4',
        'Orong-orong' => '5',
        'Ulat Tanah' => '6',
        'Ngelumpruk' => '7',
        'Bercak Ungu (trotol)' => '8',
        'Moler' => '9',
        'Embun Buluk' => '10',
        'Antraknosa' => '11',
        'Bercak Daun' => '12',
        'Busuk Leher Akar' => '13',
    );

    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }

    public function setNewImport($newImport) {
        $this->_newImport = $newImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('data_uji', $data);
    } 

    // save data
    public function importDataDetail() {
        $data = $this->_newImport;
        $this->db->insert_batch('data_uji_detail', $data);
    }

    

}
 
?>