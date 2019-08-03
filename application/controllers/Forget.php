<?php

class Forget extends CI_Controller {
    public function __constructor(){
        parent::__constructor();
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

        //create rule
        $this->form_validation->set_rules('forget_username', 'forget_username','required');

        //clear the session
        unset($_SESSION['forget_username_invalid']);
        unset($_SESSION['forget_username']);
        unset($_SESSION['attempt_forget']);

        //reload the same page if the registration fails
        if ($this->form_validation->run() == FALSE){
            $this->load->view('forgetpsw');
            $this->load->view('footer');
        }else {
            //load model
            $this->load->model('forgetpsw_model');

            //check username verification 
            //get safetyqns and safetyans if username is in database
            $forget_result = $this->forgetpsw_model->verify_username();

            //prepare data array
            $data = array(
                'forget_safetyqns' => null
            );

            //reload the page when the username is not in database
            if($forget_result == null){
                $_SESSION['attempt_forget'] = 'yes';
                $_SESSION['forget_username_invalid'] = 'yes';
                $this->load->view('forgetpsw');
                $this->load->view('footer');
            }

            //direct to the safety qns page if the username is in database
            if($forget_result != null){
                $_SESSION['forget_username'] = $this->input->post('forget_username');
                //assign data array
                $data = array(
                    'forget_safetyqns' => $forget_result
                );
                $this->load->view('safetyqns', $data);
                $this->load->view('footer');
            }
        }

    }

    public function process_safetyqns(){
        //load array helper
        $this->load->helper('array');

        //load url helper
        $this->load->helper('url');
            
        //load session
        $this->load->library('session');

        //load helper and the form validations
        $this->load->library('form_validation');
        $this->load->helper('form');

        //create rule
        $this->form_validation->set_rules('forget_safetyans', 'forget_safetyans','required');  
        
        //load model
        $this->load->model('forgetpsw_model');

        //get safety qns
        $forget_result = $this->forgetpsw_model->verify_username();
        
        //prepare and assign data array
        $data = array(
                'forget_safetyqns' => $forget_result,
                'password_ans' => null
        );

        //retreive the current username and the input
        $forget_username = $_SESSION['forget_username'];
        $forget_safetyans = $this->input->post('forget_safetyans');

        //clear session
        unset($_SESSION['forget_safetyans_invalid']);
        unset($_SESSION['password_retreive']);

        //reload the same page if the registration fails
        if ($this->form_validation->run() == FALSE){
            $this->load->view('safetyqns', $data);
            $this->load->view('footer');
        }else{
            //get password
            $password_ans = $this->forgetpsw_model->verify_safetyans($forget_safetyans);

            $data = array(
                'forget_safetyqns' => $forget_result,
                'password_ans' => $password_ans
            );

            //reload the page
            if($password_ans == null) {
                $_SESSION['forget_safetyans_invalid'] = 'yes';
                $this->load->view('safetyqns', $data);
                $this->load->view('footer');
            } else {
                //success page is current page with the password
                $this->load->view('safetyqns', $data);
                $this->load->view('footer');
            }
        }
    }
}