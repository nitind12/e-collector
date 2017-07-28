<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Newsevents extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('My_model_newsevents', 'mmnws');
        //if (!$this->session->userdata('ussr_')) {
            //redirect(__BACKTOSITE__);
        //}
    }

    function index() {
        $this->check_login();
        $data['user___'] = $this->session->userdata('ussr_');
        $data['news_'] = $this->mmnws->get_all_news();
        $data['news_d'] = $this->mmnws->get_all_news_deactive();

        $this->load->view('templates/header');
        $this->load->view('news', $data);
        $this->load->view('templates/footer');
    }

    function check_login(){
        if(! $this->session->userdata('user__')){redirect(_ROOT_URL_);}
    }
    
    function edit_news_events($id__) {
        $this->check_login();
        $data['record_'] = $this->mmnws->get_news_events_for_edit($id__);

        $data['user___'] = $this->session->userdata('ussr_');
        $data['news_'] = $this->mmnws->get_all_news();
        $data['news_d'] = $this->mmnws->get_all_news_deactive();
        $data['edit_page_heading'] = 'Update News &amp; Events';
        $data['edit_page'] = "newsevents/editnews";
        $data['view1'] = "newsevents/viewnews_active";
        $data['view2'] = "newsevents/viewnews_deactive";

        $this->load->view('templates/header');
        $this->load->view('edit', $data);
        $this->load->view('templates/footer');
    }

    function updateNews($id__) {
        $this->check_login();
        $res_ = $this->mmnws->updateNews_($id__);
        $this->session->set_flashdata('feed_msg_', $res_['msg_']);
        redirect('newsevents/edit_news_events/' . $id__);
    }

    function active_deactive_news($id_, $status_) {
        $this->check_login();
        $res_ = $this->mmnws->active_deactive_news($id_, $status_);
        if ($res_ == TRUE) {
            if ($status_ == 1) {
                $this->session->set_flashdata('error_msg_', 'News Activated Successfully');
            } else {
                $this->session->set_flashdata('error_msg_', 'News Deactivated Successfully');
            }
        } else {
            $this->session->set_flashdata('error_msg_', 'Something went wrong. Please try again !!');
        }
        redirect('newsevents');
    }

    function feedNews() {
        $this->check_login();
        $res_ = $this->mmnws->feedNews_();
        $this->session->set_flashdata('feed_msg_', $res_['msg_']);
        redirect('newsevents');
    }

    function delete_news_events($id_) {
        $this->check_login();
        $res_ = $this->mmnws->delete_news_events($id_);
        if ($res_ == TRUE) {
            $this->session->set_flashdata('error_msg_', 'News Deleted Successfully');
        } else {
            $this->session->set_flashdata('error_msg_', 'Something went wrong. Please try again !!');
        }
        redirect('newsevents');
    }

    function delete_attachment($id__) {
        $this->check_login();
        $res_ = $this->mmnws->delete_attach_news($id__);

        if ($res_ == TRUE) {
            $this->session->set_flashdata('error_msg_', 'News Attachment Deleted Successfully');
        } else {
            $this->session->set_flashdata('error_msg_', 'Something went wrong. Please try again !!');
        }
        redirect('newsevents');
    }
}