<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('My_model_gallery', 'mmgallery');
    }

    function index() {
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

    function deleteCat($id_) {
        $res_ = $this->mmgallery->deleteCategory_($id_);
        $this->session->set_flashdata('_msg_', $res_['msg_']);
        redirect('gallery');
    }

    function active_inactive($id_, $status) {
        $res_ = $this->mmgallery->active_inactive_($id_, $status);
        redirect('gallery');
    }

    function getCategoryData($id_) {
        $res = $this->mmgallery->getmCategoryData($id_);
        echo ($res);
    }

    function getImages() {
        $data['existing'] = $this->mmgallery->getImagesByCat(trim($this->input->post('txtCategory')));
        echo json_encode($data['existing']);
    }

    function uploadGallery() {
        $data['existing'] = $this->mmgallery->uploadGallery_(trim($this->input->post('txtCategory')));
        echo json_encode($data['existing']);
        //redirect('admin_/gallery');
    }

    //---------------------------------------------------------------------------------------------

    function do_upload() {
        $this->mmgallery->do_upload();
        redirect('gallery');
    }

    function fillGallery($id_) {
        $data_to_ajax = $this->mmgallery->fillGallery($id_);
        echo $data_to_ajax;
    }

    function deleteimg($id) {
        echo $uploadpath = FCPATH . 'assets_/gallery/';


        $row = $this->mmgallery->deleteimg($id);
        $src = $uploadpath . $row['photo__'];
        @unlink($src);

        if ($row['res_'] == TRUE) {
            echo'<h4 style="color:green">This image deleted successfully</h4>';
        } else {
            echo'<h4 style="color:green">Some server error !! Please try again.</h4>';
        }
    }   

}
