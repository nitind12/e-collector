<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('My_model_gallery', 'mmgallery');
    }

    function index(){
        $data['existing'] = $this->mmgallery->get_all_categories();     
        $data['user'] = $this->session->userdata('user__');
        $this->load->view('templates/header');
        $this->load->view('gallery/home', $data);
        $this->load->view('templates/footer');
    }       
        
    function feedCategory() {
        $res_ = $this->mmgallery->feedCategory_();
        $this->session->set_flashdata('_msg_', $res_['msg_']);
        redirect('gallery');
    }   
    
    function editCategory() {
        $res_ = $this->mmgallery->editCategory_();
        $this->session->set_flashdata('_msg_', $res_['msg_']);
        redirect('gallery');
    }
    
    function deleteCat($id_){
        $res_ = $this->mmgallery->deleteCategory_($id_);
        $this->session->set_flashdata('_msg_', $res_['msg_']);
        redirect('gallery');
    }
    
    function active_inactive($id_, $status) {
        $res_ = $this->mmgallery->active_inactive_($id_, $status);
        redirect('gallery');
    }
}