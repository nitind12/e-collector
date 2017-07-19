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
            'DESC' => $this->input->post('txtDesc'),
            'STATUS' => 1,
        );
        $query1 = $this->db->insert('c1_gallery_category', $data);
        $id__ = $this->db->insert_id();

        $config = array(
            'upload_path' => './assets_/gallery',
            'overwrite' => TRUE,
            'max_size' => 5000,
            'allowed_types' => 'jpg|jpeg',
            'file_name' => $id__
        );

        $file_element_name = 'txtFile';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload($file_element_name)) {
            $path_ji = $this->upload->data();

            $path_ = $path_ji['file_name'];

            $data = array(
                'PIC' => $path_
            );
            $this->db->where('CATEG_ID', $id__);
            $query = $this->db->update('c1_gallery_category', $data);
        } else {
            $path_ = 'x';
        }

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
            'CATEGORY' => $this->input->post('txtPlaceEdit'),
            'DESC' => $this->input->post('txtDescEdit'),
        );

        $this->db->where('CATEG_ID', $id__);
        $query = $this->db->update('c1_gallery_category', $data);

        if (!empty($_FILES['txtFileEdit']['name'])) {
            //----------------------------------Delete Previous img
            $this->db->where('CATEG_ID', $id__);
            $query = $this->db->get('c1_gallery_category');

            if ($query->num_rows() != 0) {
                $item_ = $query->row();

                if ($item_->PIC != 'x') {
                    $file__ = $item_->PIC;
                } else {
                    $file__ = 'x';
                }
            }
            if ($file__ != 'x') {
                echo $full_path_ = FCPATH . 'assets_/gallery/' . $file__;
                @unlink($full_path_);
            }
            //---------------------------------------

            $config = array(
                'upload_path' => './assets_/gallery',
                'overwrite' => TRUE,
                'max_size' => 5000,
                'allowed_types' => 'jpg|jpeg',
                'file_name' => $id__
            );

            $file_element_name = 'txtFileEdit';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload($file_element_name)) {
                $path_ji = $this->upload->data();

                $path_ = $path_ji['file_name'];

                $data = array(
                    'PIC' => $path_
                );
                $this->db->where('CATEG_ID', $id__);
                $query = $this->db->update('c1_gallery_category', $data);
            } else {
                $path_ = 'x';
            }
        }

        if ($query == TRUE) {
            $bool_ = array('res_' => TRUE, 'msg_' => 'Tourist Place editted Successfully');
        } else {
            $bool_ = array('res_' => TRUE, 'msg_' => 'Something went wrong. Please try again !!');
        }
        return $bool_;
    }

    function deleteCategory_($id_) {
        $this->db->where('CATEG_ID', $id_);
        $query = $this->db->get('c1_gallery_category');

        if ($query->num_rows() != 0) {
            $item_ = $query->row();

            if ($item_->PIC != 'x') {
                $file__ = $item_->PIC;
            } else {
                $file__ = 'x';
            }
        }
        if ($file__ != 'x') {
            echo $full_path_ = FCPATH . 'assets_/gallery/' . $file__;
            @unlink($full_path_);
        }
        
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

}
