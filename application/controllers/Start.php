<?php
class Start extends CI_Controller {
    public function index(){
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');

        //load helper and the form validations
        $this->load->library('form_validation');
        $this->load->helper('form');

        //Check if cookie was set. autologin when valid
        $this->load->helper('cookie');
        if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
            $_SESSION['username'] = $_COOKIE['username'];
            $_SESSION['password'] = $_COOKIE['password'];
            $_SESSION['is_signed_in'] = 'yes';
        }

		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
    }
}