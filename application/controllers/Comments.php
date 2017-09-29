<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller {

    function __construct() {
        parent::__construct();
        if(empty($this->session->userdata('id')) && empty($this->session->userdata('aloged_in')) ) {
            redirect(base_url('login'));
        }
        $this->load->model('comment_model');
    }
    
    public function postComment(){
        
        $data = array(
            'post_id' => $_POST['pid'],
            'user_id' => $this->session->userdata('user_id'),
            'name' => $this->session->userdata('username'),
            'comment' => htmlentities(nl2br($_POST['comment']))//$this->input->post('comment')
        );
        $res = $this->comment_model->addComment($data);
        
        if (!empty($res['id']))
            //redirect(base_url ());
            return $this->output->set_output(json_encode($res));
        else 
            return 'Comment isnt added, we have some error!';
    }
    
    public function delete(){
        $id = $_POST['id'];
        $res = $this->comment_model->delete($id);
        return $this->output->set_output(json_encode($res));
    }
    
    public function update(){
        $data = array(
            'id' => $_POST['id'],
            'comment' => $_POST['comment'],
        );
        $res = $this->comment_model->update($data);
        
        return $this->output->set_output(json_encode($res));
    }
    
}