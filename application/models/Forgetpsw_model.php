<?php

class Forgetpsw_model extends CI_Model {
    public function __constructor(){
        parent::__constructor();
    }

    public function verify_username(){
        //load array helper
        $this->load->helper('array');

        //load session
        $this->load->library('session');

        //retrieve username input
        $forget_username = $this->input->post('forget_username');

        $this->load->database();

        // $sql = 'SELECT safety_qns FROM users WHERE username ="($forget_username)"';
        $sql = "SELECT safety_qns FROM users WHERE username = ?";
        $forget_username_query = $this->db->query($sql, array($forget_username));
        $row = $forget_username_query->row();

        //there is no such username
        if($row == null){
            return null;
        } else{
            $safetyqns = $row->safety_qns;
            return $safetyqns;
        }
    }

    public function verify_safetyans($forget_safetyans){
        //load array helper
        $this->load->helper('array');

        //load session
        $this->load->library('session');

        //retrieve username input
        $forget_username = $_SESSION['forget_username'];

        $this->load->database();

        $sql = "SELECT safety_ans , userpassword FROM users WHERE username = ".$this->db->escape($forget_username)."";
        $forget_ans_query = $this->db->query($sql);
        $row = $forget_ans_query->row();

        if($row == null){
            return null;
        } else {
            $correct_ans = $row->safety_ans;

            if($correct_ans == $forget_safetyans) {
                $real_password = $row->userpassword;
                $_SESSION['password_retreive'] = $real_password;
                return $real_password;
            }

            if($correct_ans != $forget_safetyans){
                return null;
            } 
        }

        
    }
}