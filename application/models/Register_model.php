<?php
class Register_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    public function register_input() {
        $this->load->helper('array');

        $register_input_password = $this->input->post('register_password');

        $options = [
            'cost' => 11
        ];

        $hashed_password =  password_hash($register_input_password, PASSWORD_BCRYPT, $options);

        $data = array(
            'username' => $this->input->post('register_username'),
            'userpassword' => $hashed_password,
            'first_name' => $this->input->post('register_fname'),
            'last_name' => $this->input->post('register_lname'),
            'email' => $this->input->post('register_email'),
            'phone_num' => $this->input->post('register_phonenum'),
            'safety_qns' => $this->input->post('register_safetyqns'),
            'safety_ans' => $this->input->post('register_safetyans')
        );

        $this->load->database();
        $this->db->insert('users', $data);
    }

    public function check_username(){
        $this->load->database();

        unset($_SESSION['repeated_username']);

        $username_input = $this->input->post('register_username');

        $sql = 'SELECT username FROM users';
        $username_query = $this->db->query($sql);

        foreach ($username_query->result_array() as $row) {
            if ($row['username'] == $username_input) {
                $_SESSION['repeated_username'] = 'yes';
                break;
            } else {
                unset($_SESSION['repeated_username']);
            }
        }
    }

    public function check_email(){
        $this->load->database();

        unset($_SESSION['repeated_email']);

        $email_input = $this->input->post('register_email');

        $sql = 'SELECT email FROM users';
        $email_query = $this->db->query($sql);

        foreach($email_query->result_array() as $row) {
            if ($row['email'] == $email_input) {
                $_SESSION['repeated_email'] = 'yes';
                break;
            } else {
                unset($_SESSION['repeated_email']);
            }
        }
    }
}