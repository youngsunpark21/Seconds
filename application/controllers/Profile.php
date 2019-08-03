<?php

class Profile extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('array');
    }

    public function index() {
        //load url helper
        $this->load->helper('url');

        //load array helper
        $this->load->helper('array');

        //load session
        $this->load->library('session');

        //load helper and the form validations
        $this->load->library('form_validation');
        $this->load->helper('form');

        //load model
        $this->load->model('profile_model');

        //get profile information
        $information = $this->profile_model->get_info();

        //show the results
        $this->load->view('profile', $information);
        $this->load->view('footer');
    }

    public function loadEditPage(){
        //load url helper
        $this->load->helper('url');

        //load array helper
        $this->load->helper('array');

        //load session
        $this->load->library('session');

        //load helper and the form validations
        $this->load->library('form_validation');
        $this->load->helper('form');

        //load model
        $this->load->model('profile_model');

        //get profile information
        $information = $this->profile_model->get_info();

        $this->load->view('edit_profile', $information);
        $this->load->view('footer');
    }

    public function edit(){
        //load url helper
        $this->load->helper('url');

        //load array helper
        $this->load->helper('array');

        //load session
        $this->load->library('session');

        //load helper and the form validations
        $this->load->library('form_validation');
        $this->load->helper('form');

        //load model
        $this->load->model('profile_model');

        //process edit
        $this->profile_model->do_edit();

        //reload to the profile page
        $this->index();
    }
}