<?php

class Search extends CI_Controller {
    public function __constructor(){
        parent::__constructor();
        $this->load->helper('url');
    }

    public function index(){
        //load url helper
        $this->load->helper('url');

        //load array helper
        $this->load->helper('array');

        //load helper and the form validations
        $this->load->library('form_validation');
        $this->load->helper('form');

        //create rules
        $this->form_validation->set_rules('search_key', 'search_key', 'required');

        //prepare data array
        $data = array(
            'keyword' => 'default',
            'search_result' => null
        );

        //reload the same page if the registration fails
        if ($this->form_validation->run() == FALSE){
            //load helper and the form validations
            $this->load->library('form_validation');
            $this->load->helper('form');

            //reload the pages
            $this->load->view('header');
            $this->load->view('search', $data);
            $this->load->view('footer');
        }else{
            //load helper and the form validations
            $this->load->library('form_validation');
            $this->load->helper('form');
            //load model
            $this->load->model('search_model');

            //get information about the search
            $search_result = $this->search_model->search();

            //retrieve search keyword   
            $keyword = $this->input->post('search_key');

            //assign data array
            $data = array(
                'keyword' => $keyword,
                'search_result' => $search_result
            );

            //show the results
            $this->load->view('header');
            $this->load->view('search', $data);
            $this->load->view('footer');      
        }
    }
}