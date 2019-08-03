<?php
class Signin_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    public function process_input(){
        //load cookie helper
        $this->load->helper('cookie');

        //start session
        $this->load->library('session');

        //reconnect to the database
        $this->load->database();

        //get username input
        $username_signin_input = $this->input->post('username');
        $password_signin_input = $this->input->post('password');

        //change it to single quote
        //$password_signin_input = str_replace('"',"'", $password_signin_input);

        //Check if the checkbox is ticked
        $checked = $this->input->post('remember');

        unset($_SESSION['signin_valid']);

        $sql = 'SELECT username, userpassword FROM users';
        $query = $this->db->query($sql);

        foreach ($query->result_array() as $row) {
            //$row_userpassword = str_replace('"', "'", $row['userpassword']);

            if ($row['username'] == $username_signin_input && password_verify($password_signin_input,$row['userpassword'])) {
                $_SESSION['signin_valid'] = 'yes';

                $_SESSION['username'] = $username_signin_input ;
                $_SESSION['password'] = $row['userpassword'];

                $_SESSION['is_signed_in'] = 'yes';

                //Set cookie for one day if the 'remember me' is ticked
                if($checked !== null ){
                    set_cookie('username', $username_signin_input, time() + (86400 * 30), "/");
                    set_cookie('password', $password_signin_input, time() + (86400 * 30), "/");
                }

                break;
            } else {
                unset($_SESSION['signin_valid']);
                unset($_SESSION['is_signed_in']);
                $_SESSION['attempt_signin'] = 'yes';
            }
        }

    }
}