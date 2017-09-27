<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    function __construct() {
        parent::__construct();
        if(empty($this->session->userdata('id')) && empty($this->session->userdata('aloged_in')) ){
            redirect(base_url('login'));
        }
        $this->load->model('category_model');
    }

    function index() {
        $data['title'] = 'Categories Page';
        $data['categories'] = $this->category_model->get_all();
        $this->load->view('categories', $data);
    }

    public function add() {
              
        $this->load->library('form_validation');

        $this->form_validation->set_rules('naziv', 'naziv', 'required|trim|is_unique[category.naziv]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Add new category';
            $this->load->view('newCategory',$data);
        } else {
            $data['naziv'] = $this->input->post('naziv');
            $rez = $this->category_model->save($data);
            redirect(base_url('categories'));
        }
    }

    public function edit($id = NULL) {
        
        $data['title'] = 'Edit category';
        $data = $this->category_model->getCategory($id);
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('naziv', 'naziv', 'required|trim|is_unique[category.naziv]');
        if($this->form_validation->run()== FALSE){
           $this->load->view('editCategory', $data);
        } else {
            $res = $this->category_model->save($data);
            redirect(base_url('categories'));
        }
        
        
    }
    public function delete($id=NULL){
        $data = $this->category_model->getCategory($id);
        $res = $this->category_model->delete($id);
        return $this->output->set_output(json_encode($res));
    }
   
    
    
    
    
    
    
    
    public function save() {

        $rez = $this->category_model->addCategory($this->input->post('naziv'));
        rediretct(base_url('categories'));
    }

    public function update($id = NULL) {
        
    }

    private function categoryValidation() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('naziv', 'naziv', 'required|trim|is_unique[category.naziv]');

        return $this->form_validation->run();
    }

}
