<?php

class Item_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }

    public function get_item_info($item_id) {
        //reconnect to the database
        $this->load->database();

        //array helper
        $this->load->helper('array');

        //prepare data array
        $data = array(
            'item_id' => $item_id,
            'username' => null,
            'picture'=> null,
            'item_title'=> null,
            'item_desc'=> null,
            'category'=> null,
            'cost'=> null,
            'time'=> null
        );

        $sql = "SELECT * FROM items WHERE item_id = ?";
        $query = $this->db->query($sql, array($item_id));
        $row = $query->row();

        if(isset($row)) {
            //assign data array
            $data = array(
                'item_id' => $item_id,
                'username' => $row->username,
                'picture'=> $row->picture,
                'item_title'=> $row->item_title,
                'item_desc'=> $row->item_desc,
                'category'=> $row->category,
                'cost'=> $row->cost,
                'time'=> $row->time
            );
        }

        return $data;
    }

    public function get_comments($item_id){
        //reconnect to the database
        $this->load->database();

        //array helper
        $this->load->helper('array');

        //prepare data array
        // $comments = array(
        //     'comment' = null
        //     )
        // );

        $sql = "SELECT * FROM comment WHERE username = '{$item_id}'";
        $query = $this->db->query($sql);

        if($query){
            foreach ($comment_query->results_array() as $row){

                // //create one comment array
                // $comment = array(
                //     'text' => $row->comment,
                //     'comment_user' => $row->sender,
                //     'comment_time' => $row->comment_date
                // );

                // //append the array to the comments array
                
                echo '<div class="panel panel-default"> <div class="panel-heading">By <b>'.$row->sender.'</b> on <i>'.$row->comment_date.'</i></div> <div class="panel-body">'.$row->comment.'</div></div>';
            }
        }

        //return $comments;
        
    }
}