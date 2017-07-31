<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Revenue extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('My_model_revenue', 'mmrevenue');
    }

    function index(){ 
        $data['villages'] = $this->mmrevenue->getVillages($this->session->userdata('user__'));
        $data['user'] = $this->session->userdata('user__');
        $this->load->view('templates/header');
        $this->load->view('revenue/home', $data);
        $this->load->view('templates/footer');
    }    
    
    function do_upload(){
        $this->mmrevenue->do_upload();
        redirect('Revenue');
    }
    
    
    function fillMap($id_) {
        $data_to_ajax = $this->mmrevenue->fillMap_($id_);
        echo $data_to_ajax;
    }
    
    function deletepdf($id) {
        $uploadpath = FCPATH . 'assets_/revenueMap/';
        $row = $this->mmrevenue->deletepdf_($id);

        $src = $uploadpath . $row['path__'];
        @unlink($src);

        if($row['res_'] == TRUE){
            echo'<h4 style="color:green">This image deleted successfully</h4>';
        } else {
            echo'<h4 style="color:green">Some server error !! Please try again.</h4>';
        }
    }
    
}