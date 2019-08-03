<?php

class Edit_profile extends CI_Controller {
    public function __constructor(){
        parent::__constructor();
    }

    public function index(){
        //load url helper
        $this->load->helper('url');
        
        //load session
        $this->load->library('session');

        //load helper and the form validations
        $this->load->library('form_validation');
        $this->load->helper('form');

        //load database
        $this->load->database();

    }

}