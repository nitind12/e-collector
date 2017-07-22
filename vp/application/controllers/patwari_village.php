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

    function submitPatwari(){
        $message = $this->pvm->submitPatwari();
        echo $message;
    }
}