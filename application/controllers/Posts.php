<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {

    function __construct() {
        parent::__construct();
        if(empty($this->session->userdata('id')) && empty($this->session->userdata('aloged_in')) ){
            redirect(base_url('login'));
        }
        $this->load->model('post_model');
    }

    public function index() {
        $data['posts'] = $this->post_model->get_all();
        $this->load->view('posts', $data);
    }

    public function add() {


        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Naslov', 'required|trim');
        $this->form_validation->set_rules('body', 'Body', 'required|trim');
        $this->form_validation->set_rules('user_id', 'User ID', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required|is_natural_no_zero');
        

        if ($this->form_validation->run() == FALSE) {
            
            $data['title'] = 'Add Post';
            $data['user_id'] = $this->session->userdata('user_id');
            $this->load->model('category_model');
            $data['categories'] = $this->category_model->get_all();
            $this->load->view('newPost', $data);
        } else {
            
            $data['title'] = $this->input->post('title');
            $data['body'] = $this->input->post('body');
            $data['user_id'] = $this->input->post('user_id');
            $data['category_id'] = $this->input->post('category_id');
            
            $rez = $this->post_model->save($data);
            redirect(base_url('posts'));
        }
    }

    public function edit($id = NULL) {

        $data = $this->post_model->getPost($id);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'title', 'required|trim');
        $this->form_validation->set_rules('user_id', 'userID', 'required|trim');
        $this->form_validation->set_rules('category_id', 'category_id', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->model('category_model');
            $data['categories'] = $this->category_model->get_all();
            $this->load->view('editPost', $data);
        } else {
            $res = $this->post_model->save($data);
            redirect(base_url('posts'));
        }
    }
    
    public function delete($id = NULL){
        $postInfo=$this->post_model->getPost($id);
        if($postInfo['user_id']!== $this->session->userdata('user_id')){
            redirect('posts');
        }
        $res = $this->post_model->delete($id);
        return $this->output->set_output(json_encode($res));
    }

}
