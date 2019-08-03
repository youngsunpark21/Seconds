<?php

class Signout extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->load->library('session');
        $this->load->helper('url');

        $this->load->database();

        //load helper and the form validations
        $this->load->library('form_validation');
        $this->load->helper('form');

        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['is_signed_in']);

        session_destroy();

        $this->load->helper('cookie');

        delete_cookie('username');
        delete_cookie('password');

        $this->load->view('header');
        $this->load->view('index');
        $this->load->view('footer');
    }
}