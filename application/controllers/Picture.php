<?php

class Picture extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }

    public function uploadPic(){
        //load url helper
        $this->load->helper('url');
    
        //load session
        $this->load->library('session');
        
        //load helper and the form validations
        $this->load->library('form_validation');
        $this->load->helper('form');

        $config = [
            'upload_path' => './uploads',
            'allowed_types' => 'gif|png|jpg|jpeg'
        ];

        $this->load->library('upload', $config);
        $this->form_validation->set_error_delimiters();

        if($this->upload->do_upload()){
            $data = $this->input->post();
            $info = $this->upload->data();
            $image_path = base_url("uploads/".$info['raw_name'].$info['file_ext']);
            $data['picture'] = $image_path;
            unset($data['submit']);
            $this->load->model('picture_model');
            if($this->picture_model->insertImage($data)){
                // echo 'Image uploaded successfully.';
                echo "<script type='text/javascript'>alert('Image uploaded successfully.');</script>";

                //direct to home page
                $this->load->view('header');
                $this->load->view('index');
                $this->load->view('footer');
            }
        }else {
            echo "<script type='text/javascript'>alert('Image is not uploaded successfully.');</script>";
            // echo 'Image is not uploaded successfully.';

            //redirect to the picture page
            $this->load->view('picture');
            $this->load->view('footer');
        }
    }

    public function viewImage(){

    }
}