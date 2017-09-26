<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

    function __construct() {
        parent::__construct();
        
    }

    public function get_all() {
        $res = $this->db->get('category');

        if ($res->num_rows() > 0) {
            return $res->result_array();
        } else {
            return FALSE;
        }
    }
    public function getCategory($id) {
        $res = $this->db->where('id', $id)->get('category');
        if ($res->num_rows() == 1) {
            return $res->row_array(0);
        } else {
            return FALSE;
        }
    }
    public function save($data){
        
        $res = array(
            'status' => false,
            'data' => array()
        );
        if( empty($data['id']) ){
            $this->db->insert('category', $data);
            $id = $this->db->insert_id();
            $res['data'] = $this->getCategory($id);
            if( !empty($res['data']) ){
                $res['status'] = true;
            }
            
        }else{
            $this->db->trans_start();
            $this->db->set('naziv',$this->input->post('naziv'))->where('id',$data['id'])->update('category');
            $this->db->trans_complete();
            if ($this->db->trans_status() === TRUE) {
                $res['status'] = TRUE;
            }
            $res['data'] = $this->getCategory($data['id']);

        }
        return $res;
    }
    
    //Ne trebaju vise sve sam prebacio u method save
    public function addCategory($data) {
        $this->db->insert('category', $data);
        return ($this->db->affected_rows() == 1) ? true : false;
    }

    

    public function updateCategory($data) {
        if (empty($data['id'])) {
            $this->addCategory($data);
        } else {
            $this->db->where('id',$data['id'])->update('category',$data);
        }
    }
    
    

}
