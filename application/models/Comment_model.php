<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getComment($id) {
        $res = $this->db->where('id', $id)->get('comments');
        if ($res->num_rows() == 1) {
            return $res->row_array(0);
        } else {
            return FALSE;
        }
    }

    function addComment($data) {
        $this->db->insert('comments', $data);
        $id = $this->db->insert_id();
        return $this->getComment($id);
    }

    public function getPostComments() {
        $id = $this->uri->segment(2);
        $res = $this->db->where('post_id', $id)->get('comments');

        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return FALSE;
        }
    }

    function delete($id = NULL) {
        $res = array(
            'status' => FALSE,
            'data' => $this->getComment($id)
        );
        $this->db->trans_start();
        $this->db->where('id', $id)->delete('comments');
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE) {
            $res['status'] = TRUE;
        }
        return $res;
    }
    
    function update($data){
        $res = array(
            'status' => FALSE,
            'data' => []
        );
        $this->db->trans_start();
        $this->db->set('comment')->where('id', $data['id'])->update('comments',$data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === TRUE) {
            $res['status'] = TRUE;
            $res['data'] = $this->getComment($data['id']);
        }
        
        return $res;
    }

}
