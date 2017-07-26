<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PdfUp extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('my_pdf_uploads_model', 'mpm');
    }
	function index(){
        $this->check_login();

        if($this->session->userdata('opt') == '1'){
        	$data['title_'] = "Circle Rates";
        	$data['forcombo'] = $this->mpm->getPdfName("Circle Rates");
        } else if($this->session->userdata('opt') == '2'){
        	$data['title_'] = "Adhaar Centres";
        	$data['forcombo'] = $this->mpm->getPdfName($data['title_']);
        } else {
        	$data['title_'] = "Downloads";
        	$data['forcombo'] = $this->mpm->getPdfName("x");
        }
        $this->load->view('templates/header');
        $this->load->view('pdfup/dashboard', $data);
        $this->load->view('templates/footer');
    }
    function up($opt=''){
    	$this->session->set_userdata('opt', $opt);
    	redirect('pdfUp');
    }
    function check_login() {
        if (!$this->session->userdata('user__')) {
            redirect(_ROOT_URL_);
        }
    }
    function uploadPdf($categ){
        $name_ = $this->input->post('pdfName');
    	$data['message'] = $this->mpm->uploadpdf($categ, $name_);
    	echo json_encode($data);
    }
    function showPdfList($tip, $name_){
        $data['selected_record'] = $this->mpm->getPdfDetail($tip, $name_);
        echo json_encode($data);
    }
}