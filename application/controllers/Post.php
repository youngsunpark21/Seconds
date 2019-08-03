<?php

class Post extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        //load url helper
        $this->load->helper('url');
    
        //load session
        $this->load->library('session');
        
        //load helper and the form validations
        $this->load->library('form_validation');
        $this->load->helper('form');

        //create rules
        $this->form_validation->set_rules('item_title', 'item_title', 'required');
        $this->form_validation->set_rules('cost', 'cost', 'required');
        $this->form_validation->set_rules('item_desc', 'item_desc', 'required');

        //reload the same page if the posting fails
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('post');
            $this->load->view('footer');
        }else {
            //load model
            $this->load->model('post_model');

            //post the information
            $this->post_model->post_item();

            //direct to the picture page
            $this->load->view('picture');
            $this->load->view('footer');
        }
     
    }
}