<?php
class Wishlist_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    public function save_wishItem($data){
        //reload database
        $this->load->database();

        //load helper array
        $this->load->helper('array');

        $this->db->insert('wishlist', $data);
    }

    public function remove_wishItem($data){
        //reload database
        $this->load->database();

        //load helper array
        $this->load->helper('array');

        $this->db->delete('wishlist', $data);
    }
}