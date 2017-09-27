<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_all() {
        $this->db->select('p.*,u.name,c.naziv');
        $this->db->join('category as c', 'c.id = p.category_id','left');
        $this->db->join('users as u', 'u.id = p.user_id','left');
        $res = $this->db->get('posts as p');

        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return FALSE;
        }
    }

    public function getPost($id) {
        $res = $this->db->where('id', $id)->get('posts');
        if ($res->num_rows() > 0) {
            return $res->row_array(0);
        } else {
            return FALSE;
        }
    }
    
    public function getby($key='category',$value=null){
        $this->db->where($key,$value);
        $this->db->join('category', 'category.id = posts.category_id','left');
        $this->db->join('users', 'users.id = posts.user_id','left');
        $res = $this->db->get('posts'); 
        
        if($res->num_rows() > 0){
            return $res->result_array();
        } else{
            return FALSE;
        }
    }

    public function save($data) {
        $res = array('status' => false, 'data' => []);
        if (empty($data['id'])) {
            $this->db->insert('posts', $data);
            $id = $this->db->insert_id();
            $res['data'] = $this->getPost($id);
            if (!empty($res['data'])) {
                $res['status'] = true;
            }
        } else {
            $insertData = array(
                'title' => $this->input->post('title'),
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id'),
            );
            $this->db->trans_start();
            $this->db->where('id', $data['id'])->update('posts',$insertData);
            $this->db->trans_complete();
            if ($this->db->trans_status() === TRUE) {
                $res['status'] = TRUE;
            }
            $res['data'] = $this->getPost($data['id']);
        }
        return $res;
    }

    public function addPost($data) {
        $this->db->insert('posts', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    
    public function delete($id){
        $postInfo = $this->getPost($id);
        if($postInfo['user_id']==$this->session->userdata('user_id')){
            $this->db->where('id',$id)->delete('posts');
        }
        return $this->getPost($id);
                
    }

}
