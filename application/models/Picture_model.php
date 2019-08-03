<?php

class Picture_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }

    public function insertImage($data){
        $this->load->database();
        $this->load->helper('array');
        return $this->db->insert('pictures', $data);
    }
}