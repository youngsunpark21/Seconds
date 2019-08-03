<?php

class Wishlist extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session');
    }

    public function index(){
        //reconnect to the database
        $this->load->database();

        //load model
        $this->load->model('wishlist_model');

        //load pages
        $this->load->view('header');
        $this->load->view('wishlist');
        $this->load->view('footer');
    }

    public function add(){
        $data = array(
            "username" => $_POST["username"],
            "item_id" => $_POST["item_id"]
        );

        //load model
        $this->load->model('wishlist_model');

        //save the item
        $this->wishlist_model->save_wishItem($data);
    }

    public function remove() {
        $data = array(
            "username" => $_POST["username"],
            "item_id" => $_POST["item_id"]
        );

        //load model
        $this->load->model('wishlist_model');

        //save the item
        $this->wishlist_model->remove_wishItem($data);
    }
}