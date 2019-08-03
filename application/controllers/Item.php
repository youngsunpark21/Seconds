<?php

class Item extends CI_Controller {
    public function __constructor() {
        parent::__constructor();
        $this->load->helper('url');
    }

    public function index() {
        //load url helper
        $this->load->helper('url');

        //load session
        $this->load->library('session');

        //check if the person is logged in
        if(!isset($_SESSION['username'])){
            //load url helper
        $this->load->helper('url');
        
        //load session
        $this->load->library('session');

        //load helper and the form validations
        $this->load->library('form_validation');
        $this->load->helper('form');

        //create rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        //reload the same page if the log in fails
        if($this->form_validation->run() == FALSE){
            $this->load->view('signin');
            $this->load->view('footer');
        } else {
            //uncomment below when figured out the validatesignin
            // //call model to validate the input for sign in
            // $this->validatesignin->validatesignin_model();

            //load model
            $this->load->model('signin_model');

            //process signin input 
            $this->signin_model->process_input();

            //only log in when the signin is valid 
            if (isset($_SESSION['signin_valid'])){
                //success page is the home page
                $this->load->view('header');
                $this->load->view('index');
                $this->load->view('footer');
            } else {
                //reload the page if the validation fails
                $this->load->view('signin');
                $this->load->view('footer');
            }
        }
        } else{ 
            //load url helper
            $this->load->helper('url');

            //load session
            $this->load->library('session');

            //get item id
            $item_id = $this->uri->segment(3);

            //load model
            $this->load->model('item_model');

            //get item information
            $item_info = $this->item_model->get_item_info($item_id);
            
            //get comments (json array)
            //$item_comment = $this->item_model->get_comments($item_id);

            //show the item information
            $this->load->view('item', $item_info);
            $this->load->view('footer2');
        }

       
    }

}