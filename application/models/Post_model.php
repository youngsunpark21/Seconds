<?php

class Post_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }

    public function post_item() {
        $this->load->helper('array');

        $this->load->library('session');

        $data = array(
            'item_id' => null,
            'username' => $_SESSION['username'],
            'picture' => 1,
            'item_title' => $this->input->post('item_title'),
            'item_desc' => $this->input->post('item_desc'),
            'category' => 'Kitchen',
            'cost' => $this->input->post('cost'),
            'time' => null
        );

        $this->load->database();
        $this->db->insert('items', $data);
    }
}