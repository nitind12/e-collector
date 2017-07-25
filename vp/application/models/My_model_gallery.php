<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_model_gallery extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all_categories() {
        $this->db->order_by('CATEG_ID', 'desc');
        $query = $this->db->get('c1_gallery_category');
        return $query->result();
    }

    function feedCategory_() {
        $data = array(
            'CATEGORY' => $this->input->post('txtPlace'),
            'DESCR' => $this->input->post('txtDesc'),
            'STATUS' => 1,
        );
        $query = $this->db->insert('c1_gallery_category', $data);        
       

        if ($query == TRUE) {
            $bool_ = array('res_' => TRUE, 'msg_' => 'Tourist Place Feeded Successfully');
        } else {
            $bool_ = array('res_' => TRUE, 'msg_' => 'Something went wrong. Please try again !!');
        }
        return $bool_;
    }

    function editCategory_() {
        $id__ = $this->input->post('txtID_edit');

        $data = array(
            'CATEGORY' => $this->input->post('txtCategory_edit'),
            'DESCR' => $this->input->post('txtDesc_edit'),
        );

        $this->db->where('CATEG_ID', $id__);
        $query = $this->db->update('c1_gallery_category', $data);        

        if ($query == TRUE) {
            $bool_ = array('res_' => TRUE, 'msg_' => 'Tourist Place editted Successfully');
        } else {
            $bool_ = array('res_' => TRUE, 'msg_' => 'Something went wrong. Please try again !!');
        }
        return $bool_;
    }

    function deleteCategory_($id_) {
        $this->db->where('CATEG_ID', $id_);
        $query=$this->db->delete('c1_gallery_category');
        
        if ($query == TRUE) {
            $bool_ = array('res_' => TRUE, 'msg_' => 'Tourist Place deleted Successfully');
        } else {
            $bool_ = array('res_' => TRUE, 'msg_' => 'Something went wrong. Please try again !!');
        }
        return $bool_;
    }
    
    function active_inactive_($id_, $status) {
        $data = array(
            'STATUS' => $status,
        );
        $this->db->where('CATEG_ID', $id_);
        $query = $this->db->update('c1_gallery_category', $data);
    }
    
    function getmCategoryData($id_){
        $this->db->where('CATEG_ID', $id_);
        $query = $this->db->get('c1_gallery_category');
        
        if ($query->num_rows() != 0) {
            foreach ($query->result() as $row) {
                $data_ = array('catID' => $row->CATEG_ID, 'category' => $row->CATEGORY, 'desc' => $row->DESCR);
            }
        } else {
            $data_ = "NO DATA AVAILABLE";
        }
        $this->output->set_content_type('application/json');
        return json_encode($data_);
    }
    
    public function do_upload() {
        $config['upload_path'] = './assets_/gallery';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '204800';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            foreach ($error as $item => $value) {
                echo'<ol class="alert alert-danger"><li>' . $value . '</ol></li>';
            }
            exit;
        } else {
            $upload_data = array('upload_data' => $this->upload->data());
            foreach ($upload_data as $key => $value) {

                $id_ = $this->input->post('txtCategory');

                $image = $value['file_name'];
                $name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $value['file_name']);

                $data = array(
                    'CATEG_ID' => $id_,
                    'PIC_PATH' => $image,                    
                    'STATUS'    => 1                    
                );
                $this->db->insert('c2_gallery_picture', $data);
            }
            //echo'<h4 style="color:green">Image uploaded Succesfully</h4>';
        }
    }

    function fillGallery($id_){
        $data_ = '';
        $uploadpath = base_url() . 'assets_/gallery/';

        $this->db->where('CATEG_ID', $id_);
        $rs = $this->db->get('c2_gallery_picture');

        if ($rs->num_rows() != 0) {
            foreach ($rs->result() as $row) {
                $src = $uploadpath . $row->PIC_PATH;
                $alt = $row->PIC_PATH;
                $lid = $row->PIC_ID . 'g';
                $data_ = $data_ .  "<li class='thumbnail' id='$lid'>
                            <span id='$row->PIC_ID' class='btn btn-info btn-block btn-delete'><i class='glyphicon glyphicon-remove'></i>&nbsp;&nbsp;&nbsp;Delete</span>
                            <img src='$src' alt='$alt' style='max-height:100px;'>";                
            }
        } else {
            $data_ = "<li class='thumbnail' style='color:red'>
                           No Images have been added to this gallery</li>";
        }
        return $data_;
    }

    function deleteimg($id) {
        $this->db->where('PIC_ID', $id);
        $query = $this->db->get('c2_gallery_picture');
        
        if($query->num_rows() != 0){
            $row = $query->row();
            $bool_ = array('res_'=>TRUE, 'photo__' => $row->PIC_PATH);

            $this->db->where('PIC_ID', $id);
            $this->db->delete('c2_gallery_picture');
        } else {
            $bool_ = array('res_'=>FALSE, 'photo__' => 'X');
        }
        return $bool_;
    }
        
}
