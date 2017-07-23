<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Patwari_village extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('my_model', 'mm');
        $this->load->model('my_patwari_village_model', 'pvm');
    }

    function index(){
    	$data['patwari'] = 'active';
        $data['village'] = '';
        $data['patwaris'] = $this->pvm->getPatwaris($this->session->userdata('user__'));
        $this->load->view('templates/header');
        $this->load->view('patwarinew/dashboard', $data);
        $this->load->view('templates/footer');
    }
    function getPatwaris(){
        $data['patwaris'] = $this->pvm->getPatwaris($this->session->userdata('user__'));
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
}