<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Createsdm extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('My_model_create_sdm', 'cu');
        if(! $this->session->userdata('user__')){
            redirect('web/login');
        }
    }

    function index(){
    	$data['user___'] = $this->session->userdata('ussr_');
        $data['users_'] = $this->cu->get_all_sdms();
        
        $data['folder_'] = 'createsdm';
        $data['page__'] = 'index';
        $data['page_head'] = 'Create &amp; Manage SDM(s)';
        
        $this->load->view('templates/header');
        $this->load->view('sdm', $data);
        $this->load->view('templates/footer');
    }
    
    function create_sdm(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $result = $this->cu->create_sdm();
            $this->session->set_flashdata('feed_msg_', $result['msg_']);
        }
        redirect('createsdm');
    }

    function modify(){
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $str = explode('~', $this->input->post('txtHidden'));
            $USERNAME = $str[0];
            $STATUS = $str[1];
            if($STATUS != 'del'){
                $result = $this->cu->active_inactive($USERNAME, $STATUS);
                $this->session->set_flashdata('feed_msg_', $result['msg_']);
            } else {
                $result = $this->cu->delete_sdm($USERNAME);
                $this->session->set_flashdata('msg_delete_', $result['msg_']);        
            }
        }
        redirect('createsdm');
    }

    function check_sdm_status(){
        //if(! $this->session->userdata('user__'))
    }
}