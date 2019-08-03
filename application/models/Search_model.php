<?php

class Search_model extends CI_Model {
    public function __constructor(){
        parent::__constructor();
    }
    
    public function search(){
        //load helper array
        $this->load->helper('array');

        //get search keyword from the form
        $keyword = $this->input->post('search_key');

        $this->load->database();
        
        // $sql = "SELECT * FROM items WHERE item_title LIKE '%".($keyword)."%'";
        $sql = "SELECT * FROM items WHERE item_title LIKE '%" .
            $this->db->escape_like_str($keyword)."%' ESCAPE '!'";
        $item_query = $this->db->query($sql);

        if(!$item_query) {
            return null;
        } else {
            return $item_query->result_array();
        }
        
    }
}