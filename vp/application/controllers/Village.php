<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Village extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('my_village_model', 'pvm');
    }

    function index(){
        $this->check_login();
    	$data['patwari'] = 'active';
        $data['patwariarea'] = '';
        $data['village'] = '';
        $data['tehsilEnglish'] = $this->pvm->getTehsilMasterEnglish();
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
    function activeInactivePatwariArea($paid, $status){
        $data['message'] = $this->pvm->activeInactivePatwariArea($paid, $status);
        echo json_encode($data);   
    }
    function getTehsilEnglish(){
        $data['tehsilEnglish'] = $this->pvm->getTehsilMasterEnglish();
        echo json_encode($data);
    }

    function getPatwariAreas($pid=''){
        $data['patwariAreas_'] = $this->pvm->getPatwariAreas($this->session->userdata('user__'), $pid);
        echo json_encode($data);
    }
    
     function getPatwariArea($paid=''){
        $data['patwariArea_'] = $this->pvm->getPatwariArea($paid);
        echo json_encode($data);
    }
    function UpdatepatwariArea(){
        $data = $this->pvm->UpdatepatwariArea($this->session->userdata('user__'));
        echo $data['msg_'];
    }
    function getVillages($paid=''){
        $data['villages_'] = $this->pvm->getVillages($this->session->userdata('user__'), $paid);
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
    function activeInactiveVillage($vid, $status){
        $data['message'] = $this->pvm->activeInactiveVillage($vid, $status);
        echo json_encode($data);
    }

}