<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Patwari_village extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('my_patwari_village_model', 'pvm');
    }

    function index(){
        $this->check_login();
    	$data['patwari'] = '';
        $data['village'] = 'active';
        
        $this->load->view('templates/header');
        $this->load->view('patwarinew/dashboard', $data);
        $this->load->view('templates/footer');
    }
    function check_login() {
        if (!$this->session->userdata('user__')) {
            redirect(_ROOT_URL_);
        }
    }
    function getPatwaris(){
        $data['patwaris'] = $this->pvm->getPatwaris($this->session->userdata('user__'));
        echo json_encode($data);
    }
    function getActivePatwaris(){
        $data['patwaris'] = $this->pvm->getActivePatwaris($this->session->userdata('user__'));
        echo json_encode($data);   
    }
    function getPatwari($pid){
        $data['patwari'] = $this->pvm->getPatwari($pid, $this->session->userdata('user__'));
        echo json_encode($data);
    }
    function submitPatwari(){
        $data = $this->pvm->submitPatwari();
        echo json_encode($data);
    }
    function updatePatwari($pid){
        $data = $this->pvm->updatePatwari($pid);
        echo json_encode($data);
    }
    function activeInactivePatwari($pid, $status){
        $data['message'] = $this->pvm->activeInactivePatwari($pid, $status);
        echo json_encode($data);
    }
    function getVillages($pid=''){
        $data['villages_'] = $this->pvm->getVillages($this->session->userdata('user__'), $pid);
        echo json_encode($data);
    }
    function UpdateVillage(){
        $data = $this->pvm->UpdateVillage($this->session->userdata('user__'));
        echo $data['msg_'];
    }
    function getVillageData($vid){
        $data['village'] = $this->pvm->getVillageData($vid);
        echo json_encode($data);
    }
}