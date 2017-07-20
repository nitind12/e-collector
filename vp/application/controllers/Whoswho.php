<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Whoswho extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('My_whoswho_model', 'mwm');
    }

    function check_login() {
        if (!$this->session->userdata('user__')) {
            redirect(_ROOT_URL_);
        }
    }

    function index(){
        $this->check_login();

    	$data['whos_who1'] = $this->mwm->get_whoswho_1();
    	//$data['whos_who2'] = $this->mwm->get_whoswho_whome_2();
        //$data['whos_who2'] = $this->mwm->get_whoswho_whome_2();
        $data['user'] = $this->session->userdata('user__');
        $this->load->view('templates/header');
        $this->load->view('whoswho/dashboard', $data);
        $this->load->view('templates/footer');
    }
    function get_whos_whome($dept_){
        $data['whos_who2'] = $this->mwm->get_whoswho_whome_2($dept_);
        echo json_encode($data);
    }
    function get_whos_whome_detail($ww2id){
        $data['whos_who2_detail'] = $this->mwm->get_whoswho_whome_detail($ww2id);
        echo json_encode($data);
    }
    function updatewhoswhodetail(){
        $data = $this->mwm->update_whoswho_detail();
        $data['_id_'] = $data['id_'];
        $data['message'] = $data['msg_'];
        $data['whos_who2_detail'] = $this->mwm->get_whoswho_whome_detail($data['id_']);
        echo json_encode($data);
    }
}