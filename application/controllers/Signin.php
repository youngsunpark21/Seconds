<?php
class Signin extends CI_Controller {
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
    }
}

