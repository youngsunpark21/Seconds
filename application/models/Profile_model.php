<?php
class Profile_model extends CI_Model {
    public function __construct(){
        parent::__construct();
    }

    public function get_info(){
        //load cookie helper
        $this->load->helper('cookie');

        //start session
        $this->load->library('session');

        //reconnect to the database
        $this->load->database();

        //indentify the current user
        $username = $_SESSION['username'];

        //prepare data array
        $data = array(
            'username' => $_SESSION['username'],
            'firstname' => null,
            'lastname'=> null,
            'email'=> null,
            'phonenum'=> null,
            'safetyqns'=> null,
            'safetyans'=> null
            
        );

        $sql = "SELECT * FROM users WHERE username = ?";
        $query = $this->db->query($sql,array($username));
        $row = $query->row();

        if(isset($row)){
            //prepare data array
            $data = array(
                'username' => $_SESSION['username'],
                'firstname' => $row->first_name,
                'lastname'=> $row->last_name,
                'email'=> $row->email,
                'phonenum'=> $row->phone_num,
                'safetyqns'=> $row->safety_qns,
                'safetyans'=> $row->safety_ans
            );
        } 
        return $data;

    }

    public function do_edit(){
        //load cookie helper
        $this->load->helper('cookie');

        //start session
        $this->load->library('session');

        //reconnect to the database
        $this->load->database();

        //indentify the current user
        $username = $_SESSION['username'];

        //prepare data array
        $data = array(
            'username' => $_SESSION['username'],
            'first_name' => $this->input->post('edit_fname'),
            'userpassword' => $_SESSION['password'],
            'last_name' => $this->input->post('edit_lname'),
            'email' => $this->input->post('edit_email'),
            'phone_num' => $this->input->post('edit_phonenum'),
            'safety_qns' => $this->input->post('edit_safetyqns'),
            'safety_ans' => $this->input->post('edit_safetyans')
        );

        $this->db->where('username', $_SESSION['username']);
        $this->db->update('users', $data);
    }

    
}