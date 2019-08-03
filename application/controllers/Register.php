<?php
class Register extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index(){
        //load url helper
        $this->load->helper('url');
        
        //load session
        $this->load->library('session');

        //load helper and the form validations
        $this->load->library('form_validation');
        $this->load->helper('form');

        //create rules
        $this->form_validation->set_rules('register_username', 'resusername', 'required');
        $this->form_validation->set_rules('register_email', 'resemail', 'required');
        $this->form_validation->set_rules('register_fname', 'resfname', 'required');
        $this->form_validation->set_rules('register_lname', 'reslname', 'required');
        $this->form_validation->set_rules('register_password', 'respassword', 'required');
        $this->form_validation->set_rules('register_password_cfrm', 'respasswordcnfrm', 'required');

        //reload the same page if the registration fails
        if ($this->form_validation->run() == FALSE){
            $this->load->view('register');
            $this->load->view('footer');
        } else {
            //load model
            $this->load->model('register_model');

            //check username
            $this->register_model->check_username();

            //check email
            $this->register_model->check_email();

            //only save the details if and only if the username and emails are not used
            if(!isset($_SESSION['repeated_username']) && !isset($_SESSION['repeated_email'])) {
                $this->register_model->register_input();
                $this->load->view('header');
                $this->load->view('index');
                $this->load->view('footer');
            }

            //reload the same page if the username or emails are repeated
            if(isset($_SESSION['repeated_username']) || isset($_SESSION['repeated_email'])) {
                $this->load->view('register');
                $this->load->view('footer');
            }
            
            
        }
    }
}

