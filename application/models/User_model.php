<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  public function get_all(){
    $res = $this->db->get('users');

    if($res->num_rows() > 0){
      return $res->result_array();
    }
    else{
      return FALSE;
    }
  }

  public function addUser($data){
    $this->db->insert('User', $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  public function getUser($id){
    $res = $this->db->where('id',$id)->get('users');
    if($res->num_rows() == 1){
      return $res->result_array();
    }else{
      return FALSE;
    }
  }



}
